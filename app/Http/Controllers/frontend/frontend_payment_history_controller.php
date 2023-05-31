<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_withdraw;
use App\Models\user_account;

class frontend_payment_history_controller extends Controller
{
    // recharge_history_pending
    public function recharge_history_pending(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_recharge::where('userID', $userData['id']) -> where('st', 'pending') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_recharge::where('userID', $userData['id']) -> where('st', 'pending') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="refresh-circle-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.recharge') -> with($compact);
    }

    // recharge_history_success
    public function recharge_history_success(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_recharge::where('userID', $userData['id']) -> where('st', 'success') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_recharge::where('userID', $userData['id']) -> where('st', 'success') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="checkmark-done-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.recharge') -> with($compact);
    }

    // recharge_history_rejected
    public function recharge_history_rejected(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_recharge::where('userID', $userData['id']) -> where('st', 'rejected') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_recharge::where('userID', $userData['id']) -> where('st', 'rejected') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="trash-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.recharge') -> with($compact);
    }
    /*
    |----------
    |Withdraw
    |----------
    */
    // withdraw_history_pending
    public function withdraw_history_pending(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_withdraw::where('userID', $userData['id']) -> where('st', 'pending') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_withdraw::where('userID', $userData['id']) -> where('st', 'pending') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="refresh-circle-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.withdraw') -> with($compact);
    }

    // withdraw_history_success
    public function withdraw_history_success(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_withdraw::where('userID', $userData['id']) -> where('st', 'success') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_withdraw::where('userID', $userData['id']) -> where('st', 'success') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="checkmark-done-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.withdraw') -> with($compact);
    }

    // withdraw_history_rejected
    public function withdraw_history_rejected(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $historyData = user_withdraw::where('userID', $userData['id']) -> where('st', 'rejected') -> orderBy('id', 'DESC') -> paginate(10);
        $historyDataCount = user_withdraw::where('userID', $userData['id']) -> where('st', 'rejected') -> orderBy('id', 'DESC') -> count();
        $icon = '<ion-icon class="main-header" name="trash-outline"></ion-icon>';
        $compact = compact('historyData', 'historyDataCount', 'icon');
        return view('users.pages.history.withdraw') -> with($compact);
    }
}
