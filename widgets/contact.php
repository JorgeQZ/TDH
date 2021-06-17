<?php
function thd_contact_widget() {
    register_widget( 'thd_widget_contact' );
}
add_action( 'widgets_init', 'thd_contact_widget' );

// Creating the widget
class thd_widget_contact extends WP_Widget {
    function __construct() {
        parent::__construct('thd_widget_contact',__('The Home Depot Contacto', 'thd_widget_contact_domain'),array( 'description' => __( 'Correo, dirección y teléfono.', 'thd_widget_contact_domain' ), ));
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $email = $instance['thd_email'];
        $phone = $instance['thd_phone'];
        $address = $instance['thd_address'];

        echo $args['before_widget'];
        if ( ! empty( $title ) ){
        echo $args['before_title'] . $title . $args['after_title'];
        }

        echo "<div class='wg-contact-container'>";
        if( ! empty($email)){
          echo "
          <div class='item'>
            <div class='col'>
                <img src='".get_template_directory_uri().'/img/icons/email.png'."' alt=''>
            </div>
            <div class='col'>
                <div class='content'>
                    <span>Email</span>
                    <a href='mailto:".$email."'>".$email."</a>
                </div>
            </div>
        </div>";
        }

        if( ! empty($phone)){
            echo "
            <div class='item'>
              <div class='col'>
                  <img src='".get_template_directory_uri().'/img/icons/phone.png'."' alt=''>
              </div>
              <div class='col'>
                  <div class='content'>
                      <span>Teléfono</span>
                      <a href='tel:".$phone."'>".$phone."</a>
                  </div>
              </div>
          </div>";
        }


        if( ! empty($address)){
            echo "
            <div class='item'>
              <div class='col'>
                  <img src='".get_template_directory_uri().'/img/icons/address.png'."' alt=''>
              </div>
              <div class='col'>
                  <div class='content'>
                      <span>Dirección</span>
                      <p>".$address."<p>
                  </div>
              </div>
          </div>";
        }

        echo "</div>";

        echo $args['after_widget'];
    }


public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }else {
        $title = __( 'Conacto', 'thd_widget_contact_domain' );
    }

    if ( isset( $instance[ 'thd_email' ] ) ) {
        $email = $instance[ 'thd_email' ];
    }else{
        $email = __( '#', 'thd_widget_contact_domain' );
    }

    if ( isset( $instance[ 'thd_phone' ] ) ) {
        $phone = $instance[ 'thd_phone' ];
    }else{
        $phone = __( '#', 'thd_widget_contact_domain' );
    }

    if ( isset( $instance[ 'thd_address' ] ) ) {
        $address = $instance[ 'thd_address' ];
    }else{
        $address = __( '#', 'thd_widget_contact_domain' );
    }


// Widget admin form
?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<ul>
    <li>
        <label
            for="<?php echo $this->get_field_id('thd_email');?>"><strong><?php _e( 'Correo:' ); ?></strong></label>
        </br>
        <input type="text" id="<?php echo $this->get_field_id('thd_email');?>"
            name="<?php echo $this->get_field_name('thd_email');?>" value="<?php echo esc_attr( $email ); ?>">
        <hr>
    </li>
    <li>
        <label
            for="<?php echo $this->get_field_id('thd_phone');?>"><strong><?php _e( 'Teléfono:' ); ?></strong></label></br>
        <input type="text" id="<?php echo $this->get_field_id('thd_phone');?>"
            name="<?php echo $this->get_field_name('thd_phone');?>" value="<?php echo esc_attr( $phone ); ?>">
        <hr>
    </li>
    <li>
        <label
            for="<?php echo $this->get_field_id('thd_address');?>"><strong><?php _e( 'Dirección:' ); ?></strong></label></br>
        <textarea name="<?php echo $this->get_field_name('thd_address');?>"
            id="<?php echo $this->get_field_id('thd_address');?>"><?php echo esc_attr( $address ); ?></textarea>
        <hr>
    </li>
</ul>
<?php
}
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['thd_email'] = ( ! empty( $new_instance['thd_email'] ) ) ? strip_tags( $new_instance['thd_email'] ) : '';
    $instance['thd_phone'] = ( ! empty( $new_instance['thd_phone'] ) ) ? strip_tags( $new_instance['thd_phone'] ) : '';
    $instance['thd_address'] = ( ! empty( $new_instance['thd_address'] ) ) ? strip_tags( $new_instance['thd_address'] ) : '';
    return $instance;
}
}