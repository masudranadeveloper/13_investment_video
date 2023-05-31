<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontend_rank_controller extends Controller
{
    // rank_show
    public function rank_show()
    {
        return view('users.pages.rank.index');
    }
}
