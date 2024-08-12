<?php
function vetskitchen_enqueue_scripts() {
    $version = '1.022';
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), $version);

    // wp_enqueue_script( 'main-jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '', true );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '', true );
    if ( has_block( 'acf/vetskitchen-checklist-slider' ) ) {
        wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '', array( 'strategy' => 'async', 'in_footer' => true ) );
        wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), $version);
    }
    if ( is_post_type_archive( 'community' ) || in_array( 'tax-community-category', get_body_class() ) ) {
        wp_enqueue_script ( 'imagesloaded', 'https:////cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js', array(), '', array( 'strategy' => 'async', 'in_footer' => true ) );
        wp_enqueue_script ( 'masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', array(), '', array( 'strategy' => 'async', 'in_footer' => true ) );
    }
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array(), '', true, $version );
    wp_localize_script( 'main-script', 'wpAjax', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'vetskitchen_enqueue_scripts', 4 );


function vetskitchen_register_nav_menu() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'vetskitchen' ),
    ) );
}
add_action( 'after_setup_theme', 'vetskitchen_register_nav_menu', 0 );


/*
* Add ACF Options Page
*/
if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ) );
}

/**
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' );
add_theme_support( 'custom-logo' );

add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_editor_style( 'assets/css/custom-editor-style.css' );
add_filter( 'wpcf7_autop_or_not', '__return_false' );


/**
 * Allow SVG
 */
function vetskitchen_add_file_types_to_uploads( $file_types ) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge( $file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'vetskitchen_add_file_types_to_uploads');


//add inner container on wp-block-group
function vetskitchen_add_block_group_inner( $block_content, $block ) {
    $tag_name                         = isset( $block['attrs']['tagName'] ) ? $block['attrs']['tagName'] : 'div';
	$group_with_inner_container_regex = sprintf(
		'/(^\s*<%1$s\b[^>]*wp-block-group(\s|")[^>]*>)(\s*<div\b[^>]*wp-block-group__inner-container(\s|")[^>]*>)((.|\S|\s)*)/U',
		preg_quote( $tag_name, '/' )
	);

	$replace_regex   = sprintf(
		'/(^\s*<%1$s\b[^>]*wp-block-group[^>]*>)(.*)(<\/%1$s>\s*$)/ms',
		preg_quote( $tag_name, '/' )
	);
	$updated_content = preg_replace_callback(
		$replace_regex,
		static function( $matches ) {
			return $matches[1] . '<div class="wp-block-group__inner-container">' . $matches[2] . '</div>' . $matches[3];
		},
		$block_content
	);
	return $updated_content;
}
add_filter( 'render_block_core/group', 'vetskitchen_add_block_group_inner', 10, 2 );


function vk_widgets_init() {
    register_sidebar( array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop_sidebar',
        'description'   => 'Widgets in this area will be shown on the shop page.',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'vk_widgets_init' );