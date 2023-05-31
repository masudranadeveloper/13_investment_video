<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_success_controller extends Controller
{
    public function success_show(Request $req)
    {
        $data = $req -> all();
        $compact = compact('data');
        return view('users.pages.success.index') -> with($compact);
    }
}
