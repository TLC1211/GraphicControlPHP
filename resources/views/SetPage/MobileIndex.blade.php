@extends('Share.Mobile2Layout')

@section('Title')
    設定
@stop

@section('Content')
    <div class="box">
        <p class="mb-2">Line 通知</p>
        <label class="sub">金鑰</label>
        <input id="Input_Line" value="{{$LineToken}}" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnLine" data-guid="{{$LineGuid}}" class="btn btn_main">更新</button>
        </div>
        <hr/>
        <p class="mb-2">信箱</p>
        <label class="sub">帳號</label>
        <input id="Input_Email_OwnID" value="{{$TmpEmail['OwnEmail']}}" class="form-control">
        <label class="sub">密碼</label>
        <input id="Input_Email_OwnPassword" value="{{$TmpEmail['OwnPassword']}}" type="password" class="form-control">
        <label class="sub">發送者(群)</label>
        <input id="Input_Email_Tos" value="{{$TmpEmail['ToEmail']}}" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnEmail" data-guid="{{$TmpEmail['EmailGuid']}}" class="btn btn_main">更新</button>
        </div>
        <hr/>
        <p class="mb-2">簡訊</p>
        <label class="sub">帳號</label>
        <input id="Input_SMS_ID" value="{{$TmpSMS['OwnPhone']}}" class="form-control">
        <label class="sub">密碼</label>
        <input id="Input_SMS_Password" value="{{$TmpSMS['OwnPassword']}}" type="password" class="form-control">
        <label class="sub">通知者(群)</label>
        <input id="Input_SMS_Tos" value="{{$TmpSMS['ToSMS']}}" class="form-control">
        <div class="text-end pt-3">
            <button id="BtnSMS" data-guid="{{$TmpSMS['SMSGuid']}}" class="btn btn_main">更新</button>
        </div>
        <hr/>
    </div>
@stop

@section('Js')
    <script>
        $("#BtnLine").click(function (v) {
            let getLineToken = $('#Input_Line').val();
            let getLineGuid = v.target.dataset.guid;
            fetch(`http://127.0.0.1:81/LineAPI?LineGuid=${getLineGuid}&LineToken=${getLineToken}`)
                .then(res => res.json())
                .then(data =>{
                    //console.log(data);
                    location.reload();
                });

        });

        $("#BtnEmail").click(function (v) {
            let TmpOwnID = $('#Input_Email_OwnID').val();
            let TmpOwnPassword = $('#Input_Email_OwnPassword').val();
            let TmpOwnTos = $('#Input_Email_Tos').val();
            let getEmailGuid = v.target.dataset.guid;
            const Url = `http://127.0.0.1:81/EmailAPI?EmailGuid=${getEmailGuid}&EmailOwn=${TmpOwnID}&EmailPwd=${TmpOwnPassword}&ToEmail=${TmpOwnTos}`;
            fetch(Url)
                .then(res => res.json())
                .then(data =>{
                    location.reload();
                });

        });

        $("#BtnSMS").click(function (v) {
            let TmpOwnID = $('#Input_SMS_ID').val();
            let TmpOwnPassword = $('#Input_SMS_Password').val();
            let TmpOwnTos = $('#Input_SMS_Tos').val();
            let getEmailGuid = v.target.dataset.guid;
            const Url = `http://127.0.0.1:81/SMSAPI?SmsGuid=${getEmailGuid}&SmsOwn=${TmpOwnID}&SmsPwd=${TmpOwnPassword}&ToSms=${TmpOwnTos}`;

            fetch(Url)
                .then(res => res.json())
                .then(data =>{
                    location.reload();
                });

        })



    </script>
@stop
