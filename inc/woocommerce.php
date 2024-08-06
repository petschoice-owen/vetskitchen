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
    global $product;
    if(get_field( 'vk_product_nutritional_information', $product->get_ID() )) {
        $tabs['nutritional_information'] = array(
            'title' => __( 'Nutritional Information', 'woocommerce' ),
            'priority' => 20,
            'callback' => 'vk_nutritional_information_product_tab_content',
        );
    }
    if(get_field( 'vk_product_feeding_guidelines', $product->get_ID() )) {
        $tabs['feeding_guidelines'] = array(
            'title' => __( 'Feeding Guidelines', 'woocommerce' ),
            'priority' => 30,
            'callback' => 'vk_feeding_guidelines_product_tab_content',
        );
    }
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

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


function vk_add_trustbox_before_product_description() {
    global $product;
	$sku = $product->get_sku();
	if ($product->is_type('variable')) {
        $available_variations = $product->get_available_variations();
		$skuList = array();
        if (!empty($available_variations)) {
			foreach($available_variations as $variation) {
				$variation_id = $variation['variation_id'];
				$variation_sku = $variation['sku'];
				$skuList[] = 'TRUSTPILOT_SKU_VALUE_'.$variation_id;
				$skuList[] = $variation_sku;
			}
		}
		$sku = implode(',',$skuList);
	}
    ?>
    <!-- TrustBox widget - Product Mini -->
    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="54d39695764ea907c0f34825" data-businessunit-id="57444e1d0000ff00058d4d37" data-style-height="24px" data-style-width="100%" data-theme="light" data-sku="<?php echo $sku; ?>" data-no-reviews="hide" data-scroll-to-list="true" data-style-alignment="center">
    <a href="https://uk.trustpilot.com/review/vetskitchen.co.uk" target="_blank" rel="noopener">Trustpilot</a>
    </div>
    <!-- End TrustBox widget -->
<?php
}
add_action('woocommerce_single_product_summary', 'vk_add_trustbox_before_product_description', 15);

// Add modals before the WooCommerce product form
function product_modals() {
    $subscribe_content = get_field( 'vk_why_subscribe_modal', 'option' )['content'];
    $subscribe_title = get_field( 'vk_why_subscribe_modal', 'option' )['heading'];
    $subscribe_link = get_field( 'vk_why_subscribe_modal', 'option' )['link_text'];
    $subscribe_button = get_field( 'vk_why_subscribe_modal', 'option' )['button'];
    $shipping_content = get_field( 'vk_shipping_modal', 'option' )['content'];
    $shipping_title = get_field( 'vk_shipping_modal', 'option' )['heading'];
    $shipping_link = get_field( 'vk_shipping_modal', 'option' )['link_text'];
    $shipping_button = get_field( 'vk_shipping_modal', 'option' )['button'];
    if( $subscribe_content || $shipping_content ) {
        echo '<div class="product-info-buttons">';
        ?>
        <?php if ( $subscribe_content ) : ?>
            <a href="#" data-bs-toggle="modal" data-bs-target="#whySubscribe"><i class="icon-f-43"></i> <?php echo $subscribe_link ? $subscribe_link : __( 'Why Subscribe?', 'vetskitchen' ); ?></a>
            <div class="modal fade product-modal" id="whySubscribe" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <a href="#" type="button" class="product-modal__close icon-g-80" data-bs-dismiss="modal" aria-label="Close"></a>
                        <div class="modal-body">
                            <?php echo $subscribe_title ? '<h3 class="title">'.$subscribe_title.'</h3>' : ''; ?>
                            <?php echo $subscribe_content; ?>
                            <?php 
                            if( $subscribe_button ): 
                                $link_url = $subscribe_button['url'];
                                $link_title = $subscribe_button['title'];
                                $link_target = $subscribe_button['target'] ? $subscribe_button['target'] : '_self';
                                ?>
                                <a class="btn-orange" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( $shipping_content ) : ?>
            <a href="#" data-bs-toggle="modal" data-bs-target="#shippingInfo"><i class="icon-f-48"></i> <?php echo $shipping_link ? $shipping_link : __( 'Shipping', 'vetskitchen' ); ?></a>
            <div class="modal fade product-modal" id="shippingInfo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <a href="#" type="button" class="product-modal__close icon-g-80" data-bs-dismiss="modal" aria-label="Close"></a>
                        <div class="modal-body">
                            <?php echo $shipping_title ? '<h3 class="title">'.$shipping_title.'</h3>' : ''; ?>
                            <?php echo $shipping_content; ?>
                            <?php 
                            if( $shipping_button ): 
                                $link_url = $shipping_button['url'];
                                $link_title = $shipping_button['title'];
                                $link_target = $shipping_button['target'] ? $shipping_button['target'] : '_self';
                                ?>
                                <a class="btn-orange" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
        echo '</div>';
    }
}
function vk_add_modals_before_product_form() {
    if ( is_product() ) {
        global $product;
        if ( $product->is_type( 'simple' ) ) {
            product_modals();
        }
    }
}
add_action( 'woocommerce_before_add_to_cart_form', 'vk_add_modals_before_product_form' );

