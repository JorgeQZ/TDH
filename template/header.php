<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

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
