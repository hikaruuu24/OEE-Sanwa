// ================* MOTHLY *


function submitDate() {
    let url = '';
    let daterange = $('#daterange').val();
    let date = $('#date').val()
    if (daterange == 'day' || daterange == 'minute') {
        date = $('#date').val()
    } else if (daterange == 'month') {
        date = $('#month').val()
        url = './api/billing';

    } else if (daterange == 'year') {
        date = $('#year').val()
        url = './api/billing/month';
    }
    $('#status').html('<span class="tx-12 align-self-center badge badge-warning">Loading ...</span>')
    toastr.warning(new Date().toLocaleString('en-US', {
            timeZone: 'Asia/Jakarta'
        }) +
        ": Loading..");


    axios.post(url, {
            date: date,
            daterange: daterange,
        })
        .then(function (response) {
            // console.log(response.data.sub_total);
            toastr.success(new Date().toLocaleString('en-US', {
                timeZone: 'Asia/Jakarta'
            }) + ": Success !");
            $('#total_billing').text(response.data.total_billing);
            // $('#periode').text(response.data.date)
            // $('#date').val(response.data.date)

            dataBilling(response.data);
            // Datatable Add

            // --dataexist
            table.clear();
            let indx = 1;
            $.each(response.data.all, function (i, key) {
                table.row.add([
                    indx++,
                    response.data.all[i].datetime,
                    response.data.all[i].total_kwh,
                    response.data.all[i].kwh_wbp,
                    response.data.all[i].kwh_lwbp,
                    response.data.all[i].price_wbp,
                    response.data.all[i].price_lwbp,
                    response.data.all[i].total_wbp,
                    response.data.all[i].total_lwbp,
                    response.data.all[i].sub_total

                ])
            });
            table.draw();

            let dataCount = indx - 1;
            if (dataCount > 0) {
                $('#status').html(dataCount + ' data : ' + '<span class="tx-12 align-self-center badge badge-success">Success</span> ')
            } else {
                $('#status').html(dataCount + ' data : ' + '<span class="tx-12 align-self-center badge badge-danger">No Data Available</span> ')
            }

            // --datatotal


        })
        .catch(function (error) {

            toastr.error("Failed !");
            $('#status').html('<span class="tx-12 align-self-center badge badge-danger">Failed</span>')

            console.log(error);
        });
}

function dataBilling(datetime,subtotal) {
    var consumption = echarts.init(document.getElementById('data-total'));
    consumption.clear();
    option1 = {
        legend: {
            data: ['BILLING']
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
            data: datetime,
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
            // x: 60,
            left: 80,
            // x2: 40,
            // y2: 80
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
            name: 'Sub Total',
            type: 'bar',
            barGap: '2%',
            data: subtotal
        }],
        color: [getRandomColor()]
    };
    consumption.setOption(option1);

}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
