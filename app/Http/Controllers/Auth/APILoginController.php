<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class APILoginController extends Controller
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
     * Where to redirect users after login.
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

    public function login()
    {
        $credentials = request()->only([ 'email', 'password' ]);
        $remember = (request('remamber')) ? request('remamber') : false;
        $login = auth()->attempt($credentials, $remember);

        if($login){
            return response()->json([
                'statusCode' => 200,
                'responseText' => 'Login success.',
                'data' => [ 'loggedIn' => true, 'apiAccessToken' => 'Fake-000-111-222', 'redirectRoute' => route('home') ]
            ], 200);
        }else{
            return response()->json([
                'statusCode' => 403,
                'responseText' => 'Login Failed.',
                'data' => [ 'loggedIn' => false, 'apiAccessToken' => null ]
            ], 403);
        }

    }
}
