@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Coffees</h1>
        @foreach($coffees as $coffee)
            <li>{{ $coffee -> origin }}  {{ $coffee -> grade }}</li>
        @endforeach
    </div>

@endsection