<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
use App\Models\admin_account;
use App\Models\task_ads;

class backend_task_controller extends Controller
{
    // task_check
    public function task_check(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        if($userData['task'] > 0){
            return response()->json(['st' => true, 'user' => $userData]);
        }else{
            return response()->json(['st' => false]);
        }
    }

    // get_task_commission
    public function get_task_commission(Request $req)
    {
        $adminData = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('id', 'ASC') -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();
        if($userData['task'] > 0){
            // my_commission
            $my_commission = ($userData['todaysAmount']/100)*$package_data['commission'];
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                'totalAmount' => $userData['totalAmount'] + $my_commission,
                'todayIncome' => $userData['todayIncome'] + $my_commission,
                'task' => $userData['task'] - 1,
            ]);

            // gen1st_commission
            if(!empty($userData['gen1st'])){
                $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
                $gen1st_commission = ($my_commission/100)*$adminData['gen1st'];

                user_account::where('invite', $userData['gen1st']) -> update([
                    'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                    'todayIncome' => $userData_gen1st['todayIncome'] + $gen1st_commission,
                    'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] + $gen1st_commission,
                ]);
            }

            // gen2nd_commission
            if(!empty($userData['gen2nd'])){
                $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
                $gen2nd_commission = ($my_commission/100)*$adminData['gen2nd'];

                user_account::where('invite', $userData['gen2nd']) -> update([
                    'totalAmount' => $userData_gen2nd['totalAmount'] + $gen2nd_commission,
                    'todayIncome' => $userData_gen2nd['todayIncome'] + $gen2nd_commission,
                    'todayRaferIncome' => $userData_gen2nd['todayRaferIncome'] + $gen2nd_commission,
                ]);
            }

            // gen3rd_commission
            if(!empty($userData['gen3rd'])){
                $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
                $gen3rd_commission = ($my_commission/100)*$adminData['gen3rd'];

                user_account::where('invite', $userData['gen3rd']) -> update([
                    'totalAmount' => $userData_gen3rd['totalAmount'] + $gen3rd_commission,
                    'todayIncome' => $userData_gen3rd['todayIncome'] + $gen3rd_commission,
                    'todayRaferIncome' => $userData_gen3rd['todayRaferIncome'] + $gen3rd_commission,
                ]);
            }

            // gen4th_commission
            if(!empty($userData['gen4th'])){
                $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
                $gen4th_commission = ($my_commission/100)*$adminData['gen4th'];

                user_account::where('invite', $userData['gen4th']) -> update([
                    'totalAmount' => $userData_gen4th['totalAmount'] + $gen4th_commission,
                    'todayIncome' => $userData_gen4th['todayIncome'] + $gen4th_commission,
                    'todayRaferIncome' => $userData_gen4th['todayRaferIncome'] + $gen4th_commission,
                ]);
            }

            // gen5th_commission
            if(!empty($userData['gen5th'])){
                $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
                $gen5th_commission = ($my_commission/100)*$adminData['gen5th'];

                user_account::where('invite', $userData['gen5th']) -> update([
                    'totalAmount' => $userData_gen5th['totalAmount'] + $gen5th_commission,
                    'todayIncome' => $userData_gen5th['todayIncome'] + $gen5th_commission,
                    'todayRaferIncome' => $userData_gen5th['todayRaferIncome'] + $gen5th_commission,
                ]);
            }

            // response
            return response()->json(['st' => true, 'user' => $userData]);
        }else{
            return response()->json(['st' => false, 'msg' => 'No more works today!']);
        }
        // echo $package_data;
    }

    // get_task_ads
    public function get_task_ads(Request $req)
    {
        $data = task_ads::get();
        return response()->json(['data' => $data]);
    }

}
