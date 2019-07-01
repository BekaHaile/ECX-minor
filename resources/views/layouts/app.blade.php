<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CSS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>

    <script src="{{ asset('MDB-Free_4.8.3/js/mdb.js') }}"></script>

    {{--<link rel="stylesheet" href="{{ asset('bootstrap-4/css/bootstrap.css') }}">--}}
    {{--<script src="{{ asset('bootstrap-4/js/bootstrap.js') }}"></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media (min-width: 768px) {
        }

        @media print{
            table { margin: 200px;}
            #print-content{display: block;}
        }

        .footer {
            height: 50px;
        }

        body {
            opacity: 0.98;
            {{--background-image: url("{{ asset('images/ECX2.jpg') }}");--}}
            background-repeat: no-repeat;
        }
        .jumbotron {
            /*margin: 20px;*/
        }
        li a{
            color: white;
        }

    </style>
</head>
<body>
    <div>
        @include('inc.navbar')
        <main class="py-4">
            @yield('content')
        </main>
        @include('inc.footer')
    </div>
</body>
</html>
