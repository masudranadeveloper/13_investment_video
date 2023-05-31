<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;
use App\Models\admin_account;

class backend_admin_withdraw_controller extends Controller
{
    // withdraw_success
    public function withdraw_success($id)
    {
        $adminData = admin_account::where('id', 1)->first();
        $withdraw_data = user_withdraw::where('id', $id) -> first();

        if($withdraw_data['Method'] == "USDT"){
            $r_amount = $withdraw_data['amount'];
        }else{
            $r_amount = $withdraw_data['amount']/$adminData['dollar_rate'];
        }

        admin_account::where('id', 1)->update([
            "todaysWithdraw" => $adminData['todaysWithdraw'] + $r_amount
        ]);

        user_withdraw::where('id', $id) -> update([
            "st" => "success"
        ]);
        return back() -> with('msg', 'Withdraw Request successfully done!');
    }

    // withdraw_undo
    public function withdraw_undo($id)
    {
        user_withdraw::where('id', $id) -> update([
            "st" => "pending"
        ]);
        return back() -> with('msg', 'Withdraw Request successfully done!');
    }
    // withdraw_rejected
    public function withdraw_rejected($id)
    {
        $adminData = admin_account::where('id', 1) -> first();
        $rechargeData = user_withdraw::where('id', $id) -> first();
        $userData = user_account::findOrFail($rechargeData['userID']);

        if($rechargeData['Method'] == "USDT"){
            $withdraw_amount = $rechargeData['amount'];
        }else{
            $withdraw_amount = $rechargeData['amount']/$adminData['dollar_rate'];
        }
        user_account::where('id', $rechargeData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] + $withdraw_amount,
            'todaysAmount' => $userData['todaysAmount'] + $withdraw_amount,
            'nextWithdraw' => '00',
        ]);
        user_withdraw::where('id', $id) -> update([
            "st" => "rejected"
        ]);
        return back() -> with('msg', 'Withdraw Request successfully rejected!');
    }
}
