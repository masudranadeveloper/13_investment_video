<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// users controller
use App\Http\Controllers\backend\users\backend_account_controller;
use App\Http\Controllers\backend\users\backend_deposit_controller;
use App\Http\Controllers\backend\users\backend_withdraw_controller;
use App\Http\Controllers\backend\users\backend_task_controller;
use App\Http\Controllers\backend\users\backend_users_home_controller;
use App\Http\Controllers\backend\users\backend_users_settings_controller;
// admin
use App\Http\Controllers\backend\admin\backend_admin_diposit_controller;
use App\Http\Controllers\backend\admin\backend_admin_withdraw_controller;
use App\Http\Controllers\backend\admin\backend_admin_users_controller;
use App\Http\Controllers\backend\admin\backend_admin_payment_controller;
use App\Http\Controllers\backend\admin\backend_admin_contact_controller;
use App\Http\Controllers\backend\admin\backend_admin_settings_controller;
use App\Http\Controllers\backend\admin\backend_admin_tools_controller;
use App\Http\Controllers\backend\admin\backend_admin_account_controller;
use App\Http\Controllers\backend\admin\backend_admin_deshbord_controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// home
Route::group(['prefix' => 'home'], function(){
    Route::post('/online_or_ofline', [backend_users_home_controller::class, 'online_or_ofline']) -> name('api_online_or_ofline');
    Route::post('/online_or_ofline_st', [backend_users_home_controller::class, 'online_or_ofline_st']) -> name('api_online_or_ofline_st');
    Route::post('/get_data_search_username', [backend_users_home_controller::class, 'get_data_search_username']) -> name('api_get_data_search_username');
    Route::post('/get_user_data', [backend_users_home_controller::class, 'get_user_data']) -> name('api_get_user_data');
});

// users controller
Route::group(['prefix' => 'account'], function(){
    // sign up check
    Route::post('check_username', [backend_account_controller::class, 'check_username']);
    Route::post('check_mobile_number', [backend_account_controller::class, 'check_mobile_number']);
    Route::post('check_email', [backend_account_controller::class, 'check_email']);
    Route::post('check_invitation_code', [backend_account_controller::class, 'check_invitation_code']);

    // signup
    Route::post('signup', [backend_account_controller::class, 'signup']);
    // login
    Route::post('login', [backend_account_controller::class, 'login']);
});

// user
Route::group(['prefix' => 'users'], function(){
    // deposit
    Route::group(['prefix' => 'deposit'], function(){
        Route::post('/insert', [backend_deposit_controller::class, 'deposit_insert']) -> name('api_users_deposit_insert');
    });

    // withdraw
    Route::group(['prefix' => 'withdraw'], function(){
        Route::post('/insert', [backend_withdraw_controller::class, 'withdraw_insert']) -> name('withdraw_insert');
    });
});
// task
Route::group(['prefix' => 'task'], function(){
    Route::post('/task_check', [backend_task_controller::class, 'task_check']) -> name('api_task_check');
    Route::post('/get_task_commission', [backend_task_controller::class, 'get_task_commission']) -> name('api_get_task_commission');
    Route::post('/get_task_ads', [backend_task_controller::class, 'get_task_ads']) -> name('api_get_task_ads');
});
// setting
Route::group(['prefix' => 'setting'], function(){
    Route::post('/profile', [backend_users_settings_controller::class, 'setting_profile']) -> name('api_setting_profile');
    Route::post('/address', [backend_users_settings_controller::class, 'setting_address']) -> name('api_setting_address');
    Route::post('/change_password', [backend_users_settings_controller::class, 'setting_change_password']) -> name('api_setting_change_password');
});


