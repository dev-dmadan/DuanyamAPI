document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
    
        title: {
            text: null
        },
    
        xAxis: {
            categories: ['Bubuatagamu', 'Kalike', 'Lamawai', 'Duntana', 'Watanhura']
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
    
        series: [{
            name: 'Total Jasa Anyam',
            data: [120000, 125000, 170000, 156000, 500000]
        }, {
            name: 'Total Jasa Pengolahan',
            data: [132000, 770000, 170000, 919000, 250000]
        }, {
            name: 'Total Jasa Kordinasi',
            data: [136000, 101000, 930000, 123950, 900000]
        }]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard total biaya produksi per po');

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