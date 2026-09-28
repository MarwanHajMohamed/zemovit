<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Model;

class PageName extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seoSettings()
    {
        return $this->hasOne(SeoSetting::class);
    }
}
