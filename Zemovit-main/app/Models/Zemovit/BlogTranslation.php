<?php

namespace App\Models\Zemovit;

use Cviebrock\EloquentSluggable\Sluggable;
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
class BlogTranslation extends Model
{
        use Sluggable;

    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'blog_id', 'slug','locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function Blog()
    {
        return $this->belongsTo(Blog::class);
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
