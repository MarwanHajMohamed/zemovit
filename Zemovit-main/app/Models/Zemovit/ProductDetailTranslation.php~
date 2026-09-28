<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_detail_id
 * @property string $label
 * @property string $value
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property ProductDetail $productDetail
 */
class ProductDetailTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_detail_id', 'label', 'value', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productDetail()
    {
        return $this->belongsTo('App\Models\Zemovit\ProductDetail');
    }
}
