<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property ProductBenefitTranslation[] $productBenefitTranslations
 */
class ProductBenefit extends Model
{
    use Translatable;
    public $translatedAttributes = ['title'];

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productBenefitTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\ProductBenefitTranslation');
    }
    public function product() {
        return $this->belongsTo('App\Models\Zemovit\Product');
    }
    public function getTitleAttribute()
    {
        return $this->translateOrNew(app()->getLocale())->title ?? '';
    }

}
