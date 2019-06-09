@extends('layouts.app')



@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($userAuth->userType == 'Manager')
                @include('inc.managerSidenav')
            @elseif($userAuth->userType == 'Administrator')
                @include('inc.sidenavAdmin')
            @else

            @endif
        </div>
        <div class="col-md-10 mb-3">
                <div class="jumbotron bg-light" style="margin: 20px;">
                    <h1 style="margin-left: 400px;">Users</h1>

                    <div class="col-md-4" style="margin-left: 780px; margin-bottom: 10px;">
                        <form action="/searchUser" method="get">
                            <div class="input-group">
                                    {{--<div class="col-md-5 mb-3">--}}
                                        {{--<label for="searchBy">Search by:</label>--}}
                                        <select class="form-control" id="searchBy" name="searchBy" style="margin-right: 5px;">
                                                <option>Search By</option>
                                                <option>Name</option>
                                                <option>User Type</option>
                                                <option>User Name</option>
                                                <option>ID</option>
                                                <option>View All</option>
                                        </select>
                                    {{--</div>--}}
                                                <input type="search" name="search" class="form-control">
                                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </span>
                            </div>
                        </form>
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
                                @if($userAuth->userType == 'Administrator')
                                    <th scope="col">Edit</th>
                                    <th scope="col">Remove</th>
                                @endif
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
                                        @if($userAuth->userType == 'Administrator')
                                            <td>
                                                <a href="/users/{{ $user->id }}/edit"> <button class="btn btn-primary"  style="margin-bottom: 10px;">Edit</button> </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="/users/{{ $user->id }}">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button class="btn btn-primary btn-danger " type="submit" style="margin-bottom: 10px;">Remove</button>
                                                </form>
                                            </td>
                                        @endif
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