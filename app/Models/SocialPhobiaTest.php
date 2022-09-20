<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class SocialPhobiaTest extends BaseModel
{
    use HasTranslations;
    protected $fillable = ['name','biography'];
    public $translatable = ['name','biography'];
    public function socialPhobiaTestQuestion(){
        return $this->hasMany(SocialPhobiaTestQuestion::class,'social_phobia_id','id');
    }

}
