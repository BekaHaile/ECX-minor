@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="py-5 text-center">
            <h2>Price Report of ECX</h2>
        </div>
        <div class="container" style="height: 50px;">
            <form class="needs-validation" method="POST" action="/searchReport">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <h4><label for="region">Region :</label></h4>
                        </div>
                        <div class="col-md-3 mb-3" style="margin-left: -30px;">
                            <select class="form-control" id="region" name="region" >
                                @foreach($coffees as $coffee)
                                    <option @if($count == 1 && $coffee->region == $region) selected @endif>{{$coffee->region}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <h4><label for="grade">Grade :</label></h4>
                        </div>
                        <div class="col-md-3 mb-3" style="margin-left: -30px;">
                            <select class="form-control" id="grade" name="grade">
                                @foreach($coffees as $coffee)
                                    <option @if($count == 1 && $coffee->washedGrade == $grade) selected @endif>{{$coffee->washedGrade}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3" style="margin-left: -60px;">
                            <button class="btn btn-primary btn-md " type="submit" style="margin-bottom: 10px;">
                                <span class="glyphicon glyphicon-search">search</span> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if($count == 1)
            @if(count($coffees2) > 0)
            <div class="col-md-6 mb-3" style="margin-left: 300px;">
                <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-top: 20px;">
                    <table class="table table-hover table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th scope="col">Region</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coffees2 as $coffee)
                            <tr>
                                <td>
                                    {{ $coffee -> region }}
                                </td>
                                <td>
                                    {{ $coffee -> washedGrade }}
                                </td>
                                <td>
                                    {{ $coffee -> price }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{ $coffees2->links()}}
        @else
                <p style="margin-top: 30px;"> <h4> No coffee to view.</h4></p>
        @endif
        @endif
    </div>
@endsection