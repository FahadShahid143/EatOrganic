<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());
        return view('auth.login');
    }

    public function redirectTo()
    {
        if (Auth::user()->responsibility == "Admin"){
            return '/admin';
    }
    else if (Auth::user()->responsibility == "Vendor"){
        return '/vendorhomepage';
    }
    else if (Auth::user()->responsibility == "Customer"){
        return '/';
    }
    return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }

    public function apilogin(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();

            return response()->json($user);
        }
        else {
            return response()->json([
                'Wrong Email or Password',
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function apilogout(Request $request)
    {
        $user = Auth::guard('api')->user();
        //$user = $this->guard('api')->user();


        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
}
