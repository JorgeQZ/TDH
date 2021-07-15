<?php get_template_part( 'template/header' ); ?>

<div class="contenedor-page">

    <?php
    if( is_front_page() ):
            get_template_part( 'template/eco-opciones-home' );
        endif;
    ?>

    <?php

    if(have_posts()):
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
    
    <?php
        if( is_front_page() ):
            get_template_part( 'template/notas' );
        endif;
    ?>

</div>

<?php
get_template_part( 'template/footer' );
?>