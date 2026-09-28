<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property ProductDetailTranslation[] $productDetailTranslations
 */
class ProductDetail extends Model
{
    use Translatable;
    public $translatedAttributes = ['label', 'value'];

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productDetailTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\ProductDetailTranslation');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
