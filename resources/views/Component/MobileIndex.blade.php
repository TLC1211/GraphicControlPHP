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
                @for($i=0;$i<5;$i++)
                    <tr>
                        <td>Y0</td>
                        <td>0500</td>
                        <td>BitCells</td>
                        <td>
                            <button class="btn btn_main Btn_BitCells"
                                    data-name="xxxxxx"
                                    data-address="xxxxxxx"
                                    data-notifystatus="xxxxxxxxx"
                                    data-notifycollectdata="xxxxxxxxxxxxxx"
                                    data-guid="xxxxxx">編輯
                            </button>
                        </td>
                    </tr>
                @endfor
                {{-- ################################################################### --}}
                @for($i=0;$i<5;$i++)
                    <tr>
                        <td>Y0</td>
                        <td>0500</td>
                        <td>Word</td>
                        <td>
                            <button class="btn btn_main Btn_Word"
                                    data-name="xxxxxxx"
                                    data-address="xxxxxx"
                                    data-collectdata="xxxxxxxx"
                                    data-notifystatus="xxxxxxxxxxxx"
                                    data-notifycollectdata="xxxxxxxxxxxxxxxx"
                                    data-guid="xxxxxxxxxxxx">編輯
                            </button>
                        </td>
                    </tr>
                @endfor
                {{-- ################################################################### --}}
                @for($i=0;$i<5;$i++)
                    <tr>
                        <td>Y0</td>
                        <td>0500</td>
                        <td>String</td>
                        <td></td>
                    </tr>
                @endfor
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

        $('.Btn_BitCells').click(function (data) {
            TmpBitCellsModal_Btn = $("#BitCellsModal_Btn");
            TmpBitCellsModal_BtnDismiss = $("#BitCellsModal_BtnDismiss");

            let TmpJsonCollectData = {'NotifyType': 0, 'NotifyPlatFrom': 0}; // 0:Line, 1:Email, 2:SMS
            let TmpNotifyStatus = 0;

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
            });

            TmpBitCellsModal_BtnDismiss.click(function (e) {
                Modal_BitCells.hide();
                // location.reload();
            });
        });

        //#########################################################################################

        let WordModal = document.getElementById('WordModal');
        let Modal_Word = new bootstrap.Modal(WordModal, {keyboard: false});
        $('.Btn_Word').click(function (data) {
            TmpWordModal_Btn = $("#WordModal_Btn");
            TmpWordModal_BtnDismiss = $("#WordModal_BtnDismiss");

            TmpGuid = data.target.dataset.guid

            let TmpJsonCollectData = {
                'WordType': 'Word',
                'SignedType': true,
                'NumberOfDecimals': 0,
                'HLValueConvert': 0,
                'MaxValue': 30,
                'MinValue': 0
            };
            let TmpJsonNotifyCollectData = 0; // 0:Line, 1:Email, 2:SMS
            let TmpNotifyStatus = 0;

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
            });

            TmpWordModal_BtnDismiss.click(function (e) {
                Modal_Word.hide();
                // location.reload();
            });
        });
    </script>
@stop
