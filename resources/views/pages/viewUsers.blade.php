@extends('layouts.app')



@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @else
                @include('inc.sidenavAdmin')
            @endif
        </div>
        <div class="col-md-10 mb-3">
                <div class="jumbotron" style="margin: 20px;">
                    <h1 style="margin-left: 400px;">Users</h1>
                    @if(count($users) > 0)
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table table-hover ">
                                {{--table-striped mb-0--}}
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Remove</th>
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
                                            <a href="/users/{{ $user->id }}"> <button class="btn btn-primary"  style="margin-bottom: 10px;">Edit</button> </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="/users/{{ $user->id }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-primary btn-danger " type="submit" style="margin-bottom: 10px;">Remove</button>
                                            </form>
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