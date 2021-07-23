(function () {

    //Variables
    let current_pos = 0;
    let dataCat = {};

    //Primer ajax en ejecutarse al cargar Template : Proyectos Sustentables
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

    // Botón ver más
    $('.wrapper-cat-options').on('click', '.see-more', function (e) {
        addProjectOptions(dataCat, current_pos);
    });


    // Función: Añadir opciones de categorías
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
                let html_option = '<li class="categories-link-button" data-nickname="' + element.cat_name + '" data-id="' + element.cat_ID + '" data-slug="' + element.slug + '">' + element.cat_name + '<span id="' + element.cat_ID + '-loading"></span></li>';

                $('#categories-options').append(html_option);
            }

            if (data_array.length - current_pos > 0) {
                let button_see_more = '<div class="see-more" id="see-more-button">ver más</div>';
                $('#wrapper-cat-options').append(button_see_more);
            }

        } else {
            data_array.forEach(element => {
                let html_option = '<li class="categories-link-button" data-nickname="' + element.cat_name + '" data-id="' + element.cat_ID + '" data-slug="' + element.slug + '">' + element.cat_name + '</li>';

                $('#categories-options').append(html_option);
            });
        }
    }

    function addItemsContent(items) {
        items.forEach(item => {
            let item_html;
            if (item.featured_image) {
                item_html = '<a class="item animation" href="' + item.url + '" style="background-image: url(' + item.featured_image + ');"><div class="item-title">' + item.title + '<div class="link"></div></div></a>';
            } else {
                item_html = '<a class="item animation" href="' + item.url + '"><div class="item-title">' + item.title + '<div class="link"></div></div></a>';
            }
            $('#grid-proy-posts').append(item_html);
        });
    }

    //Botón categoría
    $('.wrapper-cat-options').on('click', '.categories-link-button', function (e) {
        let loading_url = '../wp-content/themes/THD/img/loading.gif';
        let arrow_url = '../wp-content/themes/THD//img/arrow-right.png'

        let catDataSet = {
            name: $(this)[0].dataset.nickname,
            id: $(this)[0].dataset.id,
            slug: $(this)[0].dataset.slug
        }
        let span_id = catDataSet.id + '-loading';

        $.ajax({
            type: 'POST',
            url: ajax_query_vars.ajax_url,
            data: { 'action': 'fetch_content', 'data_set': catDataSet },
            dataType: 'json',
            beforeSend: function () {
                $('#' + span_id).css({
                    'background-image': 'url(' + loading_url + ')',
                    'background-size': '300% auto'
                });
            }
        }).always(function () {
            $('#' + span_id).css({
                'background-image': 'url(' + arrow_url + ')',
                'background-size': 'contain'
            });
        }).done(function (response) {

            if (response.length >= 0) {
                $('#wrapper-cat-options').animate({
                    'opacity': 0,
                    'height': 0,
                    'padding': 0
                }, 1000);

                setTimeout(function () {
                    $('#wrapper-cat-options').hide();
                }, 1000);

                $('#wrapper-cat-content').show();

                $('#grid-proy-posts').empty();
                $('#banner').text(catDataSet.name);
                addItemsContent(response);
            }

            setTimeout(function () {
                $('.animation').addClass('shown').removeClass('animation');
            }, 3000);
        });
    });
}());