<?php 
/*
* Include all files in inc folder
*/
foreach ( glob( plugin_dir_path( __FILE__ ) . 'inc/*.php' ) as $filename ) {
	require_once $filename;
}


// change number of posts for CPT Community
// add_filter( 'pre_get_posts', 'custom_change_community_posts_per_page' );

function custom_change_community_posts_per_page( $query ) {
    if ( $query->is_post_type_archive( 'community' ) && ! is_admin() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '20' );
    }
    return $query;
}

// change number of posts for CPT News
add_filter( 'pre_get_posts', 'custom_change_news_posts_per_page' );

function custom_change_news_posts_per_page( $query ) {
    if ( $query->is_post_type_archive( 'news' ) && ! is_admin() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '-1' );
    }
    return $query;
}


// Redirect General Search to Custom Search
function redirect_custom_search() {
    if ( is_search() && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'community' ) {
        include( locate_template( 'search-community.php' ) );
        exit();
    }
}
add_action( 'template_redirect', 'redirect_custom_search' );




// make website exclusive to whitelisted IP addresses
add_action('init', 'restrict_access_by_ip');

function restrict_access_by_ip() {
    // 5.255.58.50, 85.199.247.218 - Pets Choice Server
    // 120.29.86.34, 120.29.86.216, 120.29.86.218, 120.29.69.77, 120.29.87.133, 192.168.100.44, 120.29.86.144 - Owen
	// 119.94.65.69, 120.29.76.215, 120.29.79.146 - E
	// 82.28.151.140 - Sam
    $allowed_ips = array('5.255.58.50', '85.199.247.218', '120.29.69.77', '120.29.86.34', '120.29.86.216', '120.29.86.218', '120.29.87.133', '192.168.100.44', '120.29.86.144', '119.94.65.69', '120.29.76.215', '120.29.79.146', '82.28.151.140');
    $user_ip = $_SERVER['REMOTE_ADDR'];
    
    if (!in_array($user_ip, $allowed_ips)) {
        wp_die('You are not authorized to access this website.');
    }
}