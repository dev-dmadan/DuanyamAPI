document.addEventListener('DOMContentLoaded', function() {
    showLoading({isShow: true});
    init()
    .catch(error => {
        alert(`Something wrong happen: ${error}`);
        console.error(error);
    })
    .finally(() => {
        showLoading({isShow: false});
    });
});

async function init() {
    try {
        const req = await getChartData({
            MainFilter: null, 
            CustomFilter: null
        });
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

        return await req.json();
    } catch (error) {
        throw error;
    }
}

async function getDetailData({MainFilter, CustomFilter, Page = 1, isExport = false}) {
    try {
        const secretKey = getSecretKey();
        const headers = new Headers();
        headers.append("Content-Type", "application/json");
        const req = await fetch(`${APP_URL}/dashboard/api/detail-realisasi-produksi-per-po?SecretKey=${secretKey}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify({
                MainFilter: MainFilter ?? null,
                CustomFilter: CustomFilter ?? null,
                Page: Page,
                isExport: isExport
            })
        });
        if(!req.ok) {
            throw new Error('Something wrong error..');
        }

        return await req.json();
    } catch (error) {
        throw error;
    }
}

function renderChart({categories = [], series = []}) {
    const newSeries = series.length > 0 ? series.map(item => {
        item.color = COLORS.GREEN;
        return item;
    }) : [];
    Highcharts.chart('chart', {
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
                    click: async (event) => {
                        showLoading({isShow: true});
                        try {
                            const filters = CURRENT_FILTER;
                            const extendFilter = {
                                column: {
                                    source: 'UsrProductionOrder',
                                    column: 'UsrName'
                                },
                                value: event.point.category,
                                isPeriod: false,
                                valueStart: null,
                                valueEnd: null,
                                valueOperator: null,
                                isSeriesClick: true
                            };
                            if(filters.MainFilter == null) {
                                filters.MainFilter = [extendFilter]
                            } else {
                                filters.MainFilter.push(extendFilter);
                            }

                            const newMainFilter = filters.MainFilter.map(item => {
                                return {
                                    column: item.column,
                                    value: item.value,
                                    isPeriod: item.isPeriod,
                                    valueStart: item.valueStart,
                                    valueEnd: item.valueEnd,
                                    valueOperator: item.valueOperator
                                }
                            });
                            const data = await getDetailData({
                                MainFilter: newMainFilter,
                                CustomFilter: filters.CustomFilter,
                                Page: 1
                            });
                            if(!data.Success) {
                                throw data.Message;
                            }

                            renderDetail({
                                data: data.Data,
                                clearTable: true
                            });
                            
                            CURRENT_PAGE = 1;
                            TOTAL_PAGE = data.TotalPage;
                            
                            showDetail();
                        } catch (error) {
                            alert(error);
                            console.error(error);
                        } finally {
                            showLoading({isShow: false});
                        }
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
    try {
        if(clearTable) {
            document.querySelector('#tableDetail').replaceChild(document.createElement('tbody'), document.querySelector('#tableDetail tbody'));
        }

        const tbody = document.querySelector('#tableDetail tbody');
        data.forEach(item => {
            let rows =  `<td><a href="${CREATIO_URL+EDIT_PAGE_URL.PRODUCTION_ORDER+item.ProductionOrderId}" target="_blank">${item.NoPO}</a></td>` +
                        `<td>${item.NamaProyek}</td>` +
                        `<td class="has-text-right">${item.JumlahProduk}</td>` +
                        `<td class="has-text-right">${item.Realisasi}</td>` +
                        `<td class="has-text-right">${item.RealisasiPersen} %</td>`;

            let tr = document.createElement('tr');
            tr.innerHTML = rows;
            tbody.appendChild(tr);
        });
    } catch (error) {
        throw error;
    }
}

async function onClickSearch({MainFilter, CustomFilter, isChart}) {
    showLoading({isShow: true});
    try {
        let data;
        if(isChart) {
            data = await getChartData({
                MainFilter: MainFilter,
                CustomFilter: CustomFilter
            });
            if(!data.Success) {
                throw data.Message;
            }

            renderChart({
                categories: data.Category,
                series: data.Series
            });
        } else {
            data = await getDetailData({
                MainFilter: MainFilter,
                CustomFilter: CustomFilter,
                Page: 1
            });
            if(!data.Success) {
                throw data.Message;
            }

            renderDetail({
                data: data.Data,
                clearTable: true
            });
        }

        CURRENT_PAGE = 1;
    } catch (error) { 
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}

async function onClickShowMore() {
    showLoading({isShow: true});
    try {
        CURRENT_PAGE++;
        const filter = CURRENT_FILTER;
        const data = await getDetailData({
            MainFilter: filter.MainFilter,
            CustomFilter: filter.CustomFilter,
            Page: CURRENT_PAGE
        });
        if(!data.Success) {
            throw data.Message;
        }

        renderDetail({
            data: data.Data,
            clearTable: false
        })
    } catch (error) {
        CURRENT_PAGE--;
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}

async function onClickDisplayData() {
    showLoading({isShow: true});
    try {
        const filters = IS_SEARCH_CLICK ? getFilter() : CURRENT_FILTER;
        const data = await getDetailData({
            MainFilter: filters.MainFilter, 
            CustomFilter: filters.CustomFilter, 
            Page: 1
        });
        if(!data.Success) {
            throw data.Message;
        }

        CURRENT_PAGE = 1;
        TOTAL_PAGE = data.TotalPage;

        renderDetail({
            data: data.Data,
            clearTable: true
        });
        showDetail();
    } catch (error) {
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}

async function onClickDisplayChart() {
    showLoading({isShow: true});
    try {
        let filters;
        if(IS_SEARCH_CLICK) {
            filters = getFilter();
        } else {
            if(CURRENT_FILTER.MainFilter != null && CURRENT_FILTER.MainFilter.length > 0) {
                const index = CURRENT_FILTER.MainFilter.findIndex(item => item.isSeriesClick != undefined);
                if(index != -1) {
                    CURRENT_FILTER.MainFilter.splice(index, 1);
                }
            }
            
            filters = CURRENT_FILTER;
        }

        const data = await getChartData({
            MainFilter: filters.MainFilter, 
            CustomFilter: filters.CustomFilter
        });
        if(!data.Success) {
            throw data.Message;
        }

        CURRENT_PAGE = 1;
        TOTAL_PAGE = 0;

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
    showLoading({isShow: true});
    try {
        const filter = CURRENT_FILTER;

    } catch (error) {
        throw error;
    } finally {
        showLoading({isShow: false});
    }
}