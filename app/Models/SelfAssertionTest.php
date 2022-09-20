<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class SelfAssertionTest extends BaseModel
{

    use HasTranslations;
    protected $fillable = ['name','biography'];
    public $translatable = ['name','biography'];

    public function selfAssertionTestQuestion(){
        return $this->hasMany(SelfAssertionTestQuestion::class,'self_assertion_test_id','id');
    }

}
