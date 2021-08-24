<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>SSG Attendance</title>
</head>
<body>
    <h1>Code Generator</h1>
    <div class="alert alert-warning">
        This activity is not scheduled at the moment. <br>
        <strong>Title:</strong>
        {{$activity->title}} <br>
        <strong>Schedule:</strong> <br>
        {{$activity->start->format('F d, Y')}}
        {{$activity->start->format('g:i A')}} -
        {{$activity->end->format('g:i A')}}
    </div>
</body>
</html>
