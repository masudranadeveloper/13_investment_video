<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;
use App\Models\user_account;

class frontend_withdraw_controller extends Controller
{
    // withdraw_show
    public function withdraw_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $db_data = admin_account::where('id', '1') -> first();
        $compact = compact('db_data', 'userData');
        return view('users.pages.withdraw.index')-> with($compact);
    }
}
