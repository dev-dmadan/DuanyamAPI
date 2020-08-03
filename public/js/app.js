const DROPDOWN = document.querySelectorAll('.dropdown');
const SELECT_FILTER = document.querySelector('#select-filter');
const DISPLAY_DATA = document.querySelector('#display-data');
let IS_DISPLAY_DATA = true;

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
        handlingFilter(this);
    });

    DISPLAY_DATA.addEventListener('click', function (event) {
        onClickDisplayData();
    });
});

function closeDropdowns() {
    DROPDOWN.forEach(function (element) {
        element.classList.remove('is-active');
    });
}

function showDashboard() {
    IS_DISPLAY_DATA = true;
    DISPLAY_DATA.textContent = 'Display data';

    const chart = document.querySelector('#chart');
    const detailChart = document.querySelector('#detail-chart');

    chart.classList.remove('is-hidden');
    detailChart.classList.toggle('is-hidden');
}

function showDetail() {
    IS_DISPLAY_DATA = false;
    DISPLAY_DATA.textContent = 'Display chart';

    const chart = document.querySelector('#chart');
    const detailChart = document.querySelector('#detail-chart');

    chart.classList.toggle('is-hidden');
    detailChart.classList.remove('is-hidden');
}

function handlingFilter(scope) {
    if(document.querySelector('.field.is-horizontal .field').nextElementSibling != null) {
        document.querySelector('.field.is-horizontal .field').nextElementSibling.remove();
    }

    let jsonFilter = {};
    try {
        jsonFilter = JSON.parse(scope.value);
        let searchFilter = '';
        let div = document.createElement('div');
        switch (jsonFilter.type) {
            case 'text':
                searchFilter =  '<div class="control">' +
                                    `<input id="field-pencarian" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder}">` +
                                '</div>' +
                                '<div class="control">' +
                                    '<a class="button is-success is-small is-rounded" id="search-button">' +
                                        '<span class="icon is-small">' + 
                                            '<i class="fas fa-search"></i>' +
                                        '</span>' +
                                    '</a>' +
                                '</div>';
                                
                div.setAttribute("class", "field has-addons");
                div.innerHTML = searchFilter;
                document.querySelector('.field.is-horizontal').appendChild(div);
                document.querySelector('#search-button').addEventListener('click', function() {
                    const value = document.querySelector('#field-pencarian').value;
                    onClickSearch(value);
                });

                break;

            case 'lookup':
                searchFilter =  '<select id="select-filter">' +
                                    `<option selected disabled>${jsonFilter.value[0]}</option>` +
                                '</select>';
                div.setAttribute("class", "select is-small is-rounded");
                div.innerHTML = searchFilter;
                document.querySelector('.field.is-horizontal').appendChild(div);
                // document.querySelector('#search-button').addEventListener('click', function() {
                //     const value = document.querySelector('#field-pencarian').value;
                //     onClickSearch(value);
                // });
                break;

            case 'date':
                searchFilter =  '<div class="control">' +
                                    '<span class="select is-small">' +
                                        '<select>' +
                                            '<option value="1"> = </option>' +
                                            '<option value="2"> < </option>' +
                                            '<option value="3"> > </option>' +
                                        '</select>' +
                                    '</span>' +
                                '</div>' +
                                '<div class="control">' +
                                    `<input id="field-pencarian" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder}">` +
                                '</div>' +
                                '<div class="control">' +
                                    '<a class="button is-success is-small is-rounded" id="search-button">' +
                                        '<span class="icon is-small">' + 
                                            '<i class="fas fa-search"></i>' +
                                        '</span>' +
                                    '</a>' +
                                '</div>';
                div.setAttribute("class", "field has-addons");
                div.innerHTML = searchFilter;
                document.querySelector('.field.is-horizontal').appendChild(div);
                new Litepicker({ element: document.getElementById('field-pencarian') });

                document.querySelector('#search-button').addEventListener('click', function() {
                    const value = document.querySelector('#field-pencarian').value;
                    onClickSearch(value);
                });
                
                break;

            case 'range-date':
                searchFilter =  '<div class="control">' +
                                    `<input id="field-pencarian-start" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder} mulai">` +
                                '</div>' +
                                '<div class="control">' +
                                    `<input id="field-pencarian-end" class="input is-small is-rounded" type="text" placeholder="${jsonFilter.placeholder} berakhir">` +
                                '</div>' +
                                '<div class="control">' +
                                    '<a class="button is-success is-small is-rounded" id="search-button">' +
                                        '<span class="icon is-small">' + 
                                            '<i class="fas fa-search"></i>' +
                                        '</span>' +
                                    '</a>' +
                                '</div>';
                div.setAttribute("class", "field has-addons");
                div.innerHTML = searchFilter;
                document.querySelector('.field.is-horizontal').appendChild(div);
                new Litepicker({ 
                    element: document.getElementById('field-pencarian-start'),
                    elementEnd: document.getElementById('field-pencarian-end'),
                    singleMode: false,
                    numberOfMonths: 2,
                    numberOfColumns: 2
                });

                document.querySelector('#search-button').addEventListener('click', function() {
                    const value = document.querySelector('#field-pencarian').value;
                    onClickSearch(value);
                });
                break;
        
            default:
                break;
        }
    } catch (error) {
        console.error(error);
    }
}