<?php
function vk_add_personal_info_endpoint() {
    add_rewrite_endpoint( 'personal-information', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'vk_add_personal_info_endpoint' );
  
function vk_personal_info_query_vars( $vars ) {
    $vars[] = 'personal-information';
    return $vars;
}
add_filter( 'query_vars', 'vk_personal_info_query_vars' );
  
function vk_add_personal_info_link_my_account( $items ) {
    $items = array_slice($items, 0, -1, true) +
            array('personal-information' => __('Personal Information', 'woocommerce')) +
            array_slice($items, -1, 1, true);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'vk_add_personal_info_link_my_account' );

  
function vk_personal_info_content() {
   echo '<h3>Personal Information</h3>';
   echo do_shortcode('[vk_user_personal_info_form field_group="group_66b09d3607029"]');
}
add_action( 'woocommerce_account_personal-information_endpoint', 'vk_personal_info_content' );

function vk_user_personal_info_form_func( $atts ) {
    global $wp;
	$a = shortcode_atts( array(
		'field_group' => ''
	), $atts );
	$uid = get_current_user_id();
	if ( ! empty ( $a['field_group'] ) && ! empty ( $uid ) ) {
		$options = array(
			'post_id' => 'user_'.$uid,
			'field_groups' => array( $a['field_group'] ),
			'return' => add_query_arg( 'updated', 'true', get_permalink('/personal-information') ),
            'updated_message' => __("Your personal information has been successfully updated.", 'vetskitchen'),
            'html_submit_button'  => '<input type="submit" class="acf-button btn-orange" value="%s" />',
		);
		
		ob_start();
		acf_form( $options );
		$form = ob_get_contents();
		ob_end_clean();
	}
	
    return $form;
}

add_shortcode( 'vk_user_personal_info_form', 'vk_user_personal_info_form_func' );

function add_acf_form_head(){   
    global $wp; 
	if ( is_account_page() && isset( $wp->query_vars['personal-information'] ) ) {
        acf_form_head();
    }
}
add_action( 'wp_head', 'add_acf_form_head', 7 );