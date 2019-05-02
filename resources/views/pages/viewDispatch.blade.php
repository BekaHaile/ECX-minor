@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @include('inc.sidenav')
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron" style="margin: 20px;">
                <h1 style="margin-left: 400px;">Dispatch</h1>
                @if(count($coffees) > 0)
                    @foreach($coffees as $coffee)
                        <div class="table-bordered bg-light" style="margin-bottom: 10px;">
                            <a href="/coffees/{{ $coffee->id }}"> <h3>{{ $coffee -> ownerName }} {{ $coffee -> ownerPhone }}</h3></a>
                            <h5> ID = {{ $coffee->id }} {{ $coffee -> washingStation}}</h5>
                        </div>
                    @endforeach
                    {{$coffees->links()}}
                @else
                    <p> No Users exist.</p>
                @endif
            </div>
        </div>
    </div>
@endsection