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

        return view('pages.viewDispatch', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.dispatch');
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

        $coffees->specialty = '';
        $coffees->grade = '';
        $coffees->price = '';

        $coffees->save();

        return redirect('/coffees');
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

        return view('forms.dispatchEdit', compact('coffee'));

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

        return view('forms.dispatchEdit', compact('coffee'));
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
