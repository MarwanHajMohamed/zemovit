<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_warring_id
 * @property string $title
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property ProductWarning $productWarning
 */
class ProductWaringTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_warning_id', 'title', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $table = 'product_waring_translations';
    public function productWarning()
    {
        return $this->belongsTo('App\Models\Zemovit\ProductWarning', 'product_warring_id');
    }
}
