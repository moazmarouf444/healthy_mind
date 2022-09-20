<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class SocialPhobiaTestQuestion extends BaseModel
{

    use HasTranslations;
    public $translatable = ['question','yes','no'];
    protected $guarded = [];



    public function socialPhobiaTest(){
        return $this->belongsTo(SocialPhobiaTest::class,'social_phobia_id','id');
    }


}