function vk_add_modals_after_variations() {
    if ( is_product() ) {
        global $product;
        if ( $product->is_type( 'variable' ) ) {
            product_modals();
        }
    }
}
add_action( 'woocommerce_after_variations_table', 'vk_add_modals_after_variations' );

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
    echo '<div class="vk-view-buttons">
        <a href="#" class="list-view"></a>
        <a href="#" class="two-col-view"></a>
        <a href="#" class="three-col-view active d-none d-lg-block"></a>
        <a href="#" class="four-col-view d-none d-lg-block"></a></div>';
}
add_action('woocommerce_before_shop_loop', 'vk_shop_view_buttons', 31);

function vk_shop_action_wrapper_close() {
    echo '</div>';
}
add_action('woocommerce_before_shop_loop', 'vk_shop_action_wrapper_close', 32);

/* Replace text of Sale! badge with percentage */
function vk_woocommerce_sale_flash_show_percentage($text) {
    global $product; 
    $stock = $product->get_stock_status();
    $product_type = $product->get_type();
    $sale_price  = 0;
    $regular_price = 0;
    if($product_type == 'variable'){
        $product_variations = $product->get_available_variations();
        foreach ($product_variations as $key => $value){
            if($value['display_price'] < $value['display_regular_price']){
                $sale_price = $value['display_price'];
                $regular_price = $value['display_regular_price'];
            }
        }
        if($regular_price > $sale_price && $stock != 'outofstock') {
            $product_sale = round(((intval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
            return '<span class="onsale">Sale ' . esc_html($product_sale) . '%</span>';
        }
    }else {
        $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
        $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
        $product_sale = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
        return '<span class="onsale">Sale ' . esc_html($product_sale) . '%</span>';
    }
}
add_filter( 'woocommerce_sale_flash', 'vk_woocommerce_sale_flash_show_percentage' );

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
    if( function_exists('yoast_get_primary_term_id') ) {
        $primary_cat_id = yoast_get_primary_term_id( 'product_cat', $product->get_id() );
        if($primary_cat_id) {
            $primary_cat = get_term($primary_cat_id, 'product_cat');
            echo '<a href="'. esc_url( get_term_link( $primary_cat->slug, 'product_cat' ) ) .'" class="product-category">' . $primary_cat->name . '</a>';
        }
    } else {
		$categories = get_the_terms( $product->get_id(), 'product_cat' );
		if ( $categories && ! is_wp_error( $categories ) ) {
			echo '<a href="'. esc_url( get_term_link( $categories[0]->slug, 'product_cat' ) ) .'" class="product-category">' . $categories[0]->name . '</a>';
		}
	}
}
function display_variation_on_product_listing() {
    global $product;

    if ( $product->is_type( 'variable' ) ) {
        $variations = $product->get_available_variations();
        if($variations) {
            $firstVar = new WC_Product_Variation( $variations[0]['variation_id'] );
            $firstVarPrice = $firstVar->get_price();
            $firstVarPriceHtml = get_woocommerce_currency_symbol() . number_format((float)$firstVarPrice, 2, '.', '');
            if ($firstVar->is_on_sale()) {
                $firstVarPriceHtml = '<ins>'.$firstVarPriceHtml.'</ins>'.'<del>'.get_woocommerce_currency_symbol() . number_format((float)$firstVar->get_regular_price(), 2, '.', '').'</del>';
            }
            echo '<div class="product-price">'.$firstVarPriceHtml.'</div>';
            echo '<div class="variation-swatches">';
            foreach ( $variations as $key => $variation ) {
                $variation_id = $variation['variation_id'];
                $variation_obj = new WC_Product_Variation( $variation_id );
                $attributes = $variation_obj->get_variation_attributes();
                $variation_price = $variation_obj->get_price();
                $variation_price_html = get_woocommerce_currency_symbol() . number_format((float)$variation_price, 2, '.', '');
                if ($variation_obj->is_on_sale()) {
                    $variation_price_html = '<ins>'.$variation_price_html.'</ins>'.'<del>'.get_woocommerce_currency_symbol() . number_format((float)$variation_obj->get_regular_price(), 2, '.', '').'</del>';
                }

                $attribute_names = array();
				foreach ( $attributes as $attribute_name => $attribute_value ) {
					$taxonomy = str_replace('attribute_', '', $attribute_name);
					$term = get_term_by( 'slug', $attribute_value, $taxonomy );
					if ( $term ) {
						$attribute_names[] = $term->name;
					} else {
						$attribute_names[] = $attribute_value;
					}
				}
				$variation_name = implode( ' / ', $attribute_names );
    
                echo '<div class="swatch'. (($key === 0) ? ' active' : '') . ( !$variation_obj->is_in_stock() ? ' out-of-stock' : '' ) .'" data-price="'. $variation_price_html .'">' . esc_html( $variation_name ) . '</div>';
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
            $firstVarPriceHtml = get_woocommerce_currency_symbol() . number_format((float)$firstVarPrice, 2, '.', '');
            if ($firstVar->is_on_sale()) {
                $firstVarPriceHtml = '<ins>'.$firstVarPriceHtml.'</ins>'.'<del>'.get_woocommerce_currency_symbol() . number_format((float)$firstVar->get_regular_price(), 2, '.', '').'</del>';
            }
            echo '<div class="product-price">'.$firstVarPriceHtml.'</div>';
        }
    }
}, 11 );
add_action( 'woocommerce_after_shop_loop_item', function(){
    echo '</div>';
}, 30 );


//CART
add_action( 'woocommerce_before_cart', function(){
    echo '<h1 class="cart-title">Shopping Cart</h1>';
    if( $notice = get_field( 'vk_cart_notice', 'option' ) ) {
        echo '<div class="cart-notice">'. $notice .'</div>';
    }
}, 15 );

function vk_conditionally_hide_checkout_button_cart_page() {
    if(is_cart()) {
        // Check if "Restricted Zone" is in the available shipping methods
        $is_restricted_zone = false;
        $shipping_methods = WC()->shipping()->get_packages();

        foreach ($shipping_methods as $package) {
            foreach ($package['rates'] as $rate) {
                if ($rate->label === 'Restricted Zone') {
                    $is_restricted_zone = true;
                    break 2;
                }
            }
        }

        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var isRestrictedZone = <?php echo json_encode($is_restricted_zone); ?>;
                var isShippingInfoEmpty = $('#calc_shipping_postcode').val() === '';
                if (isRestrictedZone || isShippingInfoEmpty) {
                    $('.wc-proceed-to-checkout').hide();
                } else {
                    $('.wc-proceed-to-checkout').show();
                    
                }
                if (isRestrictedZone) {
                    $('.restricted-zone-message').show();
                }else {
                    $('.restricted-zone-message').hide();
                }

                $(document).on('updated_cart_totals', function() {
                    var shippingMethod = $('#shipping_method').text().trim();
                    if ( !shippingMethod || shippingMethod.includes("Restricted Zone") ) {
                        $('.wc-proceed-to-checkout').hide();
                    }else {
                        if(!$('#cart-checkout-notice').length > 0) {
                            $('.wc-proceed-to-checkout').show();
                        }
                    }

                    if ( shippingMethod.includes("Restricted Zone") ) {
                        $('.restricted-zone-message').show();
                    }else {
                        $('.restricted-zone-message').hide();
                    }
                });
            });
        </script>
    <?php
    }
}
add_action('woocommerce_cart_calculate_fees', 'vk_conditionally_hide_checkout_button_cart_page');

