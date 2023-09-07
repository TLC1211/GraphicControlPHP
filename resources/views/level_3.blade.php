<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/Images/Icon/favicon.ico" type="image/x-icon"/>
    <title>ModbusTCP level 3</title>
</head>
<body>

<div>
    <h2>文本輸入字段</h2>
    <form>
        <label for="fname">姓氏:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">名稱:</label><br>
        <input type="text" id="lname" name="lname" value="Doe">
    </form>
    <p>注意: 表單的框架是不被看見</p>
</div>
<hr>
<div>
    <h2>單選按鈕</h2>
    <p>選擇你喜愛的語言</p>
    <form>
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="html">HTML</label><br>
        <input type="radio" id="css" name="fav_language" value="CSS">
        <label for="css">CSS</label><br>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="javascript">JavaScript</label>
    </form>
</div>
<hr>
<div>
    <h2>多選</h2>
    <form action="/level4#">
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
        <label for="vehicle3"> I have a boat</label><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
