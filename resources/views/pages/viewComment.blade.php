@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Comments</h1>
        @foreach($comments as $comment)
            <li>{{ $comment -> comment }}  {{ $comment -> category }}</li>
        @endforeach
    </div>

@endsection