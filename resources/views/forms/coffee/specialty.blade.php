@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.specialtySidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Scale form</h2>
                </div>

                @include('inc.coffeeInfo')

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
                                        <input type="range" name="wetnessPercent" id="wetnessPercent" value="5" min="1" max="100" oninput="range_weight_disp1.value = wetnessPercent.value">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="margin-left: 10px;"><output  id="range_weight_disp1">0</output><strong>%</strong></span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label for="speciality"> <h5>Coffee Speciality in Percentage</h5></label>

                                    <div class="input-group mb-3">
                                            <input type="range" name="specialty" id="specialty" value="5" min="1" max="100" oninput="range_weight_disp.value = specialty.value">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="margin-left: 10px;"><output  id="range_weight_disp">0</output><strong>%</strong></span>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Submit</button>
                            <button class="btn btn-danger" type="reset" style=" margin-left: 10px;">Clear</button>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Specialty Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to proceed?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection