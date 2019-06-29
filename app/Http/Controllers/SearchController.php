<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function searchPriceReport(Request $request)
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->where('jarApproved', TRUE)->where('specialtyFill',TRUE)->where('gradeFill',TRUE)
            ->where('priceDone', TRUE)->orderBy('created_at','desc')->paginate(5);

        $coffees2 = Coffee::where('region',request('region'))->where('washedGrade',request('grade'))
            ->orderBy('created_at','desc')->paginate(5);
        $region = request('region');
        $grade = request('grade');

        $count = 1;

        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.report.priceReport',compact('coffees','user'))->with('coffees2',$coffees2)
            ->with('count',$count)->with('region',$region)->with('grade',$grade);
    }


}
