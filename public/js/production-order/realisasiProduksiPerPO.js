let CURRENT_PAGE = 1;
let TOTAL_PAGE = 0;
document.addEventListener('DOMContentLoaded', function() {
    showLoading({isShow: true});
    init()
    .catch(error => {
        alert(`Something wrong happen: ${error}`);
        console.error(error);
    })
    .finally(() => {
        showLoading({isShow: false});
    })
});

async function init() {
    try {
        const req = await getChartData({MainFilter: null, CustomFilter: null});
        if(!req.Success) {
            throw req.Message;
        }

        renderChart({
            categories: req.Category,
            series: req.Series
        });
    } catch (error) {
        throw error;
    }
}

async function getChartData({MainFilter, CustomFilter}) {
    let result = {};
    try {
        const secretKey = getSecretKey();
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/realisasi-produksi-per-po?SecretKey=${secretKey}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                MainFilter: MainFilter ?? null,
                CustomFilter: CustomFilter ?? null
            })
        });
        if(!req.ok) {
            throw new Error('Something wrong error..');
        }

        const data = await req.json();
        result = data;
        console.log(data);
    } catch (error) {
        throw error;
    }

    return result;
}

async function getDetailData({MainFilter, CustomFilter, Page = 0}) {

}

function renderChart({categories = [], series = []}) {
    const newSeries = series.length > 0 ? series.map(item => {
        item.color = COLORS.GREEN;
        return item;
    }) : [];
    const chart = Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: '% Persentase'
            }
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
            }
        },
        tooltip: {
            formatter: function() {
                let newLabel =  `<span style="font-size: 12px">${this.key}</span><br/>` +
                                `<span style="font-size: 12px">${this.series.name}: <strong>${Highcharts.numberFormat(this.y, 2, ',', '.')} %</strong></span>`;
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
        series: newSeries
    });
}

function renderDetail({data = [], clearTable = false}) {

}

async function onClickSearch({MainFilter, CustomFilter, isChart}) {
    console.log('%c onClickSearch: ', 'color: green', {MainFilter, CustomFilter, isChart});

    showLoading({isShow: true});
    try {
        
        
    } catch (error) {
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}

async function onClickShowMore() {
    console.log('%c onClickShowMore: ', 'color: green');
}

async function onClickDisplayData() {
    showLoading({isShow: true});
    try {
        const filters = IS_SEARCH_CLICK ? getFilter() : CURRENT_FILTER;
        const data = await getDetailData({MainFilter: filters.MainFilter, CustomFilter: filters.CustomFilter, Page = 1});
        if(!data.Success) {
            throw data.Message;
        }

        CURRENT_PAGE = 1;
        TOTAL_PAGE = data.TotalPage;

        renderDetail({
            data: data.Category,
            clearTable: true
        });
        showDetail();
    } catch (error) {
        throw error;
    }
}

async function onClickDisplayChart() {
    showLoading({isShow: true});
    try {
        const filters = IS_SEARCH_CLICK ? getFilter() : CURRENT_FILTER;
        const data = await getChartData({MainFilter: filters.MainFilter, CustomFilter: filters.CustomFilter});
        if(!data.Success) {
            throw data.Message;
        }

        renderChart({
            categories: data.Category,
            series: data.Series
        });
        showDashboard();
    } catch (error) {
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}

async function onClickExportData() {
    
}