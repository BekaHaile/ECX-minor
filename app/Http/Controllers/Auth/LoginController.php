<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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

    //custom authentication
//    public function login(Request $request)
//    {
//        if(Auth::attempt([
//            'username' => $request->username,
//            'password' => $request->password
//        ])){
//            $user = User::where('username',$request->username)->first();
//            if($user->userType == 'Manager')
//                return redirect('/admin');
//            if($user->userType == 'Grader')
//                return redirect('/scale');
//            else
//                return redirect('/dispatch');
//        }
//        else
//            return redirect('/login');
//
//    }

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

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->userType == 'Manager')
            return redirect('/manager');
        if($user->userType == 'Scalor')
            return redirect('/scale');
        if($user->userType == 'Sampler')
            return redirect('/sample');
        if($user->userType == 'Administrator')
            return redirect('/admin');
        if($user->userType == 'Tester')
            return redirect('/specialty');
        if($user->userType == 'Grader')
            return redirect('/grade');
        else
            return redirect('/dispatch');
    }
}
