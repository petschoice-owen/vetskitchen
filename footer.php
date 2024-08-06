
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
                                            <div id="mc_embed_shell">
                                                <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
                                                <div id="mc_embed_signup" class="footer-newsletter">
                                                    <form action="https://vetskitchen.us14.list-manage.com/subscribe/post?u=b00c25371121b02e1a36cd6d0&amp;id=b7c5db2836&amp;f_id=006abbe5f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                                        <div id="mc_embed_signup_scroll">
                                                            <div class="d-flex">
                                                                <div class="mc-field-group">
                                                                    <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="" placeholder="Enter your email">
                                                                </div>
                                                                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Sign Up">
                                                            </div>
                                                            <div id="mce-responses" class="clear">
                                                                <div class="response" id="mce-error-response" style="display: none;"></div>
                                                                <div class="response" id="mce-success-response" style="display: none;"></div>
                                                            </div>
                                                            <div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_b00c25371121b02e1a36cd6d0_b7c5db2836" tabindex="-1" value=""></div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[21]='MMERGE21';ftypes[21]='text';fnames[27]='MMERGE27';ftypes[27]='dropdown';fnames[26]='MMERGE26';ftypes[26]='date';fnames[25]='MMERGE25';ftypes[25]='text';fnames[24]='MMERGE24';ftypes[24]='text';fnames[23]='MMERGE23';ftypes[23]='text';fnames[20]='MMERGE20';ftypes[20]='text';fnames[16]='MMERGE16';ftypes[16]='dropdown';fnames[2]='LNAME';ftypes[2]='text';fnames[1]='FNAME';ftypes[1]='text';fnames[22]='MMERGE22';ftypes[22]='text';fnames[19]='MMERGE19';ftypes[19]='text';fnames[17]='MMERGE17';ftypes[17]='text';fnames[18]='MMERGE18';ftypes[18]='text';fnames[15]='MMERGE15';ftypes[15]='text';fnames[14]='MMERGE14';ftypes[14]='text';fnames[13]='MMERGE13';ftypes[13]='text';fnames[12]='MMERGE12';ftypes[12]='text';fnames[11]='MMERGE11';ftypes[11]='text';fnames[10]='MMERGE10';ftypes[10]='text';fnames[9]='MMERGE9';ftypes[9]='text';fnames[8]='MMERGE8';ftypes[8]='text';fnames[7]='MMERGE7';ftypes[7]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[4]='PHONE';ftypes[4]='phone';fnames[28]='MMERGE28';ftypes[28]='date';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                                            </div>
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
        <div class="mobile-overlay"></div>
        <?php wp_footer(); ?>
    </body>
</html>
