<?php
/**
 * Template Name: Proyectos Sustentables
 */
get_template_part('template/header'); ?>

<?php

$bg_color = get_field('background-color');
$bg_image = get_field('background-image');
$set_bgImage = '';
$set_bgColor = '';

if ($bg_color) {
    $set_bgColor = "background-color:".$bg_color.";";
}

if ($bg_image) {
    $set_bgImage = "background-image:url(".$bg_image.");";
}

$bg_options = $set_bgColor.$set_bgImage;

$current_id = get_the_ID();
?>

<div class="wrapper-content" style="<?php echo $bg_options ?>">
    <div class="content">
        <?php

        // if (have_posts()):
        //     while (have_posts()):
        //         the_post();
        //         the_content();
        //     endwhile;
        // endif;

        // $args_cats = array(
        //     'taxonomy' => 'categoria_proyectos',
        //     'orderby' => 'name',
        //     'order' => 'DESC'
        // );

        // $cats = get_categories($args_cats);
        // echo '<pre>';
        // print_r($cats);
        // echo '</pre>';


        ?>

        <div class="wrapper-cat-options" id="wrapper-cat-options">
            <ul id="categories-options"></ul>
        </div>


        <div class="wrapper-cat-content" id="wrapper-cat-content">
            <div class="line-banner">dummy</div>
        </div>
    </div>
</div>
<?php
get_template_part('template/footer');
?>
