<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_report_controller extends Controller
{
    // activity_today
    public function activity_today()
    {
        return view('users.pages.activity.today');
    }

    // activity_weekly
    public function activity_weekly()
    {
        return view('users.pages.activity.weekly');
    }

    // activity_monthly
    public function activity_monthly()
    {
        return view('users.pages.activity.monthly');
    }

    // activity_total
    public function activity_total()
    {
        return view('users.pages.activity.total');
    }
}
