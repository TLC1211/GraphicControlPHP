@extends('Share.WebLayout')

@section('Content')
    <div class="row mx-0 mb-2">
        <div class="col-7 px-1">
            <div class="box">
                <p class="card-header">折線圖</p>
                <figure class="highcharts-figure mb-0">
                    <div id="lineChart" style="height: 300px;"></div>
                </figure>
            </div>
        </div>
        <div class="col-5 px-1">
            <div class="box">
                <p class="card-header">圓餅圖</p>
                <figure class="highcharts-figure">
                    <div id="pie" style="height: 300px;"></div>
                </figure>
            </div>
        </div>
    </div>
    {{--  -------------------------------------------------------------------------------------  --}}
    <div class="row mx-0 mb-2">
        <div class="col-7 px-1">
            <div class="box row mx-0">
                <div class="col-6 ps-0">
                    <div class="card-header">
                        <p>M Button</p>
                        <p class="pt-1 sub opacity-75">上排主動型 下排被動型</p>
                    </div>
                    <div class="row mx-0 mb-4">
                        <div class="col-4">
                            <button id="M0" class="btn btn_switch">M0</button>
                        </div>
                        <div class="col-4">
                            <button id="M1" class="btn btn_switch">M1</button>
                        </div>
                        <div class="col-4">
                            <button id="M2" class="btn btn_switch">M2</button>
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col-4">
                            <button id="M3" class="btn btn_switch">M3</button>
                        </div>
                        <div class="col-4">
                            <button id="M4" class="btn btn_switch">M4</button>
                        </div>
                        <div class="col-4">
                            <button id="M5" class="btn btn_switch">M5</button>
                        </div>
                    </div>
                </div>
                <div class="col-6 pe-0">
                    <div class="card-header">
                        <p>Y Button</p>
                        <p class="pt-1 sub opacity-75">上排主動型 下排被動型</p>
                    </div>
                    <div class="row mx-0 mb-4">
                        <div class="col-4">
                            <button id="Y0" class="btn btn_switch">Y0</button>
                        </div>
                        <div class="col-4">
                            <button id="Y1" class="btn btn_switch">Y1</button>
                        </div>
                        <div class="col-4">
                            <button id="Y2" class="btn btn_switch">Y2</button>
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col-4">
                            <button id="Y3" class="btn btn_switch">Y3</button>
                        </div>
                        <div class="col-4">
                            <button id="Y4" class="btn btn_switch">Y4</button>
                        </div>
                        <div class="col-4">
                            <button id="Y5" class="btn btn_switch">Y5</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2 px-1">
            <div class="box text-center">
                <p class="card-header">M6</p>
                <div class="btn_switch_bg">
                    <button id="M6" class="btn btn_text btn_switch2"></button>
                </div>
            </div>
        </div>
        <div class="col-3 px-1">
            <div class="box">
                <p class="card-header">D2000(17D0) Read</p>
                <h4 id="D2000_Word_Read" class="headline bold">#</h4>
                <hr/>
                <p class="card-header">D2006(17D6) Read 字串</p>
                <h4 id="D2006_String_Read" class="headline bold">#</h4>
            </div>
        </div>

    </div>
    {{--  -------------------------------------------------------------------------------------  --}}
    <div class="row mx-0 mb-2">
        <div class="col-6 px-1">
            <div class="row mx-0 box">
                @foreach($vWord as $value)
                    @if($value['Name'] === 'D2000')
                        <div class="col-6 ps-0"><label>{{$value['Name']}}({{$value['Address']}}) Write</label>
                            <input id="{{$value['Name']}}_Word_Write" type="button"
                                   data-id="{{$value['Name']}}"
                                   data-guid="{{$value['Guid']}}"
                                   data-name="{{$value['Name']}}_Word_Write"
                                   class="button form-control"
                                   value="{{$value['NowValue']}}"
                            >
                        </div>
                    @endif
                @endforeach
                @foreach($vString as $value)
                    @if($value['Name'] === 'D2006')
                        <div class="col-6 ps-0"><label>{{$value['Name']}}({{$value['Address']}}) Write String</label>
                            <input id="{{$value['Name']}}_String_Write" type="button"
                                   data-id="{{$value['Name']}}"
                                   data-guid="{{$value['Guid']}}"
                                   data-name="{{$value['Name']}}_String_Write"
                                   class="button form-control"
                                   value="{{$value['NowValue']}}"
                            >
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-6 px-1">
            <div class="box align-middle w-100">
                <div class="col text-center">
                    <button id="" class="btn btn_switch3">Y?</button>
                </div>
                <div class="col text-center">
                    <button id="" class="btn btn_switch4">Y?</button>
                </div>
                <div class="col text-center">
                    <button id="" class="btn btn_switch5">Y?</button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
