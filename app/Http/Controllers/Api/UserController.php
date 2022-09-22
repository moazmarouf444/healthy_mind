<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\DoctorDatesRequest;
use App\Http\Requests\Api\User\Prescription;
use App\Http\Requests\Api\User\RateRequest;
use App\Http\Requests\Api\User\SearchRequest;
use App\Http\Resources\Api\PrescriptionResource;
use App\Http\Resources\Api\Sections\DoctorResource;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTrait,GeneralTrait;

    public function doctorSearch(SearchRequest $request)
    {
        $name = $request['name'];
        $doctors = Doctor::where('name', 'like', "%{$name}%")
            ->get();
        $doctor  = DoctorResource::collection($doctors);
        return $this->successData(['doctors' => $doctor]);
    }

    public function rateDoctor(RateRequest $request){
          Rate::create($request->validated());
        return $this->response('success', __('apis.this_doctor_successfully_rated'));
    }

    public function allDoctors(){
        $doctors = DoctorResource::collection(Doctor::doctor()->latest()->get());
        return $this->successData(['doctors' => $doctors]);
    }
    public function allSpecialists(){
        $specialists = DoctorResource::collection(Doctor::specialist()->latest()->get());
        return $this->successData(['specialists' => $specialists]);
    }

    public function split_time(){
        $day_name =Carbon::createFromFormat('Y-m-d', request()->day_name)->format('l');
        $val = Date::where('doctor_id',request()->doctor_id)->where($day_name,'enable')->select('id','doctor_id', $day_name.'_from', $day_name.'_to')->first();
//        dd($val);
        $doctor = Doctor::findOrFail($val['doctor_id']);
        if($val){
            $data = array_values($val->toArray());
            $starttime = $data[2];  // your start time
            $endtime = $data[3];  // End time
            $duration = $doctor->specialization == 'doctor' ? '30' : '60'; // split by 30 mins
            $array_of_time = array ();
            $start_time    = strtotime ($starttime); //change to strtotime
            $end_time      = strtotime ($endtime); //change to strtotime
            $add_mins  = $duration * 60;

            while ($start_time <= $end_time) // loop between time
            {
                $array_of_time[] = date ("h:i", $start_time);
                  $start_time += $add_mins; // to check endtie=me
            }
        }
        else{
            $array_of_time[] =null;
        }

        return $array_of_time;
    }
    public function time_split(){
        $arr_of_time= $this->split_time();
        $time = Reservation::where('status','pending')->get()->toArray();
        $selected_hour=[];
        foreach ($time as $key => $value) {
            array_push($selected_hour ,$value['selected_hour']);
        }
        $time_occoped = array_diff($this->split_time(), $selected_hour);
        return $this->successData(['data'  =>array_values($time_occoped)]);

//        return successResponseJson(["data"=>array_values($time_occoped)]);
    }

    public function doctorDates(DoctorDatesRequest $request){
            $doctor = Doctor::findOrFail($request->doctor_id);
            dd($doctor->dates);
    }

    public function prescription(){
        $user = auth()->user();
        $prescription =  $user->prescription;
        $prescription  = PrescriptionResource::collection($prescription);
        return $this->successData(['prescription' => $prescription]);

    }

}
