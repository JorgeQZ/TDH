<?php get_template_part( 'template/header' ); ?>

    <?php
    if(have_posts()):
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    endif;
    ?>

    <?php if(have_rows('productos')): ?>
        <div class="contenedor-general-productos">
        <div class="container">
            <div class="contenedor-productos">
                <?php while(have_rows('productos')): the_row(); ?>
                    <div class="cont-producto">
                        <div class="cont-img">
                            <img src="<?php the_sub_field('imagen'); ?>" alt="">
                        </div>
                        <div class="cont-info">
                            <?php the_sub_field('contenido'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

<!--
<div class="contenedor-general-productos">
    <div class="container">
        <div class="contenedor-productos">
            <div class="cont-producto">
                <div class="cont-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/refri.jpg" alt="">
                </div>
                <div class="cont-info">
                    <h2>Refrigeradores con certificación Energy Star</h2>
                    <p>
                        Los electrodomésticos son muy importantes en nuestro hogar, 
                        desde la cocina hasta la lavandería, nuestra variedad de electrodomésticos 
                        con certificación Energy Star te ayudarán a ahorrar en el servicio de energía 
                        y a reducir las emisiones de carbono utilizando hasta un 25% menos de energía 
                        que un modelo convencional, todo esto sin sacrificar el rendimiento del producto.
                    </p>
                    <a href="#">Comprar</a>
                </div>
            </div>
            <div class="cont-producto">
                <div class="cont-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/clima.jpg" alt="">
                </div>
                <div class="cont-info">
                    <h2>Mini Splits con tecnología inverter</h2>
                    <p>
                        El aire acondicionado es de los pocos electrodomésticos donde 
                        tú decides la frecuencia de uso. Hoy en día existe la tecnología inverter, 
                        que te permite ahorrar hasta un 70% de energía, gracias a la estabilidad 
                        del compresor.
                    </p>
                    <a href="#">Comprar</a>
                </div>
            </div>
            <div class="cont-producto">
                <div class="cont-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/foco.jpg" alt="">
                </div>
                <div class="cont-info">
                    <h2>Focos</h2>
                    <p>
                        Una casa requiere en promedio 10 focos para iluminar todas las áreas, al utilizar 
                        focos con la certificación Energy Star se genera un ahorro de hasta 
                        $1,500.00 MXN, es decir que estarás ahorrando hasta $15,000.00 MXN 
                        a lo largo de la vida útil de todos los focos.
                    </p>
                    <a href="#">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>
-->

    <?php 
    $postType = get_post_type_object(get_post_type());
    if ($postType->labels->singular_name == "Eco Opciones") {
        get_template_part( 'template/eco-opciones' );
    }
    ?>

<?php
get_template_part( 'template/footer' );
?>