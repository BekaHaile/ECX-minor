@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @elseif($user->userType == 'Administrator')
                @include('inc.sidenavAdmin')
            @else
                @include('inc.scaleSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron" style="margin: 20px;">
                <h1 style="margin-left: 400px;">Coffee Info</h1>
                @if(count($coffees) > 0)
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover ">
                            {{--table-striped mb-0--}}
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Owners' Name</th>
                                <th scope="col">Owners' Phone Number</th>
                                <th scope="col">Washing Station</th>
                                @foreach($coffees as $coffee)
                                    @if($coffee->gradeFill == 1)
                                    <th scope="col">Scale Weight</th>
                                    @break
                                    @endIf
                                @endforeach
                                <th scope="col">Edit</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coffees as $coffee)
                                {{--<div class="table-bordered bg-light" style="margin-bottom: 10px;">--}}
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
                                    @foreach($coffees as $coffee)
                                        @if($coffee->scaleFill == 1)
                                            <td>
                                                {{ $coffee -> scaleWeight}}
                                            </td>
                                            @break
                                        @endIf
                                    @endforeach
                                    <td>
                                        <a href=@if ($coffee->scaleFill == 0) "/coffees/{{ $coffee->id }}/createScale"
                                        @else "/coffees/{{ $coffee->id }}/editScale"
                                        @endif > <button class="btn btn-primary"  style="margin-bottom: 10px;">
                                        @if ($coffee->scaleFill == 0)Insert Scale
                                        @else Edit Scale
                                        @endif </button> </a>
                                </td>
                                <td>
                                    <form method="POST" action="/coffees/{{ $coffee->id }}">
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

                    {{$coffees->links()}}
                @else
                    <p> No Coffees exist.</p>
                @endif
            </div>
        </div>
    </div>
@endsection