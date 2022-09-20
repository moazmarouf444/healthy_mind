<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class TaylorForAnxietyTest extends BaseModel
{
    use HasTranslations;
    protected $fillable = ['name','biography'];
    public $translatable = ['name','biography'];
    public function taylorTestQuestion(){
        return $this->hasMany(TaylorForAnxietyTestQuestion::class,'taylor_id','id');
    }

}