// CHECKOUT
function vk_conditionally_hide_checkout_button_checkout_page() {
    if ( is_checkout() ) {
        $is_restricted_zone = false;
        $shipping_methods = WC()->shipping()->get_packages();
        if (!empty($package['rates'])) {
            $is_restricted_zone = true;
        }
        foreach ($shipping_methods as $package) {
            foreach ($package['rates'] as $rate) {
                if ($rate->label === 'Restricted Zone') {
                    $is_restricted_zone = true;
                    break 2;
                }
            }
        }
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var isRestrictedZone = <?php echo json_encode($is_restricted_zone); ?>;
                if (isRestrictedZone) {
                    $('#payment').hide();
                    $('.restricted-zone-message').show();
                } else {
                    $('#payment').show();
                    $('.restricted-zone-message').hide();
                }

                $('body').on('focusout, blur', '#billing_postcode, #shipping_postcode', function() {
                    $(document.body).trigger('update_checkout');
                });

                $('body').on('updated_checkout', function() {
                    var shippingMethod = $('#shipping_method').text().trim();
                    if ( !shippingMethod || shippingMethod.includes("Restricted Zone") ) {
                        $('#payment').hide();
                        if(shippingMethod.includes("Restricted Zone")) {
                            $('.restricted-zone-message').show();
                        }
                    }else {
                        $('#payment').show();
                        $('.restricted-zone-message').hide();
                    }
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'vk_conditionally_hide_checkout_button_checkout_page');

//  CART | CHECKOUT
function vk_check_cart_total() {
    $min_price = get_field( 'vk_minimum_order_price', 'option' );
    $max_price = get_field( 'vk_maximum_order_price', 'option' );
    if($min_price || $max_price) {
        $cart_total = WC()->cart->get_cart_total();

        $cart_total_value = floatval(preg_replace('/[^\d.]/', '', $cart_total));
        $total =  get_woocommerce_currency_symbol() . number_format($cart_total_value, 2);
        $notice = '';
        if ($min_price && $cart_total_value < $min_price) {
            $price = get_woocommerce_currency_symbol() . number_format($min_price, 2);
            $notice .= sprintf(__('Your current order total is %1s — you must have an order with a minimum of %2s to place your order.', 'woocommerce'), $total, $price);
        }
        
        if ($max_price && $cart_total_value > $max_price) {
            $price = get_woocommerce_currency_symbol() . number_format($max_price, 2);
            $notice .= sprintf(__('Your order value is %1s. We do not currently accept online order values of over %2s.', 'woocommerce'), $total, $price);
        }

        wp_send_json_success(array('notice' => $notice));
    }
}
add_action('wp_ajax_vk_check_cart_total', 'vk_check_cart_total');
add_action('wp_ajax_nopriv_vk_check_cart_total', 'vk_check_cart_total');

// ACCOUNTS 
function vk_separate_reg_form() {
    if(is_admin()) return;
    do_action( 'woocommerce_before_customer_login_form' );        
    ?>
    <div class="vk-registration">
        <h1><?php echo __( 'Create an Account', 'vetskitchen' ); ?></h1>
        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </p>

            <?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                </p>

            <?php else : ?>

                <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>
        </form>
    </div>
    <?php
}
add_shortcode( 'vk_registration_form', 'vk_separate_reg_form' );
  
function vk_separate_login_form() {
    if(is_admin()) return;
    if ( is_user_logged_in() ) return '<p>You are already logged in</p>'; 
    ob_start();
        do_action( 'woocommerce_before_customer_login_form' );
        echo '<div class="vk-login">';
            echo '<h1>'. __( 'Already Registered?', 'vetskitchen' ) .'</h1>';
            echo '<div class="row"><div class="col-md-6 d-flex"><div class="vk-login__block">';
                echo '<h2>'. __( 'New Customer', 'vetskitchen' ) .'</h2>';
                echo '<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>';
                echo '<a href="'.home_url('register').'" class="btn-orange">CREATE AN ACCOUNT</a>';
            echo '</div></div><div class="col-md-6 d-flex"><div class="vk-login__block">';
                echo '<h2>'. __( 'Login', 'vetskitchen' ) .'</h2>';
                woocommerce_login_form( array( 'redirect' => wc_get_page_permalink( 'myaccount' ) ) );
            echo '</div></div></div>';
        echo '</div>';
    return ob_get_clean();
}
add_shortcode( 'vk_login_form', 'vk_separate_login_form' );

//redirect to myaccount if logged in
function vk_redirect_login_registration_if_logged_in() {
    $current_url = home_url( add_query_arg( null, null ) );
    $lost_password_url = wp_lostpassword_url();
    if ( is_page() && is_user_logged_in() && ( has_shortcode( get_the_content(), 'vk_login_form' ) || has_shortcode( get_the_content(), 'vk_registration_form' ) ) ) {
        wp_redirect( wc_get_page_permalink( 'myaccount' ) );
        exit;
    }elseif ( is_account_page() && !is_user_logged_in() ) {
        if ( strpos( $current_url, $lost_password_url ) === false ) {
            wp_redirect( wc_get_page_permalink( 'myaccount' ) . '/login' );
            exit;
        }
    }
}
add_action( 'template_redirect', 'vk_redirect_login_registration_if_logged_in' );