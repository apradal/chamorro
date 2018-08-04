<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    {{--<script>--}}
        {{--$( function() {--}}
            {{--var availableTags = [--}}
                {{--"ActionScript",--}}
                {{--"AppleScript",--}}
                {{--"Asp",--}}
                {{--"BASIC",--}}
                {{--"C",--}}
                {{--"C++",--}}
                {{--"Clojure",--}}
                {{--"COBOL",--}}
                {{--"ColdFusion",--}}
                {{--"Erlang",--}}
                {{--"Fortran",--}}
                {{--"Groovy",--}}
                {{--"Haskell",--}}
                {{--"Java",--}}
                {{--"JavaScript",--}}
                {{--"Lisp",--}}
                {{--"Perl",--}}
                {{--"PHP",--}}
                {{--"Python",--}}
                {{--"Ruby",--}}
                {{--"Scala",--}}
                {{--"Scheme"--}}
            {{--];--}}
            {{--$( "#pacient" ).autocomplete({--}}
                {{--source: availableTags--}}
            {{--});--}}
        {{--} );--}}
    {{--</script>--}}
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        @yield('content')
    </div>
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
