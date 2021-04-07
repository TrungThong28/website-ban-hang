<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Neu user da nhap thanh cong
        if (Auth::check()) {
            $user = Auth::user();
                if ($user->admin_id == 1 || 2 && $user->is_active == 1) {
                    return $next($request);
                }
                
        } else {
                return redirect()->route('dang-nhap');
            }
                return redirect()->route('dang-nhap');
    }
}
