<?php

use Illuminate\Support\Facades\Route;

Route::group([
  'prefix'     => 'admin',
  'namespace'  => 'Admin',
  'as'         => 'admin.',
  'middleware' => ['web-cors'],
], function () {

  Route::get('/lang/{lang}', 'AuthController@SetLanguage');

  Route::get('login', 'AuthController@showLoginForm')->name('show.login')->middleware('guest:admin');
  Route::post('login', 'AuthController@login')->name('login');
  Route::get('logout', 'AuthController@logout')->name('logout');

  Route::post('getCities', 'CityController@getCities')->name('getCities');

  Route::group(['middleware' => ['admin', 'check-role', 'admin-lang']], function () {

    /*------------ start Of Dashboard----------*/
      Route::get('dashboard', [
        'uses'      => 'HomeController@dashboard',
        'as'        => 'dashboard',
        'icon'      => '<i class="feather icon-home"></i>',
        'title'     => 'الرئيسيه',
        'sub_route' => false,
        'type'      => 'parent',
      ]);
    /*------------ end Of dashboard ----------*/

    /*------------ start Of users Controller ----------*/

      Route::get('clients', [
        'uses'  => 'ClientController@index',
        'as'        => 'clients.index',
        'icon'      => '<i class="feather icon-users"></i>',
        'title'     => 'المستخدمين',
        'type'      => 'parent',
        'child'     => ['clients.show', 'clients.store', 'clients.update', 'clients.delete', 'clients.notify', 'clients.deleteAll', 'clients.create', 'clients.edit'],
      ]);

      # clients store
      Route::get('clients/create', [
        'uses'  => 'ClientController@create',
        'as'    => 'clients.create', 'clients.edit',
        'title' => ' صفحة اضافة عميل',
      ]);

      # clients update
      Route::get('clients/{id}/edit', [
        'uses'  => 'ClientController@edit',
        'as'    => 'clients.edit',
        'title' => 'صفحه تحديث عميل',
      ]);
      #store
      Route::post('clients/store', [
        'uses'  => 'ClientController@store',
        'as'    => 'clients.store',
        'title' => 'اضافة عميل',
      ]);

      #update
      Route::put('clients/{id}', [
        'uses'  => 'ClientController@update',
        'as'    => 'clients.update',
        'title' => 'تعديل عميل',
      ]);

      Route::get('clients/{id}/show', [
        'uses'  => 'ClientController@show',
        'as'    => 'clients.show',
        'title' => 'عرض عميل',
      ]);

      #delete
      Route::delete('clients/{id}', [
        'uses'  => 'ClientController@destroy',
        'as'    => 'clients.delete',
        'title' => 'حذف عميل',
      ]);

      #delete
      Route::post('delete-all-clients', [
        'uses'  => 'ClientController@destroyAll',
        'as'    => 'clients.deleteAll',
        'title' => 'حذف مجموعه من العملاء',
      ]);

      #notify
      Route::post('admins/clients/notify', [
        'uses'  => 'ClientController@notify',
        'as'    => 'clients.notify',
        'title' => 'ارسال اشعار للعملاء',
      ]);
      /************ #Clients ************/
    /*------------ end Of users Controller ----------*/

    /************ Admins ************/
      #index
      Route::get('admins', [
        'uses'  => 'AdminController@index',
        'as'    => 'admins.index',
        'title' => 'المشرفين',
        'icon'  => '<i class="feather icon-users"></i>',
        'type'  => 'parent',
        'child' => [
          'admins.index', 'admins.store', 'admins.update', 'admins.edit', 'admins.delete', 'admins.deleteAll', 'admins.create', 'admins.edit', 'admins.notifications', 'admins.notifications.delete', 'admins.show',
        ],
      ]);

      # admins store
      Route::get('show-notifications', [
        'uses'  => 'AdminController@notifications',
        'as'    => 'admins.notifications',
        'title' => 'صفحة الاشعارات',
      ]);

      # admins store
      Route::post('delete-notifications', [
        'uses'  => 'AdminController@deleteNotifications',
        'as'    => 'admins.notifications.delete',
        'title' => 'حذف الاشعارات',
      ]);

      # admins store
      Route::get('admins/create', [
        'uses'  => 'AdminController@create',
        'as'    => 'admins.create',
        'title' => ' صفحة اضافة مشرف',
      ]);

      #store
      Route::post('admins/store', [
        'uses'  => 'AdminController@store',
        'as'    => 'admins.store',
        'title' => 'اضافة مشرف',
      ]);

      # admins update
      Route::get('admins/{id}/edit', [
        'uses'  => 'AdminController@edit',
        'as'    => 'admins.edit',
        'title' => 'صفحه تحديث مشرف',
      ]);
      #update
      Route::put('admins/{id}', [
        'uses'  => 'AdminController@update',
        'as'    => 'admins.update',
        'title' => 'تعديل مشرف',
      ]);

      Route::get('admins/{id}/show', [
        'uses'  => 'AdminController@show',
        'as'    => 'admins.show',
        'title' => 'عرض مشرف',
      ]);

      #delete
      Route::delete('admins/{id}', [
        'uses'  => 'AdminController@destroy',
        'as'    => 'admins.delete',
        'title' => 'حذف مشرف',
      ]);

      #delete
      Route::post('delete-all-admins', [
        'uses'  => 'AdminController@destroyAll',
        'as'    => 'admins.deleteAll',
        'title' => 'حذف مجموعه من المشرفين',
      ]);

    /************ #Admins ************/

    /*------------ start Of notifications ----------*/
      Route::get('notifications', [
        'uses'      => 'NotificationController@index',
        'as'        => 'notifications.index',
        'title'     => 'الاشعارات',
        'icon'      => '<i class="ficon feather icon-bell"></i>',
        'type'      => 'parent',
        'sub_route' => false,
        'child'     => ['notifications.send'],
      ]);

      # coupons store
      Route::post('send-notifications', [
        'uses'  => 'NotificationController@sendNotifications',
        'as'    => 'notifications.send',
        'title' => ' ارسال اشعار او بريد للعميل',
      ]);
      /*------------ end Of notifications ----------*/


      /*------------ start Of introsocials ----------*/
      Route::get('introsocials', [
          'uses' => 'IntroSocialController@index',
          'as' => 'introsocials.index',
          'title' => 'وسائل التواصل',
          'icon' => '<i class="la la-facebook"></i>',
      ]);

      # introsocials update
      Route::get('introsocials/{id}/Show', [
          'uses' => 'IntroSocialController@show',
          'as' => 'introsocials.show',
          'title' => 'صفحه عرض وسيلة تواصل ',
      ]);
      # introsocials store
      Route::get('introsocials/create', [
          'uses' => 'IntroSocialController@create',
          'as' => 'introsocials.create',
          'title' => ' صفحة اضافة وسيلة تواصل',
      ]);

      # introsocials store
      Route::post('introsocials/store', [
          'uses' => 'IntroSocialController@store',
          'as' => 'introsocials.store',
          'title' => ' اضافة وسيلة',
      ]);
      # introsocials update
      Route::get('introsocials/{id}/edit', [
          'uses' => 'IntroSocialController@edit',
          'as' => 'introsocials.edit',
          'title' => 'صفحه تحديث وسيلة تواصل',
      ]);

      # introsocials update
      Route::put('introsocials/{id}', [
          'uses' => 'IntroSocialController@update',
          'as' => 'introsocials.update',
          'title' => 'تحديث وسيلة',
      ]);

      # introsocials delete
      Route::delete('introsocials/{id}', [
          'uses' => 'IntroSocialController@destroy',
          'as' => 'introsocials.delete',
          'title' => 'حذف وسيلة',
      ]);

      #delete all introsocials
      Route::post('delete-all-introsocials', [
          'uses' => 'IntroSocialController@destroyAll',
          'as' => 'introsocials.deleteAll',
          'title' => 'حذف مجموعه من وسائل التواصل',
      ]);
      /*------------ end Of introsocials ----------*/

//    /*------------ start Of sms ----------*/
//      Route::get('sms', [
//        'uses'      => 'SMSController@index',
//        'as'        => 'sms.index',
//        'title'     => 'باقات الرسائل',
//        'icon'      => '<i class="feather icon-smartphone"></i>',
//        'type'      => 'parent',
//        'sub_route' => false,
//        'child'     => ['sms.update', 'sms.change'],
//      ]);
//      # sms change
//      Route::post('sms-change', [
//        'uses'  => 'SMSController@change',
//        'as'    => 'sms.change',
//        'title' => 'تحديث نوع باقه الرسائل',
//      ]);
//      # sms update
//      Route::put('sms/{id}', [
//        'uses'  => 'SMSController@update',
//        'as'    => 'sms.update',
//        'title' => 'تحديث باقه رسائل',
//      ]);
//
//    /*------------ end Of sms ----------*/
//
//    /*------------ start Of statistics ----------*/
//      Route::get('statistics', [
//        'uses'  => 'StatisticsController@index',
//        'as'    => 'statistics.index',
//        'title' => 'الاحصائيات',
//        'icon'  => '<i class="feather icon-activity"></i>',
//        'type'  => 'parent',
//        'child' => [
//          'statistics.index',
//        ],
//      ]);
//    /*------------ end Of statistics ----------*/

//    /*------------ start Of reports----------*/
//      Route::get('reports', [
//        'uses'      => 'ReportController@index',
//        'as'        => 'reports',
//        'icon'      => '<i class="feather icon-edit-2"></i>',
//        'title'     => 'التقارير',
//        'type'      => 'parent',
//        'sub_route' => false,
//        'child'     => ['reports.delete', 'reports.deleteAll', 'reports.show'],
//      ]);
//
//      # reports show
//      Route::get('reports/{id}', [
//        'uses'  => 'ReportController@show',
//        'as'    => 'reports.show',
//        'title' => 'عرض تقرير',
//      ]);
//      # reports delete
//      Route::delete('reports/{id}', [
//        'uses'  => 'ReportController@destroy',
//        'as'    => 'reports.delete',
//        'title' => 'حذف تقرير',
//      ]);
//
//      #delete all reports
//      Route::post('delete-all-reports', [
//        'uses'  => 'ReportController@destroyAll',
//        'as'    => 'reports.deleteAll',
//        'title' => 'حذف مجموعه من التقارير',
//      ]);
//    /*------------ end Of reports ----------*/

    /*------------ start Of Roles----------*/
      Route::get('roles', [
        'uses'  => 'RoleController@index',
        'as'    => 'roles.index',
        'title' => 'قائمة الصلاحيات',
        'icon'  => '<i class="feather icon-eye"></i>',
        'type'  => 'parent',
        'child' => [
          'roles.index', 'roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete',
        ],
      ]);

      #add role page
      Route::get('roles/create', [
        'uses'  => 'RoleController@create',
        'as'    => 'roles.create',
        'title' => 'اضافة صلاحيه',

      ]);

      #store role
      Route::post('roles/store', [
        'uses'  => 'RoleController@store',
        'as'    => 'roles.store',
        'title' => 'تمكين اضافة صلاحيه',
      ]);

      #edit role page
      Route::get('roles/{id}/edit', [
        'uses'  => 'RoleController@edit',
        'as'    => 'roles.edit',
        'title' => 'تعديل صلاحيه',
      ]);

      #update role
      Route::put('roles/{id}', [
        'uses'  => 'RoleController@update',
        'as'    => 'roles.update',
        'title' => 'تمكين تعديل صلاحيه',
      ]);

      #delete role
      Route::delete('roles/{id}', [
        'uses'  => 'RoleController@destroy',
        'as'    => 'roles.delete',
        'title' => 'حذف صلاحيه',
      ]);
    /*------------ end Of Roles----------*/

    /*------------ start Of Settings----------*/
      Route::get('settings', [
        'uses'  => 'SettingController@index',
        'as'    => 'settings.index',
        'title' => 'الاعدادات',
        'icon'  => '<i class="feather icon-settings"></i>',
        'type'  => 'parent',
        'child' => [
          'settings.index', 'settings.update', 'settings.message.all', 'settings.message.one', 'settings.send_email',
        ],
      ]);

      #update
      Route::put('settings', [
        'uses'  => 'SettingController@update',
        'as'    => 'settings.update',
        'title' => 'تحديث الاعدادات',
      ]);

      #message all
      Route::post('settings/{type}/message-all', [
        'uses'  => 'SettingController@messageAll',
        'as'    => 'settings.message.all',
        'title' => 'مراسلة الجميع',
      ])->where('type', 'email|sms|notification');

      #message one
      Route::post('settings/{type}/message-one', [
        'uses'  => 'SettingController@messageOne',
        'as'    => 'settings.message.one',
        'title' => 'مراسلة مستخدم',
      ])->where('type', 'email|sms|notification');

      #send email
      Route::post('settings/send-email', [
        'uses'  => 'SettingController@sendEmail',
        'as'    => 'settings.send_email',
        'title' => 'ارسال ايميل',
      ]);
    /*------------ end Of Settings ----------*/                     
    
    /*------------ start Of introductions ----------*/
        Route::get('introductions', [
            'uses'      => 'IntroductionController@index',
            'as'        => 'introductions.index',
            'title'     => 'المقدمات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['introductions.create', 'introductions.store','introductions.edit', 'introductions.update', 'introductions.show', 'introductions.delete'  ,'introductions.deleteAll' ,]
        ]);

        # introductions store
        Route::get('introductions/create', [
            'uses'  => 'IntroductionController@create',
            'as'    => 'introductions.create',
            'title' => ' صفحة اضافة مقدمه'
        ]);
        

        # introductions store
        Route::post('introductions/store', [
            'uses'  => 'IntroductionController@store',
            'as'    => 'introductions.store',
            'title' => ' اضافة مقدمه'
        ]);

        # introductions update
        Route::get('introductions/{id}/edit', [
            'uses'  => 'IntroductionController@edit',
            'as'    => 'introductions.edit',
            'title' => 'صفحه تحديث مقدمه'
        ]);

        # introductions update
        Route::put('introductions/{id}', [
            'uses'  => 'IntroductionController@update',
            'as'    => 'introductions.update',
            'title' => 'تحديث مقدمه'
        ]);

        # introductions show
        Route::get('introductions/{id}/Show', [
            'uses'  => 'IntroductionController@show',
            'as'    => 'introductions.show',
            'title' => 'صفحه عرض  مقدمه  '
        ]);

        # introductions delete
        Route::delete('introductions/{id}', [
            'uses'  => 'IntroductionController@destroy',
            'as'    => 'introductions.delete',
            'title' => 'حذف مقدمه'
        ]);
        #delete all introductions
        Route::post('delete-all-introductions', [
            'uses'  => 'IntroductionController@destroyAll',
            'as'    => 'introductions.deleteAll',
            'title' => 'حذف مجموعه من مقدمات'
        ]);
    /*------------ end Of introductions ----------*/
    
    /*------------ start Of doctors ----------*/
        Route::get('doctors', [
            'uses'      => 'DoctorController@index',
            'as'        => 'doctors.index',
            'title'     => 'اطباء',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['doctors.create', 'doctors.store','doctors.edit', 'doctors.update', 'doctors.show', 'doctors.delete'  ,'doctors.deleteAll' , 'doctors.appointments',
                'doctors.post.appointments','doctors.edit.appointments','doctors.update.appointments']
        ]);

        # doctors store
        Route::get('doctors/create', [
            'uses'  => 'DoctorController@create',
            'as'    => 'doctors.create',
            'title' => ' صفحة اضافة طبيب'
        ]);
        

        # doctors store
        Route::post('doctors/store', [
            'uses'  => 'DoctorController@store',
            'as'    => 'doctors.store',
            'title' => ' اضافة طبيب'
        ]);

        # doctors update
        Route::get('doctors/{id}/edit', [
            'uses'  => 'DoctorController@edit',
            'as'    => 'doctors.edit',
            'title' => 'صفحه تحديث طبيب'
        ]);

        # doctors update
        Route::put('doctors/{id}', [
            'uses'  => 'DoctorController@update',
            'as'    => 'doctors.update',
            'title' => 'تحديث طبيب'
        ]);

        # doctors show
        Route::get('doctors/{id}/Show', [
            'uses'  => 'DoctorController@show',
            'as'    => 'doctors.show',
            'title' => 'صفحه عرض  طبيب  '
        ]);

        # doctors delete
        Route::delete('doctors/{id}', [
            'uses'  => 'DoctorController@destroy',
            'as'    => 'doctors.delete',
            'title' => 'حذف طبيب'
        ]);
        #delete all doctors
        Route::post('delete-all-doctors', [
            'uses'  => 'DoctorController@destroyAll',
            'as'    => 'doctors.deleteAll',
            'title' => 'حذف مجموعه من اطباء'
        ]);
        Route::get('add-appointments/{id}', [
            'uses'  => 'DoctorController@viewAppointments',
            'as'    => 'doctors.appointments',
            'title' => 'صفحه اضافه مواعيد الدكتور'
        ]);
        Route::post('post-add-appointments', [
            'uses'  => 'DoctorController@viewAppointmentsPost',
            'as'    => 'doctors.post.appointments',
            'title' => 'اضافه مواعيد الدكتور'
        ]);

      Route::get('edit-appointments/{id}', [
          'uses'  => 'DoctorController@editAppointments',
          'as'    => 'doctors.edit.appointments',
          'title' => 'صفحه تعديل  مواعيد الدكتور'
      ]);
      Route::post('update-appointments', [
          'uses'  => 'DoctorController@updateAppointments',
          'as'    => 'doctors.update.appointments',
          'title' => ' تعديل  مواعيد الدكتور'
      ]);
    /*------------ end Of doctors ----------*/
    
    /*------------ start Of helps ----------*/
        Route::get('helps', [
            'uses'      => 'HelpController@index',
            'as'        => 'helps.index',
            'title'     => 'المساعدات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['helps.create', 'helps.store','helps.edit', 'helps.update', 'helps.show', 'helps.delete'  ,'helps.deleteAll' ,]
        ]);

        # helps store
        Route::get('helps/create', [
            'uses'  => 'HelpController@create',
            'as'    => 'helps.create',
            'title' => ' صفحة اضافة المساعده'
        ]);
        

        # helps store
        Route::post('helps/store', [
            'uses'  => 'HelpController@store',
            'as'    => 'helps.store',
            'title' => ' اضافة المساعده'
        ]);

        # helps update
        Route::get('helps/{id}/edit', [
            'uses'  => 'HelpController@edit',
            'as'    => 'helps.edit',
            'title' => 'صفحه تحديث المساعده'
        ]);

        # helps update
        Route::put('helps/{id}', [
            'uses'  => 'HelpController@update',
            'as'    => 'helps.update',
            'title' => 'تحديث المساعده'
        ]);

        # helps show
        Route::get('helps/{id}/Show', [
            'uses'  => 'HelpController@show',
            'as'    => 'helps.show',
            'title' => 'صفحه عرض  المساعده  '
        ]);

        # helps delete
        Route::delete('helps/{id}', [
            'uses'  => 'HelpController@destroy',
            'as'    => 'helps.delete',
            'title' => 'حذف المساعده'
        ]);
        #delete all helps
        Route::post('delete-all-helps', [
            'uses'  => 'HelpController@destroyAll',
            'as'    => 'helps.deleteAll',
            'title' => 'حذف مجموعه من المساعدات'
        ]);
    /*------------ end Of helps ----------*/
    
    /*------------ start Of articles ----------*/
        Route::get('articles', [
            'uses'      => 'ArticleController@index',
            'as'        => 'articles.index',
            'title'     => 'مقالات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['articles.create', 'articles.store','articles.edit', 'articles.update', 'articles.show', 'articles.delete'  ,'articles.deleteAll' ,]
        ]);

        # articles store
        Route::get('articles/create', [
            'uses'  => 'ArticleController@create',
            'as'    => 'articles.create',
            'title' => ' صفحة اضافة مقال'
        ]);
        

        # articles store
        Route::post('articles/store', [
            'uses'  => 'ArticleController@store',
            'as'    => 'articles.store',
            'title' => ' اضافة مقال'
        ]);

        # articles update
        Route::get('articles/{id}/edit', [
            'uses'  => 'ArticleController@edit',
            'as'    => 'articles.edit',
            'title' => 'صفحه تحديث مقال'
        ]);

        # articles update
        Route::put('articles/{id}', [
            'uses'  => 'ArticleController@update',
            'as'    => 'articles.update',
            'title' => 'تحديث مقال'
        ]);

        # articles show
        Route::get('articles/{id}/Show', [
            'uses'  => 'ArticleController@show',
            'as'    => 'articles.show',
            'title' => 'صفحه عرض  مقال  '
        ]);

        # articles delete
        Route::delete('articles/{id}', [
            'uses'  => 'ArticleController@destroy',
            'as'    => 'articles.delete',
            'title' => 'حذف مقال'
        ]);
        #delete all articles
        Route::post('delete-all-articles', [
            'uses'  => 'ArticleController@destroyAll',
            'as'    => 'articles.deleteAll',
            'title' => 'حذف مجموعه من مقالات'
        ]);
    /*------------ end Of articles ----------*/
    
    /*------------ start Of abouts ----------*/
        Route::get('abouts', [
            'uses'      => 'AboutController@index',
            'as'        => 'abouts.index',
            'title'     => 'عن التطبيق',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['abouts.create', 'abouts.store','abouts.edit', 'abouts.update', 'abouts.show', 'abouts.delete'  ,'abouts.deleteAll' ,]
        ]);

        # abouts store
        Route::get('abouts/create', [
            'uses'  => 'AboutController@create',
            'as'    => 'abouts.create',
            'title' => ' صفحة اضافة عن التطبيق'
        ]);
        

        # abouts store
        Route::post('abouts/store', [
            'uses'  => 'AboutController@store',
            'as'    => 'abouts.store',
            'title' => ' اضافة عن التطبيق'
        ]);

        # abouts update
        Route::get('abouts/{id}/edit', [
            'uses'  => 'AboutController@edit',
            'as'    => 'abouts.edit',
            'title' => 'صفحه تحديث عن التطبيق'
        ]);

        # abouts update
        Route::put('abouts/{id}', [
            'uses'  => 'AboutController@update',
            'as'    => 'abouts.update',
            'title' => 'تحديث عن التطبيق'
        ]);

        # abouts show
        Route::get('abouts/{id}/Show', [
            'uses'  => 'AboutController@show',
            'as'    => 'abouts.show',
            'title' => 'صفحه عرض  عن التطبيق  '
        ]);

        # abouts delete
        Route::delete('abouts/{id}', [
            'uses'  => 'AboutController@destroy',
            'as'    => 'abouts.delete',
            'title' => 'حذف عن التطبيق'
        ]);
        #delete all abouts
        Route::post('delete-all-abouts', [
            'uses'  => 'AboutController@destroyAll',
            'as'    => 'abouts.deleteAll',
            'title' => 'حذف مجموعه من عن التطبيق'
        ]);
    /*------------ end Of abouts ----------*/
    
    /*------------ start Of socials ----------*/
        Route::get('socials', [
            'uses'      => 'SocialController@index',
            'as'        => 'socials.index',
            'title'     => 'وسائل تواصل',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['socials.create', 'socials.store','socials.edit', 'socials.update', 'socials.show', 'socials.delete'  ,'socials.deleteAll' ,]
        ]);

        # socials store
        Route::get('socials/create', [
            'uses'  => 'SocialController@create',
            'as'    => 'socials.create',
            'title' => ' صفحة اضافة وسيله تواصل '
        ]);
        

        # socials store
        Route::post('socials/store', [
            'uses'  => 'SocialController@store',
            'as'    => 'socials.store',
            'title' => ' اضافة وسيله تواصل '
        ]);

        # socials update
        Route::get('socials/{id}/edit', [
            'uses'  => 'SocialController@edit',
            'as'    => 'socials.edit',
            'title' => 'صفحه تحديث وسيله تواصل '
        ]);

        # socials update
        Route::put('socials/{id}', [
            'uses'  => 'SocialController@update',
            'as'    => 'socials.update',
            'title' => 'تحديث وسيله تواصل '
        ]);

        # socials show
        Route::get('socials/{id}/Show', [
            'uses'  => 'SocialController@show',
            'as'    => 'socials.show',
            'title' => 'صفحه عرض  وسيله تواصل   '
        ]);

        # socials delete
        Route::delete('socials/{id}', [
            'uses'  => 'SocialController@destroy',
            'as'    => 'socials.delete',
            'title' => 'حذف وسيله تواصل '
        ]);
        #delete all socials
        Route::post('delete-all-socials', [
            'uses'  => 'SocialController@destroyAll',
            'as'    => 'socials.deleteAll',
            'title' => 'حذف مجموعه من وسائل تواصل'
        ]);
    /*------------ end Of socials ----------*/

    /*------------ start Of depressiontests ----------*/
        Route::get('depressiontests', [
            'uses'      => 'DepressionTestController@index',
            'as'        => 'depressiontests.index',
            'title'     => 'مقياس بيك للاكتئاب',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['depressiontests.edit', 'depressiontests.update', 'depressiontests.show']
        ]);


        # depressiontests update
        Route::get('depressiontests/{id}/edit', [
            'uses'  => 'DepressionTestController@edit',
            'as'    => 'depressiontests.edit',
            'title' => 'صفحه تعديل مقياس بيك للاكتئاب'
        ]);

        # depressiontests update
        Route::put('depressiontests/{id}', [
            'uses'  => 'DepressionTestController@update',
            'as'    => 'depressiontests.update',
            'title' => 'تعديل مقياس بيك للاكتئاب'
        ]);

        # depressiontests show
        Route::get('depressiontests/{id}/Show', [
            'uses'  => 'DepressionTestController@show',
            'as'    => 'depressiontests.show',
            'title' => 'مقياس بيك للاكتئاب  '
        ]);

    /*------------ end Of depressiontests ----------*/
    
    /*------------ start Of depressiontestquestions ----------*/
        Route::get('depressiontestquestions', [
            'uses'      => 'DepressionTestQuestionController@index',
            'as'        => 'depressiontestquestions.index',
            'title'     => 'اسئله واجوبه مقياس بيك للاكتئاب',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['depressiontestquestions.edit', 'depressiontestquestions.update', 'depressiontestquestions.show']
        ]);

        # depressiontestquestions update
        Route::get('depressiontestquestions/{id}/edit', [
            'uses'  => 'DepressionTestQuestionController@edit',
            'as'    => 'depressiontestquestions.edit',
            'title' => 'صفحه تحديث اسئله واجوبه مقياس بيك للاكتئاب'
        ]);

        # depressiontestquestions update
        Route::put('depressiontestquestions/{id}', [
            'uses'  => 'DepressionTestQuestionController@update',
            'as'    => 'depressiontestquestions.update',
            'title' => 'تحديث اسئله واجوبه مقياس بيك للاكتئاب'
        ]);

        # depressiontestquestions show
        Route::get('depressiontestquestions/{id}/Show', [
            'uses'  => 'DepressionTestQuestionController@show',
            'as'    => 'depressiontestquestions.show',
            'title' => 'صفحه عرض  اسئله واجوبه مقياس بيك للاكتئاب  '
        ]);

    /*------------ end Of depressiontestquestions ----------*/
    
    /*------------ start Of selfassertiontests ----------*/
        Route::get('selfassertiontests', [
            'uses'      => 'SelfAssertionTestController@index',
            'as'        => 'selfassertiontests.index',
            'title'     => 'مقاييس توكيد الذات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['selfassertiontests.edit', 'selfassertiontests.update', 'selfassertiontests.show']
        ]);

//        # selfassertiontests store
//        Route::get('selfassertiontests/create', [
//            'uses'  => 'SelfAssertionTestController@create',
//            'as'    => 'selfassertiontests.create',
//            'title' => ' صفحة اضافة مقياس توكيد الذات '
//        ]);
//
//
//        # selfassertiontests store
//        Route::post('selfassertiontests/store', [
//            'uses'  => 'SelfAssertionTestController@store',
//            'as'    => 'selfassertiontests.store',
//            'title' => ' اضافة مقياس توكيد الذات '
//        ]);

        # selfassertiontests update
        Route::get('selfassertiontests/{id}/edit', [
            'uses'  => 'SelfAssertionTestController@edit',
            'as'    => 'selfassertiontests.edit',
            'title' => 'صفحه تحديث مقياس توكيد الذات '
        ]);

        # selfassertiontests update
        Route::put('selfassertiontests/{id}', [
            'uses'  => 'SelfAssertionTestController@update',
            'as'    => 'selfassertiontests.update',
            'title' => 'تحديث مقياس توكيد الذات '
        ]);

        # selfassertiontests show
        Route::get('selfassertiontests/{id}/Show', [
            'uses'  => 'SelfAssertionTestController@show',
            'as'    => 'selfassertiontests.show',
            'title' => 'صفحه عرض  مقياس توكيد الذات   '
        ]);

//        # selfassertiontests delete
//        Route::delete('selfassertiontests/{id}', [
//            'uses'  => 'SelfAssertionTestController@destroy',
//            'as'    => 'selfassertiontests.delete',
//            'title' => 'حذف مقياس توكيد الذات '
//        ]);
//        #delete all selfassertiontests
//        Route::post('delete-all-selfassertiontests', [
//            'uses'  => 'SelfAssertionTestController@destroyAll',
//            'as'    => 'selfassertiontests.deleteAll',
//            'title' => 'حذف مجموعه من مقاييس توكيد الذات'
//        ]);
    /*------------ end Of selfassertiontests ----------*/
    
    /*------------ start Of selfassertiontestquestions ----------*/
        Route::get('selfassertiontestquestions', [
            'uses'      => 'SelfAssertionTestQuestionController@index',
            'as'        => 'selfassertiontestquestions.index',
            'title'     => 'اسئله واجابات مقياس توكيد الذات',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['selfassertiontestquestions.create', 'selfassertiontestquestions.store','selfassertiontestquestions.edit', 'selfassertiontestquestions.update', 'selfassertiontestquestions.show', 'selfassertiontestquestions.delete'  ,'selfassertiontestquestions.deleteAll' ,]
        ]);

        # selfassertiontestquestions store
        Route::get('selfassertiontestquestions/create', [
            'uses'  => 'SelfAssertionTestQuestionController@create',
            'as'    => 'selfassertiontestquestions.create',
            'title' => ' صفحة اضافة اسئله واجابات مقياس توكيد الذات'
        ]);
        

        # selfassertiontestquestions store
        Route::post('selfassertiontestquestions/store', [
            'uses'  => 'SelfAssertionTestQuestionController@store',
            'as'    => 'selfassertiontestquestions.store',
            'title' => ' اضافة اسئله واجابات مقياس توكيد الذات'
        ]);

        # selfassertiontestquestions update
        Route::get('selfassertiontestquestions/{id}/edit', [
            'uses'  => 'SelfAssertionTestQuestionController@edit',
            'as'    => 'selfassertiontestquestions.edit',
            'title' => 'صفحه تحديث اسئله واجابات مقياس توكيد الذات'
        ]);

        # selfassertiontestquestions update
        Route::put('selfassertiontestquestions/{id}', [
            'uses'  => 'SelfAssertionTestQuestionController@update',
            'as'    => 'selfassertiontestquestions.update',
            'title' => 'تحديث اسئله واجابات مقياس توكيد الذات'
        ]);

        # selfassertiontestquestions show
        Route::get('selfassertiontestquestions/{id}/Show', [
            'uses'  => 'SelfAssertionTestQuestionController@show',
            'as'    => 'selfassertiontestquestions.show',
            'title' => 'صفحه عرض  اسئله واجابات مقياس توكيد الذات  '
        ]);

        # selfassertiontestquestions delete
        Route::delete('selfassertiontestquestions/{id}', [
            'uses'  => 'SelfAssertionTestQuestionController@destroy',
            'as'    => 'selfassertiontestquestions.delete',
            'title' => 'حذف اسئله واجابات مقياس توكيد الذات'
        ]);
        #delete all selfassertiontestquestions
        Route::post('delete-all-selfassertiontestquestions', [
            'uses'  => 'SelfAssertionTestQuestionController@destroyAll',
            'as'    => 'selfassertiontestquestions.deleteAll',
            'title' => 'حذف مجموعه من اسئله واجابات مقياس توكيد الذات'
        ]);
    /*------------ end Of selfassertiontestquestions ----------*/
      /*------------ start Of coupons ----------*/
      Route::get('coupons', [
          'uses' => 'CouponController@index',
          'as' => 'coupons.index',
          'title' => 'كوبونات الخصم',
          'icon' => '<i class="fa fa-gift"></i>',
          'type' => 'parent',
          'sub_route' => false,
          'child' => ['coupons.show', 'coupons.create', 'coupons.store', 'coupons.edit', 'coupons.update', 'coupons.delete', 'coupons.deleteAll', 'coupons.renew'],
      ]);

      Route::get('coupons/{id}/show', [
          'uses' => 'CouponController@show',
          'as' => 'coupons.show',
          'title' => 'عرض  كوبون خصم',
      ]);

      # coupons store
      Route::get('coupons/create', [
          'uses' => 'CouponController@create',
          'as' => 'coupons.create',
          'title' => ' صفحة اضافة كوبون خصم',
      ]);

      # coupons store
      Route::post('coupons/store', [
          'uses' => 'CouponController@store',
          'as' => 'coupons.store',
          'title' => ' اضافة كوبون خصم',
      ]);

      # coupons update
      Route::get('coupons/{id}/edit', [
          'uses' => 'CouponController@edit',
          'as' => 'coupons.edit',
          'title' => 'صفحه تحديث كوبون خصم',
      ]);

      # coupons update
      Route::put('coupons/{id}', [
          'uses' => 'CouponController@update',
          'as' => 'coupons.update',
          'title' => 'تحديث كوبون خصم',
      ]);

      # renew coupon
      Route::post('coupons/renew', [
          'uses' => 'CouponController@renew',
          'as' => 'coupons.renew',
          'title' => 'تحديث حالة كوبون خصم',
      ]);

      # coupons delete
      Route::delete('coupons/{id}', [
          'uses' => 'CouponController@destroy',
          'as' => 'coupons.delete',
          'title' => 'حذف كوبون خصم',
      ]);
      #delete all coupons
      Route::post('delete-all-coupons', [
          'uses' => 'CouponController@destroyAll',
          'as' => 'coupons.deleteAll',
          'title' => 'حذف مجموعه من كوبونات الخصم',
      ]);
      /*------------ end Of coupons ----------*/


      /*------------ start Of taylorforanxietytests ----------*/
        Route::get('taylorforanxietytests', [
            'uses'      => 'TaylorForAnxietyTestController@index',
            'as'        => 'taylorforanxietytests.index',
            'title'     => 'مقياس تايلور للقلق',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['taylorforanxietytests.edit', 'taylorforanxietytests.update', 'taylorforanxietytests.show']
        ]);


        # taylorforanxietytests update
        Route::get('taylorforanxietytests/{id}/edit', [
            'uses'  => 'TaylorForAnxietyTestController@edit',
            'as'    => 'taylorforanxietytests.edit',
            'title' => 'صفحه تحديث مقياس تايلور للقلق'
        ]);

        # taylorforanxietytests update
        Route::put('taylorforanxietytests/{id}', [
            'uses'  => 'TaylorForAnxietyTestController@update',
            'as'    => 'taylorforanxietytests.update',
            'title' => 'تحديث مقياس تايلور للقلق'
        ]);

        # taylorforanxietytests show
        Route::get('taylorforanxietytests/{id}/Show', [
            'uses'  => 'TaylorForAnxietyTestController@show',
            'as'    => 'taylorforanxietytests.show',
            'title' => 'صفحه عرض  مقياس تايلور للقلق  '
        ]);


    
    /*------------ start Of taylorforanxietytestquestions ----------*/
        Route::get('taylorforanxietytestquestions', [
            'uses'      => 'TaylorForAnxietyTestQuestionController@index',
            'as'        => 'taylorforanxietytestquestions.index',
            'title'     => 'اسئله واجوبه مقياس تايلور للاختبار',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['taylorforanxietytestquestions.create', 'taylorforanxietytestquestions.store','taylorforanxietytestquestions.edit', 'taylorforanxietytestquestions.update', 'taylorforanxietytestquestions.show', 'taylorforanxietytestquestions.delete'  ,'taylorforanxietytestquestions.deleteAll' ,]
        ]);

        # taylorforanxietytestquestions store
        Route::get('taylorforanxietytestquestions/create', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@create',
            'as'    => 'taylorforanxietytestquestions.create',
            'title' => ' صفحة اضافة اسئله واجوبه مقياس تايلور للاختبار'
        ]);
        

        # taylorforanxietytestquestions store
        Route::post('taylorforanxietytestquestions/store', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@store',
            'as'    => 'taylorforanxietytestquestions.store',
            'title' => ' اضافة اسئله واجوبه مقياس تايلور للاختبار'
        ]);

        # taylorforanxietytestquestions update
        Route::get('taylorforanxietytestquestions/{id}/edit', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@edit',
            'as'    => 'taylorforanxietytestquestions.edit',
            'title' => 'صفحه تحديث اسئله واجوبه مقياس تايلور للاختبار'
        ]);

        # taylorforanxietytestquestions update
        Route::put('taylorforanxietytestquestions/{id}', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@update',
            'as'    => 'taylorforanxietytestquestions.update',
            'title' => 'تحديث اسئله واجوبه مقياس تايلور للاختبار'
        ]);

        # taylorforanxietytestquestions show
        Route::get('taylorforanxietytestquestions/{id}/Show', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@show',
            'as'    => 'taylorforanxietytestquestions.show',
            'title' => 'صفحه عرض  اسئله واجوبه مقياس تايلور للاختبار  '
        ]);

        # taylorforanxietytestquestions delete
        Route::delete('taylorforanxietytestquestions/{id}', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@destroy',
            'as'    => 'taylorforanxietytestquestions.delete',
            'title' => 'حذف اسئله واجوبه مقياس تايلور للاختبار'
        ]);
        #delete all taylorforanxietytestquestions
        Route::post('delete-all-taylorforanxietytestquestions', [
            'uses'  => 'TaylorForAnxietyTestQuestionController@destroyAll',
            'as'    => 'taylorforanxietytestquestions.deleteAll',
            'title' => 'حذف مجموعه من اسئله واجوبه مقياس تايلور للاختبار'
        ]);
    /*------------ end Of taylorforanxietytestquestions ----------*/
    
    /*------------ start Of socialphobiatests ----------*/
        Route::get('socialphobiatests', [
            'uses'      => 'SocialPhobiaTestController@index',
            'as'        => 'socialphobiatests.index',
            'title'     => 'مقياس الرهاب الاجتماعي',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['socialphobiatests.edit', 'socialphobiatests.update', 'socialphobiatests.show']
        ]);



        # socialphobiatests update
        Route::get('socialphobiatests/{id}/edit', [
            'uses'  => 'SocialPhobiaTestController@edit',
            'as'    => 'socialphobiatests.edit',
            'title' => 'صفحه تحديث مقياس الرهاب الاجتماعي'
        ]);

        # socialphobiatests update
        Route::put('socialphobiatests/{id}', [
            'uses'  => 'SocialPhobiaTestController@update',
            'as'    => 'socialphobiatests.update',
            'title' => 'تحديث مقياس الرهاب الاجتماعي'
        ]);

        # socialphobiatests show
        Route::get('socialphobiatests/{id}/Show', [
            'uses'  => 'SocialPhobiaTestController@show',
            'as'    => 'socialphobiatests.show',
            'title' => 'صفحه عرض  مقياس الرهاب الاجتماعي  '
        ]);


    /*------------ end Of socialphobiatests ----------*/
    
    /*------------ start Of socialphobiatestquestions ----------*/
        Route::get('socialphobiatestquestions', [
            'uses'      => 'SocialPhobiaTestQuestionController@index',
            'as'        => 'socialphobiatestquestions.index',
            'title'     => 'اسئله واجوبه مقياس الرهاب الاجتماعي ',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['socialphobiatestquestions.edit', 'socialphobiatestquestions.update', 'socialphobiatestquestions.show']
        ]);

        # socialphobiatestquestions update
        Route::get('socialphobiatestquestions/{id}/edit', [
            'uses'  => 'SocialPhobiaTestQuestionController@edit',
            'as'    => 'socialphobiatestquestions.edit',
            'title' => 'صفحه تحديث اسئله واجابات مقياس الرهاب الاجتماعي'
        ]);

        # socialphobiatestquestions update
        Route::put('socialphobiatestquestions/{id}', [
            'uses'  => 'SocialPhobiaTestQuestionController@update',
            'as'    => 'socialphobiatestquestions.update',
            'title' => 'تحديث اسئله واجابات مقياس الرهاب الاجتماعي'
        ]);

        # socialphobiatestquestions show
        Route::get('socialphobiatestquestions/{id}/Show', [
            'uses'  => 'SocialPhobiaTestQuestionController@show',
            'as'    => 'socialphobiatestquestions.show',
            'title' => 'صفحه عرض  اسئله واجابات مقياس الرهاب الاجتماعي  '
        ]);

    
    /*------------ start Of testresults ----------*/
        Route::get('testresults', [
            'uses'      => 'TestResultsController@index',
            'as'        => 'testresults.index',
            'title'     => 'نتائج الاختبارات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => [ 'testresults.show', 'testresults.delete'  ,'testresults.deleteAll' ,]
        ]);

