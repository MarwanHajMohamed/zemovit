<?php

namespace App\Models\Zemovit;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $therapeutic_area_id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property TherapeuticArea $therapeuticArea
 */
class TherapeuticAreaTranslation extends Model
{
    use Sluggable;

    /**
     * @var array
     */
    protected $fillable = ['therapeutic_area_id', 'title', 'subtitle', 'description','title2', 'locale', 'created_at', 'updated_at','slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function therapeuticArea()
    {
        return $this->belongsTo('App\Models\Zemovit\TherapeuticArea');
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
