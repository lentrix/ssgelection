<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <title>{{config('app.name')}}</title>
</head>
<body>

    @include('partials.nav')
    @include('partials.messages')

    <div class="container">
        @yield('content')
    </div>

    <br><br>
    @yield(('scripts'))

</body>
</html>