//        # testresults store
//        Route::get('testresults/create', [
//            'uses'  => 'TestResultsController@create',
//            'as'    => 'testresults.create',
//            'title' => ' صفحة اضافة نتائج الاختبار'
//        ]);
//
//
//        # testresults store
//        Route::post('testresults/store', [
//            'uses'  => 'TestResultsController@store',
//            'as'    => 'testresults.store',
//            'title' => ' اضافة نتائج الاختبار'
//        ]);

//        # testresults update
//        Route::get('testresults/{id}/edit', [
//            'uses'  => 'TestResultsController@edit',
//            'as'    => 'testresults.edit',
//            'title' => 'صفحه تحديث نتائج الاختبار'
//        ]);
//
//        # testresults update
//        Route::put('testresults/{id}', [
//            'uses'  => 'TestResultsController@update',
//            'as'    => 'testresults.update',
//            'title' => 'تحديث نتائج الاختبار'
//        ]);

        # testresults show
        Route::get('testresults/{id}/Show', [
            'uses'  => 'TestResultsController@show',
            'as'    => 'testresults.show',
            'title' => 'صفحه عرض  نتائج الاختبار  '
        ]);

        # testresults delete
        Route::delete('testresults/{id}', [
            'uses'  => 'TestResultsController@destroy',
            'as'    => 'testresults.delete',
            'title' => 'حذف نتائج الاختبار'
        ]);
        #delete all testresults
        Route::post('delete-all-testresults', [
            'uses'  => 'TestResultsController@destroyAll',
            'as'    => 'testresults.deleteAll',
            'title' => 'حذف مجموعه من نتائج الاختبار'
        ]);
    /*------------ end Of testresults ----------*/
    
    /*------------ start Of reservations ----------*/
        Route::get('reservations', [
            'uses'      => 'ReservationController@index',
            'as'        => 'reservations.index',
            'title'     => 'جميع الحجوزات',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['reservations.show', 'reservations.delete'  ,'reservations.deleteAll' ]
        ]);
