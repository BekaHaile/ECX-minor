<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Coffee;

class PagesController extends Controller
{

    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function home(){
//        if(auth()->guest())
            return view('pages.home');
//        else
//            abort(403);
    }

    public function about(){
        return view('pages.about');
    }

    public function login(){
        return view('pages.login');
    }

    public function help(){
        return view('pages.help');
    }

    public function admin(){
        $user = auth()->user();
        abort_unless($user->userType == 'Administrator', 403);
            return view('auth.register');
    }


}
