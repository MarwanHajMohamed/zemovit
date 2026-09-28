<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $banner_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Banner $banner
 */
class BannerTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['banner_id', 'locale', 'title', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banner()
    {
        return $this->belongsTo('App\Models\Zemovit\Banner');
    }
}
