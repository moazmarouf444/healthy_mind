<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class About extends BaseModel
{
    const IMAGEPATH = 'abouts' ; 

    use HasTranslations;
    protected $fillable = ['title','description'];
    public $translatable = ['title','description'];

}
