(function () {
    let current_pos = 0;
    let dataCat = {};

    $('.wrapper-cat-options').on('click', '.see-more', function (e) {
        addProjectOptions(dataCat, current_pos);
    });


    function addProjectOptions(data_array, init = 0) {
        $('#see-more-button').remove();
        let limit = 4;
        if (data_array.length > 4) {
            let aux_ = data_array.length - current_pos;

            if (aux_ < 4) {
                limit = data_array.length;
            }

            for (current_pos = init; current_pos < limit; current_pos++) {
                let element = data_array[current_pos];
                let html_option = '<li class="categories-link-button" data-id="' + element.cat_ID + '" data-slug="' + element.slug + '">' + element.cat_name + '</li>';

                $('#categories-options').append(html_option);
            }

            if (data_array.length - current_pos > 0) {
                let button_see_more = '<div class="see-more" id="see-more-button">ver más</div>';
                $('#wrapper-cat-options').append(button_see_more);
            }

        } else {
            data.forEach(element => {
                let html_option = '<li class="categories-link-button" data-id="' + element.cat_ID + '" data-slug="' + element.slug + '">' + element.cat_name + '</li>';

                $('#categories-options').append(html_option);
            });
        }
    }

    $.ajax({
        type: 'get',
        url: ajax_query_vars.ajax_url,
        data: { 'action': 'fetch_cat' },
        dataType: 'json',
        success: function (data) {
            dataCat = data;
            addProjectOptions(dataCat, 0);
        }
    });


}());