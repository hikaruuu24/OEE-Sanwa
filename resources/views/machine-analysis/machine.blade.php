@push('style')
<style>
    .card-machine {
        border-radius: 20px;
    }

    .line-chart-analysis {
        height: 500px;
    }

    .doughnut-chart-analysis {
        height: 500px;
    }

</style>

@endpush
<div class="col-12">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <h3 class="fw-bolder">Machine Breakdown Analysis</h3>
            <div class="row">
                <div class="col-lg-7">
                    <div class="line-chart-analysis" id="line-chart-analysis">
                    </div>

                </div>
                <div class="col-lg-5">
                    <h4>Top 10 Downtime Cause</h4>
                    <table class="w-100">
                        <tr>
                            <td>1. </td>
                            <td>Product Jammed: 5M 20S </td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>Roll Empty: 3M 10S </td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Motor Overheat: 2M 23S </td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Product Jammed: 5M 20S </td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Roll Empty: 3M 10S </td>
                        </tr>
                        <tr>
                            <td>6. </td>
                            <td>Motor Overheat: 2M 23S </td>
                        </tr>
                        <tr>
                            <td>7. </td>
                            <td>Product Jammed: 5M 20S </td>
                        </tr>
                        <tr>
                            <td>8. </td>
                            <td>Roll Empty: 3M 10S </td>
                        </tr>
                        <tr>
                            <td>9. </td>
                            <td>Motor Overheat: 2M 23S</td>
                        </tr>
                        <tr>
                            <td>10. </td>
                            <td>Product Jammed: 5M 20S </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="col-12">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <h3 class="fw-bolder">Quality Analysis</h3>
            <div class="row">
                <div class="col-lg-7">
                    <div class="doughnut-chart-analysis" id="doughnut-chart-analysis">
                    </div>

                </div>
                <div class="col-lg-5">
                    <h4>Top 5 Quality Issue</h4>
                    <table class="w-100">
                        <tr>
                            <td>1. </td>
                            <td>Broken Packaging </td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>Incorrect Recipe </td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Abnormal Shape </td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Inconsistent Texture </td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Unstable Weight</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>
    </div>
</div>




@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.3/echarts.min.js"></script>
<script src="{{asset('auth/js/ResizeSensor.js')}}"></script>
<script>
    generateChartAnalysys('line-chart-analysis')
    generateChartDoghnut('doughnut-chart-analysis')


    function generateChartAnalysys(divId) {
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            xAxis: {
                type: 'category',
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    data: [{
                            value: 100,
                            itemStyle: {
                                color: '#84C4E5',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 90,
                            itemStyle: {
                                color: '#85A7E6',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 80,
                            itemStyle: {
                                color: '#868AE7',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 70,
                            itemStyle: {
                                color: '#9A82E7',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 60,
                            itemStyle: {
                                color: '#B682E7',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 50,
                            itemStyle: {
                                color: '#D485E6',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 40,
                            itemStyle: {
                                color: '#E483DB',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 30,
                            itemStyle: {
                                color: '#E484BE',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 20,
                            itemStyle: {
                                color: '#E485A1',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        },
                        {
                            value: 10,
                            itemStyle: {
                                color: '#F86874',
                                borderRadius: [10, 11, 0, 0],
                                opacity: 0.8
                            }
                        }
                    ],
                    type: 'bar'
                },
                {
                    data: [18, 40, 49, 57, 65, 74, 80, 90, 96, 97, 100],
                    type: 'line',
                    itemStyle: {
                        color: '#000'
                    }

                },

            ]
        };
        option && myChart.setOption(option);
        resizeChart(divId);
    }

    function generateChartDoghnut(divId) {
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                show: 0,
                top: '5%',
                left: 'center'
            },
            title: {
                text: "Reject Products",
                subtext: "56 pcs",
                left: "center",
                top: "center",
                textStyle: {
                fontSize: 30,
                fontWeight:'lighter'
                },
                subtextStyle: {
                fontSize: 50,
                fontWeight:'bolder'
                }
            },
            width: "100%",
            height: "100%",
            series: [{
                    name: 'Quality Analysis',
                    type: 'pie',
                       radius: ['60%', '68%'],
                    label: {
                        show: false
                    },
                    itemStyle: {

                        borderRadius: [0, 30, 0, 0],
                        borderColor: '#fff',
                        borderWidth: 0
                    },

                    labelLine: {
                        show: false
                    },
                    data: [{
                            value: 50,
                            name: 'Broken Packaging',
                            itemStyle: {
                                color: '#41C9B8'
                            }
                        },
                        {
                            value: 25,
                            name: 'Abnormal Shape',
                            itemStyle: {
                                color: '#F86874'
                            }
                        },
                        {
                            value: 25,
                            name: 'Incorrect Recipe',
                            itemStyle: {
                                color: '#714FFF'
                            }
                        },

                    ]
                },
                {
                    name: 'Quality Analysis',
                    type: 'pie',
                    radius: ['60%', '75%'],
                    avoidLabelOverlap: true,
                    itemStyle: {
                        borderRadius: [0, 0, 0, 0],
                        borderColor: '#fff',
                        borderWidth: 0
                    },

                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '20',
                            fontWeight: 'bold'
                        }
                    },
                    label: {
                        fontSize: 20,
                        fontWeight: 'bolder'
                    },
                    labelLine: {
                        show: true
                    },
                    data: [{
                            value: 50,
                            name: 'Broken Packaging',
                            itemStyle: {
                                color: '#41C9B8',
                                opacity: 0.7
                            }
                        },
                        {
                            value: 25,
                            name: 'Abnormal Shape',
                            itemStyle: {
                                color: '#F86874',
                                opacity: 0.7
                            }
                        },
                        {
                            value: 25,
                            name: 'Incorrect Recipe',
                            itemStyle: {
                                color: '#714FFF',
                                opacity: 0.7
                            }
                        },

                    ]
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

</script>
@endpush
