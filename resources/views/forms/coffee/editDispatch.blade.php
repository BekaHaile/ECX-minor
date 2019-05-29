@extends('layouts.app')

@section('content')
    <style>
        @media (min-width: 768px) {

        }
    </style>
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @elseif($user->userType == 'Administrator')
                @include('inc.sidenavAdmin')
            @else
                @include('inc.sidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Edit Dispatch</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Owner Information</h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ownerName">Full name</label>
                                    <input type="text" class="form-control" name="ownerName" id="ownerName" value="{{ $coffee -> ownerName }}" required>
                                    <div class="invalid-feedback">
                                        Valid full name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ownerPhone">Phone number</label>
                                    <input type="text" class="form-control" name="ownerPhone" id="ownerPhone" value="{{ $coffee -> ownerPhone }}" required>
                                    <div class="invalid-feedback">
                                        Valid phone number is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <h4 class="mb-3">Driver Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="driverName">Full name</label>
                                    <input type="text" class="form-control" name="driverName" id="driverName" value="{{ $coffee -> driverName }}" required>
                                    <div class="invalid-feedback">
                                        Valid full name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driverPhone">Phone number</label>
                                    <input type="text" class="form-control" name="driverPhone" id="driverPhone" value="{{ $coffee -> driverPhone }}" required>
                                    <div class="invalid-feedback">
                                        Valid phone number is required.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="driverId">Driver ID</label>
                                    <input type="text" class="form-control" name="driverId" id="driverId" value="{{ $coffee -> driverId }}"  required>
                                    <div class="invalid-feedback">
                                        Valid driver ID is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="licenceNum">Licence number</label>
                                    <input type="text" class="form-control" name="licenceNum" id="licenceNum" value="{{ $coffee -> licenceNum }}" required>
                                    <div class="invalid-feedback">
                                        Valid licence number is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <h4 class="mb-3">Vehicle Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="typeOfCar">Type Of Car</label>
                                    <input list="typeOfCar" class="form-control" name="typeOfCar" value="{{ $coffee -> typeOfCar }}" required>
                                    <datalist id="typeOfCar">
                                        <option value="Mercedes">
                                        <option value="Eurotracker">
                                        <option value="Isuzu">
                                        <option value="FSR">
                                        <option value="Safari">
                                    </datalist>
                                    <div class="invalid-feedback">
                                        Valid Type Of Car is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="plateNum">Plate number</label>
                                    <input type="text" class="form-control" name="plateNum" id="plateNum" value="{{ $coffee -> plateNum }}" required>
                                    <div class="invalid-feedback">
                                        Valid plate number is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <h4 class="mb-3">Coffee Information</h4>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="region">Region</label>
                                    <input class="form-control" name="region" id="region" value="{{ $coffee -> region }}" required>
                                    <div class="invalid-feedback">
                                        Please input a valid region.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="woreda">Woreda</label>
                                    <input class="form-control" name="woreda" id="woreda" value="{{ $coffee -> woreda }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid woreda.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="kebele">Kebele</label>
                                    <input class="form-control" name="kebele" id="kebele" value="{{ $coffee -> kebele }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid kebele.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="washingStation">Washing Station</label>
                                    <input type="text" class="form-control" name="washingStation" id="washingStation" value="{{ $coffee -> washingStation }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid washingStation.
                                    </div>
                                </div>
                            </div>

                            <h4 class="mb-3">Coffee Wetness</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="wet" name="wet" type="radio" value="Wet" class="custom-control-input"
                                           @if($coffee->wet == 1) checked
                                           @endif required>
                                    <label class="custom-control-label" for="wet">Wet</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="notwet" name="wet" type="radio" value="Not Wet" class="custom-control-input"
                                           @if($coffee->wet == 0) checked
                                           @endif required>
                                    <label class="custom-control-label" for="notwet">Not Wet</label>
                                </div>
                            </div>

                            <h4 class="mb-3">Amount of Coffee</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="weight">Weight in KG</label>
                                    <input type="number" class="form-control" name="weight" id="weight" value="{{ $coffee -> weight }}" required>
                                    <div class="invalid-feedback">
                                        Valid weight is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sacks">Number of sacks</label>
                                    <input type="number" class="form-control" name="sacks" id="sacks" value="{{ $coffee -> sacks }}" required>
                                    <div class="invalid-feedback">
                                        Valid sack number is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="packDate">Pack date</label>
                                    <input type="date" class="form-control" name="packDate" id="packDate" value="{{ $coffee -> packDate }}" required>
                                    <div class="invalid-feedback">
                                        please input a valid date.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="stitchNo">Number of stitch</label>
                                    <input type="number" class="form-control" name="stitchNo" id="stitchNo" value="{{ $coffee -> stitchNo }}" required>
                                    <div class="invalid-feedback">
                                        Valid stitch number is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-6">
                            <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection