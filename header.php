<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Signika:100,200,300,400,500,600,700,800,900" rel="stylesheet" defer>
    <link href="https://fonts.googleapis.com/css?family=Hind:100,200,300,400,500,600,700,800,900" rel="stylesheet" defer>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>
    
	<header class="header">
		<?php if( get_field( 'vk_topbanner_text', 'option' ) || get_field( 'vk_topbanner_phone', 'option' ) ) : ?>
			<div class="header__top">
				<?php if ( $topText = get_field( 'vk_topbanner_text', 'option' ) ) : ?>
					<div><?php echo $topText; ?></div>
				<?php endif; ?>
				<?php if ( $topPhone = get_field( 'vk_topbanner_phone', 'option' ) ) : ?>
					<a href="tel:<?php echo trim( $topPhone ); ?>" class="phone-no"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/call.png" alt="" class="img-fluid"> <?php echo $topPhone; ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="header__fixedscroll">
			<div class="header__middle">
				<div class="container">
					<div class="header__middle-wrap">
						<div class="header__logo"><?php echo get_custom_logo() ? get_custom_logo() : get_bloginfo(); ?></div>
						<?php if ( $tel = get_field( 'vk_topbanner_tel', 'option' ) ) : ?>
							<h6 class="header__tel"><?php echo $tel; ?></h6>
						<?php endif; ?>
						<div class="header__links">
							<div class="account-details">
							<a href="<?php echo home_url('/account/login'); ?>"><?php echo __( 'Sign In', 'vetskitchen' ); ?></a> or <a href="<?php echo home_url('/account/register'); ?>"><?php echo __( 'Register', 'vetskitchen' ); ?></a>
							</div>
							<div class="user"><a href="<?php echo home_url('/account'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/user.png" alt="" class="img-fluid" width="28px" /></a></div>
							<div class="header__cart">
							<a href="<?php echo home_url('/cart'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/cart.png" width="32px" alt="" class="img-fluid"></a>
							<div class="header__cart-count">0</div>
							</div>
							<form role="search" method="get" class="search-form header__search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<label>
									<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'vetskitchen' ); ?></span>
									<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'vetskitchen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
								</label>
								<input type="hidden" name="post_type" value="product" />
								<button type="submit" class="search-submit"><i class="icon-f-85"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="header__bottom">
				<div class="container">
					<div class="header__main-menu">
					<?php
						wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container'       => '',
							'menu_class'      => 'navbar-nav ms-auto header__nav',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'     => '__return_false',
							'walker'          => new WP_bootstrap_4_walker_nav_menu()
						)
						);
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="header__cta">
				<?php if ( $image = get_field( 'vk_header_banner_image', 'option' ) ) : ?>
					<div class="header__cta-thumb">
						<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( $text = get_field( 'vk_header_banner_text', 'option' ) ) : ?>
					<div class="header__cta-text">
						<?php echo $text; ?>
					</div>
				<?php endif; ?>
				<?php
					$link = get_field( 'vk_header_banner_button', 'option' );
					if( $link ) : 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<div class="header__cta-button">
						<a href="<?php echo esc_url( $link_url ); ?>" class="btn-white" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<main>