<?php

namespace App\Models\Zemovit;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class ProductTranslation extends Model
{
    use Sluggable;

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'title', 'description', 'slug', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Zemovit\Product');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
                'method' => function ($string, $separator) {
                    $slug = trim($string);
                    $slug = preg_replace('/\s+/u', $separator, $slug);
                    $slug = preg_replace('/[^\p{Arabic}\p{Latin}\d\-]+/u', '', $slug);
                    return strtolower($slug);
                }
            ]
        ];
    }
}
