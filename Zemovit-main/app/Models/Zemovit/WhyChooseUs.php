<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property WhyChooseUsTranslation[] $whyChooseUsTranslations
 */
class WhyChooseUs extends Model
{
    use Translatable;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];
    public $translatedAttributes = ['title' ,'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function whyChooseUsTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\WhyChooseUsTranslation', 'why_choose_us_id');
    }
}
