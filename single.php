<?php get_template_part('template/header'); ?>

<div class="contenedor-page">

    <?php
        $post_type = get_post_type();
        if ($post_type === "proy_sustentables") {
            echo get_field('banner-slider');
            echo '<div class="container">';
            if (have_posts()):
                while (have_posts()):
                    the_post();
            the_content();
            endwhile;
            endif;
            echo '</div>';
        } else {
            if (have_posts()):
            while (have_posts()):
                the_post();
            the_content();
            endwhile;
            endif;
        }


    ?>

</div>

<?php
get_template_part('template/footer');
?>
