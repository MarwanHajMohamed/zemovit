<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'description', 'keywords'];
    protected $fillable = ['page_name_id', 'image', 'created_at', 'updated_at'];
    public $translationModel = SeoSettingTranslation::class;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seoSettingTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\SeoSettingTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pageName()
    {
        return $this->belongsTo('App\Models\Zemovit\PageName');
    }

    public function getEnglishTitle()
    {
        $title = $this->getAttribute('title', 'en');
        return $title ?? 'Default Title';
    }
}
