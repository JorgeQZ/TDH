<?php get_template_part('template/header'); ?>

<div class="contenedor-page">
    <?php
        if (have_posts()):
        while (have_posts()):
            the_post();
        the_content();
        endwhile;
        endif;
    ?>
</div>

<?php
get_template_part('template/footer');
?>
