@extends('Share.Mobile2Layout')

@section('Title')
    設定
@stop

@section('Content')
    <div class="box">
        <p class="mb-2">Line 通知</p>
        <label class="sub">金鑰</label>
        <input id="Input_Line" value="xxxxxx" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnLine" data-guid="xxxxx" class="btn btn_main">更新</button>
        </div>
        <hr/>
        <p class="mb-2">信箱</p>
        <label class="sub">帳號</label>
        <input id="Input_Email_OwnID" value="xxxxx" class="form-control">
        <label class="sub">密碼</label>
        <input id="Input_Email_OwnPassword" value="xxxxx" type="password" class="form-control">
        <label class="sub">發送者(群)</label>
        <input id="Input_Email_Tos" value="xxxxxx" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnEmail" data-guid="xxxxxx" class="btn btn_main">更新</button>
        </div>
        <hr/>
        <p class="mb-2">簡訊</p>
        <label class="sub">帳號</label>
        <input id="Input_SMS_ID" value="xxxxxxx" class="form-control">
        <label class="sub">密碼</label>
        <input id="Input_SMS_Password" value="xxxxxx" type="password" class="form-control">
        <label class="sub">剩餘量</label>
        <input id="Input_SMS_Tos" value="xxxxxxx" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnSMS" data-guid="xxxxxxxxx" class="btn btn_main">更新</button>
        </div>
        <hr/>
    </div>
@stop

@section('Js')
@stop
