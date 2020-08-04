const DROPDOWN = document.querySelectorAll('.dropdown');
const SELECT_FILTER = document.querySelector('#select-filter');
const SELECT_FILTER_CUSTOM = document.querySelector('#select-filter-custom');
const DISPLAY_DATA = document.querySelector('#display-data');
const SEARCH_BUTTON = document.querySelector('#search-button');
const FIELD_PENCARIAN = document.querySelector('#field-pencarian');
const FIELD_PENCARIAN_CUSTOM = document.querySelector('#field-pencarian-custom');
let IS_DISPLAY_DATA = true;

showLoading({isShow: true});
window.onload = () => {
    showLoading({isShow: false});
};

document.addEventListener('DOMContentLoaded', function () {
    /** Dropdown */
        if(DROPDOWN.length > 0) {
            DROPDOWN.forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.stopPropagation();
                    element.classList.toggle('is-active');
                });
            });
        }
        
        document.addEventListener('click', function (event) {
            closeDropdowns();
        });
    /** End Dropdown */
    
    SELECT_FILTER.addEventListener('change', function() {
        handlingFilter({scope: this});
    });

    if(SELECT_FILTER_CUSTOM != null) {
        SELECT_FILTER_CUSTOM.addEventListener('change', function() {
            handlingFilter({scope: this, isCustom: true});
        });
    }

    DISPLAY_DATA.addEventListener('click', function (event) {
        onClickDisplayData();
    });

    SEARCH_BUTTON.addEventListener('click', function() {
        const value = document.querySelector('#field-pencarian') != null ? document.querySelector(`#field-pencarian`).value : null;
        const valueCustom = document.querySelector('#field-pencarian-custom') != null ? document.querySelector('#field-pencarian-custom').value : null;
        const valueOperator = document.querySelector('#field-pencarian-operator') != null ? document.querySelector('#field-pencarian-operator').value : null;
        
        const valueStart = document.querySelector('#field-pencarian-start') != null ? document.querySelector(`#field-pencarian-start`).value : null;
        const valueEnd = document.querySelector('#field-pencarian-end') != null ? document.querySelector(`#field-pencarian-end`).value : null;
        
        try {
            const isRangeDate = valueStart && valueEnd;
            if(isRangeDate) {
                if(valueStart.trim() == '' || valueEnd.trim() == '') {
                    throw 'Filter tidak boleh kosong';
                }
            }

            if(value && valueCustom) {
                if(value.trim() == '' || valueCustom.trim() == '') {
                    throw 'Filter tidak boleh kosong';
                }
            }

            

            onClickSearch({
                filter: isRangeDate ? {valueStart, valueEnd} : value, 
                filterCustom: valueCustom,
                filterOperator: valueOperator
            });
        } catch (error) {
            alert(error);
        }
    });
});

function closeDropdowns() {
    DROPDOWN.forEach(function (element) {
        element.classList.remove('is-active');
    });
}

function showLoading({isShow = true}) {
    const loading = document.querySelector('.loader-wrapper');
    if(isShow) {
        loading.classList.toggle('is-active');
    } else {
        loading.classList.remove('is-active');
    }
}

function showDashboard() {
    IS_DISPLAY_DATA = true;
    DISPLAY_DATA.textContent = 'Display data';

    const chart = document.querySelector('#chart');
    const detailChart = document.querySelector('#detail-chart');

    chart.classList.remove('is-hidden');
    detailChart.classList.toggle('is-hidden');
    document.querySelector('.dropdown .dropdown-menu').children[1].remove();
}

function showDetail() {
    IS_DISPLAY_DATA = false;
    DISPLAY_DATA.textContent = 'Display chart';

    const chart = document.querySelector('#chart');
    const detailChart = document.querySelector('#detail-chart');

    chart.classList.toggle('is-hidden');
    detailChart.classList.remove('is-hidden');

    const div = document.createElement('div');
    div.setAttribute("class", "dropdown-content");
    div.innerHTML = '<a id="export-data" href="javascript:void(0);" class="dropdown-item" disabled>Export data</a>';
    document.querySelector('.dropdown .dropdown-menu').appendChild(div);
    document.querySelector('#export-data').addEventListener('click', function() {
        // onClickExportData();
        alert('Export');
    });
}

