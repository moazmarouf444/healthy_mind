<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class SelfAssertionTestQuestion extends BaseModel
{
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['question','always','mostly','sometimes','scarcely','never'];

    public function selfAssertionTest(){
        return $this->belongsTo(SelfAssertionTest::class,'self_assertion_test_id','id');
    }


}
