<?php 
function vetskitchen_create_post_type(
string $post_type_name,
string $singular = 'Custom Post',
string $plural = 'Custom Posts',
string $menu_icon = 'dashicons-admin-post',
bool $hierarchical = true,
bool $has_archive = false,
string $description = '' ) {
    register_post_type( $post_type_name, array(
        'label'             => __( $singular, 'ocf' ),
        'description'       => $description,
        'menu_icon'         => $menu_icon,
        'hierarchical'      => $hierarchical,
        'has_archive'       => $has_archive,
        'supports'          => array('title', 'editor', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'comments'),
        'labels'            => array(
            'name'                => _x( $plural, 'Post Type General Name', 'vetskitchen' ),
            'singular_name'       => _x( $singular, 'Post Type Singular Name', 'vetskitchen' ),
            'menu_name'           => __( $plural, 'vetskitchen' ),
            'parent_item_colon'   => __( 'Parent '.$singular, 'vetskitchen' ),
            'all_items'           => __( 'All '.$plural, 'vetskitchen' ),
            'view_item'           => __( 'View '.$singular, 'vetskitchen' ),
            'add_new_item'        => __( 'Add New '.$singular, 'vetskitchen' ),
            'add_new'             => __( 'Add New', 'vetskitchen' ),
            'edit_item'           => __( 'Edit '.$singular, 'vetskitchen' ),
            'update_item'         => __( 'Update '.$singular, 'vetskitchen' ),
            'search_items'        => __( 'Search '.$singular, 'vetskitchen' ),
            'not_found'           => __( 'Not Found', 'vetskitchen' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'vetskitchen' ),
        ),
        'capability_type'   => 'post',
        'public'            => true,
        'show_in_rest'      => true,
        'can_export'        => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
    ));
}
 
add_action( 'init', 'vetskitchen_custom_cpts' );

function vetskitchen_custom_cpts() {
    vetskitchen_create_post_type( 'community', 'Community', 'Community', 'dashicons-groups' );
    // vetskitchen_create_post_type( 'reports', 'Reports', 'Reports', 'dashicons-media-spreadsheet' );
}


// Register Taxonomy Category
function create_category_tax() {
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category Name', 'textdomain' ),
		'menu_name'         => __( 'Category', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'textdomain' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'community-category', array('community'), $args );
}
add_action( 'init', 'create_category_tax' );


// rewrite community category "/community/%category%"
add_filter( 'rewrite_rules_array', function( $rules ) {
	$new_rules = array(
        'community/([^/]+)/page/([0-9]{1,})/?$' => 'index.php?community-category=$matches[1]&paged=$matches[2]',
        'community/([^/]+)/?$' => 'index.php?community-category=$matches[1]',
    );
    return $new_rules + $rules;
});