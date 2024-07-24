<?php
if ( is_active_sidebar( 'shop_sidebar' ) ) {
	echo '<div class="vk-shop-sidebar">';
		dynamic_sidebar('shop_sidebar');
	echo '</div>';
}