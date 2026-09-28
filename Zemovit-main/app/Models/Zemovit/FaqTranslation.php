<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $faq_id
 * @property string $title
 * @property string $description
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property Faq $faq
 */
class FaqTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['faq_id', 'title', 'description', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faq()
    {
        return $this->belongsTo('App\Models\Zemovit\Faq');
    }
}