function handlingFilter({scope, isCustom = false}) {
    const parentFilter = scope.parentElement.parentElement;
    const rootFilter = parentFilter.parentElement;

    SEARCH_BUTTON.disabled = true;

    if(rootFilter.childElementCount > 3) {
        rootFilter.children[2].remove();
    }

    let fieldPencarianId = isCustom ? 'field-pencarian-custom' : 'field-pencarian';
    let removeFilter = isCustom ? 'remove-filter-custom' : 'remove-filter';
    let jsonFilter = {};
    try {
        jsonFilter = JSON.parse(scope.value);
        let searchFilter = '';
        const div = document.createElement('div');
        switch (jsonFilter.type) {
            case 'text':
                searchFilter =  '<div class="control">' +
                                    `<input id="${fieldPencarianId}" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder}">` +
                                '</div>' +
                                '<div class="control">' +
                                    `<a class="button is-danger is-small is-rounded" id="${removeFilter}">` +
                                        '<span class="icon is-small">' + 
                                            '<i class="fas fa-times"></i>' +
                                        '</span>' +
                                    '</a>' +
                                '</div>';
                                
                div.setAttribute("class", "field has-addons pr-3");
                div.innerHTML = searchFilter;
                parentFilter.after(div);

                document.querySelector(`#${fieldPencarianId}`).addEventListener('change', function() {
                    SEARCH_BUTTON.disabled = this.value.trim() != '' ? false : true;
                });
                
                break;

            // case 'lookup':
            //     searchFilter =  '<select id="select-filter">' +
            //                         `<option selected disabled>${jsonFilter.value[0]}</option>` +
            //                     '</select>';
            //     div.setAttribute("class", "select is-small is-rounded");
            //     div.innerHTML = searchFilter;
            //     document.querySelector('.field.is-horizontal').appendChild(div);
            //     // document.querySelector('#search-button').addEventListener('click', function() {
            //     //     const value = document.querySelector('#field-pencarian').value;
            //     //     onClickSearch(value);
            //     // });
            //     break;

            case 'date':
                searchFilter =  '<div class="control">' +
                                    '<span class="select is-small">' +
                                        '<select id="field-pencarian-operator">' +
                                            '<option value="1"> = </option>' +
                                            '<option value="2"> < </option>' +
                                            '<option value="3"> > </option>' +
                                        '</select>' +
                                    '</span>' +
                                '</div>' +
                                '<div class="control">' +
                                    `<input id="${fieldPencarianId}" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder}">` +
                                '</div>';

                div.setAttribute("class", "field has-addons pr-3");
                div.innerHTML = searchFilter;
                parentFilter.after(div);

                if(jsonFilter.isPeriod) {
                    new Litepicker({ 
                        element: document.getElementById('field-pencarian'),
                        format: jsonFilter.format ? jsonFilter.format : 'YYYY-MM-DD',
                        maxDate: MAX_YEAR ? new Date(MAX_YEAR, 11, 31) : new Date(new Date().getFullYear(), 11, 31),
                        dropdowns: {
                            minYear: MIN_YEAR,
                            maxYear: MAX_YEAR,
                            months: true,
                            years: true,
                        }
                    });
                } else {
                    new Litepicker({ 
                        element: document.getElementById('field-pencarian'),
                        format: jsonFilter.format ? jsonFilter.format : 'YYYY-MM-DD',
                    });
                }

                if(!isCustom) {
                    document.querySelector(`#${searchButtonId}`).addEventListener('click', function() {
                        const value = document.querySelector(`#${fieldPencarianId}`).value;
                        const valueCustom = document.querySelector('#field-pencarian-custom') != null ? document.querySelector('#field-pencarian-custom').value : null;
                        const valueOperator = document.querySelector('#field-pencarian-operator') != null ? document.querySelector('#field-pencarian-operator').value : null;
                        
                        try {
                            if(value.trim() == '' || value == undefined) {
                                throw 'Filter utama tidak boleh kosong';
                            }

                            onClickSearch({
                                filter: value, 
                                filterCustom: valueCustom,
                                filterOperator: valueOperator
                            });
                        } catch (error) {
                            alert(error);
                        }
                    });
                }
                
                break;

            case 'range-date':
                searchFilter =  '<div class="control">' +
                                    `<input id="${fieldPencarianId}-start" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder} mulai">` +
                                '</div>' +
                                '<div class="control">' +
                                    `<input id="${fieldPencarianId}-end" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder} berakhir">` +
                                '</div>' +
                                '<div class="control">' +
                                    `<a class="button is-danger is-small is-rounded" id="${removeFilter}">` +
                                        '<span class="icon is-small">' + 
                                        '<i class="fas fa-times"></i>' +
                                        '</span>' +
                                    '</a>' +
                                '</div>';
                div.setAttribute("class", "field has-addons pr-3");
                div.innerHTML = searchFilter;
                parentFilter.after(div);

                new Litepicker({ 
                    element: document.getElementById(`${fieldPencarianId}-start`),
                    elementEnd: document.getElementById(`${fieldPencarianId}-end`),
                    singleMode: false,
                    numberOfMonths: 2,
                    numberOfColumns: 2,
                    onSelect: function(date1, date2) {
                        SEARCH_BUTTON.disabled = false;
                    }
                });
                
                break;
        
            default:
                break;
        }

        document.querySelector(`#${removeFilter}`).addEventListener('click', function() {
            const value = document.querySelector('#field-pencarian') != null ? document.querySelector(`#field-pencarian`).value : null;
            const valueStart = document.querySelector('#field-pencarian-start') != null ? document.querySelector(`#field-pencarian-start`).value : null;
            const valueEnd = document.querySelector('#field-pencarian-end') != null ? document.querySelector(`#field-pencarian-end`).value : null;
            const valueCustom = document.querySelector('#field-pencarian-custom') != null ? document.querySelector('#field-pencarian-custom').value : null;

            rootFilter.children[isCustom ? 1 : 2].remove();
            if(isCustom) {
                SELECT_FILTER_CUSTOM.options[0].selected = true;
                if(!value || (!valueStart || !valueEnd)) {
                    SEARCH_BUTTON.disabled = true;
                }
            } else {
                SELECT_FILTER.options[0].selected = true;
                SEARCH_BUTTON.disabled = valueCustom ? false : true;
            }
        });
    } catch (error) {
        console.error(error);
    }
}

function getColor(colorName = '') {
    let color = '#FFFFFF';
    
    switch (colorName.toLowerCase()) {
        case 'white':
            color = '#FFFFFF';
            break;

        case 'black':
            color = '#000000';
            break;
        
        case 'grey':
            color = '#b8b0b0';
            break;

        case 'orange':
            color = '#f08a5d';
            break;

        case 'yellow':
            color = '#f7f48b';
            break;

        case 'red':
            color = '#f47c7c';
            break;

        case 'red-soft':
            color = '#eb6383';
            break;
        
        case 'blue':
            color = '#70a1d7';
            break;

        case 'blue-soft':
            color = '#a6e3e9';

        case 'green':
            color = '#17b978';
            break;

        case 'green-soft':
            color = '#a1de93';
            break;
        
        default:
            color = '#FFFFFF';
            break;
    }

    return color;
}