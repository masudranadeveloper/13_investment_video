<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;

class frontend_task_controller extends Controller
{
    public function task_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('id', 'ASC') -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();
        $package_data_first = user_package::orderBy('id', 'ASC') -> first();

        if($userData['refreshDay'] < time()){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "todaysAmount" => $userData['totalAmount'],
                "task" => $package_data['task'],
                "package_name" => $package_data['package_name'],
                "todayIncome" => 00,
                "easterdayIncome" => $userData['todayIncome'],
                "todaysRechargeIncome" => 00,
                "easterdayRaferIncome" => $userData['todayRaferIncome'],
                "refreshDay" => strtotime(date('d M Y')." 11:59:59pm"),
            ]);
        }
        $hours_left = intval((( $userData['refreshDay'] - time() )/60)/60);

        $compact = compact('userData', 'package_data', 'package_data_first', 'hours_left');
        return view('users.pages.task.index') -> with($compact);
    }

}
