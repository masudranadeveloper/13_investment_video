<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_recharge;
use App\Models\notification_urw;

class backend_withdraw_controller extends Controller
{
    // withdraw_insert
    public function withdraw_insert(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        // is deposit ?
        $isdeposit = user_recharge::where('userID', $userData['id'])
        -> where('st', 'success')
        -> count();
        $iswithdrawPending = user_withdraw::where('userID', $userData['id'])
        -> where('st', 'pending')
        -> count();
        // check min & max withdrdaw
        if($data['method'] == "USDT"){
            $withdraw_amount = $data['amount'];
        }else{
            $withdraw_amount = $data['amount']/$adminData['dollar_rate'];
        }

        if(intval($withdraw_amount) >= intval($adminData['minDeposit'])){
            if($data['password'] == $userData['password']){
                if(intval($userData['totalAmount']) >= $withdraw_amount){
                    if($iswithdrawPending < 1){
                        $nextWithdraw_dif = intval($userData['nextWithdraw']) - time();
                        if($nextWithdraw_dif < 1){
                            if($adminData['withdrawWithOutDeposi'] == "no"){
                                if($isdeposit > 0){
                                    user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                                        'totalAmount' => $userData['totalAmount'] - $withdraw_amount,
                                        'todaysAmount' => $userData['todaysAmount'] - $withdraw_amount,
                                        'nextWithdraw' => time()+$adminData['nextWIthdraw'],
                                    ]);

                                    $db = new user_withdraw;
                                    $db -> amount = $data['amount'];
                                    $db -> userID = $userData['id'];
                                    $db -> OrderID = time();
                                    $db -> Method = $data['method'];
                                    $db -> Address = $data['address'];
                                    $db -> Tax = $data['tax'];
                                    $db -> st = 'pending';
                                    $db -> save();

                                    // recharge data
                                    $withdraw_data = user_withdraw::where('OrderID', time()) -> first();
                                    // data insert
                                    $db = new notification_urw;
                                    $db -> userID = $userData['id'];
                                    $db -> documentID = $withdraw_data['id'];
                                    $db -> type = 'withdraw';
                                    $db -> save();

                                    // admin
                                    $adminData = admin_account::where('id', 1) -> first();
                                    admin_account::where('id', 1) -> update([
                                        "notification" => $adminData['notification'] + 1
                                    ]);

                                    return response()->json(['st' => true]);
                                }else{
                                    return response()->json(['st' => false, 'password' => "Recharge ".$adminData['minWithdraw']."$ for withdraw!"]);
                                }
                            }else{
                                $db = new user_withdraw;
                                $db -> amount = $data['amount'];
                                $db -> userID = $userData['id'];
                                $db -> OrderID = time();
                                $db -> Method = $data['method'];
                                $db -> Address = $data['address'];
                                $db -> Tax = $data['tax'];
                                $db -> st = 'pending';
                                $db -> save();

                                // recharge data
                                $withdraw_data = user_withdraw::where('OrderID', time()) -> first();
                                // data insert
                                $db = new notification_urw;
                                $db -> userID = $userData['id'];
                                $db -> documentID = $withdraw_data['id'];
                                $db -> type = 'withdraw';
                                $db -> save();

                                // admin
                                $adminData = admin_account::where('id', 1) -> first();
                                admin_account::where('id', 1) -> update([
                                    "notification" => $adminData['notification'] + 1
                                ]);

                                return response()->json(['st' => true]);
                            }
                        }else{
                            $secound_difarence = $userData['nextWithdraw']-time();
                            $dayleft = ($secound_difarence/60)/24;
                            return response()->json(['st' => false, 'password' => "Your next withdraw ".$dayleft." days later!"]);
                        }
                    }else{
                        return response()->json(['st' => false, 'password' => "Your request is alredy in pending!"]);
                    }
                }else{
                    return response()->json(['st' => false, 'password' => "Your account amount is less then ".$data['amount']."$ !"]);
                }
            }else{
                return response()->json(['st' => false, 'password' => "Your password doesn't match!"]);
            }
        }else{
            return response()->json(['st' => false, 'password' => "Min-withdraw ".$adminData['minWithdraw']."$ / ".$adminData['minWithdraw']*$adminData['dollar_rate']."tk !".$min_deposit." w a".$withdraw_amount]);
        }
    }
}
