<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property FaqTranslation[] $faqTranslations
 */
class Faq extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description'];

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\FaqTranslation');
    }
}
