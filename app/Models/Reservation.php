<?php

namespace App\Models;


class Reservation extends BaseModel
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

}
