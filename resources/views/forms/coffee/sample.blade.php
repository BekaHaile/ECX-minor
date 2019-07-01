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