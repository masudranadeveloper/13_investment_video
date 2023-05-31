<?php

namespace App\Http\Controllers\frontEnd\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_recharge;
use App\Models\user_withdraw;
use App\Models\notification_urw;

class frontend_admin_deshbord_controller extends Controller
{

    public function admin_show()
    {


        // -----------------
        // table notification st
        $notification = notification_urw::orderBy('id', 'DESC') -> paginate(5);
        // table notification end
        // -----------------


        // admin data
        $adminData = admin_account::where('id', 1)->first();
        // recharge
        $pen_recharge = user_recharge::where('st', 'pending') -> count();
        $tot_recharge_usdt = user_recharge::where('st', 'success') -> where('method', 'USDT') -> sum('amount');
        $tot_recharge_bdt = user_recharge::where('st', 'success') -> where('method', '!=', 'USDT') -> sum('amount');
        $tot_recharge_bdt_cb = $tot_recharge_bdt/$adminData['dollar_rate'];

        // withdraw
        $pen_withdraw = user_withdraw::where('st', 'pending') -> count();
        $tot_withdraw_usdt = user_withdraw::where('st', 'success') -> where('Method', 'USDT') -> sum('amount');
        $tot_withdraw_bdt = user_withdraw::where('st', 'success') -> where('Method', '!=', 'USDT') -> sum('amount');
        $tot_withdrawbdt_cb = $tot_withdraw_bdt/$adminData['dollar_rate'];

        // user_account
        $user_account = user_account::orderBy('id', 'DESC')->paginate(10);
        // 24 h reset
        if($adminData['refreshday'] < time()){
            admin_account::where('id', 1)->update([
                "refreshday" => strtotime(date('d M Y').' 11:59:59'),

                "todaysRecharge" => "00",
                "todaysWithdraw" => "00",

                "yesterdayRecharge" => $adminData['todaysRecharge'],
                "yesterdayWithdraw" => $adminData['todaysWithdraw'],
            ]);
        }

        $compact = compact(
            'adminData',
            'user_account',

            'pen_recharge',
            'tot_recharge_usdt',
            'tot_recharge_bdt_cb',

            'pen_withdraw',
            'tot_withdraw_usdt',
            'tot_withdrawbdt_cb',
            // 'notification',
        );
        return view('admin.pages.deshbord.deshbord') -> with($compact);
    }
    // login_login
    public function login_login()
    {
        return view('admin.pages.account.account');
    }
}
