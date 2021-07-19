
<div class="contenerdor-general-notas">
    <div class="container">
        <h2>Notas</h2>
        <div class="contenedor-notas owl-carousel owl-theme">

        <?php
        $args = array( 'post_type' => 'notas', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby'=>'fecha', 'order'=>'ASC');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_url( $thumbID );
        ?>

            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(<?php echo $imgDestacada; ?>);"></div>
                <div class="cont-info">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>"> Continuar leyendo </a>
                </div>
            </div>
        
        <?php
            endwhile;
        ?>

        <!--
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
            <div class="contenedor-nota">
                <div class="cont-img" style="background-image: url(https://www.caintra.org.mx/wp-content/uploads/2020/11/Comercio-exterior.jpg);"></div>
                <div class="cont-info">
                    <h3>Nuestro Impacto</h3>
                    <p>Cuando los clientes acuden  a nuestras tiendas, nos invitan  a sus hogares y negocios</p>
                    <a href="#"> Continuar leyendo </a>
                </div>
            </div>
        -->
        </div>
    </div>
</div>


<script>
    $('.contenedor-notas').owlCarousel({
        loop: false,
        margin: 30,
        dots: false,
        nav: true,
        navText: ["<img src='<?php echo get_template_directory_uri().'/img/flecha-izq.png';?>'>", "<img src='<?php echo get_template_directory_uri().'/img/flecha-der.png';?>'>"],
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
            },
            990: {
                items: 3,
            },
            1150: {
                items: 4,
            }
        }
    });
</script>