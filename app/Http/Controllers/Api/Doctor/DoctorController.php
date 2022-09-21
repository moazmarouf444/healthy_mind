<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Doctor\PresciptionRequest;
use App\Models\Prescription;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use App\Traits\SmsTrait;

class DoctorController extends Controller
{
    use ResponseTrait, SmsTrait, GeneralTrait;


    public function prescription(PresciptionRequest $request){
        Prescription::create($request->validated());
        return $this->response('success', __('dashboard.the_prescription_has_been_successfully_added'));

    }

}
