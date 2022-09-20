<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class TestResults extends BaseModel
{
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['result','test_name','result'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function testable(){
        return $this->morphTo();
    }


}
