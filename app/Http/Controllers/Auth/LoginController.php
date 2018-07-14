<?php

namespace sice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use sice\Http\Controllers\Controller;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request){
        $login=$request->input($this->username());

        $field=filter_var($login,FILTER_VALIDATE_EMAIL)?'email':'username';

        return[
            $field=>$login,
            'password'=>$request->input('password')
        ];
    }
    public function username(){
        return 'login';
    }


}
