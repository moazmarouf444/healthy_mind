<?php

namespace Database\Seeders;

use App\Models\SocialPhobiaTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialPhobiaTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialPhobiaTest::insert([
            [
                'name'=>json_encode(['ar'=>'مقياس الرهاب الاجتماعي '  , 'en'=>'social phobia scale'] , JSON_UNESCAPED_UNICODE),
                'biography'=>json_encode(['ar'=>'يعرض علٌيك مجموعه من العبارات التًي تتعلق  بمشاعرك  وتصرفاتك في مواقف  الحياه المختلفة ويوجد أمام كل عبارة اختياران هما : نعم او لا 
المرجو منك :أن تقرا كل عبارة بدقه ثم تبدي رايك بنعم اذا كانت العباره تنطبق عليك او بلا اذا كانت العباره لا تنطبق عليك 
لاحظ انه لا توجد اجابه صحيحه واخري خاطئه الاجابه تعد الاجابه صحيحه فقط طالما تعبر عن حقيقه شعورك تجاه المعني الذي تحمله العباره , ومما يجب التاكيد عليه ان اجاباتك علي العبارات المكونه للمقياس تحاط بسريه تامه ولا تستخدم باغراض غير البحث العلمي  '  , 'en'=>'It presents you with a set of statements related to your feelings and behaviors in different life situations, and in front of each statement there are two choices: yes or no.
We ask you to: read each statement carefully and then express your opinion, yes if the statement applies to you, or no if the statement does not apply to you.
Note that there is no right answer and another wrong answer. The answer is considered correct only as long as it expresses the truth of your feelings about the meaning of the phrase, and it must be emphasized that your answers to the statements that make up the scale are kept strictly confidential and are not used for purposes other than scientific research.'] , JSON_UNESCAPED_UNICODE)
            ],
        ]);
    }
}
