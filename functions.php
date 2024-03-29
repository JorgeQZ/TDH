<?php
include_once('widgets/icons-social-media.php');

function thd_setup_theme_supported_features()
{
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    // add_theme_support( 'post-formats' );
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-style');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('custom-spacing');




    add_theme_support(
        'html5',
        array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery', 'caption',
            'style',
            'script'
        )
    );

    add_image_size('logo-footer', 100, 100, true);
    add_filter('image_size_names_choose', 'wpshout_custom_sizes');

    function wpshout_custom_sizes($sizes)
    {
        return array_merge($sizes, array(
            'logo-footer' => __('Logo Footer'),
        ));
    }
}

add_action('after_setup_theme', 'thd_setup_theme_supported_features');


function tdh_menu()
{
    register_nav_menus(array(
    'header_menu' => __('Header Menu', 'The Home Depot'),
  ));
}

add_action('widgets_init', 'tdh_menu');
function thd_widgets_register()
{
    register_sidebar(array(
        'name'          => 'Footer 1',
        'id'            => 'footer-1',
        'description'   => 'Footer Columna 1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));

    register_sidebar(array(
        'name'          => 'Footer 2',
        'id'            => 'footer-2',
        'description'   => 'Footer Columna 2',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));

    register_sidebar(array(
        'name'          => 'Footer 3',
        'id'            => 'footer-3',
        'description'   => 'Footer Columna 3',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Derechos Reservados',
        'id'            => 'footer-dr',
        'description'   => 'Footer Derechos Reservados',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));
}

add_action('widgets_init', 'thd_widgets_register');


function thd_theme_name_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
    wp_enqueue_style('generals', get_template_directory_uri().'/css/generals.css', array(), get_template_directory_uri().'/css/generals.css');
    wp_enqueue_script('generals', get_template_directory_uri() . '/js/generals.js', array(), '1.0.0', true);

    if (is_front_page()):
      wp_enqueue_style('notas', get_template_directory_uri().'/css/notas.css', array(), get_template_directory_uri().'/css/notas.css') ;
    wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all');
    wp_enqueue_style('owl.theme.default.min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.1', 'all');
    wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), get_stylesheet_directory() . '/js/owl.carousel.min.js', false);
    endif;

    if (is_page_template('proyectos-sustentables.php')):
        wp_enqueue_style('proyectos-sustentables', get_template_directory_uri().'/css/proyectos-sustentables.css', array(), get_template_directory_uri().'/css/proyectos-sustentables.css') ;
    endif;
}
add_action('wp_enqueue_scripts', 'thd_theme_name_scripts');

add_action('init', 'thd_post_type_notas');
function thd_post_type_notas()
{
    $labels = array(
    'name'               => __('Notas'),
    'singular_name'      => __('Notas'),
    'add_new'            => __('Agregar Nueva Nota'),
    'add_new_item'       => __('Agregar Nueva Nota'),
    'edit_item'          => __('Editar Nota'),
    'new_item'           => __('Nueva Nota'),
    'all_items'          => __('Todas Las Notas'),
    'view_item'          => __('Ver Nota'),
    'search_items'       => __('Buscar Nota'),
    'not_found' => 'No se han encontrado notas',
        'not_found_in_trash' => 'No se han encontrado notas en la papelera'
  );

    $args = array(
    'labels'            => $labels,
    'description'       => 'Información especifica de cada nota',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'page-attributes', 'editor', 'thumbnail', 'excerpt', 'comments'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'show_in_rest'      => true,
    'query_var'         => 'notas'
  );

    register_post_type('notas', $args);
}


add_action('init', 'thd_post_type_eco_opciones');
function thd_post_type_eco_opciones()
{
    $labels = array(
    'name'               => __('Eco Opciones'),
    'singular_name'      => __('Eco Opciones'),
    'add_new'            => __('Agregar Nueva Eco Opción'),
    'add_new_item'       => __('Agregar Nueva Eco Opción'),
    'edit_item'          => __('Editar Eco Opción'),
    'new_item'           => __('Nueva Eco Opción'),
    'all_items'          => __('Todas Las Eco Opciones'),
    'view_item'          => __('Ver Eco Opción'),
    'search_items'       => __('Buscar Eco Opción'),
    'not_found' => 'No se han encontrado eco opciones',
        'not_found_in_trash' => 'No se han encontrado eco opciones en la papelera'
  );

    $args = array(
    'labels'            => $labels,
    'description'       => 'Información especifica de cada eco opción',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'page-attributes', 'editor', 'thumbnail', 'excerpt', 'comments'),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'show_in_rest'      => true,
    'query_var'         => 'eco-opciones'
  );

    register_post_type('eco-opciones', $args);
}


