<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee;

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

        return view('pages.coffee.viewDispatch', compact('coffees'));
    }

    //view coffees with dispatch info already filled out
    public function viewScale()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',False)->orderBy('created_at','desc')->paginate(5);

        return view('pages.coffee.viewScale',compact('coffees'));
    }

    //show coffees with scale info filled out
    public function viewScaleFilled()
    {
        $coffees = Coffee::where('dispatchFill',TRUE)->where('scaleFill',TRUE)
            ->orderBy('created_at','desc')->paginate(5);
        return view('pages.coffee.viewScale', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.coffee.dispatch');
    }
    //Views coffees with dispatch info filled
    public function createScale(Coffee $coffee)
    {
        return view('forms.coffee.scale', compact('coffee'));
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

            $coffees->scaleFill = FALSE;

        $coffees->save();

        return redirect('/coffees');
    }

    //Adds scale info onto the selected coffee.
    public function storeScale(Request $request, Coffee $coffee)
    {

        $coffee->scaleWeight = request('scaleWeight');
        if(request('scaleWet')== 'Wet')
            $coffee->scaleWet = TRUE;
        else
            $coffee->scaleWet = FALSE;
        $coffee->scaleFill = TRUE;
        $coffee->save();

        return redirect('/viewScaleFilled');
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

        return view('forms.coffee.dispatchEdit', compact('coffee'));

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

        return view('forms.coffee.editDispatch', compact('coffee'));
    }
    //View edit form for scale info already filled out
    public function editScale(Coffee $coffee)
    {
        // $coffee = Coffee::find($id);

        return view('forms.coffee.editScale', compact('coffee'));
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
        $coffee->save();

        return redirect('/viewScaleFilled');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();

        return redirect('/coffees');
    }
}
