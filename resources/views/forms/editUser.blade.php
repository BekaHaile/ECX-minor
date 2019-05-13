@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sidenavAdmin')
        </div>
        <div class="col-md-10 mb-3">
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
            </style>
            <div class="jumbotron bg-light" style="margin: 20px;">
                <div class="py-5 text-center">
                    <h2>User form</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Edit User Information</h4>
                        <form class="needs-validation" method="POST" action="/users/{{ $user->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="fname">First name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" value="{{ $user -> fname }}" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="lname">Fathers name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" value="{{ $user -> lname }}" required>
                                    <div class="invalid-feedback">
                                        Valid fathers name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="username" value="{{ $user -> username }}" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ $user -> password }}" required>
                                    <div class="invalid-feedback">
                                        Valid password is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="confirm password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm password" id="confirm password" value="{{ $user -> password }}" required>
                                    <div class="invalid-feedback">
                                        Password mismatch.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="sex">Sex</label>
                                    <select class="custom-select d-block w-100" name="sex" id="sex" required>
                                        <option @if($user->sex == "Male") selected
                                                @endif >Male</option>
                                        <option @if($user->sex == "Female") selected
                                                @endif >Female</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select one option.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dateOfBirth">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" value="{{ $user -> dateOfBirth }}" required>
                                    <div class="invalid-feedback">
                                        please input a valid date.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user -> email }}">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ $user -> city }}" required>
                                    <div class="invalid-feedback">
                                        Please input a valid city.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="zone">Zone</label>
                                    <input class="form-control" name="zone" id="zone" value="{{ $user -> zone }}" required>
                                    </input>
                                    <div class="invalid-feedback">
                                        Please input a valid zone.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="woreda">Woreda</label>
                                    <input class="form-control" name="woreda" id="woreda" value="{{ $user -> woreda }}">
                                    </input>
                                    <div class="invalid-feedback">
                                        Please provide a valid woreda.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="kebele">Kebele</label>
                                    <input class="form-control" name="kebele" id="kebele" value="{{ $user -> kebele }}">
                                    </input>
                                    <div class="invalid-feedback">
                                        Please provide a valid kebele.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $user -> phoneNumber }}" required>
                                    <div class="invalid-feedback">
                                        Phone Number required.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <h4 class="mb-3">User Type</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="Manager" name="userType" type="radio" value="Manager" class="custom-control-input" @if($user->userType == "Manager") checked
                                           @endif required>
                                    <label class="custom-control-label" for="Manager">Manager</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="Tester" name="userType" type="radio" value="Tester" class="custom-control-input" @if($user->userType == "Tester") checked
                                           @endif required>
                                    <label class="custom-control-label" for="Tester">Tester</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="Grader" name="userType" type="radio" value="Grader" class="custom-control-input" @if($user->userType == "Grader") checked
                                           @endif required>
                                    <label class="custom-control-label" for="Grader">Grader</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="Representative" name="userType" type="radio" value="Representative" class="custom-control-input" @if($user->userType == "Representative") checked
                                           @endif required>
                                    <label class="custom-control-label" for="Representative">Representative</label>
                                </div>
                            </div>
                            <hr class="mb-6">
                            <button class="btn btn-primary btn-lg " type="submit" style="margin-bottom: 10px;">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection