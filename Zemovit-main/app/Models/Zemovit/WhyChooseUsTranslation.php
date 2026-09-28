<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $why_choose_us_id
 * @property string $title
 * @property string $description
 * @property string $locale
 * @property string $created_at
 * @property string $updated_at
 * @property WhyChooseU $whyChooseU
 */
class WhyChooseUsTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['why_choose_us_id', 'title', 'description', 'locale', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function whyChooseU()
    {
        return $this->belongsTo('App\Models\Zemovit\WhyChooseU', 'why_choose_us_id');
    }
}
