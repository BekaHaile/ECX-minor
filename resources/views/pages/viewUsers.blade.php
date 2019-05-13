@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sidenavAdmin')
        </div>
        <div class="col-md-10 mb-3">
                <div class="jumbotron" style="margin: 20px;">
                    <h1 style="margin-left: 400px;">Users</h1>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <div class="table-bordered bg-light" style="margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <a href="/users/{{ $user->id }}"> <h3>{{ $user -> fname }} {{ $user -> lname }}</h3></a>
                                        <h5> ID = {{ $user->id }} {{ $user -> userType}}</h5>
                                    </div>

                                    <div class="col-md-3 mb-3" style="margin-left: 100px; margin-top: 10px;">
                                        <form method="POST" action="/users/{{ $user->id }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                            <button class="btn btn-primary btn-danger " type="submit" style="margin-bottom: 10px;">Delete</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$users->links()}}
                    @else
                        <p> No Users exist.</p>
                    @endif
                </div>
        </div>
    </div>
@endsection