@stop

@section('Modal')
    @include('Share.Jump.ModalInputModal')
@stop

@section('Js')
    <script>
        let TmpWordValue = 0.0;
        let TmpInputModalValue = null;
        let TmpWordId = null;
        let TmpWordGuid = null;
        let TmpWordFullId = null;
        let TmpTable = null;

        let GetElemId_InputModal = document.getElementById('InputModal');
        let myModal = new bootstrap.Modal(GetElemId_InputModal, {keyboard: false});

        let Dashboard_BitCellByAll_SetInterval = null;
        window.token = {
            BitCells: @JSON($BitCells), Word: @JSON($vWord), String: @JSON($vString),
            LineChart: @JSON($vChartValue[0]), Pie: @JSON($vChartValue[1])
        };

        // ####################### BitCoil ###################################

        window.token.BitCells.map(function (i, k) {
            // 首次進入
            if (1 === parseInt(i['NowValue'])) $(`#${i['Name']}`).toggleClass('active');
            return i;
        });

        function Func_Dashboard_BitCellByAll_SetInterval() {
            Dashboard_BitCellByAll_SetInterval = setInterval(function () {
                let Url = `${location.origin}/dashboard_BitCellByAll`;
                fetch(Url).then(res => res.json()).then(data => {
                    data.map(function (i) {
                        const Update_BitCells = window.token.BitCells[i['Index']];
                        const TmpQuerySByID = document.querySelector(`#${i['Name']}`);
                        // 某元件它已被手動觸發, 資料庫的手動更新如也等於99 才可進入
                        if (Update_BitCells['HandTriggerValue'] !== 99) {
                            if (i['HandTriggerValue'] === 99) window.token.BitCells[i['Index']].HandTriggerValue = 99;
                        } else if ((i['HandTriggerValue'] === 99) && (Update_BitCells['NowValue'] !== i['NowValue'])) {
                            window.token.BitCells[i['Index']].NowValue = i['NowValue'];
                            if (i['NowValue'] === 1) $(`#${i['Name']}`).toggleClass('active');
                            if (i['NowValue'] === 0 && TmpQuerySByID.classList.contains('active'))
                                $(`#${i['Name']}`).toggleClass('active');
                        }
                    });
                });
            }, 2000);
        }

        function Hand_BitCells_func(Component) {
            let TmpFilter = window.token.BitCells.filter(function (i) {
                return i['Name'] === Component;
            })[0];

            let HandStatus = 0;
            let TmpIndex = TmpFilter['Index'];
            let TmpParseIntNowValue = TmpFilter['NowValue'];
            if (TmpParseIntNowValue !== 1) HandStatus = 1;

            window.token.BitCells[TmpIndex].NowValue = HandStatus;
            window.token.BitCells[TmpIndex].HandTriggerValue = HandStatus;

            $(`#${Component}`).toggleClass('active');
            let Url = `${location.origin}/dashboard_Api?Guid=${TmpFilter['Guid']}&Type=BitCell&HandTriggerValue=${HandStatus}`;
            fetch(Url).then(res => res.json()).then(data => {
                console.log(data);
            });
        }

        // Menu
        $("#dashboard").addClass("active");

        // Toggle
        $('#M0').click(function () {
            Hand_BitCells_func('M0');
        });
        $('#M1').click(function () {
            Hand_BitCells_func('M1');
        });
        $('#M2').click(function () {
            Hand_BitCells_func('M2');
        });
        $('#M6').click(function () {
            Hand_BitCells_func('M6');
        });

        $('#Y0').click(function () {
            Hand_BitCells_func('Y0');
        });
        $('#Y1').click(function () {
            Hand_BitCells_func('Y1');
        });
        $('#Y2').click(function () {
            Hand_BitCells_func('Y2');
        });

        $('#Y3').click(function () {
            Hand_BitCells_func('Y3');
        });

        // $('#Y1').click(function () {
        //     Hand_BitCells_func('Y1');
        // });
        // $('#Y2').click(function () {
        //     Hand_BitCells_func('Y12');
        // });
        Func_Dashboard_BitCellByAll_SetInterval();

        // ####################### vWord ###################################

        window.token.Word.map(function (i, k) {
            $(`#${i['Name']}_Word_Read`).html(i['NowValue']);
        });

        $("#D2000_Word_Write").click(function (data) {
            TmpWordGuid = data.currentTarget.dataset.guid;
            TmpWordId = data.currentTarget.dataset.id;
            TmpWordFullId = data.currentTarget.dataset.name;
            TmpTable = 'vWord';
            myModal.show();
        });

        Dashboard_vWordByAll_SetInterval = setInterval(function () {
            let Url = `${location.origin}/dashboard_vWordByAll`;
            fetch(Url).then(res => res.json()).then(data => {
                data.map(function (i) {
                    if (i['Name'] === 'D2000') $("#D2000_Word_Read").html(i['NowValue'])
                });
            });
        }, 2000);

        // ####################### vString ###################################

        window.token.String.map(function (i, k) {
            $(`#${i['Name']}_String_Read`).html(i['NowValue']);
        });

        $("#D2006_String_Write").click(function (data) {
            TmpWordGuid = data.currentTarget.dataset.guid;
            TmpWordId = data.currentTarget.dataset.id;
            TmpWordFullId = data.currentTarget.dataset.name;
            TmpTable = 'vString';
            myModal.show();
        });

        Dashboard_vStringByAll_SetInterval = setInterval(function () {
            let Url = `${location.origin}/dashboard_vStringByAll`;
            fetch(Url).then(res => res.json()).then(data => {
                data.map(function (i) {
                    if (i['Name'] === 'D2006') $("#D2006_String_Read").html(i['NowValue'])
                });
            });
        }, 2000);

        // ####################### Other ###################################

        $("#InputModal_Confirm").click(function () {
            TmpInputModalValue = $("#InputModalValue");
            TmpWordValue = TmpInputModalValue.val();
            let Url = `${location.origin}/dashboard_Api?Guid=${TmpWordGuid}&Type=${TmpTable}&HandTriggerValue=${TmpWordValue}`;
            fetch(Url).then(res => res.json()).then(data => {
            });
            $("#" + TmpWordFullId).val(TmpWordValue);
            TmpInputModalValue.val('');
            myModal.hide();
        });

        let RootHighcharts = Highcharts;

        let TmpLineChart17E8 = window.token.LineChart.Data['17E8'].reverse();
        let TmpLineChart17E9 = window.token.LineChart.Data['17E9'].reverse();

        let TmpHighcharts = RootHighcharts.chart('lineChart', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'spline', animation: RootHighcharts.svg,
                marginRight: 10,
                events: {
                    load: function () {
                        let series0 = this.series[0];
                        let series1 = this.series[1];
                        setInterval(function () {
                            let Url = `${location.origin}/dashboard_vChartByAll`;
                            fetch(Url).then(res => res.json()).then(data => {
                                if (data[0]['Remark'] === '折線圖') {
                                    if (data[0]['Data']['17E8'].length === 1) {
                                        series0.addPoint([
                                            data[0]['Data']['17E8'][0]['TimeStamp'],
                                            data[0]['Data']['17E8'][0]['Value'], true, true
                                        ]);
                                        series1.addPoint([
                                            data[0]['Data']['17E9'][0]['TimeStamp'],
                                            data[0]['Data']['17E9'][0]['Value'], true, true
                                        ]);
                                    }
                                }

                                if (data[1]['Remark'] === '圓餅圖') {
                                    let PieColumn1 = parseFloat(data[1].Data['17E5'][0]['Value']);
                                    let PieColumn2 = parseFloat(data[1].Data['17E6'][0]['Value']);
                                    let PieColumn3 = parseFloat(data[1].Data['17E7'][0]['Value']);
                                    let MixColumn = PieColumn1 + PieColumn2 + PieColumn3;

                                    TmpPie.update({
                                        series: [{
                                            colorByPoint: true,
                                            data: [
                                                {name: `D2021 (17E5) ${PieColumn1}`, y: (PieColumn1 / MixColumn) * 100, drilldown: 'D2021'},
                                                {name: `D2022 (17E6) ${PieColumn2}`, y: (PieColumn2 / MixColumn) * 100, drilldown: 'D2022'},
                                                {name: `D2023 (17E7) ${PieColumn3}`, y: (PieColumn3 / MixColumn) * 100, drilldown: 'D2023'},
                                            ],
                                            showInLegend: true
                                        }]
                                    });
                                }
                            });
                        }, 2000);
                    }
                }
            },
            title: {text: ''},
            xAxis: {
                type: 'datetime', tickPixelInterval: 1, visible: false
                // lineColor: '#5C6172',
            },
            yAxis: {
                gridLineColor: '#5C6172',
                title: {
                    text: '數值',
                    style: {
                        color: '#fff',
                        fontWeight: 'bold',
                        fontSize: '1em'
                    }
                },
                labels: {
                    style: {
                        color: '#fff',
                        fontWeight: 'bold',
                        fontSize: '1em'
                    },
                },
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled: false,
                        states: {
                            hover: {
                                enabled: true,
                                symbol: 'circle',
                                radius: 5,
                                lineWidth: 1
                            }
                        }
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        // RootHighcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                        RootHighcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: true, itemStyle: {color: 'white', fontWeight: 'bold', fontSize: '16px'}
            },
            exporting: {enabled: false},
            series: [
                {name: 'D2024 (17E8)', color: '#FFEE22', data: []},
                {name: 'D2025 (17E9)', color: '#25E29B', data: []}
            ]
        });
        let TmpPie = RootHighcharts.chart('pie', {
            chart: {
                type: 'pie',
                backgroundColor: 'rgba(0,0,0,0)',
            },
            title: {
                text: '',
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '{point.drilldown}: {point.y:.1f}',
                        style: {
                            textOutline: 'none',
                        }
                    }
                },
                pie: {
                    borderColor: '#545969',
                    colors: [
                        '#25E29B',
                        '#FFCA14',
                        '#25D5FD',
                        '#FF9655',
                        '#55a2ff',
                    ],
                }
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">{point.drilldown}</span>: <b>{point.y:.1f}'
            },
            legend: {
                // enabled: true, itemStyle: {'color': '#fff'},
                enabled: true, itemStyle: {color: '#fff', fontWeight: 'bold', fontSize: '16px'}
            },
            series: [{
                colorByPoint: true,
                data: [
                    {name: `D2021 (17E5) 0`, y: 0, drilldown: 'D2021'},
                    {name: `D2022 (17E6) 0`, y: 0, drilldown: 'D2022'},
                    {name: `D2023 (17E7) 0`, y: 0, drilldown: 'D2023'},
                ],
                showInLegend: true
            }],
        });

        // setInterval(function () {
        //     console.clear();
        // }, 5000)

    </script>
@stop

