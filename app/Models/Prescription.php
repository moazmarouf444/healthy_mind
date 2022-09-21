<?php

namespace App\Models;


class Prescription extends BaseModel
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id", "id");
    }
    // Provider make
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,"doctor_id" ,"id");
    }

}
