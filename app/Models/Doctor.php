<?php

namespace App\Models;

use App\Http\Resources\Api\Sections\DoctorResource;
use App\Http\Resources\Api\Sections\UserResource;
use App\Traits\SmsTrait;
use App\Traits\UploadTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use Notifiable, UploadTrait, HasApiTokens, SmsTrait;
    public function scopeSearch($query, $searchArray = [])
    {
        $query->where(function ($query) use ($searchArray) {
            if ($searchArray) {
                foreach ($searchArray as $key => $value) {
                    if (str_contains($key, '_id')) {
                        if (null != $value) {
                            $query->Where($key, $value);
                        }
                    } elseif ('order' == $key) {
                    } elseif ('created_at_min' == $key) {
                        if (null != $value) {
                            $query->WhereDate('created_at', '>=', $value);
                        }
                    } elseif ('created_at_max' == $key) {
                        if (null != $value) {
                            $query->WhereDate('created_at', '<=', $value);
                        }
                    } else {
                        if (null != $value) {
                            $query->Where($key, 'like', '%' . $value . '%');
                        }
                    }
                }
            }
        });
        return $query->orderBy('created_at', request()->searchArray && request()->searchArray['order'] ? request()->searchArray['order'] : 'DESC');
    }

    const IMAGEPATH = 'doctors' ;
    protected $hidden = [
        'password',
    ];


    protected $casts = [
        'is_notify'   => 'boolean',
        'is_blocked'  => 'boolean',
        'is_approved' => 'boolean',
        'active'      => 'boolean',
    ];

    protected $fillable = [
        'name',
        'country_code',
        'phone',
        'email',
        'password',
        'biography',
        'address',
        'image',
        'logo',
        'lighted',
        'active',
        'is_blocked',
        'is_approved',
        'lang',
        'is_notify',
        'code',
        'wallet_balance',
        'specialization',
        'profit_ratio',
        'session_price',
    ];

    public function setPhoneAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['phone'] = fixPhone($value);
        }
    }

    public function setCountryCodeAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['country_code'] = fixPhone($value);
        }
    }

    public function getFullPhoneAttribute()
    {
        return $this->attributes['country_code'] . $this->attributes['phone'];
    }

    public function getImageAttribute()
    {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], 'doctors');
        } else {
            $image = $this->defaultImage('doctors');
        }
        return $image;
    }
    public function setImageAttribute($value)
    {
        if (null != $value && is_file($value)) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'], 'doctors') : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, 'doctors');
        }
    }

    public function getLogoAttribute()
    {
        if ($this->attributes['logo']) {
            $image = $this->getImage($this->attributes['logo'], 'doctors');
        } else {
            $image = $this->defaultImage('doctors');
        }
        return $image;
    }
    public function setLogoAttribute($value)
    {
        if (null != $value && is_file($value)) {
            isset($this->attributes['logo']) ? $this->deleteFile($this->attributes['logo'], 'doctors') : '';
            $this->attributes['logo'] = $this->uploadAllTyps($value, 'doctors');
        }
    }
    public function getLightedAttribute()
    {
        if ($this->attributes['lighted']) {
            $image = $this->getImage($this->attributes['lighted'], 'doctors');
        } else {
            $image = $this->defaultImage('doctors');
        }
        return $image;
    }
    public function setLightedAttribute($value)
    {
        if (null != $value && is_file($value)) {
            isset($this->attributes['lighted']) ? $this->deleteFile($this->attributes['lighted'], 'doctors') : '';
            $this->attributes['lighted'] = $this->uploadAllTyps($value, 'doctors');
        }
    }
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }


    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');

    }



    public function markAsActive()
    {
        $this->update(['code' => null, 'active' => true]);
        return $this;
    }

    public function sendVerificationCode()
    {
        $this->update([
            'code'        => $this->activationCode(),
        ]);

        $msg = trans('api.activeCode');
        $this->sendSms($this->full_phone, $msg . $this->code);
        return ['user' => new UserResource($this->refresh())];
    }

    private function activationCode()
    {
        return 1234;
        return mt_rand(1111, 9999);
    }
    public function updateDoctorDevice()
    {
        if (request()->device_id) {
            $this->devices()->updateOrCreate([
                'device_id'   => request()->device_id,
                'device_type' => request()->device_type,
            ]);
        }
    }

    public function updateDoctorLang()
    {
        if (request()->header('Lang') != null
            && in_array(request()->header('Lang'), languages())) {
            $this->update(['lang' => request()->header('Lang')]);
        } else {
            $this->update(['lang' => defaultLang()]);
        }
    }
    public function devices()
    {
        return $this->morphMany(Device::class, 'morph');
    }

    public function login()
    {
        $this->updateDoctorDevice();
        $this->updateDoctorLang();
        $token = $this->createToken(request()->device_type)->plainTextToken;
        return DoctorResource::make($this)->setToken($token);
    }

    public function logout()
    {
        $this->tokens()->delete();
        // $this->currentAccessToken()->delete();
        if (request()->device_id) {
            $this->devices()->where(['device_id' => request()->device_id])->delete();
        }
        return true;
    }

    public function getSpecialization(){
        return $this->specialization == 'doctor' ?  awtTrans('طبيب نفسي') : awtTrans('اخصائي نفسي');
    }

    public static function boot()
    {
        parent::boot();
        /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

        static::deleted(function ($model) {
            $model->deleteFile($model->attributes['image'], 'doctors');
        });
    }

    public function doctors(){
        return $this->hasMany(Rate::class,'doctor_id','id');
    }

    public function scopeDoctor($query){
        return $query->where('specialization','doctor');
    }
    public function scopeSpecialist($query){
        return $query->where('specialization','specialist');
    }

    public function dates(){
        return $this->hasMany(Date::class);
    }
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }



}
