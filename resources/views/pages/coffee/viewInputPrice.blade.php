@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            @if($user->userType == 'Representative')
                @include('inc.repSidenav')
            @endif
        </div>
        <div class="col-md-10 mb-3">
            <div class="jumbotron bg-light" style="margin: 20px;">
                <h1 style="margin-left: 400px;">Coffee Info</h1>

                <div class="col-md-4" style="margin-left: 780px; margin-bottom: 10px;">
                    <form action="/searchInputPrice" method="get">
                        <div class="input-group">
                            <select class="form-control" id="searchBy" name="searchBy" style="margin-right: 5px;">
                                <option>Search By</option>
                                <option>ID</option>
                                <option>Owners Name</option>
                                <option>Phone Number</option>
                                <option>Region</option>
                                <option>Grade</option>
                                <option>Washing Station</option>
                                <option>View All</option>
                            </select>
                            <input type="number" name="view" @if($view == 1) value="1" @else value="0" @endIf hidden>
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>
                </div>

                @if(count($coffees) > 0)
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover table-bordered table-striped mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Owners' Name</th>
                                <th scope="col">Owners' Phone Number</th>
                                <th scope="col">Washing Station</th>
                                <th scope="col">Region</th>
                                <th scope="col">Grade</th>
                                @if($view==0)
                                    <th scope="col">Insert</th>
                                @endif
                                @if($view==1)
                                    <th scope="col">Price</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coffees as $coffee)
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
                                        {{ $coffee -> region}}
                                    </td>
                                    <td>
                                        {{ $coffee -> washedGrade}}
                                    </td>
                                    @if($view==0)
                                        <td>
                                            <a href=@if ($coffee->priceDone == 0) "/coffees/{{ $coffee->id }}/createPrice"
                                            @else "/coffees/{{ $coffee->id }}/editPrice"
                                            @endif > <button class="btn btn-primary"  style="margin-bottom: 10px;">
                                                @if ($coffee->priceDone == 0)Input Price
                                                @else Edit Price
                                                @endif </button> </a>
                                        </td>
                                    @endif
                                    @if($view==1)
                                        <td>
                                            {{ $coffee -> price}} birr
                                        </td>
                                    @endif
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