<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 * @property TherapeuticAreaTranslation[] $therapeuticAreaTranslations
 */
class TherapeuticArea extends Model
{
    use Translatable;

    /**
     * @var array
     */
    protected $fillable = ['icon', 'created_at', 'updated_at'];
    public $translatedAttributes = ['title' ,'description','slug','title2'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function therapeuticAreaTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\TherapeuticAreaTranslation');
    }
}
