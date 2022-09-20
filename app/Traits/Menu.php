<?php

namespace App\Traits;

trait menu {
  public function home() {

    $menu = [
      [
        'name'  => awtTrans('المشرفين'),
        'count' => \App\Models\Admin::count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/admins'),
      ], [
        'name'  => awtTrans('المستخدمين '),
        'count' => \App\Models\User::count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/clients'),
      ], [
        'name'  => awtTrans('المستخدمين النشطين'),
        'count' => \App\Models\User::where('active', 1)->count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/clients/active'),
      ], [
        'name'  => awtTrans('المستخدمين الغير نشطين'),
        'count' => \App\Models\User::where('active', 0)->count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/clients/not-active'),
      ], [
        'name'  => awtTrans('المستخدمين الغير محظورين'),
        'count' => \App\Models\User::where('is_blocked', 0)->count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/clients/not-block'),
      ], [
        'name'  => awtTrans('المستخدمين  المحظورين'),
        'count' => \App\Models\User::where('is_blocked', 1)->count(),
        'icon'  => 'icon-users',
        'url'   => url('admin/clients/block'),
      ], [
        'name'  => awtTrans('وسائل التواصل'),
        'count' => \App\Models\Social::count(),
        'icon'  => 'icon-thumbs-up',
        'url'   => url('admin/socials'),
      ],  [
        'name'  => awtTrans('التقارير'),
        'count' => \App\Models\LogActivity::count(),
        'icon'  => 'icon-list',
        'url'   => url('admin/reports'),
      ], [
        'name'  => awtTrans('باقات الرسائل'),
        'count' => \App\Models\SMS::count(),
        'icon'  => 'icon-list',
        'url'   => url('admin/sms'),
      ], [
        'name'  => awtTrans('الصلاحيات'),
        'count' => \App\Models\Role::count(),
        'icon'  => 'icon-eye',
        'url'   => url('admin/roles'),
      ],
    ];

    return $menu;
  }




}