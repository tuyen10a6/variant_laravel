<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
  public function login()
  {
       return view('admin.login.index');
  }


    /**
     * @param Request $request
     */
  public function checkLogin(Request $request)
  {
     if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]))
     {
         return redirect()->route('admin.product.index');
     }

     return redirect()->route('admin.login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');

  }

  public function logout()
  {
      Auth::logout();
      return redirect()->route('admin.login');
  }

}
