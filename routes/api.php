<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SettlementController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Api',
    'middleware' => ['api-cors', 'api-lang'],
], function () {

    /***************************** SettingController start *****************************/
     Route::get('settings', 'SettingController@settings');
    Route::get('introductions', [SettingController::class, 'introductions']);
    Route::get('about', [SettingController::class, 'about']);
    Route::get('help', [SettingController::class, 'help']);
    Route::get('socials', [SettingController::class, 'socials']);
    Route::get('articles', [SettingController::class, 'articles']);
    Route::get('article', [SettingController::class, 'article']);
    /***************************** SettingController End *****************************/

    /***************************** AuthController Start *****************************/
    Route::post('sign-up', [AuthController::class, 'register']);
    Route::patch('activate', [AuthController::class, 'activate']);
    Route::get('resend-code', [AuthController::class, 'resendCode']);
    Route::post('forget-check-code', [AuthController::class, 'checkCode']);

    Route::post('sign-in', [AuthController::class, 'login']);
    Route::delete('sign-out', [AuthController::class, 'logout']);

    Route::group(['middleware' => ['guest']], function () {
        Route::post('forget-password-send-code'    , [AuthController::class, 'forgetPasswordSendCode']);
        Route::post('reset-password'                , [AuthController::class, 'resetPassword']);
    });
    /***************************** AuthController Start *****************************/

    Route::group(['middleware' => ['OptionalSanctumMiddleware']], function () {

    });


    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::get('profile', [AuthController::class, 'getProfile']);
        Route::put('update-profile', [AuthController::class, 'updateProfile']);
        Route::patch('update-passward', [AuthController::class, 'updatePassword']);
        Route::patch('change-lang', [AuthController::class, 'changeLang']);
        Route::patch('switch-notify', [AuthController::class, 'switchNotificationStatus']);
        Route::get('notifications', [AuthController::class, 'getNotifications']);
        Route::get('count-notifications', [AuthController::class, 'countUnreadNotifications']);
        Route::post('change-phone-send-code', [AuthController::class , 'changePhoneSendCode']);
        Route::post('change-phone-check-code', [AuthController::class , 'changePhoneCheckCode']);
        Route::post('change-email-send-code', [AuthController::class , 'changeEmailSendCode']);
        Route::post('change-email-check-code', [AuthController::class , 'changeEmailCheckCode']);
        Route::post('doctor-search', [UserController::class, 'doctorSearch']);
        Route::post('rate-doctor', [UserController::class, 'rateDoctor']);
        Route::get('all-doctors', [UserController::class, 'allDoctors']);
        Route::get('all-specialists', [UserController::class, 'allSpecialists']);
        Route::get('doctor-dates', [UserController::class, 'split_time']);
        Route::get('doctor-dates-not-reservation', [UserController::class, 'time_split']);
        Route::get('create-contact/{room_id?}', [ContactController::class, 'createContact']);

        Route::get('depression', [TestController::class, 'depression']);
        Route::post('depression-result', [TestController::class, 'depressionResult']);
        Route::get('self-assertion', [TestController::class, 'selfAssertion']);
        Route::post('self-assertion-result', [TestController::class, 'selfAssertionResult']);
        Route::get('taylor', [TestController::class, 'taylor']);
        Route::post('taylor-result', [TestController::class, 'taylorResult']);
        Route::get('social-phobia', [TestController::class, 'socialPhobia']);
        Route::post('social-phobia-result', [TestController::class, 'socialPhobiaQuestion']);
        Route::post('make-reservation', [ReservationController::class, 'makeReservation']);
        Route::post('prescription-user', [UserController::class, 'prescription']);
        Route::get('all-prescription', [UserController::class, 'allPrescription']);

    });
    Route::get('my-reservations', [ReservationController::class, 'myReservations']);
    Route::put('update-reservation', [ReservationController::class, 'updateReservations']);
    Route::post('delete-reservation', [ReservationController::class, 'deleteReservations']);

});
