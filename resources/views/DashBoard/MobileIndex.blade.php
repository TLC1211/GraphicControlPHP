@extends('Share.MobileLayout')

@section('Title')
    數據監控
@stop

@section('Content')
    <div class="box mb-3">
        <p class="card-header">Data</p>
        <figure class="highcharts-figure mb-0">
            <div id="lineChart"></div>
        </figure>
    </div>

    <div class="box mb-3">
        <p class="card-header">Data</p>
        <figure class="highcharts-figure">
            <div id="pie"></div>
        </figure>
    </div>

    {{-- M --}}
    <div class="box mb-3">
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

    {{-- Y --}}
    <div class="box mb-3">
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

    <div class="row mx-0 mb-3">
        <div class="col ps-0 pe-2">
            <div class="box text-center">
                <p class="card-header">M6</p>
                <div class="btn_switch_bg">
                    <button id="M6" class="btn btn_text btn_switch2"></button>
                </div>
            </div>
        </div>
        <div class="col pe-0 ps-2">
            <div class="col box">
                <p class="card-header">D2000(17D0) Read</p>
                <h4 id="D2000_Word_Read" class="headline bold">123123</h4>
                <hr/>
                <p class="card-header">D2006(17D6) Read 字串</p>
                <h4 id="D2006_String_Read" class="headline bold">321321</h4>
            </div>
        </div>
    </div>

    <div class="box mb-3">
        <label>C.VFD</label>
        <input id="D2000_Word_Write" type="button" class="button form-control" value="3213">
        <label>D 溫控</label>
        <input id="D2006_Word_Write" type="button" class="button form-control" value="3213">
    </div>

    <div class="box mb-3 w-100 align-middle">
        <div class="col text-center">
            <button id="Y10" class="btn btn_switch3">Y10</button>
        </div>
        <div class="col text-center">
            <button id="Y11" class="btn btn_switch4">Y11</button>
        </div>
        <div class="col text-center">
            <button id="Y12" class="btn btn_switch5">Y12</button>
        </div>
    </div>
@stop

@section('Modal')
    @include('share.Jump.ModalInputModal')
@stop

@section('Js')
    <script>
        $('#M0').click(function () {
            $(this).toggleClass('active');
        });

        $('#M6').click(function () {
            $(this).toggleClass('active');
        });

        $('#Y10').click(function () {
            $(this).toggleClass('active');
        });

        // ---------------------------------------------------------------
        let RootHighcharts = Highcharts;

        let TmpHighcharts = RootHighcharts.chart('lineChart', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
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
            xAxis: {
                type: 'datetime', tickPixelInterval: 1, visible: false
            },
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
            title: {text: '',},
            accessibility: {
                announceNewData: {enabled: true},
                point: {valueSuffix: ''}
            },
            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '{point.drilldown}: {point.y:.1f}',
                        style: {textOutline: 'none'}
                    }
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
            legend: {
                enabled: true, itemStyle: {color: '#fff', fontWeight: 'bold', fontSize: '16px'}
            },
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


        let GetElemId_InputModal = document.getElementById('InputModal');
        let myModal = new bootstrap.Modal(GetElemId_InputModal, {keyboard: false});

        $("#D2000_Word_Write").click(function (data) {
            myModal.show();
        });

        $("#D2006_Word_Write").click(function (data) {
            myModal.show();
        });

        console.clear();
    </script>
@stop

