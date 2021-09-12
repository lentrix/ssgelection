<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>SSG Attendance</title>
    <style>
        body{
            margin: 0;
            background-color: green;
        }
        .label {
            font-family: 'Assistant', sans-serif;
            font-size: 25px;
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
            height: 100px;
            background-color: rgb(2, 22, 49);
            z-index: -100;
            margin-top: 40px;
            border-radius: 0 70px 70px 0;
            box-shadow: 0 0 10px 3px #555;
            color: orange;
            padding-top: 25px;
            position: relative;
        }
    </style>
</head>
<body>
    <div id="code">
        <div class="label" v-if="checkPoint!=null">
            Attendance Checkpoint
        </div>
        <div class="code" v-if="checkPoint!=null">
            <div v-if="checkPoint!=null">
                <div style="font-size: 1.2em; position: absolute; top: 30px; left: 20px;">CODE:</div>
                <div style="font-size: 3.6em; position: absolute; top: 20px; left: 100px; font-family: 'Libre Baskerville'">
                    <span @click="stop" style="cursor: pointer;">{{checkPoint.code}}</span>
                </div>
                <div style="position: absolute; bottom: 5px; left: 30px; font-family: 'Assitant'; font-size: 1.5em">Scope: {{checkPoint.starts}} - {{checkPoint.expires}}</div>
            </div>
            <div v-if="error!=''">{{error}}</div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
