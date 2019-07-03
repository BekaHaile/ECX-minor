@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            {{--@if($user->userType == 'Manager')--}}
                {{--@include('inc.managerSidenav')--}}
            {{--@endif--}}
        </div>
        <div class="col-md-10 mb-3">
    <div class="jumbotron text-center">
        @if($view == 0)
            <h3>Provide any comments you have about ECX here.</h3>
            <form class="needs-validation" method="POST" action="/comment">
        @else
            <h3>Reply to comments.</h3>
            <form class="needs-validation" method="POST" action="/commentReply">
        @endif
           @csrf
            @if($view == 1)
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="comm" style="margin-top: 20px;"><h4>Comment</h4></label>
                        <input type="email" class="form-control" name="comm" id="comm" style="margin-left: 180px;"
                               @if($view == 1 ) value=" {{ $comment -> comment }} Commented on {{ $comment -> created_at}}" readonly @endif>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="comment" style="margin-top: 20px; @if($view == 1) margin-left:-45px; @endif"><h4>Email @if($view == 0 ) (Optional) @endif</h4></label>
                    <input type="email" class="form-control" name="email" id="email" style="margin-left: 180px;"
                           placeholder="you@example.com" @if($view == 1 ) value=" {{$comment->email}}" readonly @endif>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="comment" style="margin-top: 20px; margin-left: -50px;"><h4> @if($view == 0 ) Comment @else Reply @endif</h4></label>
                    <textarea name="comment" class="form-control" id="comment" style="margin-left: 180px;"
                              required rows="10" cols="60">
                    </textarea>
                    <div class="invalid-feedback">
                        Please provide a valid comment.
                    </div>
                </div>
            </div>
            <div class="row">
                <input style="margin-left: 200px;" type="submit" value="Submit" class="btn btn-primary btn-lg bg-primary">
            </div>
        </form>
    </div>
@endsection