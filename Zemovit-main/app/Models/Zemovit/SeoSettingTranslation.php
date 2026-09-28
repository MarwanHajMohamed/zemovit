<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

class SeoSettingTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['seo_setting_id', 'locale', 'title', 'description', 'keywords', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seoSetting()
    {
        return $this->belongsTo('App\Models\Zemovit\SeoSetting');
    }
}
