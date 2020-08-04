document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Jan-19', 'Feb-19', 'Mar-19',
                'Apr-19', 'Mei-19', 'Jun-19',
                'Jul-19', 'Aug-19', 'Sep-19',
                'Oct-19', 'Nov-19', 'Des-19', 
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah ibu aktif'
            },
        },
        plotOptions: {
            series: {
                cursor: 'pointer',
                events: {
                    click: event => {
                        console.log('%c on click series: ', 'color: blue', event);

                        showLoading({isShow: true});

                        // proses
                        setTimeout(() => {
                            showLoading({isShow: false});

                            showDetail();
                        }, 3000);
                    }
                }
            },
        },
        tooltip: {
            formatter: function() {
                let newLabel =  `<span style="font-size: 12px">${this.key}</span><br/>` +
                                `<span style="font-size: 12px">${this.series.name}: <strong>${this.y}</strong></span>`;
                return newLabel;
            }
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        },
        credits: {
            enabled: false
        },
        series: [
            {
                name: 'Jumlah ibu aktif',
                color: getColor('blue'),
                data: [20, 5, 6, 10, 14, 7, 30, 100, 5, 10, 15, 52]
            }
        ]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard realisasi produksi per po');

    showLoading({isShow: true});

    // proses
    setTimeout(() => {
        showLoading({isShow: false});

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