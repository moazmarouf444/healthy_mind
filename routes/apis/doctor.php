<?php

use App\Http\Controllers\Api\Doctor\Auth\AuthController;
use App\Http\Controllers\Api\Doctor\DoctorController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\SettlementController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Api\Doctor\AuthController',
    'middleware' => ['api-cors', 'api-lang'],
], function () {
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

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('profile', [AuthController::class, 'getProfile']);
        Route::put('update-profile', [AuthController::class, 'updateProfile']);
        Route::patch('update-passward', [AuthController::class, 'updatePassword']);
        Route::patch('change-lang', [AuthController::class, 'changeLang']);
        Route::patch('switch-notify', [AuthController::class, 'switchNotificationStatus']);
        Route::post('change-phone-send-code', [AuthController::class , 'changePhoneSendCode']);
        Route::post('change-phone-check-code', [AuthController::class , 'changePhoneCheckCode']);
        Route::post('change-email-send-code', [AuthController::class , 'changeEmailSendCode']);
        Route::post('change-email-check-code', [AuthController::class , 'changeEmailCheckCode']);
        Route::get('notifications', [AuthController::class, 'getNotifications']);
        Route::get('count-notifications', [AuthController::class, 'countUnreadNotifications']);
        Route::delete('delete-notification/{notification_id}', [AuthController::class, 'deleteNotification']);
        Route::delete('delete-notifications', [AuthController::class, 'deleteNotifications']);
        Route::post('prescription', [DoctorController::class, 'prescription']);
        Route::get('reservations', [ReservationController::class, 'doctorReservation']);
        Route::get('rates', [DoctorController::class, 'doctorRates']);

        Route::get('reservation-inprogress', [ReservationController::class, 'doctorReservationInprogress']);
        Route::get('reservation-finished', [ReservationController::class, 'doctorReservationFinished']);
        Route::get('reservation-cancel', [ReservationController::class, 'doctorReservationCancel']);
        Route::put('switch-notify', [AuthController::class, 'switchNotificationStatus']);
        Route::get('notifications', [AuthController::class, 'getNotifications']);
        Route::get('count-notifications', [AuthController::class, 'countUnreadNotifications']);
    });
});
