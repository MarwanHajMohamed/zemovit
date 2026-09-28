<?php

namespace App\Http\Controllers\Zemovit;

use App\Http\Controllers\Controller;
use App\Traits\TranslateWithGemini;
use Illuminate\Http\Request;

class GenerateKeywordsController extends Controller
{
    use TranslateWithGemini;

    public function index(Request $request)
    {
        $texts = $request->input('texts');
        $sourceLang = $request->input('source_lang', 'ar');
        $targetLang = $request->input('target_lang', 'en');

        $titleAr = $texts['ar']['title'] ?? '';
        $descriptionAr = $texts['ar']['description'] ?? '';
        $titleEn = $texts['en']['title'] ?? '';
        $descriptionEn = $texts['en']['description'] ?? '';
        $prompt = $this->buildKeywordsPrompt($titleAr, $descriptionAr, $titleEn, $descriptionEn);
        $keywords = $this->generateKeywordsForBothLanguages($prompt);
        return response()->json([
            'keywords' => $keywords
        ]);
    }

}
