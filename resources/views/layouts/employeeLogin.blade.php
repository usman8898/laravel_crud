<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Employee Management System') }}</title>

    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/stylesheet2.css') }}">

    <!-- Scripts -->
    <script type="application/x-javascript">
     addEventListener("load", function() {
                 setTimeout(hideURLbar, 0); }, false);
                  function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
      
      <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
