<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    let setTimeout_id;
    function myFunction() {
        clearTimeout(setTimeout_id);
        setTimeout_id = setTimeout(function(){ alert("Hello") }, 3000);
    }
    myFunction();
    let myWindow = window.open("", "", "width=200, height=100");
    myWindow.document.write("<p>這是一個新窗口</p>");
    setTimeout(function(){ myWindow.close() }, 3000);
</script>
</body>
</html>
