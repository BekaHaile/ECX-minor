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

                <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Grade Information </b> </h4>
                        <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeGrade">
                            @csrf
                            <hr class="mb-4">

                            <div class="d-block my-3">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="washedGrade">Grade value for washed coffee</label>
                                        <input type="number" class="form-control" min="0" max="100"  name="washedGrade" id="washedGrade" required>
                                        <div class="invalid-feedback">
                                            Valid Grade value is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="unwashedGrade" hidden>Grade value for unwashed coffee</label>
                                        <input type="number" class="form-control" value="90" min="0" max="100" name="unwashedGrade" id="unwashedGrade"  hidden>
                                        {{--<div class="invalid-feedback">--}}
                                            {{--Valid Grade value is required.--}}
                                        {{--</div>--}}
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">Grade Data</h5>
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