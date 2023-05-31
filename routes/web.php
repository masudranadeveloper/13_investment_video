<?php

use Illuminate\Support\Facades\Route;
// middle ware
use App\Http\Middleware\users\users_middle_ware;

use App\Http\Controllers\frontend\frontend_home_controller;
use App\Http\Controllers\frontend\frontend_packages_controller;
use App\Http\Controllers\frontend\frontend_network_controller;
use App\Http\Controllers\frontend\frontend_withdraw_controller;
use App\Http\Controllers\frontend\frontend_report_controller;
use App\Http\Controllers\frontend\frontend_payment_history_controller;
use App\Http\Controllers\frontend\frontend_rank_controller;
use App\Http\Controllers\frontend\frontend_kyc_controller;
use App\Http\Controllers\frontend\frontend_profile_controller;
use App\Http\Controllers\frontend\frontend_setting_controller;
use App\Http\Controllers\frontend\frontend_support_controller;
use App\Http\Controllers\frontend\frontend_logout_controller;
use App\Http\Controllers\frontend\frontend_task_controller;
use App\Http\Controllers\frontend\frontend_account_controller;
use App\Http\Controllers\frontend\frontend_success_controller;

// admin
use App\Http\Controllers\frontend\admin\frontend_admin_deshbord_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_users_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_recharge_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_withdraw_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_payment_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_contact_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_tools_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_settings_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
// account
Route::get('/account', [frontend_account_controller::class, 'account_show']) -> name('account_show');
Route::get('/success', [frontend_success_controller::class, 'success_show']) -> name('success_show');

// user middlw ware
Route::middleware(['userID']) -> group(function(){
    // home
    Route::get('/', [frontend_home_controller::class, 'home_show']) -> name('home_show');

    // task
    Route::group(['prefix' => 'task'], function(){
        Route::get('/', [frontend_task_controller::class, 'task_show']) -> name('task_show');
    });

    // package
    Route::group(['prefix' => 'package'], function(){
        Route::get('/', [frontend_packages_controller::class, 'package_show']) -> name('package_show');
        Route::any('buy/{method}/{amount}', [frontend_packages_controller::class, 'buy_package']) -> name('buy_package');
    });

    // network
    Route::group(['prefix' => 'team'], function(){
        Route::get('/1stgen', [frontend_network_controller::class, 'gen1st']) -> name('show_1stgen');
        Route::get('/2ndgen', [frontend_network_controller::class, 'gen2nd']) -> name('show_2ndgen');
        Route::get('/3rdgen', [frontend_network_controller::class, 'gen3rd']) -> name('show_3rdgen');
        Route::get('/4thgen', [frontend_network_controller::class, 'gen4th']) -> name('show_4thgen');
        Route::get('/5thgen', [frontend_network_controller::class, 'gen5th']) -> name('show_5thgen');
    });

    // withdraw
    Route::group(['prefix' => 'withdraw'], function(){
        Route::get('/', [frontend_withdraw_controller::class, 'withdraw_show']) -> name('withdraw_show');
    });

    // activity
    Route::group(['prefix' => 'activity'], function(){
        Route::get('/', [frontend_report_controller::class, 'activity_today']) -> name('activity_today_show');
    });

    // history
    Route::group(['prefix' => 'history'], function(){
        // recharge
        Route::group(['prefix' => 'recharge'], function(){
            Route::get('/pending', [frontend_payment_history_controller::class, 'recharge_history_pending']) -> name('show_recharge_history_pending');
            Route::get('/success', [frontend_payment_history_controller::class, 'recharge_history_success']) -> name('show_recharge_history_success');
            Route::get('/rejected', [frontend_payment_history_controller::class, 'recharge_history_rejected']) -> name('show_recharge_history_rejected');
        });
        // withdraw
        Route::group(['prefix' => 'withdraw'], function(){
            Route::get('/pending', [frontend_payment_history_controller::class, 'withdraw_history_pending']) -> name('show_withdraw_history_pending');
            Route::get('/success', [frontend_payment_history_controller::class, 'withdraw_history_success']) -> name('show_withdraw_history_success');
            Route::get('/rejected', [frontend_payment_history_controller::class, 'withdraw_history_rejected']) -> name('show_withdraw_history_rejected');
        });
    });

    // rank
    Route::group(['prefix' => 'rank'], function(){
        Route::get('/', [frontend_rank_controller::class, 'rank_show']) -> name('rank_show');
    });

    // kyc
    Route::group(['prefix' => 'kyc'], function(){
        Route::get('/', [frontend_kyc_controller::class, 'kyc_show']) -> name('kyc_show');
    });

    // profile
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/{id}', [frontend_profile_controller::class, 'profile_show']) -> name('profile_show');
    });

    // support
    Route::group(['prefix' => 'support'], function(){
        Route::get('/', [frontend_support_controller::class, 'support_show']) -> name('support_show');
        Route::get('/summary', [frontend_support_controller::class, 'support_summary']) -> name('support_summary_show');
    });

    // settings
    Route::group(['prefix' => 'settings'], function(){
        Route::get('/', [frontend_setting_controller::class, 'settings_show']) -> name('settings_show');
    });


    // logout
    Route::group(['prefix' => 'logout'], function(){
        Route::get('/', [frontend_logout_controller::class, 'logout']) -> name('logout');
    });

});

