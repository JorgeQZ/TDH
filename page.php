<?php get_template_part( 'template/header' ); ?>
<div class="wrapper-content">
<?php

if(have_posts()):
    while(have_posts()):
        the_post();
        the_content();
    endwhile;
endif;

?>

</div>
<?php
get_template_part( 'template/footer' );
?>