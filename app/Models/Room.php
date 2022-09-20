<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id", "id");
    }
    // Provider make
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,"doctor_id" ,"id");
    }
}
