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
                <h1 style="margin-left: 400px;">Coffee Info</h1>
                @if(count($coffees) > 0)
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Owners' Name</th>
                                <th scope="col">Owners' Phone Number</th>
                                <th scope="col">Washing Station</th>
                                <th scope="col">Region</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Edit</th>
                                @foreach($coffees as $coffee)
                                    @if($coffee->jarApproved == 0)
                                        <th scope="col">Remove</th>
                                        @break
                                    @endIf
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coffees as $coffee)
                                <tr>
                                    <td>
                                        {{ $coffee->id }}
                                    </td>
                                    <td>
                                        {{ $coffee -> ownerName }}
                                    </td>
                                    <td>
                                        {{ $coffee -> ownerPhone }}
                                    </td>
                                    <td>
                                        {{ $coffee -> washingStation}}
                                    </td>
                                    <td>
                                        {{ $coffee -> region}}
                                    </td>
                                    <td>
                                        {{ $coffee -> grade}}
                                    </td>
                                    <td>
                                        <a href = "/coffees/{{ $coffee->id }}/approveJar"> <button class="btn btn-primary"  style="margin-bottom: 10px;">
                                             View Jar
                                            </button> </a>
                                    </td>
                                    @if( $coffee -> jarApproved ==0)
                                    <td>
                                        <form method="POST" action="/coffees/{{ $coffee->id }}">
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

                    {{$coffees->links()}}
                @else
                    <p> No Coffees exist.</p>
                @endif
            </div>
        </div>
    </div>
@endsection