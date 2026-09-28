<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $about_id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property About $about
 */
class AboutTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['about_id', 'title', 'subtitle', 'description', 'locale', 'created_at', 'updated_at','subtitle2'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function about()
    {
        return $this->belongsTo('App\Models\Zemovit\About');
    }
}
