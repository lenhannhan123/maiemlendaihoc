<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("Title")</title>

    {{-- Navbar --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">



</head>
<body>
    {{-- Navition bar --}}
    @include('layouts.layoutuser.navbar')
    {{--content--}}

    <div class="content-wrapper"> @yield('content')</div>



    {{--Jquery--}}    
    
    <script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    @include('layouts.layoutuser.footer')
</body>
</html>