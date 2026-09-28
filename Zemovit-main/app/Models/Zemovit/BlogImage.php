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
class BlogImage extends Model
{
   
    /**
     * @var array
     */
    protected $fillable = ['image',  'blog_id', 'type','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
  public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
    }
