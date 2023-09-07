<!doctype html>
{{-- 聲明必須是HTML文檔的第一行, 放於<html>標籤之前。聲明不是HTML標籤； --}}

<html lang="en">
{{-- 文檔的開始點和結束點 --}}
<head>
    {{--
        可放置多個元素引用腳本、指示瀏覽器在哪裡找到樣式表、提供元信息等等。
        文檔的頭部描述了文檔的各種屬性和信息，包括文檔的標題、在Web 中 的位置以及和其他文檔的關係等。絕大多數文檔頭部包含的數據都不會真正作為內容顯示給讀者
    --}}

    {{-- meta 提供有關頁面的元信息，比如針對搜索引擎和更新頻度的描述和關鍵詞 --}}
    <meta charset="UTF-8">
    {{-- 編碼部分 --}}

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {{-- 讓網頁符合系統裝置的此寸動態轉換 --}}

    <meta name="author" content="xxx系統">
    {{-- 指定作者或頁面擁有人資訊 --}}

    <meta name="description" content="作者：A.N. Author，插畫作者：V. Gogh，價格：$17.99，頁數：784 頁"/>
    {{-- 指定網頁描述說明描述網頁內容有哪些關鍵字詞，通常是用來給搜尋引擎 (Google) 爬的，會用來顯示在搜尋結果中。 --}}

    <meta name="keywords" content="HTML,CSS,JavaScript">
    {{-- 說明網頁關鍵字描述網頁內容有哪些關鍵字詞，通常是用來給搜尋引擎 (Google) 爬的，幫助搜尋引擎理解你的網頁, 你可以用逗號來分隔開不同的關鍵字--}}

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- 提供給 IE 支援使用 往往都被取消 都採取 Google chrome --}}

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    {{-- 瀏覽器 Tab 的icon --}}

    <title>Im Not King</title>
    {{-- 網頁瀏覽器的 Tab 標題 --}}

    <link rel="stylesheet" href="xxxx.css">
    {{-- 引入美化網頁 1: 內部路徑, 2: 網址外部--}}
</head>
<body>
    <p>LEVEL 0 "Hello World! :9f51e2d6-cfcf-499d-8b7b-79fa70195ef0"</p>
    <script>
        {{-- 放置 JS 腳本位置 1: 內部路徑, 2: 網址外部 --}}
    </script>
</body>
</html>
