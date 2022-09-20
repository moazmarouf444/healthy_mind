<?php

namespace Database\Seeders;

use App\Models\TaylorForAnxietyTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaylorForAnxietyTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaylorForAnxietyTest::insert([
            [
                'name'=>json_encode(['ar'=>'مقياس تايلور للقلق'  , 'en'=>'Taylor Anxiety Scale'] , JSON_UNESCAPED_UNICODE),
                'biography'=>json_encode(['ar'=>'يعرف القلق بانه (انفعال مركب من الخوف وتوقع الشر والخطر او العقاب)'  , 'en'=>'Anxiety is defined as (a complex emotion of fear and anticipation of evil, danger or punishment).'] , JSON_UNESCAPED_UNICODE)
            ],
        ]);
    }
}