// Proyectos Sustentables
function thd_register_proyectos_sustentables()
{

    /**
     * Post Type: Proyectos Sustentables.
     */

    $labels = [
        "name" => __("Proyectos Sustentables", "custom-post-type-ui"),
        "singular_name" => __("Proyecto Sustentable", "custom-post-type-ui"),
        "menu_name" => __("Mis Proyectos Sustentables", "custom-post-type-ui"),
        "all_items" => __("Todos los Proyectos Sustentables", "custom-post-type-ui"),
        "add_new" => __("Añadir nuevo", "custom-post-type-ui"),
        "add_new_item" => __("Añadir nuevo Proyecto Sustentable", "custom-post-type-ui"),
        "edit_item" => __("Editar Proyecto Sustentable", "custom-post-type-ui"),
        "new_item" => __("Nuevo Proyecto Sustentable", "custom-post-type-ui"),
        "view_item" => __("Ver Proyecto Sustentable", "custom-post-type-ui"),
        "view_items" => __("Ver Proyectos Sustentables", "custom-post-type-ui"),
        "search_items" => __("Buscar Proyectos Sustentables", "custom-post-type-ui"),
        "not_found" => __("No se ha encontrado Proyectos Sustentables", "custom-post-type-ui"),
        "not_found_in_trash" => __("No se han encontrado Proyectos Sustentables en la papelera", "custom-post-type-ui"),
        "parent" => __("Proyecto Sustentable superior:", "custom-post-type-ui"),
        "featured_image" => __("Imagen destacada para Proyecto Sustentable", "custom-post-type-ui"),
        "set_featured_image" => __("Establece una imagen destacada para Proyecto Sustentable", "custom-post-type-ui"),
        "remove_featured_image" => __("Eliminar la imagen destacada de Proyecto Sustentable", "custom-post-type-ui"),
        "use_featured_image" => __("Usar como imagen destacada de Proyecto Sustentable", "custom-post-type-ui"),
        "archives" => __("Archivos de Proyecto Sustentable", "custom-post-type-ui"),
        "insert_into_item" => __("Insertar en Proyecto Sustentable", "custom-post-type-ui"),
        "uploaded_to_this_item" => __("Subir a Proyecto Sustentable", "custom-post-type-ui"),
        "filter_items_list" => __("Filtrar la lista de Proyectos Sustentables", "custom-post-type-ui"),
        "items_list_navigation" => __("Navegación de la lista de Proyectos Sustentables", "custom-post-type-ui"),
        "items_list" => __("Lista de Proyectos Sustentables", "custom-post-type-ui"),
        "attributes" => __("Atributos de Proyectos Sustentables", "custom-post-type-ui"),
        "name_admin_bar" => __("Proyecto Sustentable", "custom-post-type-ui"),
        "item_published" => __("Proyecto Sustentable publicado", "custom-post-type-ui"),
        "item_published_privately" => __("Proyecto Sustentable publicado como privado.", "custom-post-type-ui"),
        "item_reverted_to_draft" => __("Proyecto Sustentable devuelto a borrador.", "custom-post-type-ui"),
        "item_scheduled" => __("Proyecto Sustentable programado", "custom-post-type-ui"),
        "item_updated" => __("Proyecto Sustentable actualizado.", "custom-post-type-ui"),
        "parent_item_colon" => __("Proyecto Sustentable superior:", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("Proyectos Sustentables", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "page",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => [ "slug" => "proyectos-sustentables", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 20,
        "menu_icon" => "dashicons-admin-site",
        "supports" => [ "title", "editor", "thumbnail", "author", "page-attributes", "post-formats" ],
        "taxonomies" => [ "categoria_proyectors" ],
        "show_in_graphql" => false,
    ];

    register_post_type("proy_sustentables", $args);
}

add_action('init', 'thd_register_proyectos_sustentables');

function thd_register_tax_proy_sust()
{

    /**
     * Taxonomy: Categorías de Proyectos.
     */

    $labels = [
        "name" => __("Categorías de Proyectos", "custom-post-type-ui"),
        "singular_name" => __("Categoría de Proyectos", "custom-post-type-ui"),
        "menu_name" => __("Categorías de Proyectos", "custom-post-type-ui"),
        "all_items" => __("Todos los Categorías de Proyectos", "custom-post-type-ui"),
        "edit_item" => __("Editar Categoría de Proyectos", "custom-post-type-ui"),
        "view_item" => __("Ver Categoría de Proyectos", "custom-post-type-ui"),
        "update_item" => __("Actualizar el nombre de Categoría de Proyectos", "custom-post-type-ui"),
        "add_new_item" => __("Añadir nuevo Categoría de Proyectos", "custom-post-type-ui"),
        "new_item_name" => __("Nombre del nuevo Categoría de Proyectos", "custom-post-type-ui"),
        "parent_item" => __("Categoría de Proyectos superior", "custom-post-type-ui"),
        "parent_item_colon" => __("Categoría de Proyectos superior:", "custom-post-type-ui"),
        "search_items" => __("Buscar Categorías de Proyectos", "custom-post-type-ui"),
        "popular_items" => __("Categorías de Proyectos populares", "custom-post-type-ui"),
        "separate_items_with_commas" => __("Separar Categorías de Proyectos con comas", "custom-post-type-ui"),
        "add_or_remove_items" => __("Añadir o eliminar Categorías de Proyectos", "custom-post-type-ui"),
        "choose_from_most_used" => __("Escoger entre los Categorías de Proyectos más usandos", "custom-post-type-ui"),
        "not_found" => __("No se ha encontrado Categorías de Proyectos", "custom-post-type-ui"),
        "no_terms" => __("Ninguna Categoría de Proyectos", "custom-post-type-ui"),
        "items_list_navigation" => __("Navegación de la lista de Categorías de Proyectos", "custom-post-type-ui"),
        "items_list" => __("Lista de Categorías de Proyectos", "custom-post-type-ui"),
        "back_to_items" => __("Volver a Categorías de Proyectos", "custom-post-type-ui"),
    ];


    $args = [
        "label" => __("Categorías de Proyectos", "custom-post-type-ui"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'categoria_proyectos', 'with_front' => true,  'hierarchical' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "categoria_proyectos",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("categoria_proyectos", [ "proy_sustentables" ], $args);
}
add_action('init', 'thd_register_tax_proy_sust');


function load_proy_sustentables()
{
    if (is_page_template('proyectos-sustentables.php')):

        wp_enqueue_script('proyectos-sustentables', get_template_directory_uri().'/js/proyectos_sustentables.js', array('jquery'), '1.0', true);

    wp_localize_script('proyectos-sustentables', 'ajax_query_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'  => wp_create_nonce('wp_rest')
        ));
    endif;
}

add_action('wp_enqueue_scripts', 'load_proy_sustentables');

add_action('wp_ajax_nopriv_fetch_cat', 'fetch_tdh_proy_cat');
add_action('wp_ajax_fetch_cat', 'fetch_tdh_proy_cat');

function fetch_tdh_proy_cat()
{
    $args_cat = array(
        'taxonomy' => 'categoria_proyectos',
        'hide_empty' => 1,
        'orderby' => 'name',
        'order' => 'ASC'
    );

    $cats = get_categories($args_cat);

    // header('Content-type: application/json; charset=utf-8');
    echo json_encode($cats);
    exit;
}


add_action('wp_ajax_nopriv_fetch_content', 'fetch_tdh_proy_content');
add_action('wp_ajax_fetch_content', 'fetch_tdh_proy_content');

function fetch_tdh_proy_content()
{
    $data = $_POST['data_set'];
    $paged = (isset($data['pageNum'])) ? $data['pageNum'] : 1;
    $args_post = array(
        'post_type' => 'proy_sustentables',
        'orderby'  => 'DATE',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'categoria_proyectos',
                'field' => 'slug',
                'terms' => $data['slug'],
            )
        ),
    );

    $content = new WP_Query($args_post);
    $content_array = array();
    foreach ($content->posts as $post) {
        $featured_image = get_the_post_thumbnail_url($post->ID);
        $data = array(
            'title' => $post->post_title,
            'url' => $post->guid,
            'id' => $post->ID,
            'featured_image' => $featured_image,
            'pageNumber' => $paged

        );

        array_push($content_array, $data);
    }

    wp_reset_postdata();

    // header('Content-type: application/json; charset=utf-8');
    echo json_encode($content_array);
    exit;
}
