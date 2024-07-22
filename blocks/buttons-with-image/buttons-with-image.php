<?php
/**
 * Buttons with Image Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-buttons-with-image',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_wrapper']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/blocks-preview/preview-buttons-with-image.png" style="width:100%; height:auto;">';
else :
?>
    <?php if ( have_rows( 'vk_bwi_buttons' ) ) : ?>
        <div <?php echo $wrapper_attributes; ?>>
            <?php while ( have_rows( 'vk_bwi_buttons' ) ) : the_row(); ?>
                <?php 
                $link = get_sub_field( 'vk_bwi_buttons_link' );
                $image = get_sub_field( 'vk_bwi_buttons_image' );
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span class="text-wrapper">
                            <span class="text"><?php echo esc_html( $link_title ); ?></span>
                            <svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-1.6201e-06 19.7143L8.75 11.5L-1.83871e-07 3.28572L1.75 1.55168e-06L14 11.5L1.75 23L-1.6201e-06 19.7143Z" fill="white"></path>
                            </svg>
                        </span>
                        <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?> 
        </div>
    <?php endif; ?>
<?php endif; ?>