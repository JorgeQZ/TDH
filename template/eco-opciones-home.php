<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/eco-opciones-home.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.theme.default.min.css">

<div class="contenerdor-general-eco_opciones-home">
    <div class="container">
        <div class="contenedor-eco_opciones-home owl-carousel owl-theme">
        <?php
        $args = array( 'post_type' => 'eco-opciones', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby'=>'fecha', 'order'=>'ASC');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_url( $thumbID );
        ?>
        <div class="contenedor-eco_opcion">
            <div class="cont-icono">
                <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                <div class="cont-info">
                    <h2> <?php the_title(); ?> </h2>
                    <p>
                        <?php echo get_the_excerpt(); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
            endwhile;
        ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>

<script>
    $('.contenedor-eco_opciones-home').owlCarousel({
        loop: false,
        margin: 55,
        dots: false,
        nav: true,
        navText: ["<img src='<?php echo get_template_directory_uri().'/img/flecha-izq.png';?>'>", "<img src='<?php echo get_template_directory_uri().'/img/flecha-der.png';?>'>"],
        responsive: {
            0: {
                items: 2,
                margin: 10,
            },
            768: {
                items: 4,
            },
            990: {
                items: 5,
            },
            1150: {
                items: 6,
            }
        }
    });
</script>