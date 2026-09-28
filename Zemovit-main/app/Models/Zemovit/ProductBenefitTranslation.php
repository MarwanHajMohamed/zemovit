<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_benefit_id
 * @property string $title
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property ProductBenefit $productBenefit
 */
class ProductBenefitTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_benefit_id', 'title', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productBenefit()
    {
        return $this->belongsTo('App\Models\Zemovit\ProductBenefit');
    }
}
