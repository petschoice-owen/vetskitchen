
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
                    <div class="col-md-6 col-lg-2 col-xl-3">

                    </div>
                    <div class="col-md-6 col-lg-2 col-xl-3">
                        
                    </div>
                    <div class="col-md-6 col-lg col-xl-3">
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
