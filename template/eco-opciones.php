<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/eco-opciones.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/owl.theme.default.min.css">


<?php $idActual = get_the_ID(); ?>

<div class="contenerdor-general-eco_opciones">
    <div class="container">
        <h2>Otros pilares </h2>
        <div class="contenedor-eco_opciones owl-carousel owl-theme">
        <?php
        $args = array( 'post_type' => 'eco-opciones', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby'=>'fecha', 'order'=>'ASC');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_url( $thumbID );
        ?>

        <?php
            if($idActual != get_the_ID()){
        ?>
            <a href="<?php the_permalink(); ?>" class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(<?php echo $imgDestacada; ?>);">
                    <div class="mask-titulo">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="mask-info">
                        <div class="info">
                            <h2><?php the_title(); ?></h2>
                            <p>
                                <?php echo get_the_excerpt(); ?>
                            </p>
                            <span> Ver más </span>
                        </div>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo the_field("icono"); ?>" alt="">
                </div>
            </a>
        <?php        
            }
        ?>
        
        <?php
            endwhile;
        ?>


        <!--
            <div class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);">
                    <div class="mask-titulo">
                        <h2>Agua</h2>
                    </div>
                    <div class="mask-info">
                        <h2>Agua</h2>
                        <p>
                            El agua es un recurso  vital para nuestro planeta, apoyamos a nuestros clientes a conservarla mediante el uso de productos ahorradores.
                        </p>
                        <a href="#"> Ver más </a>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                </div>
            </div>
            <div class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);">
                    <div class="mask-titulo">
                        <h2>Agua</h2>
                    </div>
                    <div class="mask-info">
                        <h2>Agua</h2>
                        <p>
                            El agua es un recurso  vital para nuestro planeta, apoyamos a nuestros clientes a conservarla mediante el uso de productos ahorradores.
                        </p>
                        <a href="#"> Ver más </a>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                </div>
            </div>
            <div class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);">
                    <div class="mask-titulo">
                        <h2>Agua</h2>
                    </div>
                    <div class="mask-info">
                        <h2>Agua</h2>
                        <p>
                            El agua es un recurso  vital para nuestro planeta, apoyamos a nuestros clientes a conservarla mediante el uso de productos ahorradores.
                        </p>
                        <a href="#"> Ver más </a>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                </div>
            </div>
            <div class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);">
                    <div class="mask-titulo">
                        <h2>Agua</h2>
                    </div>
                    <div class="mask-info">
                        <h2>Agua</h2>
                        <p>
                            El agua es un recurso  vital para nuestro planeta, apoyamos a nuestros clientes a conservarla mediante el uso de productos ahorradores.
                        </p>
                        <a href="#"> Ver más </a>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                </div>
            </div>
            <div class="contenedor-eco_opcion">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);">
                    <div class="mask-titulo">
                        <h2>Agua</h2>
                    </div>
                    <div class="mask-info">
                        <h2>Agua</h2>
                        <p>
                            El agua es un recurso  vital para nuestro planeta, apoyamos a nuestros clientes a conservarla mediante el uso de productos ahorradores.
                        </p>
                        <a href="#"> Ver más </a>
                    </div>
                </div>
                <div class="cont-icono">
                    <img src="<?php echo get_template_directory_uri() ?>/img/icon-energy.png" alt="">
                </div>
            </div>
        -->
        </div>
    </div>
</div>

<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>

<script>
    $('.contenedor-eco_opciones').owlCarousel({
        loop: false,
        margin: 20,
        dots: false,
        nav: true,
        navText: ["<img src='<?php echo get_template_directory_uri().'/img/flecha-izq.png';?>'>", "<img src='<?php echo get_template_directory_uri().'/img/flecha-der.png';?>'>"],
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 3,
            },
            990: {
                items: 4,
            },
            1150: {
                items: 5,
            }
        }
    });
</script>