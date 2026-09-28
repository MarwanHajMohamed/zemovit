<?php

namespace App\Traits;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Log;

trait TranslateWithGemini
{
    /**
     * Translate text using Google Gemini via google-gemini-php/laravel package
     * Accepts string, array, or nested array of texts
     *
     * @param string|array $text Text(s) to translate - can be string, array, or nested array
     * @param string $targetLang Target language code (e.g., 'ar', 'en', 'es')
     * @param string $sourceLang Source language code (optional)
     * @return string|array|null Translated text(s) maintaining original structure or null on failure
     */
    public function generateKeywordsForBothLanguages(string $prompt): array
    {
        $response = Gemini::generativeModel(model: 'gemini-2.0-flash')->generateContent($prompt);
        $text = $response->text();

        $cleanText = trim($text);

        // إزالة علامات Markdown الثلاثية """ من البداية والنهاية
        $cleanText = trim($cleanText, "\" \n");

        // إزالة ```json و ```
        $cleanText = preg_replace('/^```json\s*/', '', $cleanText); // إزالة ```json من البداية
        $cleanText = preg_replace('/```$/', '', $cleanText);        // إزالة ``` من النهاية
        $cleanText = trim($cleanText);

        // ✅ محاولة فك التشفير
        $json = json_decode($cleanText, true);

        if (is_array($json) && isset($json['ar']) && isset($json['en'])) {
            return [
                'ar' => collect($json['ar'])->map(fn($item) => trim($item))->filter()->values()->toArray(),
                'en' => collect($json['en'])->map(fn($item) => trim($item))->filter()->values()->toArray(),
            ];
        }

        return ['ar' => [], 'en' => []];
    }

    public function translateWithGemini($text, $targetLang = 'ar', $sourceLang = null)
    {
        if (empty($text)) {
            return $text;
        }

        // Handle different input types
        if (is_string($text)) {
            return $this->translateSingleText($text, $targetLang, $sourceLang);
        }

        if (is_array($text)) {
            return $this->translateArray($text, $targetLang, $sourceLang);
        }

        // Invalid input type
        Log::error('Invalid input type for translation', [
            'type' => gettype($text),
            'targetLang' => $targetLang
        ]);

        return null;
    }

    /**
     * Translate a single text string
     *
     * @param string $text
     * @param string $targetLang
     * @param string $sourceLang
     * @return string|null
     */
    private function translateSingleText($text, $targetLang, $sourceLang = null)
    {
        try {
            // Get language names for better translation
            $languageNames = $this->getLanguageNames();
            $targetLanguage = $languageNames[$targetLang] ?? $targetLang;
            $sourceLanguage = $sourceLang ? ($languageNames[$sourceLang] ?? $sourceLang) : 'auto-detect';

            // Create the translation prompt
            $prompt = $this->buildTranslationPrompt($text, $targetLanguage, $sourceLanguage);

            // Use Gemini to translate
            $result = Gemini::generativeModel(model: 'gemini-2.0-flash')
                ->generateContent($prompt);

            $translatedText = $result->text();

            if (empty($translatedText)) {
                Log::error('Empty translation result from Gemini');
                return null;
            }

            return trim($translatedText);

        } catch (\Exception $e) {
            Log::error('Gemini translation failed', [
                'message' => $e->getMessage(),
                'text' => substr($text, 0, 100),
                'targetLang' => $targetLang,
                'sourceLang' => $sourceLang
            ]);

            return null;
        }
    }

    /**
     * Translate an array of texts (handles nested arrays recursively)
     *
     * @param array $texts
     * @param string $targetLang
     * @param string $sourceLang
     * @return array
     */
    private function translateArray($texts, $targetLang, $sourceLang = null)
    {
        $results = [];

        foreach ($texts as $key => $text) {
            if (is_string($text)) {
                $results[$key] = $this->translateSingleText($text, $targetLang, $sourceLang);
            } elseif (is_array($text)) {
                // Recursively handle nested arrays
                $results[$key] = $this->translateArray($text, $targetLang, $sourceLang);
            } else {
                // Non-string, non-array values are returned as-is
                $results[$key] = $text;
                Log::warning('Non-translatable value in array', [
                    'key' => $key,
                    'type' => gettype($text),
                    'value' => $text
                ]);
            }
        }

        return $results;
    }

