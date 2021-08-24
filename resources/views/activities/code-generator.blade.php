<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Play&display=swap" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <title>SSG Attendance</title>
    <style>
        body{
            margin: 0;
            background-color: green;
        }
        .label {
            font-family: 'Play', sans-serif;
            font-size: 20px;
            background-color: orange;
            color: #333;
            padding: 5px;
            border-radius: 0 25px 25px 0;
            width: 300px;
            height: 40px;
            line-height: 40px;
            text-align:center;
            float: left;
            margin-top: -30px;
        }
        .code {
            width: 450px;
            height: 70px;
            background-color: rgb(2, 22, 49);
            z-index: -100;
            margin-top: 40px;
            border-radius: 0 50px 50px 0;
            box-shadow: 0 0 10px 3px #555;
            color: orange;
            padding-top: 25px;
            font-family: 'Alfa Slab One', cursive;
        }
    </style>
</head>
<body>
    <div class="label">
        Attendance Checkpoint
    </div>
    <div class="code">
        <div style="font-size: 1.2em; margin-left: 18px; margin-top: 8px">CODE:</div>
        <div style="font-size: 3.6em; padding-left: 85px; margin-top: -38px" id="code">
            XXXXX
        </div>
    </div>

    <script>
        async function loop() {
            var now = new Date();
            var end = {{$activity->end}}

            await console.log(now, end);
        }

        loop()
    </script>
</body>
</html>
