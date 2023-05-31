<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;

class frontend_admin_recharge_controller extends Controller
{
    // recharge_new
    public function recharge_new(Request $req)
    {
        $user_account = user_recharge::orderBy('id', 'DESC')-> where('st', 'pending') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.recharge.new') -> with($compact);
    }

    // recharge_success
    public function recharge_success(Request $req)
    {
        $user_account = user_recharge::orderBy('id', 'DESC')-> where('st', 'success') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.recharge.success') -> with($compact);
    }
}
