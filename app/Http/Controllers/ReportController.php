<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Coffee;
use App\User;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function guestReport(){

        $coffees = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
            ->where('priceDone', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        $coffees2 = Coffee::where('dispatchFill',False);

        $region = Coffee::select('region')->groupBy('region')->where('priceDone', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('priceDone', TRUE)->get();

        $count = 0;

        return view('pages.report.guestReport', compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade);
    }

    public function priceReport()
    {

        $coffees = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
            ->where('priceDone', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        $coffees2 = Coffee::where('jarApproved', TRUE);

        $region = Coffee::select('region')->groupBy('region')->where('priceDone', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('priceDone', TRUE)->get();

        $count = 0;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);

        return view('pages.report.priceReport', compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade)->with('user',$user);

        }
    public function coffeeReport()
    {
        $coffees = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
            ->where('jarApproved', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        $current_date_time = Carbon::now()->toDateTimeString();
        $from = $current_date_time;
        $to = $current_date_time;

        $coffees2 = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
            ->where('jarApprovalTime', '<=', $from)->where('jarApprovalTime', '>=', $to)
            ->where('jarApproved', TRUE)
            ->groupBy('region','washedGrade')
            ->get();

        $region = Coffee::select('region')->groupBy('region')->where('priceDone', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('priceDone', TRUE)->get();

        $count = 0;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);

        return view('pages.report.coffeeReport', compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade)->with('user',$user)
            ->with('from',$from)->with('to',$to);

    }
    public function userReport()
    {
        $to = Carbon::now()->format('Y-m-d');
        $toT = Carbon::now();
        $from = Carbon::now()->subWeek()->format('Y-m-d');
        $fromT = Carbon::now()->subWeek()->format('Y-m-d');
        $index = 0;

        $day = Carbon::createFromFormat('Y-m-d H:i:s', $from)->day;

        $approval = Coffee::select('jarApprovalTime')->get();
//        dd($approve);
//
//        $work[$index] = Coffee::where('jarApprovalTime', $from)->count();

        $work = [];
        while($from != $to) {
            foreach ($approval as $approv) {
                $approve = $approv->jarApprovalTime->format('Y-m-d');
                if ($from == $approve)
                    $work[$index] = $work[$index] + 1;
            }
            $index = $index + 1;
            $fromT = $fromT->addDay();
            $from = $fromT->format('Y-m-d');

        }
        dd('Done');



//            $work[$index] = Coffee::where('jarApprovalTime', $from)->count();
//            $from = $from->addDay();
//            echo $work[$index];
//            $index = $index + 1;
        }
        //dd($work[$index]);

//        $users = User::orderBy('created_at','asc')->paginate(5);
//        $coffees = Coffee::where('dispatchFill',True);
//        $count = 0;
//        $countForm = 0;
//        $user = auth()->user();
//
//        abort_unless($user->userType == 'Manager', 403);
//        return view('pages.report.userReport', compact('coffees','user'))
//            ->with('users',$users)->with('countForm',$countForm)->with('count',$count);

}