//        # reservations store
//        Route::get('reservations/create', [
//            'uses'  => 'ReservationController@create',
//            'as'    => 'reservations.create',
//            'title' => ' صفحة اضافة الخحز'
//        ]);
        

//        # reservations store
//        Route::post('reservations/store', [
//            'uses'  => 'ReservationController@store',
//            'as'    => 'reservations.store',
//            'title' => ' اضافة الخحز'
//        ]);

//        # reservations update
//        Route::get('reservations/{id}/edit', [
//            'uses'  => 'ReservationController@edit',
//            'as'    => 'reservations.edit',
//            'title' => 'صفحه تحديث الخحز'
//        ]);
//
//        # reservations update
//        Route::put('reservations/{id}', [
//            'uses'  => 'ReservationController@update',
//            'as'    => 'reservations.update',
//            'title' => 'تحديث الخحز'
//        ]);

        # reservations show
        Route::get('reservations/{id}/Show', [
            'uses'  => 'ReservationController@show',
            'as'    => 'reservations.show',
            'title' => 'صفحه عرض  حجز  '
        ]);

        # reservations delete
        Route::delete('reservations/{id}', [
            'uses'  => 'ReservationController@destroy',
            'as'    => 'reservations.delete',
            'title' => 'حذف حجز'
        ]);
        #delete all reservations
        Route::post('delete-all-reservations', [
            'uses'  => 'ReservationController@destroyAll',
            'as'    => 'reservations.deleteAll',
            'title' => 'حذف مجموعه من الحجوزات'
        ]);

        # reservations inprogress
        Route::get('reservations.inprogress', [
            'uses'  => 'ReservationController@reservationInprogress',
            'as'    => 'reservations.inprogress',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'title' => 'الحجوزات الجاريه'
        ]);
