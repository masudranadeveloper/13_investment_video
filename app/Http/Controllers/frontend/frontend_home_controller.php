<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
use App\Models\admin_account;
use App\Models\user_withdraw;
use App\Models\user_recharge;
use App\Models\recent_login;

class frontend_home_controller extends Controller
{
    public function home_show(Request $req)
    {
        $admin_data = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('id', 'ASC') -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();
        // withdraw history
        $withdrawalsPendingUSDT = user_withdraw::where('userID', $userData['id'])
        -> where('Method', 'USDT')
        -> where('st', 'pending')
        -> sum('amount');
        $withdrawalsPendingTK = user_withdraw::where('userID', $userData['id'])
        -> where('Method', '!=', 'USDT')
        -> where('st', 'pending')
        -> sum('amount');
        $total_pend_with = $withdrawalsPendingUSDT+($withdrawalsPendingTK/$admin_data['dollar_rate']);

        $withdrawalssuccessUSDT = user_withdraw::where('userID', $userData['id'])
        -> where('Method', 'USDT')
        -> where('st', 'success')
        -> sum('amount');
        $withdrawalssuccessTK = user_withdraw::where('userID', $userData['id'])
        -> where('Method', '!=', 'USDT')
        -> where('st', 'success')
        -> sum('amount');
        $total_success_with = $withdrawalssuccessUSDT+($withdrawalssuccessTK/$admin_data['dollar_rate']);

        // recharge history
        $recharge_PendingUSDT = user_recharge::where('userID', $userData['id'])
        -> where('method', 'USDT')
        -> where('st', 'pending')
        -> sum('amount');
        $recharge_PendingTK = user_recharge::where('userID', $userData['id'])
        -> where('method', '!=', 'USDT')
        -> where('st', 'pending')
        -> sum('amount');
        $total_pend_recharge = $recharge_PendingUSDT+($recharge_PendingTK/$admin_data['dollar_rate']);

        $recharge_successUSDT = user_recharge::where('userID', $userData['id'])
        -> where('method', 'USDT')
        -> where('st', 'success')
        -> sum('amount');
        $recharge_successTK = user_recharge::where('userID', $userData['id'])
        -> where('method', '!=', 'USDT')
        -> where('st', 'success')
        -> sum('amount');
        $total_success_recharge = $recharge_successUSDT+($recharge_successTK/$admin_data['dollar_rate']);
        // recent login
        $recent_login = recent_login::where('userID', $userData['id']) -> orderBy('id', 'DESC') -> paginate(5);
        // recharge
        $recent_recharge = user_recharge::where('userID', $userData['id']) -> orderBy('id', 'DESC') -> paginate(5);

        if($userData['refreshDay'] < time()){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "todaysAmount" => $userData['totalAmount'],
                "task" => $package_data['task'],
                "package_name" => $package_data['package_name'],
                "todayIncome" => 00,
                "easterdayIncome" => $userData['todayIncome'],
                "todayRaferIncome" => 00,
                "todaysRechargeIncome" => 00,
                "totalRechargeCommission" => $userData['totalRechargeCommission'] + $userData['todaysRechargeIncome'],
                "totalGenCommission" => $userData['totalGenCommission'] + $userData['todayRaferIncome'],
                "refreshDay" => strtotime(date('d M Y')." 11:59:59pm"),
            ]);
        }

        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "package_name" => $package_data['package_name'],
        ]);

        $compact = compact('userData', 'admin_data', 'recent_recharge', 'userData', 'total_pend_with', 'recent_login', 'total_success_with', 'total_success_recharge', 'total_pend_recharge');
        return view('users.pages.home.index') -> with($compact);
    }

}
