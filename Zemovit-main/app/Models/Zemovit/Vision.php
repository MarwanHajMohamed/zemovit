<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $image
 * @property integer $is_show
 * @property string $created_at
 * @property string $updated_at
 * @property AboutTranslation[] $aboutTranslations
 */
class Vision extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description','sub_title'];

    /**
     * @var array
     */
    protected $fillable = ['image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visionTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\VisionTranslation');
    }
}
