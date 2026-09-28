<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $image
 * @property integer $is_show
 * @property string $created_at
 * @property string $updated_at
 * @property AboutTranslation[] $aboutTranslations
 */
class Blog extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description','slug'];

    /**
     * @var array
     */
    protected $fillable = ['image', 'date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  
   public function images()
    {
        return $this->hasMany(BlogImage::class);
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
