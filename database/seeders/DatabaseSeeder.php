<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(SmsTableSeeder::class);
        $this->call(DepressionTestSeeder::class);
        $this->call(DepressionTestQuestionTableSeeder::class);
        $this->call(SelfAssertionTestTableSeeder::class);
        $this->call(SelfAssertionTestQuestionTableSeeder::class);
        $this->call(TaylorForAnxietyTestTableSeeder::class);
        $this->call(TaylorForAnxietyTestQuestionTableSeeder::class);
        $this->call(SocialPhobiaTestTableSeeder::class);
        $this->call(SocialPhobiaTestQuestionTableSeeder::class);
        $this->call(CouponTableSeeder::class);


        // $this->call(NotificationSeeder::class);
    //    $this->call(SettlementTableSeeder::class);
    }
}
