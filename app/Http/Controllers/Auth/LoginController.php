<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $guard = 'Admin';
    protected $redirectAfterLogout = '/login';

   public function loginForm(){
    return view('backend.login.index');
   }
   public function postLogin(LoginRequest $request) {
    $validation = Auth::guard('Admin')->attempt([
        'name' => $request->get('name'),
        'password' => $request->get('password')
    ]);
    if($validation) {
        dd('true');
        return redirect('admin-backend/index');
    } else {
        dd("false");
        return redirect()->back()->withErrors(['error' => 'Something Wrong'])->withInput();
    }
   }
   public function getLogout() {
    Auth::logout();
    Session::flush();
    return redirect('admin-backend/login');
   }
}
