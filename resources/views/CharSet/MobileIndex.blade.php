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
            @for($i=0;$i<20;$i++)
                <tr>
                    <td>Y0</td>
                    <td>0500</td>
                    <td>
                        <button class="btn btn_main BtnChartSet"
                                data-guid="xxxxx"
                                data-address="xxxxxx"
                                data-remark="xxxxxxx">編輯
                        </button>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@stop

@section('Modal')
    @include('share.Jump.ChartModal')
@stop

@section('Js')
    <script>
        let ChartSetModal = document.getElementById('ChartSetModal');
        let Modal_ChartSetModal = new bootstrap.Modal(ChartSetModal, {keyboard: false});

        $('.BtnChartSet').click(function (data) {
            TmpChartSetModal_Btn = $("#ChartSetModal_Btn");
            TmpChartSetModal_BtnDismiss = $("#ChartSetModal_BtnDismiss");

            TmpGuid = data.target.dataset.guid

            $("#ChartSetModal_Header").html(`${data.target.dataset.remark}`);
            $("#ChartSetModal_Body").html(`
                <div class="col-xl-6 mb-6">
                    <label class="sub">備注</label>
                    <input id="ChartSet_Body_Remark" value="${data.target.dataset.remark}" class="form-control">
                </div>

                <div class="col-xl-6 mb-6">
                    <label class="sub">地址群</label>
                    <input id="ChartSet_Body_Address" value="${data.target.dataset.address}" class="form-control">
                </div>
            `);

            Modal_ChartSetModal.show();

            TmpChartSetModal_Btn.click(function (e) {
            });

            TmpChartSetModal_BtnDismiss.click(function (e) {
                Modal_ChartSetModal.hide();
                // location.reload();
            });
        });
        console.clear();
    </script>
@stop
