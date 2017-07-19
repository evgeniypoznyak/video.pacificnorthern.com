<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pacific Northern Video</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    <style>

    </style>

</head>
<body>

@include('layouts.nav')

<div class="container">
    @yield('content')
</div>


<div class="container" id="search-result" style="display: none">
    <br>
    <div class="row" >
        <div class="col-md-3"><h3 id="search-title">Search Result:</h3></div>
        <div class="col-md-9">
            <span id="search-result-list"></span>
        </div>
    </div>
</div>


@include('layouts.footer')

@yield('scriptForVideo')

</body>
</html>
