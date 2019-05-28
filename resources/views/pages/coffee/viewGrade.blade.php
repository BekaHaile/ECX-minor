@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.gradeSidenav')
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
                                <th scope="col">Scale Weight</th>
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
                                    <td>
                                        {{ $coffee -> scaleWeight}}
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