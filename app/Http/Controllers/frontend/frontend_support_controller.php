<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_support_controller extends Controller
{
    // support_show
    public function support_show()
    {
        return view('users.pages.support.index');
    }
    // support_summary
    public function support_summary()
    {
        return view('users.pages.support.summary');
    }
}
