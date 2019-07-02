@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sampleSidenav')
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
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeSample">
                            @csrf

                            <hr class="mb-6">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p class="mb-3">Sample Group 1</p>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="same1" name="group1" type="radio" value="Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="same1">Same</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Not Same1" name="group1" type="radio" value="Not Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Not Same1">Not Same</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="mb-3">Sample Group 2</p>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="same2" name="group2" type="radio" value="Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="same2">Same</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Not Same2" name="group2" type="radio" value="Not Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Not Same2">Not Same</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p class="mb-3">Sample Group 3</p>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="same3" name="group3" type="radio" value="Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="same3">Same</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Not Same3" name="group3" type="radio" value="Not Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Not Same3">Not Same</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="mb-3">Sample Group 4</p>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="same4" name="group4" type="radio" value="Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="same4">Same</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Not Same4" name="group4" type="radio" value="Not Same" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Not Same4">Not Same</label>
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">Sample Data</h5>
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