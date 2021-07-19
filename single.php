<?php get_template_part('template/header'); ?>

<div class="contenedor-page">

    <?php
        $post_type = get_post_type();
        if ($post_type === "proy_sustentables") {
            $post_type_obj = get_post_type_object($post_type);
            echo $post_type_obj->labels->singular_name;
            echo $post_type_obj->labels->name;
        }


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
