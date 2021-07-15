<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="main-header">
    <div class="header-container">
        <div class="logo">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>

            <a href="#" title="<?php echo get_bloginfo(); ?>">
                <img src="<?php echo $image[0] ?>" alt="<?php echo get_bloginfo().' Logo '; ?>" class="header_logo">
            </a>
        </div>
        <div class="burguer-button">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="header-menu-container">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'header_menu',
            'menu_id' => 'header_menu',
            'container' => ''
        ) );
        ?>
        </nav>
    </div>
</header>

<?php
//$post_type = get_post_type();
//if($post_type === "page"){
    $banner_slider = sanitize_text_field( get_field('banner_slider_revolution') );
    echo do_shortcode($banner_slider);
//}
?>