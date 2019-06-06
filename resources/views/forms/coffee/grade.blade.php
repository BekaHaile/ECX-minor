@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.gradeSidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Grade form</h2>
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
                            <th scope="col">Coffee Encoded ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{ $coffee -> encode }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Grade Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeGrade">
                            @csrf
                            <hr class="mb-4">

                            <div class="d-block my-3">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <h4 class="mb-3">Washed Coffee</h4>
                                        <div class="custom-control custom-radio">
                                            <input id="A" name="washedGrade" type="radio" value="A" class="custom-control-input" required>
                                            <label class="custom-control-label" for="A">A</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="B" name="washedGrade" type="radio" value="B" class="custom-control-input" required>
                                            <label class="custom-control-label" for="B">B</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="C" name="washedGrade" type="radio" value="C" class="custom-control-input" required>
                                            <label class="custom-control-label" for="C">C</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="D" name="washedGrade" type="radio" value="D" class="custom-control-input" required>
                                            <label class="custom-control-label" for="D">D</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <h4 class="mb-3">Unwashed Coffee</h4>
                                        <div class="custom-control custom-radio">
                                            <input id="A2" name="unwashedGrade" type="radio" value="A" class="custom-control-input" required>
                                            <label class="custom-control-label" for="A2">A</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="B2" name="unwashedGrade" type="radio" value="B" class="custom-control-input" required>
                                            <label class="custom-control-label" for="B2">B</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="C2" name="unwashedGrade" type="radio" value="C" class="custom-control-input" required>
                                            <label class="custom-control-label" for="C2">C</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="D2" name="unwashedGrade" type="radio" value="D" class="custom-control-input" required>
                                            <label class="custom-control-label" for="D2">D</label>
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