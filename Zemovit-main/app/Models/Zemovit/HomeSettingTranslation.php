<?php

namespace App\Models\Zemovit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSettingTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['home_setting_id', 'locale','subtitle2','subtitle', 'title', 'description', 'created_at', 'updated_at'];

}
