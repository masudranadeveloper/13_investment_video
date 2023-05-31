<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_recharge;
use App\Models\admin_account;

class frontend_setting_controller extends Controller
{
    // settings_show
    public function settings_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $admin_data = admin_account::where('id', 1) -> first();

        $recharge_successUSDT = user_recharge::where('userID', $userData['id'])
        -> where('method', 'USDT')
        -> where('st', 'success')
        -> sum('amount');
        $recharge_successTK = user_recharge::where('userID', $userData['id'])
        -> where('method', '!=', 'USDT')
        -> where('st', 'success')
        -> sum('amount');

        $total_success_recharge = $recharge_successUSDT+($recharge_successTK/$admin_data['dollar_rate']);


        $compact = compact(
            'userData',
            'total_success_recharge',
        );
        return view('users.pages.settings.index') -> with($compact);
    }
}
