<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property ProductWaringTranslation[] $productWarringTranslations
 */
class ProductWarning extends Model
{

    use Translatable;
    public $translationModel = ProductWaringTranslation::class;
    protected $translationTable = 'product_warning_translations';
    protected $table = 'product_warnings';

    public $translatedAttributes = ['title'];

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productWaringTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\ProductWaringTranslation', 'product_warring_id');
    }
}
