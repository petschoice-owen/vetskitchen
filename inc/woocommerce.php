<?php
function vk_add_custom_subscription_interval( $subscription_intervals ) {
    $subscription_intervals['7'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 7 )  );
	$subscription_intervals['8'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 8 )  );
    $subscription_intervals['9'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 9 )  );
    $subscription_intervals['10'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 10 )  );
    $subscription_intervals['11'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 11 )  );
    $subscription_intervals['12'] = sprintf( __( 'every %s', 'woocommerce-subscriptions' ), WC_Subscriptions::append_numeral_suffix( 12 )  );

	return $subscription_intervals;
}
add_filter( 'woocommerce_subscription_period_interval_strings', 'vk_add_custom_subscription_interval' );

//PRODUCT PAGE
function vk_nutritional_information_product_tab_content() {
    global $product;
    echo get_field( 'vk_product_nutritional_information', $product->get_ID() );
}

function vk_feeding_guidelines_product_tab_content() {
    global $product;
    echo get_field( 'vk_product_feeding_guidelines', $product->get_ID() );
}

function vk_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    unset( $tabs['reviews'] );
    $tabs['nutritional_information'] = array(
        'title' => __( 'Nutritional Information', 'woocommerce' ),
        'priority' => 20,
        'callback' => 'vk_nutritional_information_product_tab_content',
    );
    $tabs['feeding_guidelines'] = array(
        'title' => __( 'Feeding Guidelines', 'woocommerce' ),
        'priority' => 30,
        'callback' => 'vk_feeding_guidelines_product_tab_content',
    );
   return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'vk_product_tabs', 9999 );

function vk_remove_sidebar_product_pages() {
    if ( is_product() ) {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}
add_action( 'wp', 'vk_remove_sidebar_product_pages' );

function vk_single_product_title() {
    if( get_field( 'vk_product_heading' )['title'] ) {
        echo '<h1 itemprop="name" class="product_title entry-title"><span>'. get_field( 'vk_product_heading' )['title'] .'</span>';
            if( get_field( 'vk_product_heading' )['subtitle'] ) {
                echo '<span class="subtitle">'.get_field( 'vk_product_heading' )['subtitle'].'</span>';
            }
        echo '</h1>';
    } else {
        echo '<h1 itemprop="name" class="product_title entry-title"><span>'. get_the_title() .'</span></h1>';
    }
}
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_title',5 );
add_action( 'woocommerce_single_product_summary', 'vk_single_product_title',5 );

/**
 * Remove WooCommerce breadcrumbs 
 */
function vk_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'vk_remove_breadcrumbs' );