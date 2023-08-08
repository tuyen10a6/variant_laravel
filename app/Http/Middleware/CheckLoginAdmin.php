<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdmin
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->admin_level == 0) {
                return $next($request);
            }
            return redirect()->route('admin.login')->with('error', 'Thông tin đăng nhập không chính xác');
        }

        return redirect()->route('admin.login')->with('error', 'Thông tin đăng nhập không chính xác');

    }
}
