<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class TaylorForAnxietyTestQuestion extends BaseModel
{

    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['question','yes','no'];

    public function taylorTest(){
        return $this->belongsTo(TaylorForAnxietyTest::class,'taylor_id','id');
    }

}
