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
class MissionTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['mission_id', 'title', 'sub_title', 'description', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mission()
    {
        return $this->belongsTo('App\Models\Zemovit\Mission');
    }
}

