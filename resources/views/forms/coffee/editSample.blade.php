@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @else
                @include('inc.sampleSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Sample form</h2>
                </div>

                @include("inc.coffeeInfo")

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Sample Results </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/updateSample">
                            @csrf

                            <hr class="mb-6">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="group1">Sample Group 1</label>
                                    <textarea type="text" class="form-control" name="group1" id="group1" required>{{ $coffee -> group1 }}</textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="group2">Sample Group 2</label>
                                    <textarea type="text" class="form-control" name="group2" id="group2" required>{{ $coffee -> group2 }}</textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="group3">Sample Group 3</label>
                                    <textarea type="text" class="form-control" name="group3" id="group3" required>{{ $coffee -> group3 }}</textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="group4">Sample Group 4</label>
                                    <textarea type="text" class="form-control" name="group4" id="group4" required>{{ $coffee -> group4 }}</textarea>
                                    <div class="invalid-feedback">
                                        Valid sample result is required.
                                    </div>
                                </div>
                            </div>


                            <hr class="mb-6">
                            <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Update</button>
                            <button class="btn btn-danger btn-lg " type="reset" style="margin-bottom: 10px;">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection