<?php

	use App\Models\SiteSetting;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Support\Facades\Cache;
	use App\Services\SettingService;

	class CreateSiteSettingsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema ::create( 'site_settings', function ( Blueprint $table ) {
				$table -> increments( 'id' );
				$table -> string( 'key', 50 );
				$table -> longText( 'value' );
				$table -> timestamps();
			} );
			Cache::forget('settings');
        $data = [
                [ 'key' => 'is_production'                  , 'value' => 0               ],
                [ 'key' => 'name_ar'                        , 'value' => 'عقل سليم'               ],
                [ 'key' => 'name_en'                        , 'value' => 'healthy mind'              ],
                [ 'key' => 'email'                          , 'value' => 'healthymind@gmail.com'      ],
                [ 'key' => 'phone'                          , 'value' => '+966666666666'        ],
                [ 'key' => 'whatsapp'                       , 'value' => '+966666666666'        ],
                [ 'key' => 'logo'                           , 'value' => 'logo.png'             ],
                [ 'key' => 'fav_icon'                       , 'value' => 'fav_icon.png'             ],
                [ 'key' => 'login_background'               , 'value' => 'login_background.png'             ],
                [ 'key' => 'color'                          , 'value' => '#10163a'    ],
                [ 'key' => 'buttons_color'                  , 'value' => '#7367F0'    ],
                [ 'key' => 'hover_color'                    , 'value' => '#262c49'    ],
            [ 'key' => 'default_user'                   , 'value' => 'default.png'          ],

                [ 'key' => 'smtp_user_name'                 , 'value' => 'smtp_user_name'    ],
                [ 'key' => 'smtp_password'                  , 'value' => 'smtp_password'    ],
                [ 'key' => 'smtp_mail_from'                 , 'value' => 'smtp_mail_from'    ],
                [ 'key' => 'smtp_sender_name'               , 'value' => 'smtp_sender_name'    ],
                [ 'key' => 'smtp_port'                      , 'value' => '80'    ],
                [ 'key' => 'smtp_host'                      , 'value' => 'send.smtp.com'    ],
                [ 'key' => 'smtp_encryption'                , 'value' => 'LTS'    ],

                [ 'key' => 'firebase_key'                   , 'value' => 'AAAAVYoWgDU:APA91bEU9m3M7z5TeNAlKqwl2sI5XU78yNRDCNPt95M2RDjfZG9O5ZGxrH_wcqIClEDY3TWgyMOp9vH56O5ilbm2vYp-8tIN_8dGvnbtea4s5hMlXYyCQZR2h0kM07l3pXB9iiZbgz_q'    ],
                [ 'key' => 'firebase_sender_id'             , 'value' => '662557294717'    ],

            ];
			SiteSetting ::insert( $data );
            
            Cache::rememberForever('settings', function () {
                return SettingService::appInformations(SiteSetting::pluck('value', 'key'));
            });
		}


		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema ::dropIfExists( 'site_settings' );
		}
	}
