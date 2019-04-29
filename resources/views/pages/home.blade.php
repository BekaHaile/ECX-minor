@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to Coffee Suppliers System for Ethiopian Commodity Exchange</h1>
        <p>The first of its kind in Ethiopia, ECX is a national multi-commodity exchange that provides low-cost, secure marketplace services to benefit<br>
            all agricultural market stakeholders and invites industry professionals to seek membership enabling them to participate in trading.<br>
            Ethiopian commodity exchange (ECX) also accepts coffee from individual coffee suppliers and process it before it is <br>
            exported. The organization works in relation with farmers’ union, suppliers, coffee senders’ union, and coffee roasters<br>
            union. ECX manages all of the process beginning from accepting coffee from suppliers, assigning grade to the<br>
            coffee and selling it to the rest of the world. </p>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">About</a>  </p>
    </div>
    <div class="jumbotron text-center">
        <h1>Help on how to use this website</h1>
        <P>If you want to see information on how to get your JAR certificate,
        click the button below.</P>
        <p><a class="btn btn-primary btn-lg bg-secondary" href="/help" role="button">Help</a>  </p>
    </div>
@endsection
