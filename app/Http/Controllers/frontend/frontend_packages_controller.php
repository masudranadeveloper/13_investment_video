<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\admin_account;
use App\Models\user_account;

class frontend_packages_controller extends Controller
{
    // package_show
    public function package_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $db_data = user_package::orderBy('id', 'ASC') -> get();
        $db_data_count = user_package::orderBy('id', 'ASC') -> count();
        $admin_data = admin_account::where('id', 1) -> first();

        $compact = compact('db_data', 'db_data_count', 'admin_data', 'userData');
        return view('users.pages.pakeges.index') -> with($compact);
    }

    // buy_package
    public function buy_package(Request $req, $method, $amount)
    {
        $admin_data = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();

        if($amount >= $admin_data['minDeposit'] && $amount <= $admin_data['maxDeposit'] ){
            if($method == "1"){
                $dollar_price = $admin_data['dollar_rate'];
            }else if($method == "2"){
                $dollar_price = $admin_data['dollar_rate'];
            }else if($method == "3"){
                $dollar_price = $admin_data['dollar_rate'];
            }else{
                $dollar_price = 1;
            }
            $data = $req -> all();
            $compact = compact('data', 'amount', 'admin_data', 'dollar_price', 'method', 'userData');
            return view('users.pages.pakeges.buy') -> with($compact);
        }else{
            return redirect(route('home_show'));
        }
    }
}