/*
|--------------|
|  Admn Route  |
|--------------|
*/
Route::any('/admin/login', [backend_admin_account_controller::class, 'login_login']) -> name('api_login_login');
Route::group(['prefix' => 'admin'], function(){
    Route::any('/admin/logout', [backend_admin_account_controller::class, 'admin_logout']) -> name('api_admin_logout');
    // search data
    Route::get('/search_profile/{id}', [backend_admin_deshbord_controller::class, 'search_profile']) -> name('api_search_profile');
    Route::get('/update_notification_data', [backend_admin_deshbord_controller::class, 'update_notification_data']) -> name('api_update_notification_data');
    Route::get('/update_notification_data_get', [backend_admin_deshbord_controller::class, 'update_notification_data_get']) -> name('api_update_notification_data_get');
    /*
    |--------
    |users
    |--------
    */
    Route::group(['prefix' => 'users'], function(){
        Route::get('/ban/{id}', [backend_admin_users_controller::class, 'users_ban']) -> name('api_users_ban');
        Route::get('/unban/{id}', [backend_admin_users_controller::class, 'users_unban']) -> name('api_users_unban');
        Route::get('/login/{id}', [backend_admin_users_controller::class, 'users_login']) -> name('api_users_login');
        Route::post('/update/{id}', [backend_admin_users_controller::class, 'users_update']) -> name('api_users_update');
    });
    /*
    |--------
    |deposit
    |--------
    */
    Route::group(['prefix' => 'deposit'], function(){
        Route::get('/success/{id}', [backend_admin_diposit_controller::class, 'deposit_success']) -> name('api_deposit_success');
        Route::get('/rejected/{id}', [backend_admin_diposit_controller::class, 'deposit_rejected']) -> name('api_deposit_rejected');
        Route::get('/undo/{id}', [backend_admin_diposit_controller::class, 'deposit_undo']) -> name('api_deposit_undo');
        Route::get('/rejected_undo/{id}', [backend_admin_diposit_controller::class, 'deposit_rejected_undo']) -> name('api_deposit_rejected_undo');
    });

    /*
    |--------
    |withdraw
    |--------
    */
    Route::group(['prefix' => 'withdraw'], function(){
        Route::get('/success/{id}', [backend_admin_withdraw_controller::class, 'withdraw_success']) -> name('api_withdraw_success');
        Route::get('/rejected/{id}', [backend_admin_withdraw_controller::class, 'withdraw_rejected']) -> name('api_withdraw_rejected');
        Route::get('/undo/{id}', [backend_admin_withdraw_controller::class, 'withdraw_undo']) -> name('api_withdraw_undo');
    });

    /*
    |--------
    |payment
    |--------
    */
    Route::group(['prefix' => 'payment'], function(){
        Route::post('/account', [backend_admin_payment_controller::class, 'payment_account']) -> name('api_payment_account');
        Route::post('/account_withdraw', [backend_admin_payment_controller::class, 'payment_account_withdraw']) -> name('api_payment_account_withdraw');
        Route::post('/recharge_limit', [backend_admin_payment_controller::class, 'payment_recharge_limit']) -> name('api_payment_recharge_limit');
        Route::post('/withdraw_limit', [backend_admin_payment_controller::class, 'payment_withdraw_limit']) -> name('api_payment_withdraw_limit');
        Route::post('/recharge_com', [backend_admin_payment_controller::class, 'payment_recharge_com']) -> name('api_payment_recharge_com');
        Route::post('/genaration_com', [backend_admin_payment_controller::class, 'payment_genaration_com']) -> name('api_payment_genaration_com');
        Route::post('/dollaer_rate', [backend_admin_payment_controller::class, 'payment_dollaer_rate']) -> name('api_payment_dollaer_rate');
        Route::post('/withdraw_charge', [backend_admin_payment_controller::class, 'payment_withdraw_charge']) -> name('api_payment_withdraw_charge');
        Route::post('/signup_bonuse', [backend_admin_payment_controller::class, 'payment_signup_bonuse']) -> name('api_payment_signup_bonuse');
    });
    /*
    |--------
    |contact
    |--------
    */
    Route::group(['prefix' => 'contact'], function(){
        Route::post('/telegram', [backend_admin_contact_controller::class, 'contact_telegram']) -> name('api_contact_telegram');
    });
    /*
    |--------
    |settings
    |--------
    */
    Route::group(['prefix' => 'settings'], function(){
        Route::post('/logo', [backend_admin_settings_controller::class, 'settings_logo']) -> name('api_settings_logo');
        Route::post('/title', [backend_admin_settings_controller::class, 'settings_title']) -> name('api_settings_title');
        Route::post('/update_account', [backend_admin_settings_controller::class, 'settings_update_account']) -> name('api_settings_update_account');

        // notice
        Route::group(['prefix' => 'notice'], function(){
            Route::post('/notice_update', [backend_admin_settings_controller::class, 'settings_notice_update']) -> name('api_settings_notice_update');
        });

    });
    /*
    |--------
    |tools
    |--------
    */
    Route::group(['prefix' => 'tools'], function(){
        // dynamic package
        Route::group(['prefix' => 'package'], function(){
            Route::get('/package_delete/{id}', [backend_admin_tools_controller::class, 'tools_update_package_delete']) -> name('api_tools_update_package_delete');
            Route::post('/package_add', [backend_admin_tools_controller::class, 'tools_update_package_add']) -> name('api_tools_update_package_add');
            Route::post('/package_update_data_img/{id}', [backend_admin_tools_controller::class, 'tools_update_package_update_data_img']) -> name('api_tools_update_package_update_data_img');
            Route::post('/package_update_data/{id}', [backend_admin_tools_controller::class, 'tools_update_package_update_data']) -> name('api_tools_update_package_update_data');
        });
        // ads
        Route::group(['prefix' => 'ads'], function(){
            Route::get('/tools_ads_delete/{id}', [backend_admin_tools_controller::class, 'tools_ads_delete']) -> name('api_show_tools_ads_delete');
            Route::POST('/tools_ads_add', [backend_admin_tools_controller::class, 'tools_ads_add']) -> name('api_show_tools_ads_add');
            Route::POST('/tools_ads_update/{id}', [backend_admin_tools_controller::class, 'tools_ads_update']) -> name('api_show_tools_ads_update');
            Route::POST('/tools_ads_update_img/{id}', [backend_admin_tools_controller::class, 'tools_ads_update_img']) -> name('api_show_tools_ads_update_img');
            Route::POST('/tools_ads_update_video/{id}', [backend_admin_tools_controller::class, 'tools_ads_update_video']) -> name('api_show_tools_ads_update_video');
        });
    });

});

// php artisan make:controller backend/admin/backend_admin_tools_controller
