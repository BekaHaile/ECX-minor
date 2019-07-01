@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.scaleSidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Scale form</h2>
                </div>

                @include("inc.coffeeInfo")

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Scale Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeScale">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="scaleWeight"><h5>Weight in KG</h5></label>
                                    <input type="number" class="form-control" name="scaleWeight" id="scaleWeight" required>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Submit</button>
                            <button class="btn btn-danger" type="reset" style=" margin-left: 10px;">Clear</button>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Scale Data</h5>
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