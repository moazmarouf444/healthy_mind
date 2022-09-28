<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Reservation\DeleteReservationRequest;
use App\Http\Requests\Api\Reservation\StoreReservationRequest;
use App\Http\Requests\Api\Reservation\UpdateReservationRequest;
use App\Http\Resources\Api\Reservations\ReservationResource;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Notifications\CancelReservation;
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
        $user_id = auth('sanctum')->user()->id;

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
                    + ['user_id' => $user_id, 'discount_percentage_price' => $discount_percentage, 'is_paid' => 1, 'paid_price' => $paid_price, 'coupon_id' => $coupon->id]
                );
            } elseif ($coupon->type == 'number') {
                $total_price = $price - $coupon->discount;
                $discount_percentage = $price * ($coupon->discount / 100);
                $reservation = Reservation::create($request->validated()
                    + ['user_id' => $user_id, 'paid_price' => $total_price, 'discount_percentage_price' => $discount_percentage, 'is_paid' => 1, 'coupon_id' => $coupon->id]
                );
            }
        } else {
            $reservation = Reservation::create($request->validated() + ['user_id' => $user_id, 'paid_price' => $price, 'is_paid' => 1]);
        }
        return $this->response('success', __('dashboard.reservation_successfully'));
    }

    public function myReservations()
    {
        $user_id = auth('sanctum')->user()->id;
        $reservations = Reservation::where('user_id', $user_id)->latest()->get();
        if ($reservations->count() == 0) {
            return $this->response('success', __('apis.no_reservations'));
        }
        $reservations = ReservationResource::collection(Reservation::where('user_id', $user_id)->latest()->get());
        return $this->successData(['reservations' => $reservations]);
    }

    public function updateReservations(UpdateReservationRequest $request)
    {
        $user_id = auth('sanctum')->user()->id;
        $reservation = Reservation::where('user_id', $user_id)->where('doctor_id', $request->doctor_id)->where('id', $request->reservation_id)->first();
        if (!$reservation) {
            return $this->response('success', __('apis.مش '));

        }
        $reservation->update($request->only(['date', 'start_time', 'end_time']));
        return $this->response('success', __('apis.your_reservation_has_been_successfully_updated'));
    }

    public function deleteReservations(DeleteReservationRequest $request)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);
        $reservation->update(['status' => 'cancel_user']);
        $admin = Admin::first();
        $admin->notify(new CancelReservation($reservation));
        return $this->response('success', __('apis.cancel_the_reservation'));
    }

    public function doctorReservation()
    {
        $doctor = auth()->user();
        $reservations = Reservation::where('doctor_id',$doctor->id)->
        orderBy('date','ASC')->orderBy('start_time','ASC')->where('status','inprogress')->get();
        return $this->successData(['reservations' => $reservations]);
    }
    public function doctorReservationInprogress(){
        $doctor = auth()->user();
        $reservations = Reservation::where('doctor_id',$doctor->id)->
        orderBy('date','ASC')->orderBy('start_time','ASC')->where('status','inprogress')->get();
        return $this->successData(['reservations' => $reservations]);
    }
    public function doctorReservationFinished(){
        $doctor = auth()->user();
        $reservations = Reservation::where('doctor_id',$doctor->id)->
        orderBy('date','ASC')->orderBy('start_time','ASC')->where('status','finished')->get();
        return $this->successData(['reservations' => $reservations]);

    }
    public function doctorReservationCancel(){
        $doctor = auth()->user();
        $reservations = Reservation::where('doctor_id',$doctor->id)->
        orderBy('date','ASC')->orderBy('start_time','ASC')->where('status','refused')->get();
        return $this->successData(['reservations' => $reservations]);

    }
}
