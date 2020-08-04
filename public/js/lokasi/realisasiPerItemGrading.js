document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: ['Bandung', 'Bogor', 'Jakarta']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Realisasi'
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
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
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
                name: 'Grade A+',
                color: getColor('green'),
                data: [null, 10, 2]
            },
            {
                name: 'Grade A',
                color: getColor('blue'),
                data: [10, 10, 25]
            },
            {
                name: 'Grade B',
                color: getColor('orange'),
                data: [4, 11, 7]
            },
            {
                name: 'Grade C',
                color: getColor('grey'),
                data: [10, 23, 3]
            },
            {
                name: 'Lainnya',
                color: getColor('yellow'),
                data: [4, null, 2]
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