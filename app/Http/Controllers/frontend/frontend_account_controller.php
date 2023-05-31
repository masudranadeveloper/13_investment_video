<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_account_controller extends Controller
{
    public function account_show()
    {
        // redirect
        if(url("") == "http://maximumgrowths.com"){
            return redirect('https://maximumgrowths.com');
        }
        return view('users.pages.account.account');
    }
}
