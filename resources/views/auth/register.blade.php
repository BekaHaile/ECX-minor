@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sidenavAdmin')
        </div>
        <div class="col-md-10 mb-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">{{ __('Register') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="fname">First name</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="lname">Fathers name</label>
                                            <input type="text" class="form-control" name="lname" id="lname" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                Valid fathers name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="sex">Sex</label>
                                            <select class="custom-select d-block w-100" name="sex" id="sex" required>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select one option.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                        <label for="name">{{ __('Username') }}</label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                        <label for="email">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                        <label for="password">{{ __('Password') }}</label>

                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="dateOfBirth">Date Of Birth</label>
                                            <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                please input a valid date.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Addis Ababa" required>
                                            <div class="invalid-feedback">
                                                Please input a valid city.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="zone">Zone</label>
                                            <input class="form-control" name="zone" id="zone" required>
                                            </input>
                                            <div class="invalid-feedback">
                                                Please input a valid zone.
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="woreda">Woreda</label>
                                            <input class="form-control" name="woreda" id="woreda">
                                            </input>
                                            <div class="invalid-feedback">
                                                Please provide a valid woreda.
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="kebele">Kebele</label>
                                            <input class="form-control" name="kebele" id="kebele">
                                            </input>
                                            <div class="invalid-feedback">
                                                Please provide a valid kebele.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Phone Number required.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">

                                    <h4 class="mb-3">User Type</h4>

                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="Manager" name="userType" type="radio" value="Manager" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Manager">Manager</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Tester" name="userType" type="radio" value="Tester" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Tester">Tester</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Grader" name="userType" type="radio" value="Grader" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Grader">Grader</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Representative" name="userType" type="radio" value="Representative" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Representative">Representative</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Administrator" name="Administrator" type="radio" value="Administrator" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Administrator">Administrator</label>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-2 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Clear') }}
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
