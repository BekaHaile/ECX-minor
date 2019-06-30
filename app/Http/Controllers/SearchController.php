<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Coffee;

class SearchController extends Controller
{
   public function searchUser()
   {
       $searchBy = request('searchBy');
       if($searchBy == 'Name')
           $searchBy = 'fname';
       if($searchBy == 'User Type')
           $searchBy = 'userType';
       if($searchBy == 'User Name')
           $searchBy = 'username';
       if($searchBy == 'ID')
           $searchBy = 'id';
       $search = request('search');

       if($searchBy != 'Search By' && $searchBy != 'View All')
       $users = User::orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
       else
       $users = User::orderBy('created_at','asc')->paginate(5);

       $userAuth = auth()->user();
       abort_unless($userAuth->userType == 'Administrator' || 'Manager', 403);
       return view('pages.viewUsers', compact('userAuth'))->with('users',$users);
   }

    public function searchDispatch()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All')
            $coffees = Coffee::orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        else
            $coffees = Coffee::orderBy('created_at','asc')->paginate(5);

        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Dispatcher', 403);
        return view('pages.coffee.viewDispatch', compact('coffees','user'));
    }
    public function searchScale()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Scalor' || 'Manager', 403);
        return view('pages.coffee.viewScale',compact('coffees','user'));
    }
    public function searchSample()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Sampler' || 'Manager', 403);
        return view('pages.coffee.viewSample',compact('coffees','user'));
    }
    public function searchSpecialty()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Tester' || 'Manager', 403);
        return view('pages.coffee.viewSpecialty',compact('coffees','user'));
    }
    public function searchGrade()
    {
        $search = request('search');

        if($search != '' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->where('encode','like','%'.$search.'%')->paginate(5);
        elseif($search != '' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->where('encode','like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',False)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Grader' || 'Manager', 403);
        return view('pages.coffee.viewGrade',compact('coffees','user'));
    }
    public function searchJar()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Grade')
            $searchBy = 'grade';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Tester' || 'Manager', 403);
        return view('pages.coffee.viewJar',compact('coffees','user'));
    }
    public function searchInputPrice()
    {
        $searchBy = request('searchBy');
        if($searchBy == 'Owners Name')
            $searchBy = 'ownerName';
        elseif($searchBy == 'Phone Number')
            $searchBy = 'ownerPhone';
        elseif($searchBy == 'ID')
            $searchBy = 'id';
        elseif($searchBy == 'Region')
            $searchBy = 'region';
        elseif($searchBy == 'Grade')
            $searchBy = 'grade';
        elseif($searchBy == 'Washing Station')
            $searchBy = 'washingStation';

        $search = request('search');

        if($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 0)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',False)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->where('priceDone',False)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif($searchBy != 'Search By' && $searchBy != 'View All' && request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->where('priceDone',TRUE)->
            orderBy('created_at','asc')->where($searchBy,'like','%'.$search.'%')->paginate(5);
        elseif(request('view') == 1)
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->where('priceDone',TRUE)->
            orderBy('created_at','asc')->paginate(5);
        else
            $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('specialtyFill',False)->where('gradeFill',TRUE)->where('jarApproved',TRUE)->where('priceDone',False)->
            orderBy('created_at','asc')->paginate(5);


        $user = auth()->user();

        abort_unless($user->userType == 'Representative' , 403);
        return view('pages.coffee.viewInputPrice',compact('coffees','user'));
    }

    public function searchGuestReport(Request $request)
    {
        $coffees = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
            ->where('priceDone', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        $coffees2 = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
            ->where('region',request('region'))->where('washedGrade',request('grade'))
            ->where('priceDone', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        if(request('region') == 'All')
            $coffees2 = $coffees;

        $region = Coffee::select('region')->groupBy('region')->where('priceDone', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('priceDone', TRUE)->get();

        $regionSelect = request('region');
        $gradeSelect = request('grade');

        $count = 1;

        return view('pages.report.guestReport',compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade)
            ->with('regionSelect',$regionSelect)->with('gradeSelect',$gradeSelect);
    }

    public function searchPriceReport(Request $request)
    {
        $coffees = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
            ->where('priceDone', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);

        $from = request('from');
        $to = request('to');

        if(request('region') == 'All' && request('grade') != 'All')
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
                ->where('washedGrade',request('grade'))
                ->whereBetween('priceInputTime', [$from, $to])
                ->where('priceDone', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);
        elseif(request('region') != 'All' && request('grade') == 'All')
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
                ->where('region',request('region'))
                ->whereBetween('priceInputTime', [$from, $to])
                ->where('priceDone', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);
        elseif(request('region') == 'All' && request('grade') == 'All')
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
                ->whereBetween('priceInputTime', [$from, $to])
                ->where('priceDone', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);
        else
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('AVG(price) Price'))
                ->where('region',request('region'))->where('washedGrade',request('grade'))
                ->whereBetween('priceInputTime', [$from, $to])
                ->where('priceDone', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);

        if(request('region') == 'All')
            $coffees2 = $coffees;

        $region = Coffee::select('region')->groupBy('region')->where('priceDone', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('priceDone', TRUE)->get();

        $regionSelect = request('region');
        $gradeSelect = request('grade');

        $count = 1;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.report.priceReport',compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade)
            ->with('regionSelect',$regionSelect)->with('gradeSelect',$gradeSelect)->with('user',$user)->with('from',$from)->with('to',$to);
        }

    public function searchCoffeeReport(Request $request)
    {
        $coffees = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
            ->where('jarApproved', TRUE)
            ->groupBy('region','washedGrade')
            ->get();

        $from = request('from');
        $to = request('to');

       // Reservation::whereBetween('reservation_from', [$from, $to])->get();

        if(request('region') == 'All' && request('grade') != 'All')
        $coffees2 = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
            ->where('washedGrade',request('grade'))
            ->whereBetween('jarApprovalTime', [$from, $to])
            ->where('jarApproved', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);
        elseif(request('grade') == 'All' && request('region') != 'All')
        $coffees2 = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
            ->where('region',request('region'))
            ->whereBetween('jarApprovalTime', [$from, $to])
            ->where('jarApproved', TRUE)
            ->groupBy('region','washedGrade')
            ->paginate(5);
        elseif(request('grade') == 'All' && request('region') == 'All')
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
                ->where('jarApprovalTime', '>=', $from)->where('jarApprovalTime', '<=', $to)
                ->where('jarApproved', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);
        else
            $coffees2 = Coffee::select('region','washedGrade',DB::raw('SUM(weight) Weight'))
                ->where('region',request('region'))->where('washedGrade',request('grade'))
                ->where('jarApprovalTime', '>=', $from)->where('jarApprovalTime', '<=', $to)
                ->where('jarApproved', TRUE)
                ->groupBy('region','washedGrade')
                ->paginate(5);


        $region = Coffee::select('region')->groupBy('region')->where('jarApproved', TRUE)->get();
        $grade = Coffee::select('washedGrade')->groupBy('washedGrade')->where('jarApproved', TRUE)->get();

        $regionSelect = request('region');
        $gradeSelect = request('grade');

        $count = 1;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.report.coffeeReport',compact('coffees'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade)
            ->with('regionSelect',$regionSelect)->with('gradeSelect',$gradeSelect)->with('user',$user)->with('from',$from)->with('to',$to);
    }


}
