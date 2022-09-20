<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Help extends BaseModel
{
    const IMAGEPATH = 'helps' ; 

    use HasTranslations; 
    protected $fillable = ['question','answer'];
    public $translatable = ['question','answer'];
}
