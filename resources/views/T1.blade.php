<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .flex_container {
            display: flex;
            flex-wrap: wrap;
            border: solid 5px rgb(216, 30, 30);
            /*height: 950px;*/
            /*margin: 2%;*/
        }

        .font {
            color: #fff;
            text-align: center;
            font-size: 50px;
        }

        .box {
            background-color: rgb(124, 185, 25);
            margin: 0.5%;
            width: 275px;
        }

        .box_normal {
            order: -1;
            height: 200px;
            line-height: 200px;
        }

        .box_short {
            order: 1;
            height: 100px;
            line-height: 100px;
        }

        .box_long {
            height: 300px;
            line-height: 300px;
        }
    </style>
</head>
<body>
<div class="flex_container">
    <div class="font box box_normal">1</div>
    <div class="font box box_short">2</div>
    <div class="font box box_normal">3</div>
    <div class="font box box_short">4</div>
    <div class="font box box_long">5</div>
    <div class="font box box_short">6</div>
    <div class="font box box_normal">7</div>
    <div class="font box box_short">8</div>
    <div class="font box box_long">9</div>
    <div class="font box box_normal">10</div>
</div>
</body>
</html>
