<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $btn_link
 * @property string $created_at
 * @property string $updated_at
 * @property BannerTranslation[] $bannerTranslations
 */
class Banner extends Model
{
    use Translatable;

    /**
     * @var array
     */
    protected $fillable = ['btn_link', 'created_at', 'updated_at','image'];
    public $translatedAttributes = ['title', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bannerTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\BannerTranslation');
    }
}
