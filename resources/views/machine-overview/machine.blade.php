@push('style')
<style>
    .gauge-chart {
        height: 120px;
    }

    .card-machine {
        border-radius: 20px;
    }

    .line-chart {
        height: 400px;
    }

    .machine-state{
        height: 300px;
    }

</style>

@endpush
<div class="col-lg-6">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <div class="row">
                <div class="col-lg-6">
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
                        <span class="d-block">Batch Number : 23</span>
                        <span class="d-block">Product Name : Product#A</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" text-center mb-3">
                        <span class="fw-bolder fs-5 text-center ">OEE</span>
                        <div class="gauge-chart " id="oee"></div>
                    </div>
                    <div class=" text-start mb-4">
                        {{-- Availability --}}
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Availability <span class="float-end">85%</span></p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 85%;">
                                </div>
                            </div>
                        </div>

                        {{-- Performance --}}
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Performance <span class="float-end">74%</span></p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 74%;">
                                </div>
                            </div>
                        </div>

                        {{-- Quality --}}
                        <div class="progress-wrapper mb-3">
                            <p class="mb-1">Quality <span class="float-end">90%</span></p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 90%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-output">
                        <table class="w-100">
                            <tr>
                                <td> <span class="d-block ">Total Products : </span></td>
                                <td class="fw-bold" style="text-align: right">2000pcs</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Good Products : </span></td>
                                <td class="fw-bold" style="text-align: right">1950pcs</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Rejects Products : </span></td>
                                <td class="fw-bold" style="text-align: right">50pcs</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Uptime : </span></td>
                                <td class="fw-bold" style="text-align: right">5h 23m 40s</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Downtime : </span></td>
                                <td class="fw-bold" style="text-align: right">0h 10m 20s</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <h3 class="fw-bolder fs-4">Production Output</h3>
            <div class="line-chart" id="product-overview"></div>

        </div>
    </div>
