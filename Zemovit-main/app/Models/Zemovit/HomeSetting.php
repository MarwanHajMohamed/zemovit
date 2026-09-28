<?php

namespace App\Models\Zemovit;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title', 'description','subtitle','subtitle2'];
    protected $fillable = ['section_name', 'image', 'is_show', 'position', 'created_at', 'updated_at'];
}
