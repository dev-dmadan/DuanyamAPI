document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        xAxis: {
            categories: [
            'Wulublolong',
            'Bubuatagamu',
            'Kalike',
            'Kalike Aimatan',
            'Balaweling II',
            'Duntana',
            'Rumah Anyam',
            'Lebao',
            'Lemanu',
            'Watanhura',
            'Lamawai',
            'Lewotobi'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
            text: 'Pendapatan Ibu'
            }
        },
        tooltip: {
            formatter: function() {
                let newLabel =  `<span style="font-size: 12px">${this.key}</span><br/>` +
                                `<span style="font-size: 12px">Pendapatan Ibu: <strong>Rp ${Highcharts.numberFormat(this.y, 2, ',', '.')}</strong></span>`;
                return newLabel;
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
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
            }
        },
        series: [{
            name: 'Lokasi',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
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
        }]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard Pendapatan Per Lokasi');

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