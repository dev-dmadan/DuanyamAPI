document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Maria Ozawa', 'Arina Hashimoto', 'Aoi Sora', 
                'Mitsuki Nagisa', 'Emiri Suzuhara', 'Karima Astari', 
                'Sera Indri Nokiva', 'Rafika Aqmarina', 'Riley Reid',
                'Samantha Hayes'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Pendapatan'
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
                                `<span style="font-size: 12px">${this.series.name}: <strong>Rp ${Highcharts.numberFormat(this.y, 2, ',', '.')}</strong></span>`;
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
                name: 'Average Pendapatan',
                color: COLORS.BLUE,
                data: [100500, 99000, 97000, 70000, 57000, 47000, 45000, 40000, 30000, 25000]
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