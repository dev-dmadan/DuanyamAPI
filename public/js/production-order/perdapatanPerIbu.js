document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Pendapatan Per Ibu'
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
            name: 'Jack',
            data: [1, 0, 4]
        }, {
            name: 'Cebs',
            data: [5, 7, 3]
        }]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard Pendapatan Per Ibu');

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