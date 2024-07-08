<?php 
/*
* Include all files in inc folder
*/
foreach ( glob( plugin_dir_path( __FILE__ ) . 'inc/*.php' ) as $filename ) {
	require_once $filename;
}



// make website exclusive to whitelisted IP addresses
add_action('init', 'restrict_access_by_ip');

function restrict_access_by_ip() {
    // 5.255.58.50, 85.199.247.218 - Pets Choice Server
    // 120.29.86.34, 120.29.86.216, 120.29.86.218, 120.29.69.77, 120.29.87.133, 192.168.100.44 - Owen
	// 120.29.76.215 - E
	// 82.28.151.140 - Sam
    $allowed_ips = array('5.255.58.50', '85.199.247.218', '120.29.69.77', '120.29.86.34', '120.29.86.216', '120.29.86.218', '120.29.87.133', '192.168.100.44', '120.29.76.215', '82.28.151.140');
    $user_ip = $_SERVER['REMOTE_ADDR'];
    
    if (!in_array($user_ip, $allowed_ips)) {
        wp_die('You are not authorized to access this website.');
    }
}