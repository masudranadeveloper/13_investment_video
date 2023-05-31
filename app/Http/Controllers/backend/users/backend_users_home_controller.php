<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;

class backend_users_home_controller extends Controller
{
    // get_data_search_username
    public function get_data_search_username(Request $req)
    {
        $data = $req -> all();
        $userData = user_account::where('userName', 'LIKE', '%'.$data['val'].'%') -> get();
        $userDataCount = user_account::where('userName', 'LIKE', '%'.$data['val'].'%') -> count();
        if($userDataCount > 0){
            return response()->json(['st' => true, 'data' => $userData]);
        }else{
            return response()->json(['st' => false]);
        }
    }

    // ofline  & ofline
    public function online_or_ofline(Request $req)
    {
        date_default_timezone_set('Asia/Dhaka');
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "online_time" => time()+20,
        ]);
    }

    // online_or_ofline_st
    public function online_or_ofline_st(Request $req)
    {
        $data = $req -> all();

        date_default_timezone_set('Asia/Dhaka');
        $userData = user_account::where('id', $data['id']) -> first();
        if($userData['online_time'] > time()){
            $st = "online";
        }else{
            $st = "offline";
        }
        return response()->json(['st' => $st]);
    }
    // get_user_data
    public function get_user_data(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        return response()->json(['data' => $userData]);
    }
}
