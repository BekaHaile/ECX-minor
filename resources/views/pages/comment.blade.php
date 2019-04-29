@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h3>Provide any comments you have about ECX here.</h3>
        <form>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="comment" style="margin-top: 70px;"><h4>Comment</h4></label>
                    <textarea class="form-control" id="comment" style="margin-left: 180px;"
                              placeholder="Comment" value="" required rows="10" cols="60">
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