<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Reservation\StoreReservationRequest;
use App\Models\Coupon;
use App\Models\Reservation;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use App\Traits\SmsTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use ResponseTrait, SmsTrait, GeneralTrait;

    public function makeReservation(StoreReservationRequest $request)
    {
        if($request->coupon_num){
           $coupon = Coupon::where('coupon_num',$request->coupon_num)->first();
           if(!$coupon){
               return $this->response('success', 'coupon_not_available');
           }elseif($coupon->expire_date->isPast()){
               return $this->response('success', 'coupon_has_expired');
           }elseif($coupon->use_times > $coupon->max_times){
               return $this->response('success', 'تم وصول الكوبون للحد الاقصي من الاستخدام ');
           }
        }
        $reservation = Reservation::create($request->validated());
        return $this->response('success', __('dashboard.coupon_has_reached_the_maximum_usage_limit'));

    }
}
