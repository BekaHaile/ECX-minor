@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron text-center bg-light">
                <div class="py-5 text-center">
                    <h2>User Report of ECX</h2>
                </div>
                <div class="container" style="height: 50px;">
                    <div class="col-md-4" style="margin-left: 780px; margin-bottom: 10px;">
                        <form action="/searchUser" method="get">
                            <div class="input-group">
                                <input class="form-control" type="date">
                                {{--<select class="form-control" id="searchBy" name="searchBy" style="margin-right: 5px;">--}}
                                    {{--<option>Search By</option>--}}
                                    {{--<option>Name</option>--}}
                                    {{--<option>User Type</option>--}}
                                    {{--<option>User Name</option>--}}
                                    {{--<option>ID</option>--}}
                                    {{--<option>View All</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                @if(count($users) > 0)
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover table-bordered table-striped mb-0">

                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">User Type</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Forms Filled</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                {{--<div class="table-bordered bg-light" style="margin-bottom: 10px;">--}}
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user -> fname }} {{ $user -> lname }}
                                    </td>
                                    <td>
                                        {{ $user -> userType}}
                                    </td>
                                    <td>
                                        {{ $user -> username}}
                                    </td>
                                    <td>
                                        {{--@foreach ($users as $user1)--}}
                                            {{--@foreach ($coffees as $coffee)--}}
                                                {{--@if($user1->userType == 'Dispatcher')--}}
                                                    {{--@if($coffee->dispatcher == $user1->username)--}}
                                                        {{--{{ $countForm ++}}--}}
                                                    {{--@endif--}}
                                                {{--@endif--}}

                                        {{--@endforeach--}}
                                        {{--@endforeach--}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                @else
                    <p> No Users exist.</p>
                @endif
            </div>
        </div>
    </div>
@endsection