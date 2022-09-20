<?php

namespace App\Http\Controllers\Api\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Doctor\Auth\RegisterRequest;
use App\Http\Requests\Api\Doctor\Auth\UpdatePasswordRequest;
use App\Http\Requests\Api\Doctor\Auth\UpdateProfileRequest;
use App\Http\Resources\Api\Sections\DoctorResource;
use App\Models\Admin;
use App\Models\Doctor;
use App\Notifications\RegisterDoctor;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use App\Traits\SmsTrait;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function __;

class AuthController extends Controller
{
    use ResponseTrait, SmsTrait, GeneralTrait,Notifiable;

    public function register(RegisterRequest $request)
    {
        $doctor = Doctor::create($request->validated());
        $admin = Admin::first();
        $admin->notify(new RegisterDoctor($doctor));
        $doctorData = new DoctorResource($doctor->refresh());
        return $this->response('success', __('auth.wait_for_approval'), ['doctor' => $doctorData]);
    }

    public function login(LoginRequest $request)
    {
        if (!$doctor = Doctor::where('email', $request['email'])
            ->first()) {
            return $this->failMsg(__('auth.failed'));
        }
        if (!Hash::check($request->password, $doctor->password)) {
            return $this->failMsg(__('auth.failed'));
        }
        if ($doctor->is_blocked) {
            return $this->blockedReturn($doctor);
        }
        if (!$doctor->active) {
            return $this->phoneActivationReturn($doctor);
        }
        if (!$doctor->is_approved) {
            return $this->unAcceptableReturn($doctor);
        }
        return $this->response('success', __('apis.signed'), ['doctor' => $doctor->login()]);
    }

    public function logout(Request $request)
    {
        if ($request->bearerToken()) {
            $user = Auth::guard('sanctum')->user();
            if ($user) {
                $user->logout();
            }
        }
        return $this->response('success', __('apis.loggedOut'));
    }

    public function getProfile(Request $request)
    {
        $doctor = auth()->user();
        $requestToken = ltrim($request->header('authorization'), 'Bearer ');
        $doctorData = DoctorResource::make($doctor)->setToken($requestToken);
        return $this->successData(['doctor' => $doctorData]);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $doctor = auth()->user();
        $doctor->update($request->validated());
        $requestToken = ltrim($request->header('authorization'), 'Bearer ');
        $doctorData     = DoctorResource::make($doctor->refresh())->setToken($requestToken);
        if (!$doctor->active) {
            return $this->phoneActivationReturn($doctor);
        }
        return $this->response('success', __('apis.updated'), ['doctor' => $doctorData]);
    }
    public function updatePassword(UpdatePasswordRequest $request) {
        $doctor = auth()->user();
        $doctor->update($request->validated());
        return $this->successMsg(__('apis.updated'));
    }

}
