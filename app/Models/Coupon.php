<?php

namespace App\Models;


class Coupon extends BaseModel
{
    const IMAGEPATH = 'coupons' ;

    protected $fillable = ['coupon_num','type','discount','max_discount','expire_date','max_use','use_times','status'];
    protected $dates = ['expire_date'];

}
