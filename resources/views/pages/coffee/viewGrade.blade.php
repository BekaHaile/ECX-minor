@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @else
            @include('inc.gradeSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <h1 style="margin-left: 400px;">Coffee Info</h1>

                <div class="col-md-4" style="margin-left: 780px; margin-bottom: 10px;">
                    <form action="/searchGrade" method="get">
                        <div class="input-group">
                            <input type="number" name="view" @foreach($coffees as $coffee) @if($coffee->gradeFill == 1) value="1" @else value="0" @break @endIf @endforeach hidden>
                            <input type="search" name="search" class="form-control" placeholder="Encoded Code">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>
                </div>

                @if(count($coffees) > 0)
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover table-bordered table-striped mb-0">
                            {{--table-striped mb-0--}}
                            <thead>
                            <tr>
                                <th scope="col">Coffee Encoded ID</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coffees as $coffee)
                                <tr>
                                    <td>
                                        {{ $coffee-> encode}}
                                    </td>
                                    <td>
                                        <a href=@if ($coffee->gradeFill == 0) "/coffees/{{ $coffee->id }}/createGrade"
                                        @else "/coffees/{{ $coffee->id }}/editGrade"
                                        @endif > <button class="btn btn-primary"  style="margin-bottom: 10px;">
                                            @if ($coffee->gradeFill == 0)Insert Grade
                                            @else Edit Grade
                                            @endif </button> </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/coffees/{{ $coffee->id }}">
                                            {{ method_field('DELETE') }}
                                            @csrf
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