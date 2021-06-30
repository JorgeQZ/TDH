<?php
include_once ('widgets/icons-social-media.php');

function thd_setup_theme_supported_features() {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-formats' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );

    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'editor-style' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'custom-background' );



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

    add_image_size( 'logo-footer', 100, 100, true);
    add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );

    function wpshout_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'logo-footer' => __( 'Logo Footer' ),
        ) );
    }



}

add_action( 'after_setup_theme', 'thd_setup_theme_supported_features' );


function tdh_menu(){

  register_nav_menus( array(
    'header_menu' => __( 'Header Menu', 'The Home Depot' ),
  ) );

}

add_action( 'widgets_init', 'tdh_menu' );
function thd_widgets_register() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'description'   => 'Footer Columna 1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
    ) );

    register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'description'   => 'Footer Columna 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
    ) );

    register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer-3',
		'description'   => 'Footer Columna 3',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
    ) );

    register_sidebar( array(
		'name'          => 'Footer Derechos Reservados',
		'id'            => 'footer-dr',
		'description'   => 'Footer Derechos Reservados',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

}

add_action( 'widgets_init', 'thd_widgets_register' );


function thd_theme_name_scripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
    wp_enqueue_style( 'generals', get_template_directory_uri().'/css/generals.css', array(), filemtime(get_template_directory_uri().'/css/generals.css') );
    wp_enqueue_script( 'generals', get_template_directory_uri() . '/js/generals.js', array(), '1.0.0', true );

    if( is_front_page() ):
      wp_enqueue_style( 'notas', get_template_directory_uri().'/css/notas.css', array(), filemtime(get_template_directory_uri().'/css/notas.css') );
      wp_enqueue_style( 'owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all');
      wp_enqueue_style( 'owl.theme.default.min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.1', 'all');
      wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'),filemtime( get_stylesheet_directory() . '/js/owl.carousel.min.js' ), false);
    endif;

}
add_action( 'wp_enqueue_scripts', 'thd_theme_name_scripts' );



add_action( 'init', 'thd_post_type_notas' );
function thd_post_type_notas() {
  $labels = array(
    'name'               => __( 'Notas' ),
    'singular_name'      => __( 'Notas' ),
    'add_new'            => __( 'Agregar Nueva Nota' ),
    'add_new_item'       => __( 'Agregar Nueva Nota' ),
    'edit_item'          => __( 'Editar Nota' ),
    'new_item'           => __( 'Nueva Nota' ),
    'all_items'          => __( 'Todas Las Notas' ),
    'view_item'          => __( 'Ver Nota' ),
    'search_items'       => __( 'Buscar Nota' ),
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
    'query_var'         => 'nota'
  );

  register_post_type( 'nota', $args);
}

?>