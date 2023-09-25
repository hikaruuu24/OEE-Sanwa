@push('style')
<style>
    .gauge-chart {
        height: 200px;
    }
    .card-machine{
        border-radius: 20px;
    }

    .line-chart{
        height: 70px;;
    }

</style>

@endpush
<div class="col-12">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <div class="row">
                <div class="col-lg-2">
                    <div class="machine-info">
                        <div class="machine-title">
                            <span class="fw-bolder fs-4" style="vertical-align: middle">Machine #1</span>
                            <span class="dot bg-success" style="height: 20px;width:20px;vertical-align: middle;"></span>
                        </div>
                        <div>
                            <img class="" src="{{asset('img/machines/machine-1.jpeg')}}" alt=""
                                style="max-height: 200px;width:auto;">
                        </div>
                        <span class="d-block machine-name fs-5 fw-bolder">Palletizer Robot 1</span>
                        <span class="d-block">Status : Running</span>
                        <span class="d-block">Operator : John Doe</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-2 text-center">
                        <h2 class="fw-bolder text-center mb-5">OEE</h2>
                        <div class="gauge-chart " id  ="oee"></div>
                        <div class="line-chart mt-3" id="oee-line"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        {{-- OEE --}}

                        {{-- Availability --}}
                         <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Availability</h3>
                                <div class="p-3">
                                    <div class="gauge-chart" id="availability"></div>
                                    <div class="line-chart" id="availability-line"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Performance --}}
                        <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Performance</h3>
                                <div class="p-3">
                                    <div class="gauge-chart" id="performance"></div>
                                    <div class="line-chart" id="performance-line"></div>

                                </div>
                            </div>
                        </div>

                        {{-- Quality --}}
                        <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Quality</h3>
                                <div class="p-3">
                                    <div class="gauge-chart" id="quality"></div>
                                    <div class="line-chart" id="quality-line"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-12">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <div class="row">
                <div class="col-lg-2">
                    <div class="machine-info">
                        <div class="machine-title">
                            <span class="fw-bolder fs-4" style="vertical-align: middle">Machine #2</span>
                            <span class="dot bg-success" style="height: 20px;width:20px;vertical-align: middle;"></span>
                        </div>
                        <div>
                            <img class="" src="{{asset('img/machines/machine-2.jpeg')}}" alt=""
                                style="max-height: 200px;width:auto;">
                        </div>
                        <span class="d-block machine-name fs-5 fw-bolder">Case Packer</span>
                        <span class="d-block">Status : Running</span>
                        <span class="d-block">Operator : Sarah Doe</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-2 text-center">
                        <h2 class="fw-bolder text-center mb-5">OEE</h2>
                        <div class="gauge-chart " id="oee-m2"></div>
                        <div class="line-chart mt-3" id="oee-line2"></div>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        {{-- OEE --}}

                        {{-- Availability --}}
                         <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Availability</h3>
                                <div class="">
                                    <div class="gauge-chart" id="availability-m2"></div>
                                    <div class="line-chart mt-3" id="availability-line2"></div>

                                </div>
                            </div>
                        </div>

                        {{-- Performance --}}
                        <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Performance</h3>
                                <div class="">
                                    <div class="gauge-chart" id="performance-m2"></div>
                                    <div class="line-chart mt-3" id="performance-line2"></div>

                                </div>
                            </div>
                        </div>

                        {{-- Quality --}}
                        <div class="col-lg-4">
                            <div class="pt-5">
                                <h3 class="text-center">Quality</h3>
                                <div class="">
                                    <div class="gauge-chart" id="quality-m2"></div>
                                    <div class="line-chart mt-3" id="quality-line2"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.3/echarts.min.js"></script>
<script src="{{asset('auth/js/ResizeSensor.js')}}"></script>
<script>

    //Machine1#
    generateChart('oee',87,30,'110%');
    generateLineChart('oee-line')

    generateChart('availability',80,24);
    generateLineChart('availability-line','#F1BB7C')

    generateChart('performance',75.6,24);
    generateLineChart('performance-line','#F1BB7C')

    generateChart('quality',77.5,24);
    generateLineChart('quality-line','#F1BB7C');

    //Machine2#
    generateChart('oee-m2',75,30,'130%');
    generateLineChart('oee-line2')

    generateChart('availability-m2',65.8,24);
    generateLineChart('availability-line2','#F1BB7C')

    generateChart('performance-m2',79.6,24);
    generateLineChart('performance-line2','#F1BB7C')

    generateChart('quality-m2',84,24);
    generateLineChart('quality-line2','#F1BB7C');


    function generateChart(divId,dataValue = 50,fontSize = 30,radius ='100%') {
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;
        option = {
            series: [{
                type: 'gauge',
                startAngle: 200,
                endAngle: -20,
                min: 0,
                max: 100,
                splitNumber: 1,
                center: ["50%", "70%"],
                radius: radius,

                progress: {
                    show: true,
                    roundCap: true,
                    width: 13
                },
                pointer: {
                    show: false,
                },
                axisLine: {
                    roundCap: true,
                    lineStyle: {
                        width: 15
                    }
                },
                axisTick: {
                    show: false
                },
                splitLine: {
                    show: false
                },
                axisLabel: {
                    show: false
                },
                title: {
                    show: false
                },
                detail: {
                    borderRadius: 8,
                    offsetCenter: [0, '-10%'],
                    valueAnimation: true,
                    formatter: function (value) {
                        return '{value|' + value.toFixed(1) + '}{unit| %}';
                    },
                    rich: {
                        value: {
                            fontSize: fontSize,
                            fontWeight: 'bolder',
                            color: '#000'
                        },
                        unit: {
                            fontSize: fontSize,
                            color: '#000',

                        }
                    }
                },
                data: [{
                    value: dataValue,
                    itemStyle: {
                        color: {
                            type: 'linear',
                            x: 0,
                            y: 0,
                            x2: 1,
                            y2: 0,
                            colorStops: [{
                                    offset: [0.3],
                                    color: '#EC4D4D' // color at 0%
                                }, {
                                    offset: 0.5,
                                    color: 'yellow' // color at 100%
                                },
                                {
                                    offset: 1,
                                    color: '#31E1A4' // color at 100%
                                }
                            ],
                            global: false,
                        }
                    }
                }]
            }]
        };

        option && myChart.setOption(option);
        resizeChart(divId);
    }


    function generateLineChart(divId,color='#8FDCF7'){
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;
        option = {
            xAxis: {
                type: 'category',
                boundaryGap: false,
                show:false
            },
            yAxis: {
                type: 'value',
                show:false
            },
            series: [
                {
                data: [820, 932, 901, 934, 1290, 1330, 1320],
                type: 'line',
                itemStyle :{color:color},
                areaStyle : {
                    color:color,
                    opacity:0.3
                }
                }
            ]
        };
        option && myChart.setOption(option);
        resizeChart(divId);
    }

    function resizeChart(divId) {
        var chart = echarts.init(document.getElementById(divId));
        new ResizeSensor(jQuery('#' + divId), function () {
            chart.resize();
        })
    }

</script>
@endpush
