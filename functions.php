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
    wp_enqueue_style( 'generals', get_template_directory_uri().'/css/generals.css', array(), filemtime(get_template_directory_uri().'/css/generals.css') );
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'thd_theme_name_scripts' );
?>