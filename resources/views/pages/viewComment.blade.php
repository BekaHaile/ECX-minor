@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 style="margin-left: 400px;">Comments</h1>
        @if(count($comments) > 0)
            @foreach($comments as $comment)
                <div class="table-bordered bg-light" style="margin-bottom: 10px;">
                    <a href="/comments/{{ $comment->id }}"> <h3>{{ $comment -> comment }} {{ $comment -> category }}</h3></a>
                    <small>Commented on {{ $comment -> created_at}}</small>
                </div>
            @endforeach
            {{$comments->links()}}
        @else
            <p> No comments to view.</p>
        @endif
    </div>

@endsection