<?php

namespace Database\Seeders;

use App\Models\DepressionTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepressionTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepressionTest::insert([
            [
                'name'=>json_encode(['ar'=>'مقياس بيك للاكتئاب'  , 'en'=>'Beck Depression Scale'] , JSON_UNESCAPED_UNICODE),
                'biography'=>json_encode(['ar'=>'حالة مزاجية هابطة، لا توقف سير حياة الفرد الطبيعيه ، لكنها تصعب الامور علي الفرد ، وفي اصعب الحالات قد يدفع الاكتئاب الفرد الي التفكير في انهاء حياته '  , 'en'=>'A depressed mood, which does not stop the person\'s normal life, but it makes things difficult for the individual, and in the most difficult cases depression may push the individual to think about ending his life'] , JSON_UNESCAPED_UNICODE)
            ],
        ]);
    }
}
