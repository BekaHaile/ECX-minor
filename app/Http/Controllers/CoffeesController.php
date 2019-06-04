<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee;
use Carbon\Carbon;

class CoffeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffees = Coffee::orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Dispatcher', 403);
            return view('pages.coffee.viewDispatch', compact('coffees','user'));
    }

    //view coffees with dispatch info already filled out
    public function viewScale()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->
        orderBy('created_at','asc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Scalor', 403);
            return view('pages.coffee.viewScale',compact('coffees','user'));
    }

    //show coffees with scale info filled out
    public function viewScaleFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Scalor', 403);
        return view('pages.coffee.viewScale', compact('coffees','user'));
    }


    //view coffees with dispatch ans scale info already filled out
    public function viewSample()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',False)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Sampler', 403);
            return view('pages.coffee.viewSample',compact('coffees','user'));
    }

    //show coffees with sample info filled out
    public function viewSampleFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Sampler', 403);
            return view('pages.coffee.viewSample', compact('coffees','user'));
    }

    //view coffees with dispatch ans scale info already filled out
    public function viewSpecialty()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->where('specialtyFill',False)->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Tester', 403);
            return view('pages.coffee.viewSpecialty',compact('coffees','user'));
    }

    //show coffees with sample info filled out
    public function viewSpecialtyFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Tester', 403);
            return view('pages.coffee.viewSpecialty', compact('coffees','user'));
    }

    //view coffees with dispatch and scale info already filled out
    public function viewGrade()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',False)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Grader', 403);
        return view('pages.coffee.viewGrade',compact('coffees','user'));
    }

    //show coffees with sample info filled out
    public function viewGradeFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)->where('sampleFill',TRUE)
            ->orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();

        abort_unless($user->userType == 'Manager' || 'Grader', 403);
        return view('pages.coffee.viewGrade', compact('coffees','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        abort_unless($user->userType == 'Dispatcher', 403);
            return view('forms.coffee.dispatch');
    }
    //Views coffees with dispatch info filled
    public function createScale(Coffee $coffee)
    {
        $user = auth()->user();

        abort_unless($user->userType == 'Scalor', 403);
            return view('forms.coffee.scale', compact('coffee'));
    }
    //Views coffees with dispatch, scale info filled
    public function createSample(Coffee $coffee)
    {
        $user = auth()->user();

        abort_unless($user->userType == 'Sampler', 403);
            return view('forms.coffee.sample', compact('coffee'));
    }
    //Views coffees with dispatch, scale info filled
    public function createSpecialty(Coffee $coffee)
    {
        $user = auth()->user();

        abort_unless($user->userType == 'Speciality', 403);
        return view('forms.coffee.specialty', compact('coffee'));
    }
    //Views coffees with dispatch, scale info filled
    public function createGrade(Coffee $coffee)
    {
        $user = auth()->user();

        abort_unless($user->userType == 'Grader', 403);
        return view('forms.coffee.grade', compact('coffee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDispatch(Request $request)
    {
        $coffees = new Coffee();

        //dispatch info
        //coffee info
            $coffees->id = request('id');

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

            //driver info
            $coffees->driverName = request('driverName');
            $coffees->driverPhone = request('driverPhone');
            $coffees->driverId = request('driverId');
            $coffees->licenceNum = request('licenceNum');

            //Car info
            $coffees->typeOfCar = request('typeOfCar');
            $coffees->plateNum = request('plateNum');
            $coffees->cardinalNum = 1;
            $coffees->dispatchFill = TRUE;
            $current_date_time = Carbon::now()->toDateTimeString();
            $coffees->dispatchFillTime = $current_date_time;

            $coffees->scaleFill = FALSE;
        $user = auth()->user();

            $coffees->dispatcher = $user->username;
            $coffees->dispatcherId = $user->id;

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
        $coffee->sampleFill = False;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->scaleFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->scalor = $user->username;
        $coffee->scalorId = $user->id;

        abort_unless($user->userType == 'Scalor', 403);
            $coffee->save();

            return redirect('/viewScaleFilled');
    }

    //Adds scale info onto the selected coffee.
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

    //Adds scale info onto the selected coffee.
    public function storeSpecialty(Request $request, Coffee $coffee)
    {

        $coffee->wetnessPercent = request('wetnessPercent');
        $coffee->speciality = request('speciality');

        $coffee->specialityFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->specialityFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->tester = $user->username;
        $coffee->testerId = $user->id;

        abort_unless($user->userType == 'Tester', 403);
            $coffee->save();

            return redirect('/viewSpecialtyFilled');
    }

    //Adds scale info onto the selected coffee.
    public function storeGrade(Request $request, Coffee $coffee)
    {

        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->gradeFillTime = $current_date_time;
        $user = auth()->user();

        $coffee->grader = $user->username;
        $coffee->graderId = $user->id;

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

        abort_unless($user->userType =='Manager' || 'Administrator' || 'Dispatcher', 403);
            return view('forms.coffee.editDispatch', compact('coffee','user'));

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
        // $coffee = Coffee::find($id);

        $user = auth()->user();

        abort_unless($user->userType =='Manager' || 'Scalor', 403);
            return view('forms.coffee.editScale', compact('coffee','user'));
    }
    //View edit form for sample info already filled out
    public function editSample(Coffee $coffee)
    {
        // $coffee = Coffee::find($id);

        $user = auth()->user();

        abort_unless($user->userType =='Manager' || 'Sampler', 403);
            return view('forms.coffee.editSample', compact('coffee','user'));
    }
    //View edit form for sample info already filled out
    public function editSpecialty(Coffee $coffee)
    {
        // $coffee = Coffee::find($id);

        $user = auth()->user();

        abort_unless($user->userType =='Manager' || 'Speciality', 403);
            return view('forms.coffee.editSpecialty', compact('coffee','user'));
    }
    //View edit form for sample info already filled out
    public function editGrade(Coffee $coffee)
    {

        $user = auth()->user();

        abort_unless($user->userType =='Manager' || 'Grader', 403);
            return view('forms.coffee.editGrade', compact('coffee','user'));
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

        //driver info
        $coffee->driverName = request('driverName');
        $coffee->driverPhone = request('driverPhone');
        $coffee->driverId = request('driverId');
        $coffee->licenceNum = request('licenceNum');

        //Car info
        $coffee->typeOfCar = request('typeOfCar');
        $coffee->plateNum = request('plateNum');
        $coffee->cardinalNum = 1;
        $coffee->dispatchFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->dispatchEditor = $user->name;
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
        $coffee->scaleEditor = $user->name;
        $coffee->scaleEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->scaleEditorId = $current_date_time;

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
        $coffee->sampleEditor = $user->name;
        $coffee->samplEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->samplEditorId = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Sampler', 403);
            $coffee->save();

            return redirect('/viewSampleFilled');
    }

    //To update already filled sample info
    public function updateSpecialty(Request $request, Coffee $coffee)
    {
        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->specialtyEditor = $user->name;
        $coffee->specialtyEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->specialtyEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Dispatcher', 403);
            $coffee->save();

            return redirect('/viewSpecialtyFilled');
    }

    //To update already filled sample info
    public function updateGrade(Request $request, Coffee $coffee)
    {
        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;

        $user = auth()->user();

        //Editor info
        $coffee->graderEditor = $user->name;
        $coffee->graderEditorId = $user->id;
        $current_date_time = Carbon::now()->toDateTimeString();
        $coffee->gradeEditTime = $current_date_time;

        abort_unless($user->userType =='Manager' || 'Dispatcher', 403);
            $coffee->save();

            return redirect('/viewGradeFilled');
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
