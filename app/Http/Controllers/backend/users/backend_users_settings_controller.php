<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;

class backend_users_settings_controller extends Controller
{
    // setting_profile
    public function setting_profile(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();

        $pic = $req -> file('file');
        $pic_name = time().$pic -> getClientOriginalName();
        $pic -> move('images\users', $pic_name);
        // File::delete(public_path('images/users/'.$userData['picture']));
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "picture" => $pic_name,
        ]);
        return redirect(route('success_show', ['msg' => 'Your profile picture successfully updated!']));
    }
    // setting_address
    public function setting_address(Request $req)
    {
        $data = $req -> all();
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "street" => $data['street'],
            "city" => $data['city'],
            "state" => $data['state'],
            "postcode" => $data['postcode'],
            "mobileNumber" => $data['mobileNumber'],
            "country" => $data['country'],
        ]);
        return redirect(route('success_show', ['msg' => 'Your profile address successfully updated!']));
    }
    // setting_change_password
    public function setting_change_password(Request $req)
    {
        $data = $req -> all();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();

        if($data['o_pass'] == $userData['password']){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "password" => $data['n_pass'],
            ]);
            return response() -> json(['st' => true]);
        }else{
            return response() -> json(['st' => false, 'msg' => 'Wrong password!']);
        }

    }
}
