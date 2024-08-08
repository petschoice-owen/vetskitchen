<?php
function vk_add_fields_account_registration_start() {
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
  
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
    <?php
}
add_action( 'woocommerce_register_form_start', 'vk_add_fields_account_registration_start' );
  
function vk_add_fields_account_registration() {
    ?>
    <p class="form-row">
        <label for="reg_pass_confirmation"><?php _e( 'Password Confirmation', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="password" class="input-text" name="password_confirmation" id="reg_pass_confirmation" value="" />
    </p>
    <p class="form-row">
        <label for="reg_phone_number"><?php _e( 'Phone Number', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="tel" class="input-text" name="billing_phone" id="reg_phone_number" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
    <?php
    acf_form(array(
        'post_id'       => 'new_user',
        'field_groups'  => array('group_66b09d3607029'),
        'return'        => '',
        'submit_value'  => '',
        'form'          => false,
    ));
}
add_action( 'woocommerce_register_form', 'vk_add_fields_account_registration' );

function vk_add_acf_form_head_register(){   
    global $post;
    if ( !empty($post) && has_shortcode( $post->post_content, 'vk_registration_form' ) ) {
        acf_form_head();
    }
}
add_action( 'wp_head', 'vk_add_acf_form_head_register', 7 );

// VALIDATE FIELDS  
function vk_validate_new_reg_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( 'First name is required.', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( 'Last name is required.', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( 'Phone number is required.', 'woocommerce' ) );
    }
    if ( isset( $_POST['password_confirmation'] ) && empty( $_POST['password_confirmation'] ) ) {
        $errors->add( 'password_confirmation_error', __( 'Password confirmation is required.', 'woocommerce' ) );
    }
    if ( isset( $_POST['password_confirmation'] ) && ($_POST['password_confirmation'] !== $_POST['password'] ) ) {
        $errors->add( 'password_confirmation_error', __( 'Passwords do not match.', 'woocommerce' ) );
    }
    if ( isset( $_POST['acf']['user_number_of_pets'] ) && empty( $_POST['acf']['user_number_of_pets'] ) ) {
        $errors->add( 'user_number_of_pets_error', __( 'Please select how many pets you have.', 'woocommerce' ) );
    }
    if ( isset( $_POST['acf']['user_pet_type'] ) && empty( $_POST['acf']['user_pet_type'] ) ) {
        $errors->add( 'user_pet_type_error', __( 'Please select what kind of pet you have.', 'woocommerce' ) );
    }
    if ( isset( $_POST['acf']['user_pet_name'] ) && empty( $_POST['acf']['user_pet_name'] ) ) {
        $errors->add( 'user_pet_name_error', __( 'Please enter your pet\'s name.', 'woocommerce' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'vk_validate_new_reg_fields', 10, 3 );
  

// SAVE FIELDS
function vk_save_new_reg_fields( $customer_id ) {
    if (isset($_POST['acf'])) {
        foreach ($_POST['acf'] as $key => $value) {
            $field_key = str_replace('acf[', '', str_replace(']', '', $key));
            $field = get_field_object($field_key);
            if ($field) {
                $field_name = $field['name'];
                if ($field['type'] == 'checkbox') {
                    $sanitized_value = array_map('sanitize_text_field', $value);
                    update_user_meta($customer_id, $field_name, $sanitized_value);
                } else {
                    $sanitized_value = sanitize_text_field($value);
                    update_user_meta($customer_id, $field_name, $sanitized_value);
                }
            } else {
                error_log("Unknown field key: $field_key");
            }
        }
    }
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'vk_save_new_reg_fields' );