    /**
     * Translate multiple texts at once (batch translation for better performance)
     *
     * @param array $texts Array of texts to translate
     * @param string $targetLang Target language code
     * @param string $sourceLang Source language code (optional)
     * @param int $batchSize Number of texts to translate in one API call
     * @return array Array of translated texts
     */
    public function translateBatch($texts, $targetLang = 'ar', $sourceLang = null, $batchSize = 10)
    {
        if (empty($texts)) {
            return [];
        }

        // Flatten array to get all strings
        $flatTexts = $this->flattenArray($texts);
        $results = [];

        // Process in batches for better performance
        $chunks = array_chunk($flatTexts, $batchSize, true);

        foreach ($chunks as $chunk) {
            $batchResults = $this->translateTextBatch($chunk, $targetLang, $sourceLang);
            $results = array_merge($results, $batchResults);
        }

        // Reconstruct the original array structure
        return $this->reconstructArray($texts, $results);
    }

    /**
     * Translate a batch of texts in a single API call
     *
     * @param array $texts
     * @param string $targetLang
     * @param string $sourceLang
     * @return array
     */
    private function translateTextBatch($texts, $targetLang, $sourceLang = null)
    {
        try {
            $languageNames = $this->getLanguageNames();
            $targetLanguage = $languageNames[$targetLang] ?? $targetLang;
            $sourceLanguage = $sourceLang ? ($languageNames[$sourceLang] ?? $sourceLang) : 'auto-detect';

            // Create batch prompt
            $prompt = "Translate the following texts ";

            if ($sourceLanguage !== 'auto-detect') {
                $prompt .= "from {$sourceLanguage} ";
            }

            $prompt .= "to {$targetLanguage}. ";
            $prompt .= "Return only the translated texts in the same order, separated by '|||':\n\n";

            $textList = [];
            foreach ($texts as $key => $text) {
                $textList[] = $text;
            }

            $prompt .= implode('\n---\n', $textList);

            $result = Gemini::generativeModel(model: 'gemini-2.0-flash')
                ->generateContent($prompt);

            $translatedText = $result->text();

            if (empty($translatedText)) {
                Log::error('Empty batch translation result from Gemini');
                return array_fill_keys(array_keys($texts), null);
            }

            // Split the results
            $translatedTexts = explode('|||', $translatedText);
            $results = [];
            $keys = array_keys($texts);

            foreach ($keys as $index => $key) {
                $results[$key] = isset($translatedTexts[$index]) ? trim($translatedTexts[$index]) : null;
            }

            return $results;

        } catch (\Exception $e) {
            Log::error('Gemini batch translation failed', [
                'message' => $e->getMessage(),
                'textCount' => count($texts),
                'targetLang' => $targetLang,
                'sourceLang' => $sourceLang
            ]);

            return array_fill_keys(array_keys($texts), null);
        }
    }
    public function buildKeywordsPrompt(
        string $titleAr, string $descriptionAr,
        string $titleEn, string $descriptionEn
    ): string {
        return <<<PROMPT
You are an very SEO expert.
You are given a title and a description in both Arabic and English. Your task is to extract **as many SEO-optimized keywords as possible** for each language based on the content.
Focus on:
- Phrases or words that users are most likely to search for.
- Long-tail keywords that reflect the actual intent of the content.
- Repeated or emphasized terms that indicate importance.
- Use natural and search-friendly expressions.

Return the result in plain JSON format **only**, without code block or markdown formatting.
{
  "ar": ["كلمة1", "كلمة2", "كلمة3", ..., "كلمةX"],
  "en": ["Word1", "Word2", "Word3", ..., "WordX"]
}
---
- Arabic Title:
{$titleAr}

- Arabic Description:
{$descriptionAr}

- English Title:
{$titleEn}

- English Description:
{$descriptionEn}
PROMPT;
    }

