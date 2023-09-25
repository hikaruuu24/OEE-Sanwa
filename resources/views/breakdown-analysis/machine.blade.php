@push('style')
<style>
    .card-machine {
        border-radius: 20px;
    }

    .line-chart-mttr {
        height: 500px;
    }

    .line-chart-mttb {
        height: 500px;
    }

</style>

@endpush
<div class="col-12">
    <div class="card card-machine ">
        <div class="card-body py-4 px-5">
            <h3 class="fw-bolder">Machine Breakdown Analysis</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="line-chart-mttr" id="line-chart-mttr">
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="line-chart-mttb" id="line-chart-mttb">
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Total Downtime</h4>
                            <div class="p-4 bg-danger text-white">
                               <i class=" bx bx-time"></i>
                               <span class="fs-5">532.17 hrs</span>
                               <small class="float-end">All Time</small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h4>Total MTTR</h4>
                            <div class="p-4 bg-danger text-white">
                               <i class=" bx bx-time"></i>
                               <span class="fs-5">6.01 hrs</span>
                               <small class="float-end">All Time</small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h4>Total MTBF</h4>
                            <div class="p-4 bg-danger text-white">
                               <i class=" bx bx-time"></i>
                               <span class="fs-5">1542.45 hrs</span>
                               <small class="float-end">All Time</small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h4>Total Operation Hours</h4>
                            <div class="p-4 bg-danger text-white">
                               <i class=" bx bx-time"></i>
                               <span class="fs-5">1069.40 hrs</span>
                               <small class="float-end">All Time</small>
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
    generateChartAnalysys('line-chart-mttr','MTTR','#4E86D5');
    generateChartAnalysys('line-chart-mttb','MTTB','#07024F')



    function generateChartAnalysys(divId,title,color) {
        var chartDom = document.getElementById(divId);
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            xAxis: {
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']
            },
            yAxis: {
                type: 'value'
            },
            title: {
                text: `${title} Over Time`,
                subtext: `${title} 1 January - 31 July`,
                left: "left",
                top: "top",
                textStyle: {
                    fontSize: 20
                },
                subtextStyle: {
                    fontSize: 15
                }
            },
            series: [{
                data: [5, 4, 3.8, 5, 10, 4, 1],
                type: 'line',
                smooth: true,
                areaStyle: {
                    color: "rgba(234, 234, 234, 1)",
                    opacity: 0.63
                },
                itemStyle:{
                    color:color
                }
            }]
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
