<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\recent_login;
use App\Models\admin_account;
use App\Models\notification_urw;
use Hash;

class backend_account_controller extends Controller
{
    // check username
    public function check_username(Request $req)
    {
        $data = $req -> all();
        $count = user_account::where('userName', $data['userName']) -> count();
        if($count < 1 ){
            return response()->json(['st' => true]);
        }else{
            return response()->json(['st' => false]);
        }
    }
    // check_mobile_number
    public function check_mobile_number(Request $req)
    {
        $data = $req -> all();
        $count = user_account::where('mobileNumber', $data['mobileNumber']) -> count();
        if($count < 1 ){
            return response()->json(['st' => true]);
        }else{
            return response()->json(['st' => false]);
        }
    }
    // check_email
    public function check_email(Request $req)
    {
        $data = $req -> all();
        $count = user_account::where('email', $data['email']) -> count();
        if($count < 1 ){
            return response()->json(['st' => true]);
        }else{
            return response()->json(['st' => false]);
        }
    }

    // check_invitation_code
    public function check_invitation_code(Request $req)
    {
        $data = $req -> all();
        $count = user_account::where('invite', $data['invite']) -> count();
        if($count < 1 ){
            return response()->json(['st' => false]);
        }else{
            return response()->json(['st' => true]);
        }
    }

    //signup
    public function signup(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $data = $req -> all();
        // =========with invitation code=========
        if(!empty($data['invitor'])){
            // find user
            $invitorData = user_account::where('invite', $data['invitor']) -> first();

            $csrf = Hash::make(time().$data['mobileNumber']);
            $db = new user_account;
            $db -> fName = $data['fName'];
            $db -> lName = $data['lName'];
            $db -> userName = $data['userName'];
            $db -> mobileNumber = $data['mobileNumber'];
            $db -> email = $data['email'];
            $db -> password = $data['password'];
            $db -> invite = time();
            $db -> totalAmount = $adminData['offer_balance'];
            // invitor st

            // 1st gen
            $db -> gen1st = $data['invitor'];
            // 2nd gen
            $db -> gen2nd = $invitorData['gen1st'];
            // 3rd gen
            $db -> gen3rd = $invitorData['gen2nd'];
            // 4th gen
            $db -> gen4th = $invitorData['gen3rd'];
            // 5th gen
            $db -> gen5th = $invitorData['gen4th'];

            // invitor end
            $db -> csrf = $csrf;
            $db -> save();

            $req -> session() -> put('csrf', $csrf);
            return response()->json(['st' => true]);
        }
        // =========with out invitation code=========
        else{
            $csrf = Hash::make(time().$data['mobileNumber']);

            $db = new user_account;
            $db -> fName = $data['fName'];
            $db -> lName = $data['lName'];
            $db -> userName = $data['userName'];
            $db -> mobileNumber = $data['mobileNumber'];
            $db -> email = $data['email'];
            $db -> password = $data['password'];
            $db -> invite = time();
            $db -> csrf = $csrf;
            $db -> totalAmount = $adminData['offer_balance'];
            if($db -> save()){
                $userdata_get = user_account::where('userName', $data['userName']) -> first();
                // data insert
                $db = new notification_urw;
                $db -> userID = $userdata_get['id'];
                $db -> documentID = 'none';
                $db -> type = 'account';
                $db -> save();
                // admin
                $adminData = admin_account::where('id', 1) -> first();
                admin_account::where('id', 1) -> update([
                    "notification" => $adminData['notification'] + 1
                ]);

                $req -> session() -> put('csrf', $csrf);
                return response()->json(['st' => true]);
            }

        }
    }
    // login
    public function login(Request $req)
    {
        $data = $req -> all();
        $userNameCpont = user_account::where('userName', $data['userName']) -> count();
        if($userNameCpont > 0){
            $userData = user_account::where('userName', $data['userName']) -> where('password', $data['password']) -> first();
            $userDataCount = user_account::where('userName', $data['userName']) -> where('password', $data['password']) -> count();
            if($userDataCount > 0){
                // insert
                $db = new recent_login;
                $db -> ip = $data['ip'];
                $db -> city = $data['city'];
                $db -> region = $data['region'];
                $db -> country = $data['country'];
                $db -> postal = $data['postal'];
                $db -> userID = $userData['id'];
                $db -> save();

                $csrf = Hash::make(time().$data['userName']);
                $req -> session() -> put('csrf', $csrf);
                user_account::where('id', $userData['id']) -> update(['csrf' =>  $csrf]);
                return response()->json(['st' => true]);
            }else{
                return response()->json(['st' => false, 'password' => "You password couldn't match!"]);
            }
        }else{
            return response()->json(['st' => false, 'username' => "You username couldn't match!"]);
        }
    }
}
