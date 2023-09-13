<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta id="csrf-token" name="csrf-token">
    <title>PLC Modbus平台</title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="/css/Web_layout.css">
</head>
<body>

<div>
    <div class="row title-bar">
        <h3>Company</h3>
    </div>

    <div class="row mx-0">
        <div class="col-2">
            <ul class="menu navbar-nav">
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
        <div class="col-10">
            <div class="box" style="overflow-y: scroll;padding-bottom: 6px;max-height: 85vh;">
                <h4 class="mb-4 headline">@yield('Title')</h4>
                @yield('Content')
            </div>
        </div>
    </div>
</div>

@yield('Modal')
<script src="/lib/jQuery/jquery.min.js"></script>
<script src="/lib/jQueryUI/jquery-ui.min.js"></script>
<script src="/lib/FontAwesome/js/all.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    // 頁面跳轉
    if (screen.width < 1080) location.href = `${location.origin}/mb/dashboard`;
</script>
@yield('Js')
</body>
</html>
