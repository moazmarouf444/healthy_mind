<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialPhobiaTestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_phobia_test_questions')->insert([
            [
                'question' => json_encode(['ar' => 'احب البقاء في  الفراش حتى لا أرى أي شخص ', 'en' => 'I like to stay in bed so I don\'t see anyone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'استمتع بالوحدة . ', 'en' => 'Enjoy loneliness.'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'أفضل عاده أن أكون فًي صحبه الأصدقاء على أن أكون وحٌيدا. ', 'en' => 'It is better to be with friends than to be alone.'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'أشعر برغبة ملحة فيً أن أرحل على الفور عند دخولً حجرة مكتظة بالناس ', 'en' => 'I feel the urge to leave immediately upon entering a room crowded with people'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'يمثل التفاعل او التواصل مع الاخرين عبئا نفسيا علي ', 'en' => 'Interacting or communicating with others is a psychological burden on me'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'لا استطيع ان اشعر بالاسترخاء الا اذا كنت بمفردي  ', 'en' => 'I can\'t feel relaxed unless I\'m alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'استمتع بالتعامل مع نوعيات مختلفه من الناس ', 'en' => 'Enjoy dealing with different types of people'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'ابتعد عن الاخرين قدر الامكان   ', 'en' => 'Stay away from others as much as possible'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'امارس هواياتي المفضله بمفردي  ', 'en' => 'Doing my favorite hobbies alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اخبر الاخرين انني لست علي ما يرام لكي اتجنب مشاركتهم في بعض المهام  ', 'en' => 'Tell others that I am not feeling well so as to avoid their participation in some tasks'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اشعر بالارتياح عندما اكون بمفردي  ', 'en' => 'I feel so good when I\'m alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اشعر بالقلق اثناء تواجدي مع الاخرين  ', 'en' => 'I feel anxious when I am with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'افضل تناول الطعام بمفردي عن تناولي مع الاخرين  ', 'en' => 'I\'d rather eat alone than eat with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'افضل السفر مع الاصدقاء عن السفر بمفردي   ', 'en' => 'It is better to travel with friends than to travel alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'افضل الذهاب الي السينما بمفردي ', 'en' => 'I prefer to go to the cinema alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'استمتع دائما بوجودي مع الاخرين  ', 'en' => 'I always enjoy being with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],
            [
                'question' => json_encode(['ar' => 'افضل الخروج مع الاصدقاء عن الجلوس وحدي في البيت  ', 'en' => 'I\'d rather go out with friends than stay at home alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],[
                'question' => json_encode(['ar' => 'عندما اتحدث مع الاخرين تتملكني رغبه قويه في التوقف عن الكلام والابتعاد عنهم   ', 'en' => 'When I talk to others, I have a strong desire to stop talking and stay away from them'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'تواجدي مع الاخرين يسبب لي الارهاق  ', 'en' => 'Being with others makes me tired'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اشعر غالبا في الرغبه في مغادره الحفلات دون وداع اصدقائي  ', 'en' => 'I often feel like leaving parties without saying goodbye to my friends'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'حتي عندما اكون في حاله نفسيه جيده لا افضل التواجد مع الاخرين  ', 'en' => 'Even when I\'m in a good psychological state, I don\'t like being with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اتمني مرور اليوم سريعا حتي اصبح بمفردي  ', 'en' => 'I wished the day would pass by so quickly that I could be on my own'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اتمني ان يتركني الاخرين وحدي  ', 'en' => 'I wish others would leave me alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اشعر بالامان عندما اكون بمفردي  ', 'en' => 'I feel safe when I\'m alone'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'عندما اجلس في مكان مزدحم اشعر بدافع قوي في ترك المكان   ', 'en' => 'When I sit in a crowded place, I feel a strong urge to leave the place'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'أحتاج أن أكون بمفردي تماما لعدة ايام . ', 'en' => 'I need to be completely alone for a few days.'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اشعر بالارتياح عندما اكون مع الاخرين  ', 'en' => 'I feel good when I\'m with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'احب قضاء وقت فراغي مع الاخرين ', 'en' => 'I like to spend my free time with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 1,
                'value_no' => 2,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'عندما اقرر ان اكون مع الاخرين اندم علي ذلك فيما بعد  ', 'en' => 'When I decide to be with others, I regret it later'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'يصيبني ارهاق شديد لا يمكن احتماله نتيجه تواجدي مع الاخرين  ', 'en' => 'I get so tired that I can\'t stand it as a result of being with others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اعتبر نفسي شخصا وحيدا او منعزلا عن الاخرين  ', 'en' => 'I consider myself a lonely person or isolated from others'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],  [
                'question' => json_encode(['ar' => 'اتمني ان اكون بمفردي او وحيد معظم الوقت  ', 'en' => 'I wish I was alone or lonely most of the time'], JSON_UNESCAPED_UNICODE),
                'yes' => json_encode(['ar' => 'نعم', 'en' => 'yes'], JSON_UNESCAPED_UNICODE),
                'no' => json_encode(['ar' => 'لا', 'en' => 'no'], JSON_UNESCAPED_UNICODE),
                'value_yes' => 2,
                'value_no' => 1,
                'social_phobia_id' => 1,
            ],

        ]);

    }
}
