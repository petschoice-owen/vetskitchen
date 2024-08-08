<?php
if ( is_active_sidebar( 'shop_sidebar' ) ) {
	echo '<div class="vk-shop-sidebar js-mobile-nav-popup">';
		echo '<div class="heading-bar d-lg-none">
			<a href="#" class="js-shop-sidebar-close close">'. __( 'Close', 'vetskitchen' ) .'</a>
		</div>';
		dynamic_sidebar('shop_sidebar');
	echo '</div>';
}