</div>
<div class="col-lg-12">

    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <h3 class="fw-bolder fs-4">Machine State</h3>
            <div class="row">
                <div class="col-lg-8">
                     <div class="machine-state" id="machine-status"></div>
                </div>
                <div class="col-lg-4">
                    <div class="detail-output">
                        <table class="w-100 mb-1">


                            <tr>
                                <td> <span class="d-block ">Running : </span></td>
                                <td class="fw-bold" style="text-align: right">5h 23m 40s</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Break : </span></td>
                                <td class="fw-bold" style="text-align: right">0h 3m 20s</td>
                            </tr>
                            <tr>
                                <td> <span class="d-block ">Downtime : </span></td>
                                <td class="fw-bold" style="text-align: right">0h 13m 20s</td>
                            </tr>
                        </table>
                        <ul>
                            <li>Product Jammed: 5M 20S (OEE++)</li>
                            <li>Roll Empty: 3M 10S (OEE++)</li>
                            <li>Motor Overheat:  2M 23S (OEE++)</li>
                        </ul>
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
    generateChart('oee', 87, 20, '130%');
    generateLineChart('product-overview');
    generateGantChart();

    function generateChart(divId, dataValue = 50, fontSize = 30, radius = '100%') {
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


    function generateLineChart(divId, color = '#8FDCF7') {
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;
        option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            legend: {
                align: "left",
                bottom: "0%",
                itemGap: 35
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '10%',
                containLabel: true
            },
            xAxis: [{
                type: 'category',
                data: ['7:00', '8:00', '9:00', '10:00', '11:00', '12:00', '13:00']
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [
                // Markline
                {
                    type: 'line',
                    markLine: {
                        symbol: 'none',
                        data: [{
                            name: 'Production Target',
                            yAxis: 200
                        }],
                        lineStyle: {
                            dashOffset: 100,
                            type: "solid",
                            width: 3.5,
                            color: "rgba(0, 0, 0, 1)"
                        },
                        label: {
                            formatter: '{c}',
                            position: 'insideEnd'
                        },
                    },

                }, {
                    type: 'line',
                    markLine: {
                        symbol: 'none',
                        data: [{
                            name: 'Production Target',
                            yAxis: 200
                        }],
                        lineStyle: {
                            dashOffset: 100,
                            type: "solid",
                            width: 3.5,
                            color: "rgba(0, 0, 0, 1)"
                        },
                        label: {
                            formatter: ' {b}',
                            position: 'middle'
                        },
                    },

                },


                {
                    name: 'Reject Parts',
                    type: 'bar',
                    stack: 'output',
                    emphasis: {
                        focus: 'series'
                    },
                    itemStyle: {
                        color: 'red'
                    },
                    data: [20, 50, 50, 15, 9, 10, 5]
                },
                {
                    name: 'Good Parts',
                    type: 'bar',
                    stack: 'output',
                    emphasis: {
                        focus: 'series'
                    },
                    itemStyle: {
                        color: '#2F5597'
                    },
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
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

    function convertDate(d) {

        return d.getHours() + ":" + d.getMinutes();
    }

    function generateGantChart() {
        var dom = document.getElementById('machine-status');
        var myChart = echarts.init(dom, null, {

        });
        var app = {};

        var option;






        var data = [
            // All
            {
                "name": "",
                "value": [
                    new Date(2022, 0, 1, 10, 0, 0).getTime(),
                    new Date(2022, 0, 1, 10, 9, 0).getTime(),
                    -1,
                    'green',
                    convertDate(new Date(2022, 0, 1, 10, 0, 0)),
                    convertDate(new Date(2022, 0, 2, 10, 9, 0)),
                ]
            },

            {
                "name": "",
                "value": [
                    new Date(2022, 0, 1, 10, 9, 0).getTime(),
                    new Date(2022, 0, 1, 10, 12, 0).getTime(),
                    -1,
                    '#808080',
                    convertDate(new Date(2022, 0, 1, 10, 9, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 12, 0)),
                ]
            },
            {
                "name": "",
                "value": [

                    new Date(2022, 0, 1, 10, 12, 0).getTime(),
                    new Date(2022, 0, 1, 10, 20, 0).getTime(),
                    -1,
                    'green',

                    convertDate(new Date(2022, 0, 1, 10, 12, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                ]
            },
            {
                "name": "",
                "value": [

                    new Date(2022, 0, 1, 10, 20, 0).getTime(),
                    new Date(2022, 0, 1, 10, 23, 0).getTime(),
                    -1,
                    'red',

                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 23, 0)),
                ]
            },
            {
                "name": "",
                "value": [

                    new Date(2022, 0, 1, 10, 23, 0).getTime(),
                    new Date(2022, 0, 1, 11, 00, 0).getTime(),
                    -1,
                    'green',

                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                    convertDate(new Date(2022, 0, 1, 11, 00, 0)),
                ]
            },

            // Running
            {
                "name": "Running",
                "value": [
                    new Date(2022, 0, 1, 10, 0, 0).getTime(),
                    new Date(2022, 0, 1, 10, 9, 0).getTime(),
                    0,
                    'green',
                    convertDate(new Date(2022, 0, 1, 10, 0, 0)),
                    convertDate(new Date(2022, 0, 2, 10, 9, 0)),
                ]
            },


            {
                "name": "Running",
                "value": [

                    new Date(2022, 0, 1, 10, 12, 0).getTime(),
                    new Date(2022, 0, 1, 10, 20, 0).getTime(),
                    0,
                    'green',

                    convertDate(new Date(2022, 0, 1, 10, 12, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                ]
            },

            {
                "name": "Running",
                "value": [

                    new Date(2022, 0, 1, 10, 23, 0).getTime(),
                    new Date(2022, 0, 1, 11, 00, 0).getTime(),
                    0,
                    'green',

                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                    convertDate(new Date(2022, 0, 1, 11, 00, 0)),
                ]
            },

            // Break
            {
                "name": "Break",
                "value": [
                    new Date(2022, 0, 1, 10, 9, 0).getTime(),
                    new Date(2022, 0, 1, 10, 12, 0).getTime(),
                    1,
                    '#808080',
                    convertDate(new Date(2022, 0, 1, 10, 9, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 12, 0)),
                ]
            },

            // Downtime
            {
                "name": "Downtime",
                "value": [

                    new Date(2022, 0, 1, 10, 20, 0).getTime(),
                    new Date(2022, 0, 1, 10, 23, 0).getTime(),
                    2,
                    'red',

                    convertDate(new Date(2022, 0, 1, 10, 20, 0)),
                    convertDate(new Date(2022, 0, 1, 10, 23, 0)),
                ]
            },

        ];

        option = {
             grid: {
                show: true,
                left: "7%",
                right:'0%',
                top:'3%'
            },
            xAxis: {
                type: "time",
                splitNumber: 10,
                interval: 1,
                //Min is getting values from index 1, not sure why
                // min: range => range.min - (1 * 24 * 60 * 60 * 1000), //Subtract 7 days
                min: range => range.min - (1 * 24 * 22 * 1000), //Subtract 7 days
            },
            yAxis: {
                type: "category",
                data: ["Downtime", "Break", "Running", ""],
                splitLine: {
                    show: true
                }

            },
            series: [{
                type: "custom",
                renderItem: (params, api) => {
                    var catIndex = api.value(2);
                    var timeSpan = [api.value(0), api.value(1)];
                    var start = api.coord([timeSpan[0], 2 - catIndex]);
                    var end = api.coord([timeSpan[1], 2 - catIndex]);
                    var size = api.size([0, 1]);
                    var height = size[1] * 0.7;
                    var rect = echarts.graphic.clipRectByRect({
                        x: start[0],
                        y: start[1] - height / 2,
                        width: end[0] - start[0],
                        height: height
                    }, {
                        x: params.coordSys.x,
                        y: params.coordSys.y,
                        width: params.coordSys.width,
                        height: params.coordSys.height
                    });
                    return (
                        rect && {
                            type: "rect",
                            transition: ["shape"],
                            shape: rect,
                            style: {
                                fill: api.value(3),
                            },
                        }
                    );
                },
                encode: {
                    x: [0, 1],
                    y: 0,
                },
                data: data,
            }],
            tooltip: {
                show: true,
                trigger: "item",
                formatter: params => {
                    return `${params.data.name}<br/> ${params.data.value[4]} - ${params.data.value[5]}` //Unix timestamps should be converted to readable dates
                }
            },
            dataZoom: {
                start: 0,
                type: "inside"
            },
        }

        if (option && typeof option === 'object') {
            myChart.setOption(option);
        }
        window.addEventListener('resize', myChart.resize);
    }
</script>
@endpush
