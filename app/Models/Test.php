<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Test extends BaseModel
{
    use HasTranslations; 
    protected $fillable = ['name','total_questions'];
    public $translatable = ['name'];

    public function question(){
        return $this->hasMany(Question::class);
    }

}
