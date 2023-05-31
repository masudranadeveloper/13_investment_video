<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_package;

class backend_admin_diposit_controller extends Controller
{
    // deposit_success
    public function deposit_success($id)
    {
        $rechargeData = user_recharge::findOrfail($id);
        $userData = user_account::findOrfail($rechargeData['userID']);
        $adminData = admin_account::where('id', 1)->first();

        // update amount
        if($rechargeData['method'] == "USDT"){
            $r_amount = $rechargeData['amount'];
        }else{
            $r_amount = $rechargeData['amount']/$adminData['dollar_rate'];
        }

        admin_account::where('id', 1)->update([
            "todaysRecharge" => $adminData['todaysRecharge'] + $r_amount
        ]);

        $package_data = user_package::orderBy('minAmount', 'DESC') -> where('minAmount', '<=', intval($userData['totalAmount'] + $r_amount)) -> first();
        // rechargeData update
        user_recharge::where('id', $id) -> update([
            "st" => "success"
        ]);

        // update pakages
        if($userData['task'] > 0){
            user_account::where('id', $rechargeData['userID']) -> update([
                "task" => $package_data['task'],
                "package_name" => $package_data['package_name'],
            ]);
        }

        user_account::where('id', $rechargeData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] + $r_amount,
            'todaysAmount' => $userData['todaysAmount'] + $r_amount,
        ]);
        // gen1st_commission
        if(!empty($userData['gen1st'])){
            $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
            $gen1st_commission = ($r_amount/100)*$adminData['depositGen1st'];

            user_account::where('invite', $userData['gen1st']) -> update([
                'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                'todayIncome' => $userData_gen1st['todayIncome'] + $gen1st_commission,
                'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] + $gen1st_commission,
            ]);
        }

        // gen2nd_commission
        if(!empty($userData['gen2nd'])){
            $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
            $gen2nd_commission = ($r_amount/100)*$adminData['depositGen2nd'];

            user_account::where('invite', $userData['gen2nd']) -> update([
                'totalAmount' => $userData_gen2nd['totalAmount'] + $gen2nd_commission,
                'todayIncome' => $userData_gen2nd['todayIncome'] + $gen2nd_commission,
                'todayRaferIncome' => $userData_gen2nd['todayRaferIncome'] + $gen2nd_commission,
            ]);
        }

        // gen3rd_commission
        if(!empty($userData['gen3rd'])){
            $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
            $gen3rd_commission = ($r_amount/100)*$adminData['depositGen3rd'];

            user_account::where('invite', $userData['gen3rd']) -> update([
                'totalAmount' => $userData_gen3rd['totalAmount'] + $gen3rd_commission,
                'todayIncome' => $userData_gen3rd['todayIncome'] + $gen3rd_commission,
                'todayRaferIncome' => $userData_gen3rd['todayRaferIncome'] + $gen3rd_commission,
            ]);
        }

        // gen4th_commission
        if(!empty($userData['gen4th'])){
            $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
            $gen4th_commission = ($r_amount/100)*$adminData['depositGen4th'];

            user_account::where('invite', $userData['gen4th']) -> update([
                'totalAmount' => $userData_gen4th['totalAmount'] + $gen4th_commission,
                'todayIncome' => $userData_gen4th['todayIncome'] + $gen4th_commission,
                'todayRaferIncome' => $userData_gen4th['todayRaferIncome'] + $gen4th_commission,
            ]);
        }

        // gen5th_commission
        if(!empty($userData['gen5th'])){
            $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
            $gen5th_commission = ($r_amount/100)*$adminData['depositGen5th'];

            user_account::where('invite', $userData['gen5th']) -> update([
                'totalAmount' => $userData_gen5th['totalAmount'] + $gen5th_commission,
                'todayIncome' => $userData_gen5th['todayIncome'] + $gen5th_commission,
                'todayRaferIncome' => $userData_gen5th['todayRaferIncome'] + $gen5th_commission,
            ]);
        }
        return back() -> with('msg', 'Deposit Request successfully accepted!');
    }

    // deposit_undo
    public function deposit_undo($id)
    {
        $rechargeData = user_recharge::findOrfail($id);
        $userData = user_account::findOrfail($rechargeData['userID']);
        $adminData = admin_account::where('id', 1)->first();
         // update amount
        if($rechargeData['method'] == "USDT"){
            $r_amount = $rechargeData['amount'];
        }else{
            $r_amount = $rechargeData['amount']/$adminData['dollar_rate'];
        }
        $package_data = user_package::orderBy('minAmount', 'DESC') -> where('minAmount', '<=', intval($userData['totalAmount'] + $r_amount)) -> first();
        // rechargeData update
        user_recharge::where('id', $id) -> update([
            "st" => "pending"
        ]);

        // update amount
        user_account::where('id', $rechargeData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] - $r_amount,
            'todaysAmount' => $userData['todaysAmount'] - $r_amount,
        ]);

        // gen1st_commission
        if(!empty($userData['gen1st'])){
            $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
            $gen1st_commission = ($r_amount/100)*$adminData['depositGen1st'];

            user_account::where('invite', $userData['gen1st']) -> update([
                'totalAmount' => $userData_gen1st['totalAmount'] - $gen1st_commission,
                'todayIncome' => $userData_gen1st['todayIncome'] - $gen1st_commission,
                'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] - $gen1st_commission,
            ]);
        }

        // gen2nd_commission
        if(!empty($userData['gen2nd'])){
            $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
            $gen2nd_commission = ($r_amount/100)*$adminData['depositGen2nd'];

            user_account::where('invite', $userData['gen2nd']) -> update([
                'totalAmount' => $userData_gen2nd['totalAmount'] - $gen2nd_commission,
                'todayIncome' => $userData_gen2nd['todayIncome'] - $gen2nd_commission,
                'todayRaferIncome' => $userData_gen2nd['todayRaferIncome'] - $gen2nd_commission,
            ]);
        }

        // gen3rd_commission
        if(!empty($userData['gen3rd'])){
            $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
            $gen3rd_commission = ($r_amount/100)*$adminData['depositGen3rd'];

            user_account::where('invite', $userData['gen3rd']) -> update([
                'totalAmount' => $userData_gen3rd['totalAmount'] - $gen3rd_commission,
                'todayIncome' => $userData_gen3rd['todayIncome'] - $gen3rd_commission,
                'todayRaferIncome' => $userData_gen3rd['todayRaferIncome'] - $gen3rd_commission,
            ]);
        }

        // gen4th_commission
        if(!empty($userData['gen4th'])){
            $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
            $gen4th_commission = ($r_amount/100)*$adminData['depositGen4th'];

            user_account::where('invite', $userData['gen4th']) -> update([
                'totalAmount' => $userData_gen4th['totalAmount'] - $gen4th_commission,
                'todayIncome' => $userData_gen4th['todayIncome'] - $gen4th_commission,
                'todayRaferIncome' => $userData_gen4th['todayRaferIncome'] - $gen4th_commission,
            ]);
        }

        // gen5th_commission
        if(!empty($userData['gen5th'])){
            $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
            $gen5th_commission = ($r_amount/100)*$adminData['depositGen5th'];

            user_account::where('invite', $userData['gen5th']) -> update([
                'totalAmount' => $userData_gen5th['totalAmount'] - $gen5th_commission,
                'todayIncome' => $userData_gen5th['todayIncome'] - $gen5th_commission,
                'todayRaferIncome' => $userData_gen5th['todayRaferIncome'] - $gen5th_commission,
            ]);
        }
        return back() -> with('msg', 'Deposit Request successfully undo!');
    }

    // deposit_rejected
    public function deposit_rejected($id)
    {
        user_recharge::where('id', $id) -> update([
            "st" => "rejected"
        ]);
        return back() -> with('msg', 'Deposit Request successfully deleted!');
    }

    // deposit_rejected_undo
    public function deposit_rejected_undo($id)
    {
        user_recharge::where('id', $id) -> update([
            "st" => "pending"
        ]);
        return back() -> with('msg', 'Deposit Request successfully deleted!');
    }

}
