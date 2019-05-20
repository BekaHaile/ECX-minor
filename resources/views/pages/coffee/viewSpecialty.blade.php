@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.specialtySidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron" style="margin: 20px;">
                <h1 style="margin-left: 400px;">Coffee Info</h1>
                @if(count($coffees) > 0)
                    @foreach($coffees as $coffee)
                        <div class="table-bordered bg-light" style="margin-bottom: 10px;">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <h3>{{ $coffee -> ownerName }} {{ $coffee -> ownerPhone }}</h3>
                                    <h5> ID = {{ $coffee->id }} {{ $coffee -> washingStation}} {{ $coffee -> scaleWeight}}</h5>
                                </div>
                                <div class="col-md-1 mb-3" style="margin-left: 100px; margin-top: 10px;">
                                    <a href=@if ($coffee->scaleFill == 0) "/coffees/{{ $coffee->id }}/createSpecialty"
                                            @else "/coffees/{{ $coffee->id }}/editSpecialty"
                                            @endif > <button class="btn btn-primary"  style="margin-bottom: 10px;">
                                            @if ($coffee->scaleFill == 0)Insert Specialty
                                            @else Edit Specialty
                                            @endif </button> </a>
                                </div>
                                <div class="col-md-2 mb-3" style="margin-top: 10px; margin-left: 5px;">
                                    <form method="POST" action="/coffees/{{ $coffee->id }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <button class="btn btn-primary btn-danger " type="submit" style="margin-bottom: 10px;">Delete</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$coffees->links()}}
                @else
                    <p> No Coffees exist.</p>
                @endif
            </div>
        </div>
    </div>
@endsection