@extends('Share.Mobile2Layout')

@section('Title')
    圖表定義值
@stop

@section('Content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>代稱</th>
                <th>地址群組</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($TmpChartCollect as $value)
                <tr>
                    <td>{{$value['Remark']}}</td>
                    <td>{{$value['Address']}}</td>
                    <td>
                        <button class="btn btn_main BtnChartSet"
                                data-guid="{{$value['Guid']}}"
                                data-address="{{$value['Address']}}"
                                data-remark="{{$value['Remark']}}">編輯
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('Modal')
    @include('share.Jump.ChartModal')
@stop

@section('Js')
    <script>
        let TmpGuid = null;
        let ChartSetModal = document.getElementById('ChartSetModal');
        let Modal_ChartSetModal = new bootstrap.Modal(ChartSetModal, {keyboard: false});
        let TmpChartSetModal_Btn = null, TmpChartSetModal_BtnDismiss = null;

        $('.BtnChartSet').click(function (data) {
            TmpChartSetModal_Btn = $("#ChartSetModal_Btn");
            TmpChartSetModal_BtnDismiss = $("#ChartSetModal_BtnDismiss");

            TmpGuid = data.target.dataset.guid

            $("#ChartSetModal_Header").html(`${data.target.dataset.remark})`);
            $("#ChartSetModal_Body").html(`
                <div class="col-xl-6 col-lg-6 mb-6">
                    <label class="sub">備注</label>
                    <input id="ChartSet_Body_Remark" value="${data.target.dataset.remark}" class="form-control">
                </div>
                <div class="col-xl-6 col-lg-6 mb-6">
                    <label class="sub">地址群</label>
                    <input id="ChartSet_Body_Address" value="${data.target.dataset.address}" class="form-control">
                </div>
            `);

            Modal_ChartSetModal.show();

            let TmpChartSet_Body_Remark = document.querySelector('#ChartSet_Body_Remark');
            let TmpChartSet_Body_Address = document.querySelector('#ChartSet_Body_Address');

            TmpChartSetModal_Btn.click(function (e) {
                let Url = `${location.origin}/CharSetApi?Guid=${TmpGuid}&Upload=${JSON.stringify({
                    Remark: TmpChartSet_Body_Remark.value,
                    Address: TmpChartSet_Body_Address.value,
                })}`;
                fetch(Url).then(res => res.json()).then(data => {
                    Modal_ChartSetModal.hide();
                    location.reload();
                });
            });
            TmpChartSetModal_BtnDismiss.click(function (e) {
                Modal_ChartSetModal.hide();
                location.reload();
            });
        });
        console.clear();
    </script>
@stop
