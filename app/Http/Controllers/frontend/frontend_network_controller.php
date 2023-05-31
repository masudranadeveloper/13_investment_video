<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;

class frontend_network_controller extends Controller
{
    // 1stgen
    public function gen1st(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $genData = user_account::where('gen1st', $userData['invite']) -> orderBy('id', 'DESC') -> paginate(10);
        $genDataCount = user_account::where('gen1st', $userData['invite']) -> count();
        $compact = compact('genData', 'genDataCount');
        return view('users.pages.network.refer_team') -> with($compact);
    }

    // gen2nd
    public function gen2nd(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $genData = user_account::where('gen2nd', $userData['invite']) -> orderBy('id', 'DESC') -> paginate(10);
        $genDataCount = user_account::where('gen2nd', $userData['invite']) -> count();
        $compact = compact('genData', 'genDataCount');
        return view('users.pages.network.refer_team') -> with($compact);
    }

    // gen3rd
    public function gen3rd(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $genData = user_account::where('gen3rd', $userData['invite']) -> orderBy('id', 'DESC') -> paginate(10);
        $genDataCount = user_account::where('gen3rd', $userData['invite']) -> count();
        $compact = compact('genData', 'genDataCount');
        return view('users.pages.network.refer_team') -> with($compact);
    }

    // gen4th
    public function gen4th(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $genData = user_account::where('gen4th', $userData['invite']) -> orderBy('id', 'DESC') -> paginate(10);
        $genDataCount = user_account::where('gen4th', $userData['invite']) -> count();
        $compact = compact('genData', 'genDataCount');
        return view('users.pages.network.refer_team') -> with($compact);
    }

    // gen5th
    public function gen5th(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $genData = user_account::where('gen4th', $userData['invite']) -> orderBy('id', 'DESC') -> paginate(10);
        $genDataCount = user_account::where('gen4th', $userData['invite']) -> count();
        $compact = compact('genData', 'genDataCount');
        return view('users.pages.network.refer_team') -> with($compact);
    }
}
