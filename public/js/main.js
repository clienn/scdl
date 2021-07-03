function initAddItems(selTable, modalTable, modalId, paginationId, pageUrl, baseUrl, callbackA, callbackB) {
    $(document).on('click', '#' + paginationId + ' a', function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        let patt = /\?page=(\d+)/i;
        let page = patt.exec(href);

        let ajax_url = baseUrl + pageUrl + '?page=' + page[1];

        $.get(ajax_url, function(data) {
            $('#' + modalTable).html(data);

            if (callbackA) callbackA(selTable, modalTable);
        });
    });

    $(document).on('click', '#' + modalTable + ' input[type="checkbox"]', function(e) {
        let flag = $(this).is(':checked');

        let exam_item = $(this).parents('tr').html();
        let elem = $('<tr>' + exam_item + '</tr>');
        elem.append('<td>...</td>');
        elem.find('input[type="checkbox"]').prop('checked', true);

        let currElem = $('#' + selTable).find('input[value="' + $(this).val() + '"');
        console.log(currElem.length)
        
        if (currElem.length == 0) {
            $('#' + selTable + ' tbody').append(elem);
        }

        currElem.prop('checked', flag)
        
        if (callbackB) callbackB();
    });

    $('#' + modalId).on('show.bs.modal', function (event) {
        if (callbackA) callbackA(selTable, modalTable);
    });
}

function checkSelectedExams(selTable, modalTable) {
    let ids = [];
    
    $('#' + selTable + ' input[type="checkbox"]').each(function() {
        ids[$(this).val()] = $(this).is(':checked');
    });

    $('#' + modalTable + ' input[type="checkbox"]').each(function() {
        $(this).prop('checked', ids[$(this).val()]);
    });
}

function initAjaxListSearch(search_id, table_id, paginationId, baseUrl, pageUrl) {
    if (search_id) {
        let flag = false;
        let timer = null;

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = false;
            clearTimeout(timer);
            timer = null;
        });

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = true;

            timer = setTimeout(() => {
                if (flag) {
                    let str = $(this).val();
            
                    if (str.length > 1 || str.length == 0) {
                        let ajax_url = baseUrl + pageUrl + '?search=' + str;
            
                        $.get(ajax_url, function(data) {
                            $('#' + table_id).html(data);
                        });
                    }
                }
            }, 1000);
        });
    }

    $(document).on('click', '#' + paginationId + ' a', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');
        let patt = /\?page=(\d+)/i;
        let page = patt.exec(href);
        let search = '';

        if (search_id) search = '&search=' + $('#' + search_id).val();

        let ajax_url = baseUrl + pageUrl + '?page=' + page[1] + search;

        $.get(ajax_url, function(data) {
            $('#' + table_id).html(data);
        });
    });
}

function initAjaxPagination(paginationId, modalTable, baseUrl, pageUrl, search_id, callback) {
    if (search_id) {
        let flag = false;
        let timer = null;

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = false;
            clearTimeout(timer);
            timer = null;
        });

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = true;

            timer = setTimeout(() => {
                if (flag) {
                    let str = $(this).val();
            
                    if (str.length > 1 || str.length == 0) {
                        let ajax_url = baseUrl + pageUrl + '?search=' + str;
            
                        $.get(ajax_url, function(data) {
                            $('#' + modalTable).html(data);
                            if (callback) callback();
                        });
                    }
                }
            }, 1000);

            
        });
    }

    $(document).on('click', '#' + paginationId + ' a', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');
        let patt = /\?page=(\d+)/i;
        let page = patt.exec(href);
        let search = '';

        if (search_id) search = '&search=' + $('#' + search_id).val();

        let ajax_url = baseUrl + pageUrl + '?page=' + page[1] + search;

        $.get(ajax_url, function(data) {
            $('#' + modalTable).html(data);
            if (callback) callback();
        });
    });
}