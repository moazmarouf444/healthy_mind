<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Doctor::create([
            'name'                       => 'maoz',
            'phone' => "511111115",
            'email' => Str::random(10).'@gmail.com',
            'biography' => Str::random(100),
            'address'   => 'طريق الملك فيصل ',
            'password' => 123456,
            'specialization' => 'doctor',
            'session_price' => 1000,

        ]);

    }
}
