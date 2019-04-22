@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to Ethiopian Commodity Exchange</h1>
        <P>Web page of ECX</P>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">About</a>  </p>
    </div>
    <div class="jumbotron text-center">
        <h1>Help on how to use this website</h1>
        <P>If you want to see information on how to get your JAR certificate,
        click the button below.</P>
        <p><a class="btn btn-primary btn-lg bg-secondary" href="/help" role="button">Help</a>  </p>
    </div>
@endsection
