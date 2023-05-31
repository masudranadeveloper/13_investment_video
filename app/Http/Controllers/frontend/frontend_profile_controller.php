<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;

class frontend_profile_controller extends Controller
{
    // profile_show
    public function profile_show(Request $req, $id)
    {
        $userData = user_account::findOrFail($id);

        // 1st gen users
        $ge1strecentusers = user_account::where('gen1st', $userData['invite']) -> paginate(5);
        $ge1strecentusers_amount = user_account::where('gen1st', $userData['invite']) -> sum('totalAmount');
        $ge1strecentusers_withdraw = user_account::where('gen1st', $userData['invite']) -> sum('totalWithdraw');
        $ge1strecentusers_deposit = user_account::where('gen1st', $userData['invite']) -> sum('totalDeposit');
        // 2nd gen
        $ge2ndrecentusers_amount = user_account::where('gen2nd', $userData['invite']) -> sum('totalAmount');
        $ge2ndrecentusers_withdraw = user_account::where('gen2nd', $userData['invite']) -> sum('totalWithdraw');
        $ge2ndrecentusers_deposit = user_account::where('gen2nd', $userData['invite']) -> sum('totalDeposit');

        // ganaration
        $gen1st = user_account::orderBy('id', 'DESC') -> where('gen1st', $userData['invite']) -> first();
        if(user_account::where('gen1st', $userData['invite']) -> exists()){
            $gen1st_pic = $gen1st['picture'];
        }else{
            $gen1st_pic = "userpicture.png";
        }

        $gen2nd = user_account::orderBy('id', 'DESC') -> where('gen2nd', $userData['invite']) -> first();
        if(user_account::where('gen2nd', $userData['invite']) -> exists()){
            $gen2nd_pic = $gen2nd['picture'];
        }else{
            $gen2nd_pic = "userpicture.png";
        }

        $gen3rd = user_account::orderBy('id', 'DESC') -> where('gen3rd', $userData['invite']) -> first();
        if(user_account::where('gen3rd', $userData['invite']) -> exists()){
            $gen3rd_pic = $gen3rd['picture'];
        }else{
            $gen3rd_pic = "userpicture.png";
        }

        $gen4th = user_account::orderBy('id', 'DESC') -> where('gen4th', $userData['invite']) -> first();
        if(user_account::where('gen4th', $userData['invite']) -> exists()){
            $gen4th_pic = $gen4th['picture'];
        }else{
            $gen4th_pic = "userpicture.png";
        }

        $gen5th = user_account::orderBy('id', 'DESC') -> where('gen5th', $userData['invite']) -> first();
        if(user_account::where('gen5th', $userData['invite']) -> exists()){
            $gen5th_pic = $gen5th['picture'];
        }else{
            $gen5th_pic = "userpicture.png";
        }

        $compact = compact(
            'userData',
            "gen1st_pic",
            "gen2nd_pic",
            "gen3rd_pic",
            "gen4th_pic",
            "gen5th_pic",
            "ge1strecentusers",
            "ge1strecentusers_amount",
            "ge1strecentusers_withdraw",
            "ge1strecentusers_deposit",
            "ge2ndrecentusers_amount",
            "ge2ndrecentusers_withdraw",
            "ge2ndrecentusers_deposit"
        );
        return view('users.pages.profile.index') -> with($compact);
    }
}
