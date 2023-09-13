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
                            <button id="M3" class="btn btn_switch" disabled>M3</button>
                        </div>
                        <div class="col-4">
                            <button id="M4" class="btn btn_switch" disabled>M4</button>
                        </div>
                        <div class="col-4">
                            <button id="M5" class="btn btn_switch" disabled>M5</button>
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
                            <button id="Y3" class="btn btn_switch" disabled>Y3</button>
                        </div>
                        <div class="col-4">
                            <button id="Y4" class="btn btn_switch" disabled>Y4</button>
                        </div>
                        <div class="col-4">
                            <button id="Y5" class="btn btn_switch" disabled>Y5</button>
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
                <p class="card-header">Title</p>
                <h4 class="headline">665.35</h4>
                <hr/>
                <p class="card-header">Title</p>
                <h4 class="headline">665.35</h4>
            </div>
        </div>

    </div>
    {{--  -------------------------------------------------------------------------------------  --}}
    <div class="row mx-0 mb-2">
        <div class="col-6 px-1">
            <div class="row mx-0 box">
                <div class="col-6 ps-0"><label>C.VFD</label>
                    <input id="D2000_Word_Write" type="button" class="button form-control" value="3213">
                </div>
                <div class="col-6 pe-0"><label>D 溫控</label>
                    <input id="D2006_Word_Write" type="button" class="button form-control" value="3213">
                </div>
            </div>
        </div>
        <div class="col-6 px-1">
            <div class="box align-middle w-100">
                <div class="col text-center">
                    <button id="Y20" class="btn btn_switch3">Y20</button>
                </div>
                <div class="col text-center">
                    <button id="Y21" class="btn btn_switch4">Y21</button>
                </div>
                <div class="col text-center">
                    <button id="Y22" class="btn btn_switch5">Y22</button>
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
        let RootHighcharts = Highcharts;

        let TmpHighcharts = RootHighcharts.chart('lineChart', {
            chart: {
                backgroundColor: '#545969',
                type: 'spline', animation: RootHighcharts.svg,
                marginRight: 10,
                events: {
                    load: function () {
                        let series0 = this.series[0];
                        let series1 = this.series[1];
                        series0.addPoint([1689656520, 30, true, true]);
                        series1.addPoint([1689656520, 50, true, true]);
                    }
                }
            },
            title: {text: ''},
            xAxis: {type: 'datetime', tickPixelInterval: 1, visible: false},
            yAxis: {
                gridLineColor: '#5C6172',
                title: {
                    text: '數值',
                    style: {color: '#fff', fontWeight: 'bold', fontSize: '1em'}
                },
                labels: {
                    style: {color: '#fff', fontWeight: 'bold', fontSize: '1em'},
                },
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled: false,
                        states: {
                            hover: {enabled: true, symbol: 'circle', radius: 5, lineWidth: 1}
                        }
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' + RootHighcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: true, itemStyle: {color: 'white', fontWeight: 'bold', fontSize: '16px'}
            },
            exporting: {enabled: false},
            series: [
                {name: 'D2024 (17E8)', color: '#FFEE22', data: [30]},
                {name: 'D2025 (17E9)', color: '#25E29B', data: [30]}
            ]
        });

        let TmpPie = RootHighcharts.chart('pie', {
            chart: {type: 'pie', backgroundColor: 'rgba(0,0,0,0)',},
            title: {text: ''},
            accessibility: {announceNewData: {enabled: true}, point: {valueSuffix: ''}},
            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {enabled: true, format: '{point.drilldown}: {point.y:.1f}', style: {textOutline: 'none'}}
                },
                pie: {
                    borderColor: '#545969',
                    colors: ['#25E29B', '#FFCA14', '#25D5FD', '#FF9655', '#55a2ff'],
                }
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">{point.drilldown}</span>: <b>{point.y:.1f}'
            },
            legend: {enabled: true, itemStyle: {color: '#fff', fontWeight: 'bold', fontSize: '16px'}},
            series: [{
                colorByPoint: true,
                data: [
                    {name: `D2021 (17E5) 0`, y: 30, drilldown: 'D2021'},
                    {name: `D2022 (17E6) 0`, y: 30, drilldown: 'D2022'},
                    {name: `D2023 (17E7) 0`, y: 40, drilldown: 'D2023'},
                ],
                showInLegend: true
            }],
        });

        $("#dashboard").addClass("active");

        let GetElemId_InputModal = document.getElementById('InputModal');
        let myModal = new bootstrap.Modal(GetElemId_InputModal, {keyboard: false});

        $("#D2000_Word_Write").click(function (data) {
            myModal.show();
        });

        $("#D2006_Word_Write").click(function (data) {
            myModal.show();
        });
    </script>
@stop

