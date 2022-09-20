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
           'logo'                       => ('/storage/images/settings/'. $app_info['logo']),
           'fav_icon'                   => ('/storage/images/settings/'. $app_info['fav_icon']),
           'default_user'               => ('/storage/images/users/'. $app_info['default_user']),
           'login_background'           => ('/storage/images/settings/'. $app_info['login_background']),
           'color'                      =>$app_info['color'],
           'buttons_color'              =>$app_info['buttons_color'],
           'hover_color'                =>$app_info['hover_color'],

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
