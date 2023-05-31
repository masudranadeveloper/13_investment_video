<?php

namespace App\Http\Middleware\users;

use Closure;
use Illuminate\Http\Request;
use App\Models\user_account;

class users_middle_ware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userData = user_account::where('csrf', $request -> session() -> get('csrf')) -> count();
        
        if($userData > 0){
            return $next($request);
        }else{
            return redirect(route('account_show'));
        }
    }
}
