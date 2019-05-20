@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.scaleSidenav')
        </div>
        <div class="col-md-10 mb-3">
            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
                h5.view{
                    margin-left: 15px;
                }
                p{
                    margin-left: 5px;
                }

            </style>
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Scale form</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Dispatch Information </b> </h4>
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
                        <h4 class="mb-3"> <b> Scale Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeScale">
                            {{--{{ method_field('PATCH') }}--}}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="scaleWeight"><h5>Weight in KG</h5></label>
                                    <input type="number" class="form-control" name="scaleWeight" id="scaleWeight" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid weight is required.
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label for="scaleWet"> <h5>Coffee Wetness</h5></label>

                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="wet" name="scaleWet" type="radio" value="Wet" class="custom-control-input" required>
                                            <label class="custom-control-label" for="wet">Wet</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="notwet" name="scaleWet" type="radio" value="Not Wet" class="custom-control-input" required>
                                            <label class="custom-control-label" for="notwet">Not Wet</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-6">
                                <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Submit</button>
                                <button class="btn btn-danger btn-lg " type="" style="margin-bottom: 10px;">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection