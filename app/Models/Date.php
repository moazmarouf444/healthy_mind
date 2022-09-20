<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Date extends BaseModel
{
    protected $guarded = [];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
        //    public function doctor() {
//        return $this->belongsToMany(Doctor::class,'doctor_dates');
//    }

    }
}
