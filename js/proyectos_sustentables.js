(function () {

    //Variables
    let current_pos = 0;
    let dataCat = {};
    let loading_url = '../wp-content/themes/THD/img/loading.gif';
    let arrow_url = '../wp-content/themes/THD//img/arrow-right.png'
    let arrow_posts_url = '../wp-content/themes/THD//img/arrow-down-green.png'
    let pageNumber = 1;
    let catOptionObjetc;
    let catDataSet;
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
        e.stopPropagation();
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

        let button_see_more = '<div class="see-more" id="see-more-button_posts">ver más</div>';
        $('#grid-proy-posts').append(button_see_more);
    }

    function loadMorePosts(object = Object, pageNumber_) {
        catDataSet = {
            name: object[0].dataset.nickname,
            id: object[0].dataset.id,
            slug: object[0].dataset.slug,
            pageNum: pageNumber_
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

                if ($('#see-more-button_posts')) {
                    $('#see-more-button_posts').addClass('loading');
                } else {
                    console.log('false');
                }
            }
        }).always(function () {
            $('#' + span_id).css({
                'background-image': 'url(' + arrow_url + ')',
                'background-size': 'contain'
            });
        }).done(function (response) {

            if (response.length !== 0) {
                let wrapper_options = $('#wrapper-cat-options');
                $('#see-more-button_posts').remove();
                wrapper_options.animate({
                    'opacity': 0,
                    'height': 0,
                    'padding': 0
                }, 1000);

                setTimeout(function () {
                    $('#wrapper-cat-options').hide();
                }, 1000);

                $('#wrapper-cat-content').show();


                $('#banner-text').text(catDataSet.name);
                addItemsContent(response);
                pageNumber++;

            } else {
                $('#see-more-button_posts').removeClass('loading').text('Sin más resultados').addClass('no-arrow');
            }

            setTimeout(function () {
                $('.animation').addClass('shown').removeClass('animation');
            }, 3000);
        });
    }

    //Botón categoría
    $('.wrapper-cat-options').on('click', '.categories-link-button', function (e) {
        catOptionObjetc = $(this);
        loadMorePosts(catOptionObjetc, pageNumber);
    });

    $('.wrapper-cat-content').on('click', '#see-more-button_posts', function (e) {
        e.stopPropagation();
        loadMorePosts(catOptionObjetc, pageNumber);
    });

    $('.back-to-cat').on('click', function (e) {
        $('#grid-proy-posts').empty();
        $('#wrapper-cat-options').animate({
            'opacity': 1,
            'padding': '50px 20px',
            'display': 'block'
        }, 1000).css({
            'height': 'auto'
        }).show();

        $('#wrapper-cat-content').hide();
        pageNumber = 1;
    });
}());