// ==================
// admin
// ==================
Route::any('/admin/login', [frontend_admin_deshbord_controller::class, 'login_login']) -> name('login_login');

Route::middleware(['adminID']) -> group(function(){
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/', [frontend_admin_deshbord_controller::class, 'admin_show']) -> name('admin_show');
        // users
        Route::group(['prefix' => 'users'], function(){
            Route::get('/all', [frontend_admin_users_controller::class, 'users_all']) -> name('show_users_all');
            Route::get('/active', [frontend_admin_users_controller::class, 'users_active']) -> name('show_users_active');
            Route::get('/ban', [frontend_admin_users_controller::class, 'users_ban']) -> name('show_users_ban');
            Route::get('/profile/{id}', [frontend_admin_users_controller::class, 'users_profile']) -> name('show_users_profile');
        });

        // recharge
        Route::group(['prefix' => 'recharge'], function(){
            Route::get('/new', [frontend_admin_recharge_controller::class, 'recharge_new']) -> name('show_recharge_new');
            Route::get('/success', [frontend_admin_recharge_controller::class, 'recharge_success']) -> name('show_recharge_success');
        });

        // withdraw
        Route::group(['prefix' => 'withdraw'], function(){
            Route::get('/new', [frontend_admin_withdraw_controller::class, 'withdraw_new']) -> name('show_withdraw_new');
            Route::get('/success', [frontend_admin_withdraw_controller::class, 'withdraw_success']) -> name('show_withdraw_success');
        });

        // payment
        Route::group(['prefix' => 'payment'], function(){
            Route::get('/', [frontend_admin_payment_controller::class, 'payment']) -> name('show_payment');
        });
        // contact
        Route::group(['prefix' => 'contact'], function(){
            Route::get('/', [frontend_admin_contact_controller::class, 'contact']) -> name('show_contact');
        });
        // tools
        Route::group(['prefix' => 'tools'], function(){
            Route::get('/dynamic_package', [frontend_admin_tools_controller::class, 'dynamic_package']) -> name('show_dynamic_package');
            Route::get('/dynamic_package_add', [frontend_admin_tools_controller::class, 'dynamic_package_add']) -> name('show_dynamic_package_add');
            Route::get('/dynamic_package_update/{id}', [frontend_admin_tools_controller::class, 'dynamic_package_update']) -> name('show_dynamic_package_update');
            // ads
            Route::group(['prefix' => 'ads'], function(){
                Route::get('/tools_ads_show', [frontend_admin_tools_controller::class, 'tools_ads_show']) -> name('show_tools_ads_show');
                Route::get('/tools_ads_add', [frontend_admin_tools_controller::class, 'tools_ads_add']) -> name('show_tools_ads_add');
                Route::get('/tools_ads_update/{id}', [frontend_admin_tools_controller::class, 'tools_ads_update']) -> name('show_tools_ads_update');
            });
        });
        // settings
        Route::group(['prefix' => 'settings'], function(){
            Route::get('/', [frontend_admin_settings_controller::class, 'settings']) -> name('show_settings');
        });

    });
});

// cmd
Route::get('cmd', function(){
    \Artisan::call('optimize');
    dd('Done');
});
// php artisan make:controller frontend/admin/frontend_admin_settings_controller
