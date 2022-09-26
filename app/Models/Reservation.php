<?php

namespace App\Models;


class Reservation extends BaseModel
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }

}
