@extends('Share.Web2Layout')

@section('Title')
    設定
@stop

@section('Content')
    <p class="mb-2">Line 通知</p>
    <div class="row mx-0 justify-content-between">
        <div class="row mx-0 col-6 ps-0 pe-3">
            <label class="sub">金鑰</label>
            <input id="Input_Line" value="xxxxxxxx" class="form-control">
        </div>
        <div class="col-auto align-middle">
            <button id="BtnLine" data-guid="xxxxxxxxx" class="btn btn_main">更新</button>
        </div>
    </div>
    <hr/>
    <p class="mb-2">信箱</p>
    <div class="row mx-0 justify-content-between">
        <div class="row mx-0 col-10 ps-0 pe-3">
            <div class="col-6">
                <label class="sub">帳號</label>
                <input id="Input_Email_OwnID" value="xxxxx" class="form-control">
            </div>
            <div class="col-6">
                <label class="sub">密碼</label>
                <input id="Input_Email_OwnPassword" value="xxxxx" type="password" class="form-control">
            </div>
            <div class="col-12">
                <label class="sub">發送者(群)</label>
                <input id="Input_Email_Tos" value="xxxxx" class="form-control">
            </div>
        </div>
        <div class="col-auto align-middle">
            <button id="BtnEmail" data-guid="xxxxxxx" class="btn btn_main">更新</button>
        </div>
    </div>
    <hr/>
    <p class="mb-2">簡訊</p>
    <div class="row mx-0 justify-content-between">
        <div class="row mx-0 col-10 ps-0 pe-3">
            <div class="col-4">
                <label class="sub">帳號</label>
                <input id="Input_SMS_ID" value="xxxxxx" class="form-control">
            </div>
            <div class="col-4">
                <label class="sub">密碼</label>
                <input id="Input_SMS_Password" value="xxxxxx" type="password" class="form-control">
            </div>
            <div class="col-12">
                <label class="sub">通知者(群)</label>
                <input id="Input_SMS_Tos" value="xxxxxxx" class="form-control">
            </div>
        </div>
        <div class="col-auto align-middle">
            <button id="BtnSMS" data-guid="xxxxxxx" class="btn btn_main">更新</button>
        </div>
    </div>
    <hr/>
@stop

@section('Js')
    <script>
        $("#set").addClass("active");
    </script>
@stop
