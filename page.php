<?php get_template_part( 'template/header' ); ?>

<?php $bg_color = get_field('background-color'); $bg_image = get_field('background-image'); $set_bgImage = ''; $set_bgColor = '';
if($bg_color){$set_bgColor = "background-color:".$bg_color.";";} if($bg_image){$set_bgImage = "background-image:url(".$bg_image.");";}
$bg_options = $set_bgColor.$set_bgImage;

?>

<div class="wrapper-content" style="<?php echo $bg_options ?>">
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