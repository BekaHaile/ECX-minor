@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 style="margin-left: 400px;">Comments</h1>
        @if(count($comments) > 0)

                <div class="row">

                    <div class="col-md-5">
                        @foreach($comments as $comment)
                            {{--@if($comment->category == 'bad')--}}
                                    <div class="table-bordered bg-light" style="margin-bottom: 10px;">
                                        <a href="/comments/{{ $comment->id }}"> <h3>{{ $comment -> comment }} {{ $comment -> category }}</h3></a>
                                        <small>Commented on {{ $comment -> created_at}}</small>
                                    </div>
                            {{--@endif--}}
                        @endforeach
                            {{--{{$comments->links()}}--}}
                    </div>
                    <div class="col-md-5">
                        @foreach($comments2 as $comment)
                            {{--@if($comment->category == 'good')--}}
                                <div class="table-bordered bg-success" style="margin-bottom: 10px;">
                                    <a href="/comments/{{ $comment->id }}"> <h3>{{ $comment -> comment }} {{ $comment -> category }}</h3></a>
                                    <small>Commented on {{ $comment -> created_at}}</small>
                                </div>
                             {{--@endif--}}
                        @endforeach
                            {{--{{$comments2->links()}}--}}
                    </div>
                </div>
            {{$comments2->links()}}

        @else
            <p> No comments to view.</p>
        @endif
    </div>

@endsection