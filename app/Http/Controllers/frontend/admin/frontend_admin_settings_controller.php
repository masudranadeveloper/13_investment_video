<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class frontend_admin_settings_controller extends Controller
{
    // settings
    public function settings(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('admin.pages.settings.index') -> with($compact);
    }
}
