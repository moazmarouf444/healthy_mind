<?php

namespace App\Models;


class Social extends BaseModel
{
    const IMAGEPATH = 'socials' ;
    protected $fillable = ['link' , 'image' , 'name'];
}
