<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepressionTestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depression_test_questions')->insert([
            [
                'question'       => json_encode(['ar' => 'الحزن ', 'en' => 'Sorrow' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'لا اشعر بالحزن' , 'en' => 'I don\'t feel sad' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' اشعر بالحزن' , 'en' => 'I feel sad' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اشعر بالحزن طول الوقت ولا استطيع التخلص منه' , 'en' => 'I feel sad all the time and I can\'t get rid of it' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' انني حزين لدرجه لا استطيع تحملها' , 'en' => 'I feel so sad and miserable that I can\'t stand it.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,

            ],
            [
                'question'       => json_encode(['ar' => 'التشاؤم من المستقبل', 'en' => 'Pessimism about the future' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'أنني لست متشائما بشأن المستقبل .' , 'en' => 'I am not pessimistic about the future.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أشعر بالتشاؤم بشأن المستقبل .' , 'en' => 'I feel pessimistic about the future.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اشعر انه لا يوجد لدي ما اطمح للوصول إليه .' , 'en' => 'I feel that I have nothing to aspire to.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' اشعر أن المستقبل لا أمل فيه وان هذا الوضع من غير الممكن تغييره .' , 'en' => 'I feel that the future is hopeless and that this situation cannot be changed.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,

            ],
            [
                'question'       => json_encode(['ar' => 'الإحساس بالفشل', 'en' => 'sense of failure' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'لا أشعر أنني شخص فاشل بشكل عام . ' , 'en' => 'I don\'t feel like a failure in general.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أشعر بأنني أواجه من الفشل أكثر مما يواجهه الإنسان العادي' , 'en' => 'I feel that I face more failures than the average person.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => 'عندما انظر الى حياتي الماضية , فأن كل ما أراه الكثير من الفشل .' , 'en' => 'When I look at my past life, all I see is a lot of failures.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'أشعر بأني شخص فاشل تماما' , 'en' => 'I feel like a complete failure.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,

            ],

            [
                'question'       => json_encode(['ar' => 'عدم الرضا', 'en' => 'Dissatisfaction' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'ما زالت الأشياء تعطيني شعورا بالرضي كما كانت عادة .' , 'en' => 'Things still give me a sense of satisfaction as they usually did.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' لا اشعر بمتعة في الأشياء على النحو الذي كنت اشعر به عادة .' , 'en' => 'I don\'t feel pleasure in things the way I usually feel.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' لا اعد اشعر بأية متعة حقيقية في أي شيء على الإطلاق .' , 'en' => 'I no longer feel any real pleasure in anything at all.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'لدي شعور بعدم الرضي والملل من كل الأشياء.' , 'en' => 'I feel dissatisfied and bored with all things.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'الإحساس بالذنب', 'en' => 'Feeling guilty' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' لا يوجد لدي أي شعور بالذنب .' , 'en' => 'I don\'t have any guilt.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أشعر بالذنب في بعض الأوقات .' , 'en' => 'I feel guilty at times.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اشعر بالذنب في معظم الأوقات .' , 'en' => 'I feel guilty most of the time.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'اشعر بالذنب في كافة الأوقات .' , 'en' => 'I feel guilty all the time.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'توقع العقاب', 'en' => 'Anticipate punishment' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => '  لا أشعر بأني استحق عقابا من أي نوع .' , 'en' => 'I do not feel that I deserve punishment of any kind.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أشعر بأنني استحق العقاب أحيانا .' , 'en' => 'I feel like I deserve to be punished sometimes.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' كثيرا ما اشعر بأنني استحق العقاب .' , 'en' => 'I often feel that I deserve to be punished.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'أحس بأنني أعاقب وأعذب في حياتي وأنني استحق ذلك ' , 'en' => 'I feel that I have been punished and tortured in my life and that I deserve it' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],


            [
                'question'       => json_encode(['ar' => 'كراهية الذات', 'en' => 'Anticipate punishment' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => '  لا أشعر بخيبة الأمل في نفسي .' , 'en' => 'I don\'t feel disappointed in myself.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' اشعر بخيبة الأمل في نفسي . ' , 'en' => 'I feel disappointed in myself.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اشعر أحيانا بأنني اكره نفسي .' , 'en' => 'Sometimes I feel that I hate myself.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'إنني اكره نفسي في كل الأوقات . ' , 'en' => 'I hate myself all the time.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'لوم الذات', 'en' => 'Self blame' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => '   لا أشعر بأنني أسوا من الآخرين .' , 'en' => 'I don\'t feel worse than others' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' انني انتقد نفسي بسبب ما لدي من أخطاء وضعف . ' , 'en' => 'I criticize myself for my mistakes and weaknesses.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' ألوم نفسي طيلة الوقت بسبب أخطائي .' , 'en' => 'I blame myself all the time for my mistakes' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'ألوم نفسي على كل شيء يحدث حتى لو لم يكن لي علاقة مباشرة بذلك . ' , 'en' => 'I blame myself for everything that happens even if I have nothing to do directly with it.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'وجود أفكار انتحارية', 'en' => 'Having suicidal thoughts' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'لا يوجد لدي أفكار انتحارية .' , 'en' => 'I have no suicidal thoughts.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' توجد لدي بعض الأفكار الانتحارية ولكني لن أقوم بتنفيذها . ' , 'en' => 'I have some suicidal thoughts, but I will not carry them out.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' أرغب في قتل نفسي .' , 'en' => 'I want to kill myself.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'سأقتل نفسي إذا توفرت لي الفرصة السائحة لذلك . ' , 'en' => 'I will kill myself if I have the opportunity to do so.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'البكاء ', 'en' => 'Crying' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' لا أبكي أكثر من المعتاد .' , 'en' => 'I don\'t cry more than usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' ابكي في هذه الأيام أكثر من المعتاد . ' , 'en' => 'I cry more than usual these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' أنني ابكي طيلة الوقت هذه الأيام .' , 'en' => 'I cry all the time these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' لقد كانت لدي قدرة على البكاء ولكنني في هذه الأيام لا استطيع البكاء مع إنني أريد ذلك . ' , 'en' => 'I used to be able to cry, but these days I can\'t cry even though I want to.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],


            [
                'question'       => json_encode(['ar' => 'القابلية للإثارة ', 'en' => 'Excitability' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' لا اشعر في هذه الأيام بأنني سريع الغضب أكثر من المعتاد .' , 'en' => 'I do not feel these days that I am irritable more than usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أصبح عصبي يستثار بسهولة أكثر من المعتاد هذه الأيام . ' , 'en' => 'I get angry more easily than usual these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اشعر بسرعة الاستثارة طيلة الوقت في هذه الأيام .' , 'en' => 'I feel agitated all the time these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' أحس بأن مشاعري قد تبدلت ولم يعد شيء يغضبني . ' , 'en' => 'I feel that my feelings have changed and nothing pisses me off anymore.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'الانسحاب الاجتماعي ', 'en' => 'Social withdrawal' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' لم أشعر بأنني قد فقدت اهتمامي بالناس الآخرين .' , 'en' => 'I did not feel that I had lost interest in other people.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أصبحت اقل اهتماما بالناس الآخرين مما كنت عليه . ' , 'en' => 'I became less interested in other people than I used to be.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' فقدت معظم اهتمامي بالناس الآخرين .' , 'en' => 'I lost most of my interest in other people.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' فقدت كل اهتمام لي بالناس الآخرين . ' , 'en' => 'I lost all interest in other people.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'التردد وعدم القدرة على اتخاذ القرار ', 'en' => 'Indecisiveness and inability to make decisions' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' أقوم باتخاذ قراراتي على أفضل ما استطيع القيام به .' , 'en' => 'I make my decisions as best I can.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أميل الى تأجيل اتخاذ القرارات أكثر مما كنت افعل عادة . ' , 'en' => 'I tend to put off making decisions more than I usually do.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' أصبحت أجد صعوبة كبيرة في اتخاذ القرارات عما قبل .' , 'en' => 'I find it more difficult to make decisions than before.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' لم تعد لدي أية قدرة على اتخاذ قرارات في هذه الأيام . ' , 'en' => 'I no longer have any ability to make decisions these days.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'تغير صورة الجسم ', 'en' => 'body image change' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' اشعر بأن مظهري مناسب كما كان عادة' , 'en' => 'I feel that my appearance is appropriate as usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' يزعجني الشعور بأنني كهلا أو غير جذاب . ' , 'en' => 'The feeling of being old or unattractive bothers me.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' أشعر أن هنالك تغيرات دائمة تطرأ على مظهري تجعلني أبدو غير جذاب .' , 'en' => 'I feel that there are permanent changes in my appearance that make me look unattractive.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' أعتقد بأنني أبدو قبيحا . ' , 'en' => 'I think I look ugly.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ], [
                'question'       => json_encode(['ar' => 'صعوبات في العمل ', 'en' => 'Difficulties at work' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' أستطيع العمل بنفس الكفاءة كما كنت افعل عادة' , 'en' => 'I can work as efficiently as I usually do.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' احتاج الى جهد إضافي كي أبدء العمل في أي شي . ' , 'en' => 'I need an extra effort to start working on anything.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' علي إن أحث نفسي بشدة كي أقوم بعمل أي شيء .' , 'en' => 'II have to urge myself very hard to do anything.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' لا استطيع عمل أو انجاز أي شيء على الإطلاق . ' , 'en' => 'I cannot do or accomplish anything at all.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ], [
                'question'       => json_encode(['ar' => 'اضطرابات النوم ', 'en' => 'Sleep disorders' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' استطيع النوم جيدا كالمعتاد .' , 'en' => 'I can sleep well as usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' لا أنام جيدا كالمعتاد . ' , 'en' => 'I don\'t sleep as well as usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' استيقظ من النوم أبكر بساعة أو ساعتين من المعتاد ولا استطيع العودة ثانية الى النوم .' , 'en' => 'I wake up an hour or two earlier than usual and can\'t go back to sleep' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' استيقظ من النوم أبكر بساعات عديدة من المعتاد ولا استطيع العودة ثانية النوم . ' , 'en' => 'I wake up several hours earlier than usual and cannot go back to sleep.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ], [
                'question'       => json_encode(['ar' => 'سرعة التعب ', 'en' => 'Fatigue speed' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => ' لا أجد أنني أصبحت أكثر تعبا من المعتاد .' , 'en' => 'I do not find that I am more tired than usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أصبحت اتعب أكثر من المعتاد . ' , 'en' => 'I am getting tired more than usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' أصبحت اتعب من عمل أي شيء تقريبا .' , 'en' => 'I am getting tired of doing almost anything.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'أنا متعب جدا لدرجة لا استطيع عمل أي شيء . ' , 'en' => 'I am so tired that I cannot do anything.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],

            [
                'question'       => json_encode(['ar' => 'فقدان الشهية ', 'en' => 'Anorexia' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'شهيتي للطعام هي كالمعتاد .' , 'en' => 'My appetite is as usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' شهيتي للطعام ليست جيدة كما هي عادة . ' , 'en' => 'My appetite is not as good as it usually is.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' شهيتي للطعام سيئة جدا هذه الأيام .' , 'en' => 'My appetite for food is very bad these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => 'ليست لدي شهية للطعام على الإطلاق في هذه الأيام . ' , 'en' => 'I have no appetite at all these days.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],  [
                'question'       => json_encode(['ar' => 'تناقص الوزن ', 'en' => 'Weight loss' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => '   لم افقد كثيرا من وزني مؤخرا أو بقي وزني كما هو .' , 'en' => 'I haven\'t lost much weight lately, or my weight has stayed the same.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' فقدت من وزني حوالي 2 كغم .' , 'en' => 'I lost about 2 kg.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' فقدت من وزني حوالي 4كغم .' , 'en' => 'I lost about 4 kg of weight.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' فقدت من وزني حوالي 6كغم . ' , 'en' => 'I lost about 6 kg of weight.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ], [
                'question'       => json_encode(['ar' => 'تأثر الطاقة الجنسية ', 'en' => 'The effect of sexual energy' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => '  لم ألاحظ أية تغيرات تتعلق في اهتماماتي الجنسية .' , 'en' => 'I did not notice any changes in my sexual interests.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أصبحت اقل اهتماما بالأمور الجنسية مما كنت عليه من قبل . ' , 'en' => 'I became less interested in sexual matters than I was before.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' اهتمامي قليل جدا بالأمور الجنسية في هذه الأيام .' , 'en' => 'I have very little interest in sexual matters these days.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' فقدت اهتماماتي بالأمور الجنسية تماما . ' , 'en' => 'I completely lost interest in sexual matters.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],[
                'question'       => json_encode(['ar' => 'الانشغال بالصحة ', 'en' => 'Preoccupation with health' ], JSON_UNESCAPED_UNICODE) ,
                'answer_zero'         => json_encode(['ar' => 'ليس لدي انزعاج يتعلق بصحتي أكثر من المعتاد .' , 'en' => 'I have no more health concerns than usual.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_one'         => json_encode(['ar' => ' أنني منزعج بشأن المشكلات الصحية مثل الم المعدة أو الإمساك أو الآلام والأوجاع الجسمية عادة . ' , 'en' => 'I am usually upset about health problems such as stomach pain, constipation, or body aches and pains.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_two'         => json_encode(['ar' => ' انني متضايق من المشكلات الصحية ومن الصعب أن أفكر في شيء أخر .' , 'en' => 'I am bothered by health problems and it is hard to think of anything else.' ], JSON_UNESCAPED_UNICODE) ,
                'answer_three'         => json_encode(['ar' => ' إنني قلق للغاية بسبب وضعي الصحي بحيث لا استطيع التفكير في أي شيء أخر . ' , 'en' => 'I am so worried about my health that I cannot think of anything else.' ], JSON_UNESCAPED_UNICODE) ,
                'depression_test_id'         => 1 ,
            ],
        ]);
    }
}
