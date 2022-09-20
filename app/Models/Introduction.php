<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Introduction extends BaseModel
{
    const IMAGEPATH = 'introductions' ; 

    use HasTranslations;
    public $translatable = ['title','description'];
    protected $fillable = ['title','description' ,'image'];

}
