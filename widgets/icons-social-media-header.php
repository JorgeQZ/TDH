<?php
function thd_load_widget_header() {
    register_widget( 'thd_widget_header' );
}
add_action( 'widgets_init', 'thd_load_widget_header' );

// Creating the widget
class thd_widget_header extends WP_Widget {
    function __construct() {
        parent::__construct('thd_widget_header',__('The Home Depot Social Icons Header', 'thd_widget_header_domain'),array( 'description' => __( 'Botones de redes sociales.', 'thd_widget_header_domain' ), ));
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $facebook = $instance['thd_facebook'];
        $pinterest = $instance['thd_pinterest'];
        $linkedin = $instance['thd_linkedin'];
        $youtube = $instance['thd_youtube'];
        $whatsapp = $instance['thd_whatsapp'];
        $twitter = $instance['thd_twitter'];
        $instagram = $instance['thd_instagram'];
        $whatsapp_text = $instance['thd_whatsapp_text'];

        echo $args['before_widget'];
        if ( ! empty( $title ) ){
        echo $args['before_title'] . $title . $args['after_title'];
        }

        if($whatsapp):
            $whatsapp__url = "https://wa.me/".$whatsapp;
            if($whatsapp_text):
                $whatsapp__url = "https://wa.me/".$whatsapp.'?text='.$whatsapp_text;
            endif;
        endif;

        echo "<div class='links'>";
        if( ! empty($facebook)){
            echo "<a href='".$facebook."' target='_blank'><img src='".get_template_directory_uri().'/img/icons/facebook-white.png'."' alt=''></a>";
        }

        if( ! empty($twitter)){
            echo "<a href='".$twitter."' target='_blank'>
              <img  src='".get_template_directory_uri().'/img/icons/twitter-white.png'."' alt=''>
            </a>";
            }

        if( ! empty($linkedin)){
        echo "<a href='".$linkedin."' target='_blank'><img src='".get_template_directory_uri().'/img/icons/linkedin-white.png'."' alt=''></a>";
        }

        if( ! empty($instagram)){
        echo "<a href='".$instagram."' target='_blank'>
            <img src='".get_template_directory_uri().'/img/icons/instagram-white.png'."' alt=''></a>";
        }


        if( ! empty($youtube)){
        echo "<a href='".$youtube."' target='_blank'><img src='".get_template_directory_uri().'/img/icons/youtube-white.png'."'></a>";
        }

        if( ! empty($pinterest)){
        echo "<a href='".$pinterest."' target='_blank'>
           <img src='".get_template_directory_uri().'/img/icons/pinterest-white.png'."' alt=''>
        </a>";
        }
        if( ! empty($whatsapp)){
        echo "<a href='".$whatsapp__url."' target='_blank'>
           <img class='hover' src='".get_template_directory_uri().'/img/icons/whatsapp-white.png'."' alt=''>
        </a>";
        }
        echo "</div>";

        echo $args['after_widget'];
    }


    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }else {
    $title = __( 'New title', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_facebook' ] ) ) {
    $facebook = $instance[ 'thd_facebook' ];
    }else{
    $facebook = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_youtube' ] ) ) {
    $youtube = $instance[ 'thd_youtube' ];
    }else{
    $youtube = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_linkedin' ] ) ) {
    $linkedin = $instance[ 'thd_linkedin' ];
    }else{
    $linkedin = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_pinterest' ] ) ) {
    $pinterest = $instance[ 'thd_pinterest' ];
    }else{
    $pinterest = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_whatsapp' ] ) ) {
    $whatsapp = $instance[ 'thd_whatsapp' ];
    }else{
    $whatsapp = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_whatsapp_text' ] ) ) {
    $whatsapp_text = $instance[ 'thd_whatsapp_text' ];
    }else{
    $whatsapp_text = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_instagram' ] ) ) {
    $instagram = $instance[ 'thd_instagram' ];
    }else{
    $instagram = __( '#', 'thd_widget_header_domain' );
    }

    if ( isset( $instance[ 'thd_twitter' ] ) ) {
    $twitter = $instance[ 'thd_twitter' ];
    }else{
    $twitter = __( '#', 'thd_widget_header_domain' );
    }
    // Widget admin form
    ?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<ul>
    <li>
        <label for="<?php echo $this->get_field_id('thd_facebook');?>"><strong><?php _e( 'Facebook:' ); ?></strong></label>
        </br>
        <input type="text" id="<?php echo $this->get_field_id('thd_facebook');?>" name="<?php echo $this->get_field_name('thd_facebook');?>" value="<?php echo esc_attr( $facebook ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_linkedin');?>"><strong><?php _e( 'LinkedIn:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_linkedin');?>" name="<?php echo $this->get_field_name('thd_linkedin');?>" value="<?php echo esc_attr( $linkedin ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_instagram');?>"><strong><?php _e( 'Instagram:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_instagram');?>" name="<?php echo $this->get_field_name('thd_instagram');?>" value="<?php echo esc_attr( $instagram ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_twitter');?>"><strong><?php _e( 'Twitter:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_twitter');?>" name="<?php echo $this->get_field_name('thd_twitter');?>" value="<?php echo esc_attr( $twitter ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_youtube');?>"><strong><?php _e( 'YouTube:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_youtube');?>" name="<?php echo $this->get_field_name('thd_youtube');?>" value="<?php echo esc_attr( $youtube ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_pinterest');?>"><strong><?php _e( 'Pinterest:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_pinterest');?>" name="<?php echo $this->get_field_name('thd_pinterest');?>" value="<?php echo esc_attr( $pinterest ); ?>">
        <hr>
    </li>
    <li>
        <label for="<?php echo $this->get_field_id('thd_whatsapp');?>"><strong><?php _e( 'Whatsapp:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_whatsapp');?>" name="<?php echo $this->get_field_name('thd_whatsapp');?>" value="<?php echo esc_attr( $whatsapp ); ?>">
        <br>
        <small>Agrega tu número de whatsapp incluyendo tu código de país al principio ( 52 1 para México). No agregues
            signos ( +, ()) ni
            espacios. <strong>Ejemplo:</strong>5210000000000.</small>
        <br><br>
        <label for="<?php echo $this->get_field_id('thd_whatsapp_text');?>"><strong><?php _e( 'Mensaje predeterminado:' ); ?></strong></label>
        </br>
        <input type="text" id="<?php echo $this->get_field_id('thd_whatsapp_text');?>" name="<?php echo $this->get_field_name('thd_whatsapp_text');?>" value="<?php echo esc_attr( $whatsapp_text ); ?>">
        <hr>

    </li>

</ul>
<?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['thd_facebook'] = ( ! empty( $new_instance['thd_facebook'] ) ) ? strip_tags( $new_instance['thd_facebook'] ) : '';
        $instance['thd_whatsapp'] = ( ! empty( $new_instance['thd_whatsapp'] ) ) ? strip_tags( $new_instance['thd_whatsapp'] ) : '';
        $instance['thd_whatsapp_text'] = ( ! empty( $new_instance['thd_whatsapp_text'] ) ) ? strip_tags( $new_instance['thd_whatsapp_text'] ) : '';
        $instance['thd_instagram'] = ( ! empty( $new_instance['thd_instagram'] ) ) ? strip_tags( $new_instance['thd_instagram'] ) : '';
        $instance['thd_twitter'] = ( ! empty( $new_instance['thd_twitter'] ) ) ? strip_tags( $new_instance['thd_twitter'] ) : '';
        $instance['thd_linkedin'] = ( ! empty( $new_instance['thd_linkedin'] ) ) ? strip_tags( $new_instance['thd_linkedin'] ) : '';
        $instance['thd_pinterest'] = ( ! empty( $new_instance['thd_pinterest'] ) ) ? strip_tags( $new_instance['thd_pinterest'] ) : '';
        $instance['thd_youtube'] = ( ! empty( $new_instance['thd_youtube'] ) ) ? strip_tags( $new_instance['thd_youtube'] ) : '';
        return $instance;
    }
}
