<?php
namespace  App\Services;

class SettingService {

    public static function appInformations($app_info)
    {
        $data                        = [
            'is_production'              =>$app_info['is_production'],
            'name_ar'                    =>$app_info['name_ar'],
            'name_en'                    =>$app_info['name_en'],
            'email'                      =>$app_info['email'],
            'phone'                      =>$app_info['phone'],
            'whatsapp'                   =>$app_info['whatsapp'],
            'terms_ar'                   =>$app_info['terms_ar'],
            'terms_en'                   =>$app_info['terms_en'],
            'about_ar'                   =>$app_info['about_ar'],
            'about_en'                   =>$app_info['about_en'],
            'logo'                       => ('/storage/images/settings/'. $app_info['logo']),
            'fav_icon'                   => ('/storage/images/settings/'. $app_info['fav_icon']),
            'no_data_icon'               => $app_info['no_data_icon'],
            'default_user'               => ('/storage/images/users/'. $app_info['default_user']),
            'login_background'           => ('/storage/images/settings/'. $app_info['login_background']),
            'privacy_ar'                 =>$app_info['privacy_ar'],
            'privacy_en'                 =>$app_info['privacy_en'],
            'smtp_user_name'             =>$app_info['smtp_user_name'],
            'smtp_password'              =>$app_info['smtp_password'],
            'smtp_mail_from'             =>$app_info['smtp_mail_from'],
            'smtp_sender_name'           =>$app_info['smtp_sender_name'],
            'smtp_port'                  =>$app_info['smtp_port'],
            'smtp_host'                  =>$app_info['smtp_host'],
            'smtp_encryption'            =>$app_info['smtp_encryption'],

            'firebase_key'               =>$app_info['firebase_key'],
            'firebase_sender_id'         =>$app_info['firebase_sender_id'],

        ];
        return $data;
    }



}
