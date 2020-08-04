document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Raport Per Ibu'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Total Anyaman',
            data: [1, 0, 4]
        }, {
            name: 'Total Pengolahan',
            data: [5, 7, 3]
        }]
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