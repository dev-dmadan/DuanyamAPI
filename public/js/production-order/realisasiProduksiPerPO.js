document.addEventListener('DOMContentLoaded', function() {
    const myChart = Highcharts.chart('chart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
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
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});

function onClickDisplayData() {
    console.log('Display data dashboard realisasi produksi per po');

    if(IS_DISPLAY_DATA) {
        showDetail();
    } else {
        showDashboard();
    }
}

function onClickSearch(value) {
    console.log('%c onClickSearch: ', 'color: green', value);
}

function onClickShowMore() {
    
}