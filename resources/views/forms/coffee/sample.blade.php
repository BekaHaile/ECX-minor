@extends('layouts.app')

@section('content')
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
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sampleSidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Sample form</h2>
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
                        <h4 class="mb-3"> <b> Sample Results </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeSample">
                            @csrf

                            <hr class="mb-6">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="group1">Sample Group 1</label>
                                    <textarea type="text" class="form-control" name="group1" id="group1" required></textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="group2">Sample Group 2</label>
                                    <textarea type="text" class="form-control" name="group2" id="group2" required></textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="group3">Sample Group 3</label>
                                    <textarea type="text" class="form-control" name="group3" id="group3" required></textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="group4">Sample Group 4</label>
                                    <textarea type="text" class="form-control" name="group4" id="group4" required></textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
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