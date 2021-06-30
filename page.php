<?php get_template_part( 'template/header' ); ?>

<div style="height: 600px;"></div>

<div class="wrapper-content">
    <div class="container">

    <?php
    if(have_posts()):
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    endif;
    ?>

    </div>
</div>

<?php
    if( is_front_page() ):
        get_template_part( 'template/notas' );
    endif;
?>

<?php
get_template_part( 'template/footer' );
?>