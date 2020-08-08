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
                text: 'Total Jasa'
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
                name: 'Total Jasa Anyaman',
                color: getColor('blue'),
                data: [120000, 100000, 321500]
            },
            {
                name: 'Total Jasa Pengolahan',
                color: getColor('orange'),
                data: [10000, 25000, 50000]
            },
            {
                name: 'Total Jasa Koordinasi',
                color: getColor('grey'),
                data: [80000, 50000, 25000]
            },
            {
                name: 'Total Jasa Pucuk',
                color: getColor('yellow'),
                data: [25500, 12500, 37900]
            }
        ]
    });
});

function onClickDisplayData() {
    console.log('Display data....');

    showLoading({isShow: true});
    var myHeaders = new Headers();
    myHeaders.append("secret-key", "$2b$10$L8/hELkO/Xnv9f/n39Y9eeUgbraugXD4CPX8GIrKXXcfmsHYDzJVO");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };

    fetch("https://api.jsonbin.io/b/5f296e096f8e4e3faf2ad552/2", requestOptions)
    .then(response => response.json())
    .then(result => {
        console.log(result);
        showLoading({isShow: false});

        const tbody = document.querySelector('#tableDetail tbody');

        result.Data.forEach(item => {
            let rows =  `<td>${item.Lokasi}</td>` +
                        `<td>${item.TglMonitoring}</td>` +
                        `<td class="has-text-right">${item.TotalJasaAnyaman}</td>` +
                        `<td class="has-text-right">${item.TotalJasaPengolahan}</td>` +
                        `<td class="has-text-right">${item.JasaKoordinasi}</td>` +
                        `<td class="has-text-right">${item.JasaPucuk}</td>` +
                        `<td class="has-text-right">${item['Total ']}</td>`;

            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });

        showDetail();
    })
    .catch(error => console.log('error', error));
}

function onClickDisplayChart() {
    console.log('Display chart...');

    showLoading({isShow: true});
    
    // proses
    setTimeout(() => {
        showLoading({isShow: false});
        showDashboard();
    }, 3000);
}

function onClickSearch(value) {
    console.log('%c onClickSearch: ', 'color: green', value);
}

function onClickShowMore() {
    console.log('%c onClickShowMore: ', 'color: green');
}