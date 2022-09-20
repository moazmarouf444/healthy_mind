<?php

namespace Database\Seeders;

use App\Models\SelfAssertionTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SelfAssertionTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelfAssertionTest::insert([
            [
                'name'=>json_encode(['ar'=>'مقياس توكيد الذات'  , 'en'=>'self affirmation scale'] , JSON_UNESCAPED_UNICODE),
                'biography'=>json_encode(['ar'=>'قم بجمع نقاطك عدد الفقرات 35 وتتكون من ثلاثة ابعاد وتتراوح العلامة الكلية من 35 -175 والمتوسط 105 كلما زادت العلامة عن 105 دل ذلك على امتلاك الفرد للتأكيد الذاتي .
'  , 'en'=>'Add your points, the number of paragraphs is 35, and it consists of three dimensions. The total score ranges from 35-175, and the average is 105. Whenever the score exceeds 105, this indicates that the individual possesses self-affirmation.'] , JSON_UNESCAPED_UNICODE)
            ],
        ]);
    }
}
