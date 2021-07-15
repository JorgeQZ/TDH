<?php get_template_part( 'template/header' ); ?>

<?php
$post_type = get_post_type();



?>
<div class="wrapper-content">
    <div class="container">

    <?php
    if($post_type === "proy_sustentables"):
        // echo '<pre>';
        // print_r(get_terms('categoria_proyectos'));
        // echo '</pre>';

        $tax_term_id = get_queried_object_id();

        // if($tax_term_id !== ''):
        //     $args
        // endif;
        $args = array(
            'numberposts'       => -1,
            'orderby'           => 'date',
            'order'             => 'DESC',
            'suppress_filters'  => true,
            'post_type'         => $post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => 'categoria_proyectos',
                    'terms' => $tax_term_id,
                    'field' => 'term_id',
                )
            ),

        );




        $posts_queried = get_posts($args);

        echo '<pre>';
        print_r($posts_queried);
        echo '</pre>';



    endif;
    ?>
    </div>
</div>

<?php
get_template_part( 'template/footer' );
?>