
            <?php echo is_woocommerce() ? '</div>' : ''; ?>
        </main>
        <?php if ( have_rows( 'vk_footer_icon_banner', 'option' ) ) : ?>
            <div class="vk-icon-banner">
                <div class="container-fluid">
                    <div class="vk-icon-banner__row">
                        <?php while ( have_rows( 'vk_footer_icon_banner', 'option' ) ) : the_row(); ?>
                        <div class="vk-icon-banner__col">
                            <?php if ( $icon = get_sub_field( 'icon' ) ) : ?>
                            <div class="icon">
                                <?php echo wp_get_attachment_image( $icon, 'medium' ); ?>
                            </div>
                            <?php endif; ?>
                            <?php if ( $desc = get_sub_field( 'desc' ) ) : ?>
                            <div class="desc">
                                <?php echo $desc; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <footer class="footer">
            <div class="footer__main">
                <div class="container">
                    <div class="row">
                        <?php if ( have_rows( 'vk_footer_firstcol', 'option' ) ) : ?>
                            <?php while ( have_rows( 'vk_footer_firstcol', 'option' ) ) : the_row(); ?>
                                <?php if ( get_sub_field( 'menu' ) ) : ?>
                                <div class="col-md-6 col-lg-2 col-xl-3">
                                    <div class="footer__mobile-collapse js-footer-mobile-collapse">
                                        <h4 class="footer__main-title"><?php echo get_sub_field( 'heading' );?></h4>
                                        <div class="footer__main-content">
                                            <ul>
                                            <?php while ( have_rows( 'menu' ) ) : the_row(); ?>
                                                <?php 
                                                $link = get_sub_field( 'menu_item' );
                                                if( $link ): 
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                                    ?>
                                                    <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'vk_footer_secondcol', 'option' ) ) : ?>
                            <?php while ( have_rows( 'vk_footer_secondcol', 'option' ) ) : the_row(); ?>
                                <?php if ( get_sub_field( 'menu' ) ) : ?>
                                <div class="col-md-6 col-lg-2 col-xl-3">
                                    <div class="footer__mobile-collapse js-footer-mobile-collapse">
                                        <h4 class="footer__main-title"><?php echo get_sub_field( 'heading' );?></h4>
                                        <div class="footer__main-content">
                                            <ul>
                                                <?php while ( have_rows( 'menu' ) ) : the_row(); ?>
                                                    <?php 
                                                    $link = get_sub_field( 'menu_item' );
                                                    if( $link ): 
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'vk_footer_thirdcol', 'option' ) ) : ?>
                            <?php while ( have_rows( 'vk_footer_thirdcol', 'option' ) ) : the_row(); ?>
                                <?php if ( get_sub_field( 'content' ) ) : ?>
                                <div class="col-md-6 col-lg col-xl-3">
                                    <div class="footer__mobile-collapse js-footer-mobile-collapse">
                                        <h4 class="footer__main-title"><?php echo get_sub_field( 'heading' ); ?></h4>
                                        <div class="footer__main-content">
                                            <?php echo get_sub_field( 'content' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'vk_footer_fourthcol', 'option' ) ) : ?>
                            <?php while ( have_rows( 'vk_footer_fourthcol', 'option' ) ) : the_row(); ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <?php if ( get_sub_field( 'content' ) ) : ?>
                                    <div class="footer__mobile-collapse js-footer-mobile-collapse">
                                        <h4 class="footer__main-title"><?php echo get_sub_field( 'heading' ); ?></h4>
                                        <div class="footer__main-content">
                                            <?php echo get_sub_field( 'content' ); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="footer__social">
                                        <?php if ( $fb = get_field( 'vk_facebook_url', 'option' ) ) : ?>
                                            <a href="<?php echo $fb; ?>" class="icon-g-64" target="_blank"></a>
                                        <?php endif; ?>
                                        <?php if ( $twitter = get_field( 'vk_twitter_url', 'option' ) ) : ?>
                                            <a href="<?php echo $twitter; ?>" class="icon-h-58" target="_blank"></a>
                                        <?php endif; ?>
                                        <?php if ( $ig = get_field( 'vk_instagram_url', 'option' ) ) : ?>
                                            <a href="<?php echo $ig; ?>" class="icon-g-67" target="_blank"></a>
                                        <?php endif; ?>
                                        <?php if ( $youtube = get_field( 'vk_youtube_url', 'option' ) ) : ?>
                                            <a href="<?php echo $youtube; ?>" class="icon-g-76" target="_blank"></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ( get_field( 'vk_footer_logo', 'option' ) || get_field( 'vk_footer_copyright', 'option' ) ) : ?>
                <div class="footer__bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if( $logo = get_field( 'vk_footer_logo', 'option' ) ) : ?>
                                    <div class="footer__logo">
                                        <a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( $logo, 'medium' ); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if( $copyright = get_field( 'vk_footer_copyright', 'option' ) ) : ?>
                                    <div class="footer__copyright">
                                        <?php echo $copyright; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
        <a href="#" class="vk-back-to-top js-back-to-top"><?php echo __( 'Back to top', 'vetskitchen' ); ?></a>
        <?php wp_footer(); ?>
    </body>
</html>
