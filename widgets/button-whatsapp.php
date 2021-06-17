<?php
function thd_load_widget_button_whatsapp() {
    register_widget( 'thd_widget_button_whatsapp' );
}
add_action( 'widgets_init', 'thd_load_widget_button_whatsapp' );

// Creating the widget
class thd_widget_button_whatsapp extends WP_Widget {
    function __construct() {
        parent::__construct('thd_widget_button_whatsapp',__('The Home Depot Botón Whastapp', 'thd_widget_button_whatsapp_domain'),array( 'description' => __( 'The Home Depot Botón Whastapp.', 'thd_widget_button_whatsapp_domain' ), ));
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        $whatsapp = $instance['thd_whatsapp'];

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


        if( ! empty($whatsapp)){
        echo "<a href='".$whatsapp__url."' target='_blank'>
           <img src='".get_template_directory_uri().'/img/whatsapp-button.png'."' alt=''>
        </a>";
        }



        echo $args['after_widget'];
    }


    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }else {
    $title = __( 'New title', 'thd_widget_button_whatsapp_domain' );
    }



    if ( isset( $instance[ 'thd_whatsapp' ] ) ) {
    $whatsapp = $instance[ 'thd_whatsapp' ];
    }else{
    $whatsapp = __( '#', 'thd_widget_button_whatsapp_domain' );
    }

    if ( isset( $instance[ 'thd_whatsapp_text' ] ) ) {
    $whatsapp_text = $instance[ 'thd_whatsapp_text' ];
    }else{
    $whatsapp_text = __( '#', 'thd_widget_button_whatsapp_domain' );
    }
    // Widget admin form
    ?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<ul>
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
        $instance['thd_whatsapp'] = ( ! empty( $new_instance['thd_whatsapp'] ) ) ? strip_tags( $new_instance['thd_whatsapp'] ) : '';
        $instance['thd_whatsapp_text'] = ( ! empty( $new_instance['thd_whatsapp_text'] ) ) ? strip_tags( $new_instance['thd_whatsapp_text'] ) : '';
        return $instance;
    }
}
