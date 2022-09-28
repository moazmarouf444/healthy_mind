<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'User'], 'prefix' => 'user', 'namespace' => 'User'],

    function () {
        Route::get('vendors/{id}', 'VendorController@get_vendor');
        Route::get('vendor/offers/{id}', 'OffersApi@index');
        Route::get('offers/{id}', 'OffersApi@show');
        Route::get('dynamic_service/{id}/cars', 'VendorController@get_dynamic_services_cars');
        // END ADDEDD BY MAI
        // NEW ADDEDD BY MAI
        // Route::apiResource("ads","AdsApi", ["as" => "api.ads"]);
        Route::post("ads","AdsApi@store");
        Route::post("ads/{id}/edit","AdsApi@update");
        Route::post("ads/{id}/delete","AdsApi@destroy");
        Route::get("ads","AdsApi@index");
    });


// NEW ADDEDD BY MAI
Route::group([ 'prefix' => 'user', 'namespace' => 'User'],

    function () {
        Route::post('update/account', 'Account@updateAccount')->name('api.updateAccount');
        Route::get('update_fcm/{tokken}', 'Account@updateFcm');
        Route::get('notifications', 'Account@getNotifications');

        Route::apiResource("usercars", "UserCarsApi", ["as" => "api.usercars"]);
        Route::post("usercars/multi_delete", "UserCarsApi@multi_delete");
        Route::apiResource("useraddresses", "UserAddressesApi", ["as" => "api.useraddresses"]);
        Route::post("useraddresses/multi_delete", "UserAddressesApi@multi_delete");
        Route::post("set_location", "Account@set_current_location");
        // nearby workshop and delegates
        Route::get('vendors/dynamic_services/{id}', 'VendorController@get_vendor_dynamic_services');
        Route::get('dynamic_services/{id}', 'VendorController@show_dynamic_service');

        Route::get('vendors/predefined_services/{id}', 'VendorController@get_vendor_predefined_services');
        Route::get('predefined_services/{id}', 'VendorController@show_predefined_service');

        Route::get('predefined_service/{id}/cars/{vendor_id}', 'VendorController@get_predefined_services_cars');


        Route::get('nearby/vendors', 'Account@nearby_vendors');


        Route::apiResource("requests", "RequestApi", ["as" => "api.requests"]);

        Route::post("rate/requests/{id}","RequestApi@rate");




        // Home Ads Screen Routs
        Route::get("catads/{category_id}","AdsApi@get_ads_bycategory");
        Route::get("ad_details/{ad_id}","AdsApi@get_details_byad");
        Route::get("adfilter","AdsApi@adfilter");

        // End Home Ads Screen Routs

        // STart AdsOperation Routes
        Route::post("storecomment/{ad_id}","AdsApi@storecomment");
        Route::post("storewishlist/{ad_id}","AdsApi@storewishlist");
        Route::post("deletewishlist/{id}","AdsApi@deletewishlist");
        Route::get("userwishlist","AdsApi@userwishlist");
        // End AdsOps
        Route::get("getusernotification","AdsApi@getusernotification");
        Route::delete("deletenotification","AdsApi@deletenotification");
        Route::get("get_latest_ads","AdsApi@get_latest_ads");
        Route::get("adcategorys","AdCategorysApi@index");
        Route::get("get_all_cats","AdCategorysApi@get_all_cats");
        Route::get("policy","AdsApi@get_policy");
    });

// END ADDEDD BY MAI