<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_kyc_controller extends Controller
{
    public function kyc_show()
    {
        return view('users.pages.kyc.index');
    }
}
