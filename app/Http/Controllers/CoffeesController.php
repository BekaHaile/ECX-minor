<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee;
use Carbon\Carbon;
use DB;
use PhpParser\Node\Scalar\String_;
use Webpatser\Uuid\Uuid;

class CoffeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffees = Coffee::where('cardinalProcessed', TRUE)->orderBy('created_at','asc')->paginate(5);
        $view = 0;
        $card =  Coffee::oldest()->value('cardinal');

        $user = auth()->user();
        $count = Coffee::where('cardinalProcessed', FALSE)->count();

        abort_unless($user->userType == 'Manager' || 'Dispatcher', 403);
            return view('pages.coffee.viewDispatch', compact('coffees','user'))
                ->with('view',$view)->with('count',$count)->with('card',$card);
    }

    //Cardinal generation and storing
    public function cardinalView()
    {
        $user = auth()->user();

        $view = 0;
        $coffees = Coffee::where('cardinalProcessed',FALSE)->orderBy('created_at','asc')->paginate(8);
        $coffeesCount = Coffee::where('cardinalProcessed',FALSE)->count();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();

        return view('forms.coffee.cardinal', compact('coffees'))
            ->with('view',$view)->with('coffeesCount',$coffeesCount)->with('count',$count);
    }
    public function cardinal(Request $request)
    {
        $coffees = new Coffee();
        $maxCardinal =  Coffee::latest()->value('cardinal');
        $max = $maxCardinal;

//        foreach ($maxCardinal as $maxC) {
//            $max = $maxC->Cardinal;
//            break;
//        }

        $coffees->cardinal = $max+1;
        $cardinal = $max+1;

        $user = auth()->user();
        $coffees->representativeName = $user->name;

        abort_unless($user->userType == 'Representative', 403);
        $coffees->save();

        $view = 1;
        $coffees = Coffee::where('cardinalProcessed',FALSE)->orderBy('created_at','asc')->paginate(8);
        $coffeesCount = Coffee::where('cardinalProcessed',FALSE)->count();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();

        return view('forms.coffee.cardinal', compact('coffees'))
            ->with('view',$view)->with('coffeesCount',$coffeesCount)->with('count',$count);

    }

    //view coffees with dispatch info already filled out
    public function viewScale()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->where('jarApproved',False)->
        orderBy('created_at','asc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->count();
        $view = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Scalor', 403);
            return view('pages.coffee.viewScale',compact('coffees','user'))->with('view',$view)->with('count',$count);
    }
    //show coffees with scale info filled out
    public function viewScaleFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('jarApproved',False)
            ->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->count();
        $view = 1;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Scalor', 403);
        return view('pages.coffee.viewScale', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }


    //view coffees with dispatch ans scale info already filled out
    public function viewSample()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',False)->where('jarApproved',False)
            ->orderBy('created_at','asc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',False)->count();
        $view = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Sampler', 403);
            return view('pages.coffee.viewSample',compact('coffees','user'))->with('view',$view)
                ->with('count',$count);
    }
    //show coffees with sample info filled out
    public function viewSampleFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',False)->count();
        $view = 1;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Sampler', 403);
            return view('pages.coffee.viewSample', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }

    //view coffees with dispatch ans scale info already filled out
    public function viewSpecialty()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->where('specialtyFill',False)->orderBy('created_at','asc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',False)->count();
        $view = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Tester', 403);
            return view('pages.coffee.viewSpecialty',compact('coffees','user'))->with('view',$view)
                ->with('count',$count);;
    }
    //show coffees with sample info filled out
    public function viewSpecialtyFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->where('specialtyFill',TRUE)->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',False)->count();
        $view = 1;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Tester', 403);
            return view('pages.coffee.viewSpecialty', compact('coffees','user'))->with('view',$view)
                ->with('count',$count);;
    }

    //view coffees with dispatch and scale info already filled out
    public function viewGrade()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->where('specialtyFill',TRUE)->where('gradeFill',FALSE)->orderBy('created_at','asc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',FALSE)->count();
        $view = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Grader', 403);
        return view('pages.coffee.viewGrade',compact('coffees','user'))->with('view',$view)
            ->with('count',$count);;
    }
    //show coffees with sample info filled out
    public function viewGradeFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',FALSE)->count();
        $view = 1;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Grader', 403);
        return view('pages.coffee.viewGrade', compact('coffees','user'))->with('view',$view)
            ->with('count',$count);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $card =  Coffee::where('cardinalProcessed',False)->oldest()->value('cardinal');
        $count = Coffee::where('cardinalProcessed', FALSE)->count();

        abort_unless($user->userType == 'Dispatcher', 403);
            return view('forms.coffee.dispatch')->with('count',$count)->with('card',$card);
    }
    //Views coffees with dispatch info filled
    public function createScale(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->count();

        abort_unless($user->userType == 'Scalor', 403);
            return view('forms.coffee.scale', compact('coffee'))->with('count',$count);
    }
    //Views coffees with dispatch, scale info filled
    public function createSample(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',False)->count();

        abort_unless($user->userType == 'Sampler', 403);
            return view('forms.coffee.sample', compact('coffee'))
                ->with('count',$count);;
    }
    //Views coffees with dispatch, scale, sample info filled
    public function createSpecialty(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',False)->count();

        abort_unless($user->userType == 'Tester', 403);
        return view('forms.coffee.specialty', compact('coffee'))
            ->with('count',$count);;
    }
    //Views coffees with dispatch, scale, sample, specialty info filled
    public function createGrade(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',FALSE)->count();

        abort_unless($user->userType == 'Grader', 403);
        return view('forms.coffee.grade', compact('coffee'))
            ->with('count',$count);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDispatch(Request $request)
    {
        $coffees = Coffee::where('cardinal',request('cardinal'))->first();

        //dispatch info
        //coffee info
            //$coffees->id = request('id');

            if(request('wet')== 'Wet')
                $coffees->wet = TRUE;
            else
                $coffees->wet = FALSE;
            $coffees->weight = request('weight');
            $coffees->sacks = request('sacks');
            $coffees->stitchNo = request('stitchNo');
            $coffees->packDate = request('packDate');
            $coffees->region = request('region');
            $coffees->woreda = request('woreda');
            $coffees->kebele = request('kebele');
            $coffees->washingStation = request('washingStation');

            //owner info
            $coffees->ownerName = request('ownerName');
            $coffees->ownerPhone = request('ownerPhone');

            //representative info
            $coffees->representativeName = request('representativeName');
            $coffees->representativeMail = request('representativeMail');

            //driver info
            $coffees->driverName = request('driverName');
            $coffees->driverPhone = request('driverPhone');
            $coffees->driverId = request('driverId');
            $coffees->licenceNum = request('licenceNum');

            //Car info
            $coffees->typeOfCar = request('typeOfCar');
            $coffees->plateNum = request('plateNum');
            $coffees->dispatchFill = TRUE;
            $current_date_time = Carbon::now()->toDateTimeString();
            $coffees->dispatchFillTime = $current_date_time;
          //  $coffees->dispatchCount = $coffees->dispatchCount + 1;

        $user = auth()->user();

            $coffees->dispatcher = $user->username;
            $coffees->dispatcherId = $user->id;

            $coffees->cardinalProcessed = true;

        abort_unless($user->userType == 'Dispatcher', 403);
            $coffees->save();

            return redirect('/coffees');
    }
    //Add scale info onto the selected coffee.
    public function storeScale(Request $request, Coffee $coffee)
    {

        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->scaleFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->scalor = $user->username;
        $coffee->scalorId = $user->id;

        abort_unless($user->userType == 'Scalor', 403);
            $coffee->save();

            return redirect('/viewScaleFilled');
    }
    //Adds sample info onto the selected coffee.
    public function storeSample(Request $request, Coffee $coffee)
    {

        $coffee->group1 = request('group1');
        $coffee->group2 = request('group2');
        $coffee->group3 = request('group3');
        $coffee->group4 = request('group4');
        $coffee->sampleFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->sampleFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->sampler = $user->username;
        $coffee->sampler = $user->id;

        abort_unless($user->userType == 'Sampler', 403);
            $coffee->save();

            return redirect('/viewSampleFilled');
    }
    //Adds specialty info onto the selected coffee.
    public function storeSpecialty(Request $request, Coffee $coffee)
    {

        $coffee->wetnessPercent = request('wetnessPercent');
        $coffee->specialty = request('specialty');

        $coffee->specialtyFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->specialtyFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->tester = $user->username;
        $coffee->testerId = $user->id;

        //Assign a unique code to the coffee
        //$code = $coffee->washingStation; -- convert it to string and add on the encoding to make the code unique
        $coffee->encode = base64_encode("$coffee->id");

        abort_unless($user->userType == 'Tester', 403);
            $coffee->save();

            return redirect('/viewSpecialtyFilled');
    }
    //Adds grade info onto the selected coffee.
    public function storeGrade(Request $request, Coffee $coffee)
    {
        if(request('washedGrade') >= 85)
            $coffee->washedGrade = 'A';
        elseif(request('washedGrade') < 85 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'B';
        elseif(request('washedGrade') < 75 && request('washedGrade') >= 65)
            $coffee->washedGrade = 'C';
        elseif(request('washedGrade') < 65 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'D';
        else
            $coffee->washedGrade = 'F';

        if(request('washedGrade') >= 85)
            $coffee->washedGrade = 'A';
        elseif(request('washedGrade') < 85 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'B';
        elseif(request('washedGrade') < 75 && request('washedGrade') >= 65)
            $coffee->washedGrade = 'C';
        elseif(request('washedGrade') < 65 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'D';
        elseif(request('washedGrade') < 85 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'B';
        elseif(request('washedGrade') < 75 && request('washedGrade') >= 65)
            $coffee->washedGrade = 'C';
        elseif(request('washedGrade') < 65 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'D';
        elseif(request('washedGrade') < 65 && request('washedGrade') >= 75)
            $coffee->washedGrade = 'D';
        else
            $coffee->washedGrade = 'F';

        $coffee->gradeFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->gradeFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->grader = $user->username;
        $coffee->graderId = $user->id;

        //Jar Approved by default.
        $coffee->jarApproved = TRUE;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->jarApprovalTime = $current_date_time;

        abort_unless($user->userType == 'Grader', 403);
            $coffee->save();

            return redirect('/viewGradeFilled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coffee $coffee)
    {
        //$coffee = Coffee::find($id);

        $user = auth()->user();
        $count = Coffee::where('cardinalProcessed', FALSE)->count();

        abort_unless($user->userType =='Manager' || 'Administrator' || 'Dispatcher', 403);
            return view('forms.coffee.editDispatch', compact('coffee','user'))->with('count',$count);

        //$coffees = Coffee::find($id);
        //return view('forms.dispatch')->with('coffees','$coffees');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffee $coffee)
    {
       // $coffee = Coffee::find($id);

        $user = auth()->user();

        abort_unless($user->userType =='Manager' || 'Dispatcher', 403);
            return view('forms.coffee.editDispatch', compact('coffee','user'));
    }
    //View edit form for scale info already filled out
    public function editScale(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->count();

        abort_unless($user->userType =='Manager' || 'Scalor', 403);
            return view('forms.coffee.editScale', compact('coffee','user'))->with('count',$count);
    }
    //View edit form for sample info already filled out
    public function editSample(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',False)->count();

        abort_unless($user->userType =='Manager' || 'Sampler', 403);
            return view('forms.coffee.editSample', compact('coffee','user'))
                ->with('count',$count);;
    }
    //View edit form for specialty info already filled out
    public function editSpecialty(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',False)->count();

        abort_unless($user->userType =='Manager' || 'Speciality', 403);
            return view('forms.coffee.editSpecialty', compact('coffee','user'))
                ->with('count',$count);;
    }
    //View edit form for grade info already filled out
    public function editGrade(Coffee $coffee)
    {

        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',FALSE)->count();

        abort_unless($user->userType =='Manager' || 'Grader', 403);
            return view('forms.coffee.editGrade', compact('coffee','user'))
                ->with('count',$count);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coffee $coffee)
    {
        //coffee info

        if(request('wet')== 'Wet')
            $coffee->wet = TRUE;
        else
            $coffee->wet = FALSE;
        $coffee->weight = request('weight');
        $coffee->sacks = request('sacks');
        $coffee->stitchNo = request('stitchNo');
        $coffee->packDate = request('packDate');
        $coffee->region = request('region');
        $coffee->woreda = request('woreda');
        $coffee->kebele = request('kebele');
        $coffee->washingStation = request('washingStation');

        //owner info
        $coffee->ownerName = request('ownerName');
        $coffee->ownerPhone = request('ownerPhone');

        //representative info
        $coffee->representativeName = request('representativeName');
        $coffee->representativeMail = request('representativeMail');

        //driver info
        $coffee->driverName = request('driverName');
        $coffee->driverPhone = request('driverPhone');
        $coffee->driverId = request('driverId');
        $coffee->licenceNum = request('licenceNum');

        //Car info
        $coffee->typeOfCar = request('typeOfCar');
        $coffee->plateNum = request('plateNum');
        $coffee->dispatchFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->dispatchEditor = $user->username;
        $coffee->dispatchEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->dispatchEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Dispatcher', 403);
            $coffee->save();

            return redirect('/coffees');

    }
    //To update already filled scale info
    public function updateScale(Request $request, Coffee $coffee)
    {
        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->scaleEditor = $user->username;
        $coffee->scaleEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->scaleEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Scalor', 403);
            $coffee->save();

            return redirect('/viewScaleFilled');
    }
    //To update already filled sample info
    public function updateSample(Request $request, Coffee $coffee)
    {
        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->sampleEditor = $user->username;
        $coffee->samplEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->samplEditorId = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Sampler', 403);
            $coffee->save();

            return redirect('/viewSampleFilled');
    }
    //To update already filled specialty info
    public function updateSpecialty(Request $request, Coffee $coffee)
    {
        $coffee->wetnessPercent = request('wetnessPercent');
        $coffee->specialty = request('specialty');

        $user = auth()->user();

        //Editor info
        $coffee->specialtyEditor = $user->username;
        $coffee->specialtyEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->specialtyEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Tester', 403);
            $coffee->save();

            return redirect('/viewSpecialtyFilled');
    }
    //To update already filled grade info
    public function updateGrade(Request $request, Coffee $coffee)
    {
        $coffee->washedGrade = request('washedGrade');
        $coffee->unwashedGrade = request('unwashedGrade');

        $user = auth()->user();

        //Editor info
        $coffee->graderEditor = $user->username;
        $coffee->graderEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->gradeEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Grader', 403);
            $coffee->save();

            return redirect('/viewGradeFilled');
    }

    //Jar certificate approval
    public function jar()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',False)
            ->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',False)->count();
        $view = 0;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.coffee.viewJar', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }
    public function viewJarApproved()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved',True)
            ->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',False)->count();
        $view = 1;
        $user = auth()->user();

        abort_unless($user->userType == 'Manager', 403);
        return view('pages.coffee.viewJar', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }
    public function approveJar(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',False)->count();

        abort_unless($user->userType =='' , 403);
            return view('forms.coffee.approveJar', compact('coffee','user'))->with('count',$count);
    }
    public function storeJar (Coffee $coffee)
    {
        $coffee->jarApproved = True;
        $user = auth()->user();

        //Manager info
        $coffee->manager = $user->username;
        $coffee->managerId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->jarApprovalTime = $current_date_time;

        abort_unless($user->userType =='Manager' , 403);
        $coffee->save();

        return redirect('/viewJarApproved');

    }


    //price info input by representative
    public function rep()
    {
        $user = auth()->user();

        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved', TRUE)
            ->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('priceDone', False)->where('representativeMail', $user->email)->orderBy('created_at','desc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();
        $view = 0;

        abort_unless($user->userType == 'Representative', 403);
        return view('pages.coffee.viewInputPrice', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }
    public function priceDone()
    {
        $user = auth()->user();

        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)->where('jarApproved', TRUE)
            ->where('specialtyFill',TRUE)->where('gradeFill',TRUE)->where('priceDone', TRUE)->where('representativeMail', $user->email)->orderBy('created_at','asc')->paginate(5);
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();
        $view = 1;

        abort_unless($user->userType == 'Representative', 403);
        return view('pages.coffee.viewInputPrice', compact('coffees','user'))->with('view',$view)->with('count',$count);
    }
    public function createPrice(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();

        abort_unless($user->userType =='Representative' , 403);
        return view('forms.coffee.inputPrice', compact('coffee','user'))->with('count',$count);
    }
    public function storePrice(Coffee $coffee)
    {
        $coffee->price = request('price');
        $coffee->priceDone = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->priceInputTime = $current_date_time;
        $user = auth()->user();

        $coffee->representative = $user->username;
        $coffee->representativeId = $user->id;

        abort_unless($user->userType == 'Representative', 403);
        $coffee->save();

        return redirect('/priceDone');
    }
    public function editPrice(Coffee $coffee)
    {
        $user = auth()->user();
        $count = Coffee::where('dispatchFill',TRUE)->where('scaleFill',True)->where('sampleFill',True)
            ->where('specialtyFill',True)->where('gradeFill',True)->where('jarApproved',True)->where('priceDone', False)->where('representativeMail', $user->email)->count();

        abort_unless($user->userType == 'Representative' , 403);
        return view('forms.coffee.editPrice', compact('coffee','user'))->with('count',$count);
    }
    public function updatePrice(Coffee $coffee)
    {
        $coffee->price = request('price');

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->priceEditTime = $current_date_time;
        $user = auth()->user();


        abort_unless($user->userType == '', 403);
        $coffee->save();

        return redirect('/priceDone');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        $user = auth()->user();
        abort_unless($user->userType =='Manager' || 'Dispatcher', 403);
            $coffee->delete();

            return redirect('/coffees');
    }
}
