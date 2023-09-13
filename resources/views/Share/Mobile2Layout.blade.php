<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, initial-scale=1.0, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token">
    <title>PLC Modbus平台</title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="/css/Mobile_layout.css">
</head>
<body>

<div class="row mx-0 title-bar justify-content-between fixed-top" id="title_bar">
    <div class="col-auto menu">
        <button class="btn btn_water p-0" onclick="openNav()"><img src="../images/icon/menu.png"></button>
    </div>
    <div class="col-auto"></div>
    <h3 class="col-12 px-0">@yield('Title')</h3>
</div>

<div id="openSidebar" class="open_sidebar">
    <a href="javascript:void(0)" class="btn btn_water" onclick="closeNav()"><img src="../images/icon/close.png"></a>
    <ul class="menu navbar-nav pt-5">
        <li class="nav-item">
            <a class="btn btn_menu" href="./dashboard" id="dashboard">儀錶板</a>
        </li>
        <li class="nav-item">
            <a class="btn btn_menu" href="./charSet" id="charSet">圖表定義值</a>
        </li>
        <li class="nav-item">
            <a class="btn btn_menu" href="./Component" id="Component">元件定義值</a>
        </li>
        <li class="nav-item">
            <a class="btn btn_menu" href="./set" id="set">設定</a>
        </li>
    </ul>
</div>

<div class="content">
    @yield('Content')
</div>

@yield('Modal')

<script src="/lib/jQuery/jquery.min.js"></script>
<script src="/lib/jQueryUI/jquery-ui.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/lib/FontAwesome/js/all.js"></script>
<script src="/lib/highchart/highcharts.js"></script>
<script>
    // 瀏覽器高度
    $(document).ready(function () {
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
            window.addEventListener('resize', () => {
                let vh = window.innerHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
            });

            $(window).scroll(function () {
                $(".title-bar").toggleClass("titlebar-shrink", $(this).scrollTop() > 20)
            });
        }
    );

    // 選單收合
    function openNav() {
        document.getElementById("openSidebar").style.width = "200px";
    }

    function closeNav() {
        document.getElementById("openSidebar").style.width = "0";
    }
</script>
@yield('Js')
</body>
</html>
