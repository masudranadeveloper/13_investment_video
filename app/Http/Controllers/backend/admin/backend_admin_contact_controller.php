<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin_account;

class backend_admin_contact_controller extends Controller
{
    // contact_telegram
    public function contact_telegram(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1)->update([
            "teligram_link" => $data['teligram_link'],
        ]);
        return back()->with('msg', 'Telegram link successfully update!');
    }
}
