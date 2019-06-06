@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>Jar Certificate</h2>
                </div>

                @include("inc.coffeeInfo")

                @if($coffee -> jarApproved == 0)
                    <hr class="mb-4">

                    <div class="row">
                        <div class="col-md-8 order-md-1">
                            <form class="needs-validation" method="POST" action="/coffees/{{ $coffee->id }}/storeJar">
                                @csrf
                                <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Approve</button>
                                <button class="btn btn-danger btn-lg " style="margin-bottom: 10px;">Decline</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection