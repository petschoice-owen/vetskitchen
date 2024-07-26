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
    if ( is_product() || is_shop() ) {
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

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Remove WooCommerce breadcrumbs 
 */
function vk_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'vk_remove_breadcrumbs' );

//QUANTITY PLUS MINUS
function vk_display_quantity_minus() {
   if ( ! is_product() ) return;
   echo '<span class="minus-btn">-</span>';
}
add_action( 'woocommerce_before_quantity_input_field', 'vk_display_quantity_minus' );

function vk_display_quantity_plus() {
   if ( ! is_product() ) return;
   echo '<span class="plus-btn">+</span>';
}
add_action( 'woocommerce_after_quantity_input_field', 'vk_display_quantity_plus' );

// PRODUCT LISTING
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function vk_output_content_wrapper() {
	echo '<div class="vk-shop-wrapper">';
}
add_action( 'woocommerce_before_main_content', 'vk_output_content_wrapper',10 );

function vk_output_content_wrapper_end() {
    echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'vk_output_content_wrapper_end', 10 );

function vk_shop_action_wrapper_open() {
    echo '<div class="vk-shop-nav-actions">';
}
add_action('woocommerce_before_shop_loop', 'vk_shop_action_wrapper_open', 19);

function vk_shop_view_buttons() {
    if(!is_shop()) {
        echo '<div class="vk-view-buttons">
            <a href="#" class="list-view"></a>
            <a href="#" class="two-col-view"></a>
            <a href="#" class="three-col-view active d-none d-lg-block"></a>
            <a href="#" class="four-col-view d-none d-lg-block"></a></div>';
    }
}
add_action('woocommerce_before_shop_loop', 'vk_shop_view_buttons', 31);

function vk_shop_action_wrapper_close() {
    echo '</div>';
}
add_action('woocommerce_before_shop_loop', 'vk_shop_action_wrapper_close', 32);

// PRODUCT LOOP
add_action( 'woocommerce_shop_loop_item_title', 'vk_display_product_category_before_title', 5 );
add_action( 'woocommerce_shop_loop_item_title', function(){
    echo '<div class="product-info">';
}, 1 );
add_action( 'woocommerce_shop_loop_item_title', function(){
    echo '</div>';
}, 25 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_shop_loop_item_title', function(){
    global $product;
    $excerpt = wp_trim_words($product->post->post_excerpt, 35);
    echo '<div class="product-short-desc">'.$excerpt.'</div>';
}, 16 );
function vk_display_product_category_before_title() {
    global $product;
    $categories = get_the_terms( $product->get_id(), 'product_cat' );

    if ( $categories && ! is_wp_error( $categories ) ) {
        echo '<a href="'. esc_url( get_term_link( $categories[0]->slug, 'product_cat' ) ) .'" class="product-category">' . $categories[0]->name . '</a>';
    }
}
function display_variation_on_product_listing() {
    global $product;

    if ( $product->is_type( 'variable' ) ) {
        $variations = $product->get_available_variations();
        if($variations) {
            $firstVar = new WC_Product_Variation( $variations[0]['variation_id'] );
            $firstVarPrice = $firstVar->get_price();
            echo '<div class="product-price">'.get_woocommerce_currency_symbol() . $firstVarPrice.'</div>';
            echo '<div class="variation-swatches">';
            foreach ( $variations as $key => $variation ) {
                $variation_id = $variation['variation_id'];
                $variation_obj = new WC_Product_Variation( $variation_id );
                $attributes = $variation_obj->get_variation_attributes();
                $variation_price = $variation_obj->get_price();
                $variation_name = implode( ' / ', array_map( function($value, $key) {
                    return $value;
                }, $attributes, array_keys( $attributes ) ) );
    
                echo '<div class="swatch'. (($key === 0) ? ' active' : '') .'" data-price="'. get_woocommerce_currency_symbol() . $variation_price .'">' . esc_html( $variation_name ) . '</div>';
            }
            echo '</div>';
        }
    }
}
add_action( 'woocommerce_shop_loop_item_title', 'display_variation_on_product_listing', 20 );
add_action( 'woocommerce_after_shop_loop_item_title', function(){
    echo '<div class="product-actions">';
}, 1 );
add_action( 'woocommerce_after_shop_loop_item_title', function(){
    global $product;
    if ( $product->is_type( 'variable' ) ) {
        $variations = $product->get_available_variations();
        if($variations) {
            $firstVar = new WC_Product_Variation( $variations[0]['variation_id'] );
            $firstVarPrice = $firstVar->get_price();
            echo '<div class="product-price">'.get_woocommerce_currency_symbol() . $firstVarPrice.'</div>';
        }
    }
}, 11 );
add_action( 'woocommerce_after_shop_loop_item', function(){
    echo '</div>';
}, 30 );