//
      # reservations finished
      Route::get('reservations.finished', [
          'uses'  => 'ReservationController@reservationFinished',
          'as'    => 'reservations.finished',
          'icon'      => '<i class="feather icon-image"></i>',
          'type'      => 'parent',
          'title' => 'الحجوزات المكتمله'
      ]);
      # reservations refused
      Route::get('reservations.refused', [
          'uses'  => 'ReservationController@reservationRefused',
          'as'    => 'reservations.refused',
          'icon'      => '<i class="feather icon-image"></i>',
          'type'      => 'parent',
          'title' => 'الحجوزات الملغيه'
      ]);

      /*------------ end Of reservations ----------*/
//
//    /*------------ start Of reservationinprogresses ----------*/
//        Route::get('reservationinprogresses', [
//            'uses'      => 'ReservationInprogressController@index',
//            'as'        => 'reservationinprogresses.index',
//            'title'     => 'الحجوزات الجاريه',
//            'icon'      => '<i class="feather icon-image"></i>',
//            'type'      => 'parent',
//            'sub_route' => false,
//            'child'     => [ 'reservationinprogresses.show', 'reservationinprogresses.delete'  ,'reservationinprogresses.deleteAll' ,]
//        ]);
//
//
//        # reservationinprogresses show
//        Route::get('reservationinprogresses/{id}/Show', [
//            'uses'  => 'ReservationInprogressController@show',
//            'as'    => 'reservationinprogresses.show',
//            'title' => 'صفحه عرض  الحجوزات الجاريه  '
//        ]);
//
//        # reservationinprogresses delete
//        Route::delete('reservationinprogresses/{id}', [
//       git      'uses'  => 'ReservationInprogressController@destroy',
//            'as'    => 'reservationinprogresses.delete',
//            'title' => 'حذف الحجوزات الجاريه'
//        ]);
//        #delete all reservationinprogresses
//        Route::post('delete-all-reservationinprogresses', [
//            'uses'  => 'ReservationInprogressController@destroyAll',
//            'as'    => 'reservationinprogresses.deleteAll',
//            'title' => 'حذف مجموعه من الحجوزات الجاريه'
//        ]);
//    /*------------ end Of reservationinprogresses ----------*/
    
    /*------------ start Of coupons ----------*/
        Route::get('coupons', [
            'uses'      => 'CouponController@index',
            'as'        => 'coupons.index',
            'title'     => 'كوبونات الخصم',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['coupons.create', 'coupons.store','coupons.edit', 'coupons.update', 'coupons.show', 'coupons.delete'  ,'coupons.deleteAll' ,]
        ]);

        # coupons store
        Route::get('coupons/create', [
            'uses'  => 'CouponController@create',
            'as'    => 'coupons.create',
            'title' => ' صفحة اضافة كوبونات الهصم'
        ]);
        

        # coupons store
        Route::post('coupons/store', [
            'uses'  => 'CouponController@store',
            'as'    => 'coupons.store',
            'title' => ' اضافة كوبونات الهصم'
        ]);

        # coupons update
        Route::get('coupons/{id}/edit', [
            'uses'  => 'CouponController@edit',
            'as'    => 'coupons.edit',
            'title' => 'صفحه تحديث كوبونات الخصم'
        ]);

        # coupons update
        Route::put('coupons/{id}', [
            'uses'  => 'CouponController@update',
            'as'    => 'coupons.update',
            'title' => 'تحديث كوبونات الخصم'
        ]);

        # coupons show
        Route::get('coupons/{id}/Show', [
            'uses'  => 'CouponController@show',
            'as'    => 'coupons.show',
            'title' => 'صفحه عرض  كوبونات الخصم  '
        ]);

        # coupons delete
        Route::delete('coupons/{id}', [
            'uses'  => 'CouponController@destroy',
            'as'    => 'coupons.delete',
            'title' => 'حذف كوبونات الخصم'
        ]);
        #delete all coupons
        Route::post('delete-all-coupons', [
            'uses'  => 'CouponController@destroyAll',
            'as'    => 'coupons.deleteAll',
            'title' => 'حذف مجموعه من كوبونات الخصم'
        ]);
    /*------------ end Of coupons ----------*/
    #new_routes_here
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     












  });

});