<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Article extends BaseModel
{
    const IMAGEPATH = 'articles' ; 

    use HasTranslations;
    public $translatable = ['title','description'];
    protected $fillable = ['title','description' ,'image'];
}
