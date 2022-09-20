<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class DepressionTest extends BaseModel
{
    use HasTranslations;
    protected $fillable = ['name','biography'];
    public $translatable = ['name','biography'];

    public function depressionTestQuestions(){
        return $this->hasMany(DepressionTestQuestion::class,'depression_test_id','id');
    }
    public function test(){
        return $this->morphMany(TestResults::class, 'testable');
    }
}
