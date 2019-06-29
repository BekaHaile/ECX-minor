<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee;
use App\User;

class ReportController extends Controller
{
    public function priceReport()
    {

        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->where('jarApproved', TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)
            ->where('priceDone', TRUE)->orderBy('created_at','desc')->paginate(5);
        $coffees2 = Coffee::where('dispatchFill',False);
        $count = 0;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.report.priceReport', compact('coffees','user'))->with('coffees2',$coffees2)->with('count',$count);
    }
    public function userReport()
    {
        $users = User::orderBy('created_at','asc')->paginate(5);
        $coffees = Coffee::where('dispatchFill',True);
        $count = 0;
        $countForm = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.report.userReport', compact('coffees','user'))
            ->with('users',$users)->with('countForm',$countForm)->with('count',$count);
    }
}
