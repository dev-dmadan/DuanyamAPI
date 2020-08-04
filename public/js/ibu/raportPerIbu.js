document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chart', {

        chart: {
            type: 'column'
        },
    
        title: {
            text: null
        },
    
        xAxis: {
            categories: ['Dese Mini', 'Dese Tanduk', 'Sobe S']
        },
    
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Total'
            }
        },
    
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
    
        plotOptions: {
            column: {
                stacking: 'normal'
            },
            series: {
                cursor: 'pointer',
                events: {
                    click: event => {
                        showLoading({isShow: true})
                        //proses
                        setTimeout(() => {
                            showLoading({isShow: false})

                            showDetail();
                        }, 1500);
                    }
                }
            }
        },
        series: [
            {
                name: 'Jumlah Realisasi',
                data: [8, 9, 8]
            },
            {
                name: 'Jumlah Grade A+',
                data: [2, 5, 7]
            }, {
                name: 'Jumlah Grade A',
                data: [3, 5, 6]
            }, {
                name: 'Jumlah Grade B',
                data: [4, 5, 2]
            },
            {
                name: 'Jumlah Grade C',
                data: [2, 2, 2]
            },
            {
                name: 'Jumlah Grade Lainnya',
                data: [1, 8, 9]
            }
        ]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard raport per ibu');

    showLoading(isShow = true);

    // proses
    setTimeout(() => {
        showLoading(isShow = false);

        if(IS_DISPLAY_DATA) {
            showDetail();
        } else {
            showDashboard();
        }
    }, 3000);
}

function onClickSearch(value) {
    console.log('%c onClickSearch: ', 'color: green', value);
}

function onClickShowMore() {
    console.log('%c onClickShowMore: ', 'color: green');
}