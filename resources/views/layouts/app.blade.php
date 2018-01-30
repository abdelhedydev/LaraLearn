<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>


    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('partials.menu')

        <div class="">
          @yield('content')
        </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
