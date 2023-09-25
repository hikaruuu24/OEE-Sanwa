// ================* MOTHLY *


function submitDate() {
    let daterange = $('#daterange').val();
    let date = $('#date').val()
    if (daterange == 'day' || daterange == 'minute') {
        date = $('#date').val()
    } else if (daterange == 'month') {
        date = $('#month').val()
    } else if (daterange == 'year') {
        date = $('#year').val()
    }
    $('#status').html('<span class="tx-12 align-self-center badge badge-warning">Loading ...</span>')
    toastr.warning(new Date().toLocaleString('en-US', {
            timeZone: 'Asia/Jakarta'
        }) +
        ": Loading..");
    axios.post('./api/consumption', {
            date: date,
            daterange: daterange,
        })
        .then(function (response) {
            toastr.success(new Date().toLocaleString('en-US', {
                timeZone: 'Asia/Jakarta'
            }) + ": Success !");
            $('#periode').text(response.data.date)
            $('#date').val(response.data.date)
            let dataCount = response.data.consumption.tstamp.length;
            if (dataCount > 0) {
                $('#status').html(dataCount + ' data : ' + '<span class="tx-12 align-self-center badge badge-success">Success</span> ')
            } else {
                $('#status').html(dataCount + ' data : ' + '<span class="tx-12 align-self-center badge badge-danger">No Data Available</span> ')
            }
            dataConsumption(response.data.consumption);
            // --datatotal
            //  console.log(response.data);
            table2.clear();
            $.each(response.data.consumption.all, function (i, key) {
                table2.row.add([
                    i + 1,
                    response.data.consumption.all[i].datetime,
                    response.data.consumption.all[i].kwh_min,
                    response.data.consumption.all[i].kwh_max,
                    response.data.consumption.all[i].kwh_total,
                ])
            });
            table2.draw();
        })
        .catch(function (error) {

            toastr.error("Failed !");
            $('#status').html('<span class="tx-12 align-self-center badge badge-danger">Failed</span>')

            console.log(error);
        });
}



function dataConsumption(param) {
    var consumption = echarts.init(document.getElementById('data-total'));
    consumption.clear();
    option1 = {
        legend: {
            data: ['KWH TOTAL']
        },
        animation: true,
        tooltip: {
            show: true,
            trigger: 'axis',
        },
        toolbox: {
            feature: {
                restore: {
                    title: 'Reset',
                },
                saveAsImage: {
                    title: 'Save Png',
                }
            }
        },
        title: {
            left: 'center',
            text: '',
        },
        xAxis: {
            type: 'category',
            data: param.tstamp,
            splitLine: {
                show: true,
                onGap: null,
                // Garis Pebatas
                lineStyle: {
                    color: '#E4E4E4',
                    type: 'solid',
                    width: 1,
                    shadowColor: 'rgba(0,0,0,0)',
                    shadowBlur: 5,
                    shadowOffsetX: 3,
                    shadowOffsetY: 3,
                },
            },
        },
        yAxis: {
            type: 'value',
            boundaryGap: [0, '5%']
        },
        grid: {
            x: 60,
            y: 20,
            x2: 40,
            y2: 80
        },
        dataZoom: [{
                type: 'inside',
                start: 0,
            },
            {
                start: 0,
                handleSize: '100%',
                handleStyle: {
                    color: '#fff',
                    shadowBlur: 10,
                    shadowColor: 'rgba(0, 0, 0, 0.6)',
                    shadowOffsetX: 2,
                    shadowOffsetY: 2
                }
            }
        ],
        series: [{
            name: 'KWH TOTAL',
            type: 'bar',
            barGap: '2%',
            data: param.kwh_total
        }],
        color: ['#F87C0E', '#F87C0E', '#D35118']
    };
    consumption.setOption(option1);

}
