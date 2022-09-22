<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Reservation\StoreReservationRequest;
use App\Models\Coupon;
use App\Models\Doctor;
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
        $doctor = Doctor::find($request->doctor_id);
        $price = $doctor->session_price;
        if ($request->coupon_num) {
            $coupon = Coupon::where('coupon_num', $request->coupon_num)->first();

            if (!$coupon) {
                return $this->response('success', 'coupon_not_available');
            } elseif ($coupon->expire_date->isPast()) {
                return $this->response('success', 'coupon_has_expired');
            } elseif ($coupon->use_times > $coupon->max_use) {
                return $this->response('success', 'dashboard.coupon_limit');
            }
            if ($coupon->type == 'ratio') {
                $discount_percentage = $price * ($coupon->discount / 100);
                $paid_price = $price - $discount_percentage;
                $reservation = Reservation::create($request->validated()
                    + ['discount_percentage_price' => $discount_percentage, 'is_paid' => 1, 'paid_price' => $paid_price, 'coupon_id' => $coupon->id]
                );
            } elseif ($coupon->type == 'number') {
                $total_price = $price - $coupon->discount;
                $discount_percentage = $price * ($coupon->discount / 100);
                $reservation = Reservation::create($request->validated()
                    + ['paid_price' => $total_price, 'discount_percentage_price' => $discount_percentage, 'is_paid' => 1, 'coupon_id' => $coupon->id]
                );
            }
        } else {
            $reservation = Reservation::create($request->validated() + ['paid_price' => $price, 'is_paid' => 1]);
        }
        return $this->response('success', __('dashboard.reservation_successfully'));

    }
}
