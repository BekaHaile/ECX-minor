<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function guestReport(){
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->where('jarApproved', TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)
            ->where('priceDone', TRUE)->orderBy('created_at','desc')->paginate(5);
        $coffees2 = Coffee::where('dispatchFill',False);
        $count = 0;

        return view('pages.report.guestReport', compact('coffees'))->with('coffees2',$coffees2)->with('count',$count);
    }
    public function searchGuestReport(Request $request)
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->where('jarApproved', TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)
            ->where('priceDone', TRUE)->orderBy('created_at','desc')->paginate(5);

        $coffees2 = Coffee::where('region',request('region'))->where('washedGrade',request('grade'))
            ->orderBy('created_at','desc')->paginate(5);
        $region = request('region');
        $grade = request('grade');

        $count = 1;

        return view('pages.report.guestReport',compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade);
    }

}
