<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;

class frontend_admin_withdraw_controller extends Controller
{
    // withdraw_new
    public function withdraw_new(Request $req)
    {
        $user_account = user_withdraw::orderBy('id', 'DESC')-> where('st', 'pending') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.withdraw.new') -> with($compact);
    }

    // withdraw_success
    public function withdraw_success(Request $req)
    {
        $user_account = user_withdraw::orderBy('id', 'DESC')-> where('st', 'success') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.withdraw.success') -> with($compact);
    }
}
