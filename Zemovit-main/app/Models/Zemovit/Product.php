<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $therapeutic_area_id
 * @property integer $is_featured
 * @property string $created_at
 * @property string $updated_at
 * @property ProductTranslation[] $productTranslations
 */
class Product extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description'];

    /**
     * @var array
     */
    protected $fillable = ['therapeutic_area_id', 'is_featured', 'created_at', 'updated_at','image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTranslations()
    {
        return $this->hasMany('App\Models\Zemovit\ProductTranslation');
    }


    public function warnings()
    {
        return $this->hasMany('App\Models\Zemovit\ProductWarning');
    }
    public function therapeuticArea()
    {
        return $this->belongsTo(TherapeuticArea::class);
    }
    public function benefits()
    {
        return $this->hasMany(ProductBenefit::class);
    }
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function getTranslatedAttribute($locale)
    {
        return $this->translations->where('locale', $locale)->first();
    }
    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }
    public function therapeuticAreas()
    {
        return $this->belongsToMany(TherapeuticArea::class,'product_therapeutic_areas',
        'product_id', 'therapeutic_area_id');
    }

}
