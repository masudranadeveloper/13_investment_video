<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_account;
use App\Models\notification_urw;
use App\Models\admin_account;

class backend_deposit_controller extends Controller
{
    public function deposit_insert(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        // picture
        $pic = $req -> file('img');
        $pic_name = time().$pic -> getClientOriginalName();
        $pic -> move('images/deposit', $pic_name);

        $data = $req -> all();
        $db = new user_recharge;
        $db -> img = $pic_name;
        $db -> amount = $data['amount'];
        $db -> userID = $userData['id'];
        $db -> orderID = time();
        $db -> method = $data['method'];
        $db -> tranx = $data['tranx'];
        $db -> st = 'pending';
        $db -> save();

        // recharge data
        $rechargeData = user_recharge::where('orderID', time()) -> first();
        // data insert
        $db = new notification_urw;
        $db -> userID = $userData['id'];
        $db -> documentID = $rechargeData['id'];
        $db -> type = 'recharge';
        $db -> save();

        // admin
        $adminData = admin_account::where('id', 1) -> first();
        admin_account::where('id', 1) -> update([
            "notification" => $adminData['notification'] + 1
        ]);
        return redirect(route('success_show', '?msg=Your recharge request successfully done!'));
    }
}
