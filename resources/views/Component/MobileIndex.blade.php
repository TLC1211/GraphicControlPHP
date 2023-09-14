@extends('Share.Mobile2Layout')

@section('Title')
    元件定義值
@stop

@section('Content')
    <div class="box">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>名稱</th>
                    <th>起始地址</th>
                    <th>類型</th>
                    <th></th>
                    {{--<th></th> --}}
                </tr>
                </thead>
                <tbody>
                @foreach($TmpBitCells as $value)
                    <tr>
                        <td>{{$value['Name']}}</td>
                        <td>{{$value['Address']}}</td>
                        <td>BitCells</td>
                        <td>
                            <button class="btn btn_main Btn_BitCells"
                                    data-name="{{$value['Name']}}"
                                    data-address="{{$value['Address']}}"
                                    data-notifystatus="{{$value['NotifyStatus']}}"
                                    data-notifycollectdata="{{$value['NotifyCollectData']}}"
                                    data-guid="{{$value['Guid']}}">編輯
                            </button>
                        </td>
                    </tr>
                @endforeach
                {{-- ############################################## --}}
                @foreach($TmpWordV as $value)
                    <tr>
                        <td>{{$value['Name']}}</td>
                        <td>{{$value['Address']}}</td>
                        <td>Word</td>
                        <td>
                            <button class="btn btn_main Btn_Word"
                                    data-name="{{$value['Name']}}"
                                    data-address="{{$value['Address']}}"
                                    data-collectdata="{{json_encode(($value['CollectData']))}}"
                                    data-notifystatus="{{$value['NotifyStatus']}}"
                                    data-notifycollectdata="{{json_encode($value['NotifyCollectData'])}}"
                                    data-guid="{{$value['Guid']}}">編輯
                            </button>
                        </td>
                    </tr>
                @endforeach
                {{-- ############################################## --}}
                @foreach($TmpStringV as $value)
                    <tr>
                        <td>{{$value['Name']}}</td>
                        <td>{{$value['Address']}}</td>
                        <td>String</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('Modal')
    @include('share.Jump.BitCellsEdit_Modal')
    @include('share.Jump.WordEdit_Modal')
@stop

@section('Js')
    <script>
        let BitCellsModal = document.getElementById('BitCellsModal');
        let Modal_BitCells = new bootstrap.Modal(BitCellsModal, {keyboard: false});
        let TmpBitCellsModal_Btn = null, TmpBitCellsModal_BtnDismiss = null;
        let TmpGuid = '';

        $('.Btn_BitCells').click(function (data) {
            TmpBitCellsModal_Btn = $("#BitCellsModal_Btn");
            TmpBitCellsModal_BtnDismiss = $("#BitCellsModal_BtnDismiss");

            TmpGuid = data.target.dataset.guid

            let TmpJsonCollectData = JSON.parse(data.target.dataset.notifycollectdata); // 0:Line, 1:Email, 2:SMS
            let TmpNotifyStatus = parseInt(data.target.dataset.notifystatus);

            $("#BitCellsModal_Header").html(`${data.target.dataset.name} (${data.target.dataset.address})`);
            $("#BitCellsModal_Body").html(`
                    <div class="col-xl-4 mb-4">
                        <label class="sub">是否警示</label>
                        <select id="BitCellsModal_Body_NotifyStatus" class="form-control">
                            <option ${(TmpNotifyStatus === 0) ? 'selected' : ''} value="0">不需要警示</option>
                            <option ${(TmpNotifyStatus === 1) ? 'selected' : ''} value="1">需要警示</option>
                        </select>
                    </div>
                    <div class="col-xl-4 mb-4">
                        <label class="sub">警示類型</label>
                        <select id="BitCellsModal_Body_NotifyType" class="form-control">
                            <option ${(TmpJsonCollectData['NotifyType'] === 0) ? 'selected' : ''} value="0">OFF觸發</option>
                            <option ${(TmpJsonCollectData['NotifyType'] === 1) ? 'selected' : ''} value="1">ON 觸發</option>
                        </select>
                    </div>
                    <div class="col-xl-4 mb-4">
                        <label class="sub">通知媒介</label>
                        <select id="BitCellsModal_Body_NotifyPlatFrom" class="form-control">
                            <option ${(TmpJsonCollectData['NotifyPlatFrom'] === 0) ? 'selected' : ''} value="0">Line</option>
                            <option ${(TmpJsonCollectData['NotifyPlatFrom'] === 1) ? 'selected' : ''} value="1">Email</option>
                            <option ${(TmpJsonCollectData['NotifyPlatFrom'] === 2) ? 'selected' : ''} value="2">SMS</option>
                        </select>
                    </div>
            `);
            Modal_BitCells.show();

            TmpBitCellsModal_Btn.click(function (e) {
                let TmpBitCellsModal_Body_NotifyStatus = document.querySelector('#BitCellsModal_Body_NotifyStatus');
                let TmpBitCellsModal_Body_NotifyType = document.querySelector('#BitCellsModal_Body_NotifyType');
                let TmpBitCellsModal_Body_NotifyPlatFrom = document.querySelector('#BitCellsModal_Body_NotifyPlatFrom');

                let Url = `http://127.0.0.1:81/ComponentApi?Guid=${TmpGuid}&Type=BitCell&Upload=${JSON.stringify({
                    NotifyStatus: parseInt(TmpBitCellsModal_Body_NotifyStatus.value),
                    NotifyType: parseInt(TmpBitCellsModal_Body_NotifyType.value),
                    NotifyPlatFrom: parseInt(TmpBitCellsModal_Body_NotifyPlatFrom.value)
                })}`;
                fetch(Url).then(res => res.json()).then(data => {
                    Modal_BitCells.hide();
                    location.reload();
                });
            });

            TmpBitCellsModal_BtnDismiss.click(function (e) {
                Modal_BitCells.hide();
                location.reload();
            });
        });

        //#########################################################################################

        let WordModal = document.getElementById('WordModal');
        let Modal_Word = new bootstrap.Modal(WordModal, {keyboard: false});
        let TmpWordModal_Btn = null, TmpWordModal_BtnDismiss = null;

        $('.Btn_Word').click(function (data) {
            TmpWordModal_Btn = $("#WordModal_Btn");
            TmpWordModal_BtnDismiss = $("#WordModal_BtnDismiss");
            TmpGuid = data.target.dataset.guid

            let TmpJsonCollectData = JSON.parse(data.target.dataset.collectdata);
            let TmpJsonNotifyCollectData = JSON.parse(data.target.dataset.notifycollectdata); // 0:Line, 1:Email, 2:SMS
            let TmpNotifyStatus = parseInt(data.target.dataset.notifystatus);

            $("#WordModal_Header").html(`${data.target.dataset.name} (${data.target.dataset.address})`);
            $("#WordModal_Body").html(`
                    <div class="col-xl-4 mb-4">
                        <label class="sub">Word類型</label>
                        <select id="WordModal_Body_WordType" class="form-control">
                            <option ${(TmpJsonCollectData['WordType'] === 'Word') ? 'selected' : ''} value="Word">Word</option>
                            <option ${(TmpJsonCollectData['WordType'] === 'DWord') ? 'selected' : ''} value="DWord">Dword</option>
                        </select>
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">有號無號 Signed</label>
                        <select id="WordModal_Body_SignedType" class="form-control">
                            <option ${(TmpJsonCollectData['SignedType'] === true) ? 'selected' : ''} value="1">有號</option>
                            <option ${(TmpJsonCollectData['SignedType'] === false) ? 'selected' : ''} value="0">無號</option>
                        </select>
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">數值倍率(寫入乘倍數, 讀取除倍數)</label>
                        <select id="WordModal_Body_NumberOfDecimals" class="form-control">
                            <option ${(TmpJsonCollectData['NumberOfDecimals'] === 0) ? 'selected' : ''} value="0">1</option>
                            <option ${(TmpJsonCollectData['NumberOfDecimals'] === 1) ? 'selected' : ''} value="1">10</option>
                            <option ${(TmpJsonCollectData['NumberOfDecimals'] === 2) ? 'selected' : ''} value="3">100</option>
                            <option ${(TmpJsonCollectData['NumberOfDecimals'] === 3) ? 'selected' : ''} value="4">1000</option>
                        </select>
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">高低位置交換</label>
                        <select id="WordModal_Body_HLValueConvert" class="form-control">
                            <option ${(TmpJsonCollectData['HLValueConvert'] === 0) ? 'selected' : ''} value="0">ABCD</option>
                            <option ${(TmpJsonCollectData['HLValueConvert'] === 1) ? 'selected' : ''} value="1">DCBA</option>
                            <option ${(TmpJsonCollectData['HLValueConvert'] === 2) ? 'selected' : ''} value="3">ABDC</option>
                            <option ${(TmpJsonCollectData['HLValueConvert'] === 3) ? 'selected' : ''} value="4">CDAB</option>
                        </select>
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">是否警示</label>
                        <select id="WordModal_Body_NotifyStatus" class="form-control">
                            <option ${(TmpNotifyStatus === 0) ? 'selected' : ''} value="0">不需要警示</option>
                            <option ${(TmpNotifyStatus === 1) ? 'selected' : ''} value="1">需要警示</option>
                        </select>
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">數值大於(大於等於)</label>
                        <input id="WordModal_Body_MaxValue" value="${TmpJsonCollectData['MaxValue']}" class="form-control">
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">數值小於(小於等於)</label>
                        <input id="WordModal_Body_MinValue" value="${TmpJsonCollectData['MinValue']}" class="form-control">
                    </div>

                    <div class="col-xl-4 mb-4">
                        <label class="sub">通知媒介</label>
                        <select id="WordModal_Body_NotifyPlatFrom" class="form-control">
                            <option ${(TmpJsonNotifyCollectData['NotifyPlatFrom'] === 0) ? 'selected' : ''} value="0">Line</option>
                            <option ${(TmpJsonNotifyCollectData['NotifyPlatFrom'] === 1) ? 'selected' : ''} value="1">Email</option>
                            <option ${(TmpJsonNotifyCollectData['NotifyPlatFrom'] === 2) ? 'selected' : ''} value="2">SMS</option>
                        </select>
                    </div>
            `);

            Modal_Word.show();

            TmpWordModal_Btn.click(function (e) {
                let TmpWordModal_Body_WordType = document.querySelector('#WordModal_Body_WordType');
                let TmpWordModal_Body_SignedType = document.querySelector('#WordModal_Body_SignedType');
                let TmpWordModal_Body_NumberOfDecimals = document.querySelector('#WordModal_Body_NumberOfDecimals');
                let TmpWordModal_Body_HLValueConvert = document.querySelector('#WordModal_Body_HLValueConvert');

                let TmpWordModal_Body_MaxValue = document.querySelector('#WordModal_Body_MaxValue');
                let TmpWordModal_Body_MinValue = document.querySelector('#WordModal_Body_MinValue');
                let TmpWordModal_Body_NotifyStatus = document.querySelector('#WordModal_Body_NotifyStatus');
                let TmpWordModal_Body_NotifyPlatFrom = document.querySelector('#WordModal_Body_NotifyPlatFrom');

                let Url = `http://127.0.0.1:81/ComponentApi?Guid=${TmpGuid}&Type=Word&Upload=${JSON.stringify({
                    CollectData: {
                        WordType: TmpWordModal_Body_WordType.value,
                        SignedType: (TmpWordModal_Body_SignedType.value === '1'),
                        NumberOfDecimals: parseInt(TmpWordModal_Body_NumberOfDecimals.value),
                        MaxValue: parseFloat(TmpWordModal_Body_MaxValue.value),
                        MinValue: parseFloat(TmpWordModal_Body_MinValue.value),
                        HLValueConvert: parseInt(TmpWordModal_Body_HLValueConvert.value),
                    },
                    NotifyStatus: parseInt(TmpWordModal_Body_NotifyStatus.value),
                    NotifyCollectData: {
                        NotifyPlatFrom: parseInt(TmpWordModal_Body_NotifyPlatFrom.value),
                    },
                })}`;
                fetch(Url).then(res => res.json()).then(data => {
                    Modal_BitCells.hide();
                    location.reload();
                });
            });

            TmpWordModal_BtnDismiss.click(function (e) {
                Modal_Word.hide();
                location.reload();
            });
        });
    </script>
@stop
