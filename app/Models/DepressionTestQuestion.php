<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class DepressionTestQuestion extends BaseModel
{

    use HasTranslations; 
    protected $guarded = [];
    public $translatable = ['question','question','answer_zero','answer_one','answer_two','answer_three'];

    public function depressionTest(){
        return $this->belongsTo(DepressionTest::class,'depression_test_id','id');
    }


}