    /**
     * Flatten array to get all string values with their paths
     *
     * @param array $array
     * @param string $prefix
     * @return array
     */
    private function flattenArray($array, $prefix = '')
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix === '' ? $key : $prefix . '.' . $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $newKey));
            } elseif (is_string($value)) {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Reconstruct original array structure with translated values
     *
     * @param array $original
     * @param array $translated
     * @return array
     */
    private function reconstructArray($original, $translated)
    {
        $result = [];

        foreach ($original as $key => $value) {
            if (is_array($value)) {
                $result[$key] = $this->reconstructArray($value, $translated);
            } elseif (is_string($value)) {
                $result[$key] = $translated[$key] ?? $value;
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Build translation prompt for Gemini
     *
     * @param string $text
     * @param string $targetLanguage
     * @param string $sourceLanguage
     * @return string
     */
    private function buildTranslationPrompt($text, $targetLanguage, $sourceLanguage)
    {
        $prompt = "Translate the following text ";

        if ($sourceLanguage !== 'auto-detect') {
            $prompt .= "from {$sourceLanguage} ";
        }

        $prompt .= "to {$targetLanguage}. ";
        $prompt .= "Return only the translated text without any explanations, quotes, or additional content:\n\n";
        $prompt .= $text;

        return $prompt;
    }

    /**
     * Get language names mapping
     *
     * @return array
     */
    private function getLanguageNames()
    {
        return [
            'ar' => 'Arabic',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'de' => 'German',
            'it' => 'Italian',
            'pt' => 'Portuguese',
            'ru' => 'Russian',
            'ja' => 'Japanese',
            'ko' => 'Korean',
            'zh' => 'Chinese',
            'hi' => 'Hindi',
            'tr' => 'Turkish',
            'nl' => 'Dutch',
            'sv' => 'Swedish',
            'no' => 'Norwegian',
            'da' => 'Danish',
            'fi' => 'Finnish',
            'pl' => 'Polish',
            'cs' => 'Czech',
            'hu' => 'Hungarian',
            'ro' => 'Romanian',
            'bg' => 'Bulgarian',
            'hr' => 'Croatian',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'et' => 'Estonian',
            'lv' => 'Latvian',
            'lt' => 'Lithuanian',
            'mt' => 'Maltese',
            'ga' => 'Irish',
            'cy' => 'Welsh',
            'eu' => 'Basque',
            'ca' => 'Catalan',
            'gl' => 'Galician',
            'is' => 'Icelandic',
            'mk' => 'Macedonian',
            'sr' => 'Serbian',
            'bs' => 'Bosnian',
            'sq' => 'Albanian',
            'el' => 'Greek',
            'he' => 'Hebrew',
            'ur' => 'Urdu',
            'fa' => 'Persian',
            'th' => 'Thai',
            'vi' => 'Vietnamese',
            'id' => 'Indonesian',
            'ms' => 'Malay',
            'bn' => 'Bengali',
            'ta' => 'Tamil',
            'te' => 'Telugu',
            'ml' => 'Malayalam',
            'kn' => 'Kannada',
            'gu' => 'Gujarati',
            'pa' => 'Punjabi',
            'mr' => 'Marathi',
            'ne' => 'Nepali',
            'si' => 'Sinhala',
            'my' => 'Myanmar',
            'km' => 'Khmer',
            'lo' => 'Lao',
            'ka' => 'Georgian',
            'am' => 'Amharic',
            'sw' => 'Swahili',
            'zu' => 'Zulu',
            'af' => 'Afrikaans',
            'xh' => 'Xhosa',
            'yo' => 'Yoruba',
            'ig' => 'Igbo',
            'ha' => 'Hausa',
        ];
    }

    /**
     * Get supported language codes
     *
     * @return array
     */
    public function getSupportedLanguages()
    {
        return array_keys($this->getLanguageNames());
    }
}
