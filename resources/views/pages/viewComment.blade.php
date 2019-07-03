@extends('layouts.app')

@section('content')
    <style>
        a.nav-link{
            color: black ;
        }
    </style>
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Manager')
                @include('inc.managerSidenav')
            @else
                @include('inc.sidenavAdmin')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light">
                <h1 style="margin-left: 400px;">Comments</h1>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="positive-tab" data-toggle="tab" href="#positive" role="tab" aria-controls="home"
                           aria-selected="true">Positive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="negative-tab" data-toggle="tab" href="#negative" role="tab" aria-controls="profile"
                           aria-selected="false">Negative</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="neutral-tab" data-toggle="tab" href="#neutral" role="tab" aria-controls="contact"
                           aria-selected="false">Neutral</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="positive" role="tabpanel" aria-labelledby="positive-tab">
                        @if(count($commentsP) > 0)
                            <div class="row">

                                <div class="col-md-12">
                                    @foreach($commentsP as $comment)
                                        <div class="table-bordered bg-light" style="margin: 10px;">
                                                <p>{{ $comment -> comment }}</p>
                                            @if($comment->email != '')
                                                <a href="/comments/{{ $comment->id }}/edit">
                                                    <button class="btn-sm btn-success"  style="float: right;"> Reply</button></a>
                                            @endif
                                                <small>Commented on {{ $comment -> created_at}}</small>
                                        </div>
                                    @endforeach
                                    {{$commentsP->links()}}
                                </div>
                            </div>

                        @else
                            <p> No comments to view.</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="negative" role="tabpanel" aria-labelledby="negative-tab">
                        @if(count($commentsN) > 0)
                            <div class="row">

                                <div class="col-md-12">
                                    @foreach($commentsN as $comment)
                                        <div class="table-bordered bg-light" style="margin: 10px;">
                                            <p>{{ $comment -> comment }}</p>
                                            @if($comment->email != '')
                                                <a href="/comments/{{ $comment->id }}/edit">
                                                    <button class="btn-sm btn-success"  style="float: right;"> Reply</button></a>
                                            @endif
                                            <small>Commented on {{ $comment -> created_at}}</small>
                                        </div>
                                    @endforeach
                                    {{$commentsN->links()}}
                                </div>
                            </div>
                            {{$commentsN->links()}}

                        @else
                            <p> No comments to view.</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="neutral" role="tabpanel" aria-labelledby="neutral-tab">
                        @if(count($commentsNt) > 0)
                            <div class="row">

                                <div class="col-md-12">
                                    @foreach($commentsNt as $comment)
                                        <div class="table-bordered bg-light" style="margin: 10px;">
                                            <p>{{ $comment -> comment }}</p>
                                            @if($comment->email != '')
                                                <a href="/comments/{{ $comment->id }}/edit">
                                                <button class="btn-sm btn-success"  style="float: right;"> Reply</button></a>
                                            @endif
                                            <small>Commented on {{ $comment -> created_at}}</small>
                                        </div>
                                    @endforeach
                                    {{$commentsNt->links()}}
                                </div>
                            </div>
                            {{$commentsNt->links()}}

                        @else
                            <p> No comments to view.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection