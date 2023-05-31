<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_logout_controller extends Controller
{
    public function logout(Request $req)
    {
        $req -> session() -> forget('csrf');
        return back();
    }
}
