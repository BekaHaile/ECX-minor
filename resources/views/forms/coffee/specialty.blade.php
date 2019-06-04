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
            @include('inc.specialtySidenav')
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
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Region</th>
                            <th scope="col">Washing Station</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--<div class="table-bordered bg-light" style="margin-bottom: 10px;">--}}
                        <tr>
                            <td>
                                {{ $coffee -> id }}
                            </td>
                            <td>
                                {{ $coffee -> ownerName }}
                            </td>
                            <td>
                                {{ $coffee -> ownerPhone }}
                            </td>
                            <td>
                                {{ $coffee -> region }}
                            </td>
                            <td>
                                {{ $coffee -> washingStation }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Specialty Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeSpecialty">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label for="wetnessPercent"> <h5>Coffee Wetness in Percentage</h5></label>

                                    <div class="input-group mb-3">
                                        {{--<div class="input-group-prepend">--}}
                                            {{--<span class="input-group-text">$</span>--}}
                                        {{--</div>--}}
                                        {{--<input type="text" class="form-control" name="wetnessPercent" id="wetnessPercent" aria-label="Wetness (in percentage)">--}}
                                    </div>
                                        <input type="range" name="wetnessPercent" id="wetnessPercent" value="5" min="1" max="100" oninput="range_weight_disp.value = range_weight.value">
                                        <output  id="range_weight_disp">0</output>
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label for="speciality"> <h5>Coffee Speciality in Percentage</h5></label>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="speciality" id="speciality" aria-label="Speciality (in percentage)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-6">
                            <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Submit</button>
                            <button class="btn btn-danger btn-lg " type="reset" style="margin-bottom: 10px;">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection