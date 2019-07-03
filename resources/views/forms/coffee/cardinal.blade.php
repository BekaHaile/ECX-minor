@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.repSidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Queue Information</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Total number of Customers waiting on Queue = {{$coffeesCount}} </b> </h4>
                    </div>
                </div>
                @if($view == 1)
                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3"> <b> Your cardinal number is = {{$newVal}} </b> </h4>
                    </div>
                </div>
                @endif
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th scope="col">Cardinal Numbers on Queue</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coffees as $coffee)
                            <tr>
                                <td>
                                    {{ $coffee->cardinal }}
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--{{$coffees->links()}}--}}
                </div>

                    <div class="col-md-8 order-md-1">
                        {{--<h4 class="mb-3"> <b> Get cardinal number </b> </h4>--}}
                        <form class="needs-validation" method="POST" action="/cardinal">
                            @csrf
                            <input type="number" value="1" name="cardinal" hidden>

                            {{--<button type="submit">GO</button>--}}
                            <button type="submit" class="btn btn-primary" >Get Cardinal Number</button>
                            {{--<button class="btn btn-danger" type="reset" style=" margin-left: 10px;">Clear</button>--}}
                        </form>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Cardinal Number</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Cardinal generated successfully.
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection