@extends('layouts.app')

@section('content')
    <style>

        @media (min-width: 768px) {
        }
        h5.view{
            margin-left: 15px;
        }
        p{
            margin-left: 5px;
        }

    </style>
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @elseif($user->userType == 'Administrator')
                @include('inc.sidenavAdmin')
            @else
                @include('inc.sampleSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Scale form</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Coffee Information </b> </h4>
                    </div>
                </div>
                <div class="row">
                    <h5 class="view">Owner Name - </h5> <p>{{ $coffee -> ownerName }} </p>

                    <h5 class="view">Phone Number - </h5> <p>{{ $coffee -> ownerPhone }}</p>

                    <h5 class="view">ID - </h5><p> {{ $coffee -> id }} </p>

                </div>
                <div class="row">
                    <h5 class="view">Region - </h5> <p>{{ $coffee -> region }} </p>

                    <h5 class="view">Washing Station - </h5> <p> {{ $coffee -> washingStation }}</p>

                </div>
                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Sample Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/updateSample">
                            {{--{{ method_field('PATCH') }}--}}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="scaleWeight"><h5>Weight in KG</h5></label>
                                    <input type="number" class="form-control" name="scaleWeight" id="scaleWeight" placeholder="" value={{ $coffee -> scaleWeight }} required>
                                    <div class="invalid-feedback">
                                        Valid weight is required.
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label for="scaleWet"> <h5> Coffee Wetness </h5> </label>

                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="wet" name="scaleWet" type="radio" value="Wet" class="custom-control-input"
                                                   @if( $coffee -> scaleWet == 1) checked
                                                   @endif required>
                                            <label class="custom-control-label" for="wet">Wet</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="notwet" name="scaleWet" type="radio" value="Not Wet" class="custom-control-input"
                                                   @if( $coffee -> scaleWet == 0) checked
                                                   @endif required >
                                            <label class="custom-control-label" for="notwet">Not Wet</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-6">
                                <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Submit</button>
                                <button class="btn btn-danger btn-lg " style="margin-bottom: 10px;">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection