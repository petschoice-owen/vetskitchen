<?php

/**
 * Dog Club Banner Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-dogclub-banner',
        'id'    =>  isset($block['anchor'])
    ]
);
$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/button', 'core/image' );
$template = array( array( 'core/heading', array() ) );
?>
<?php
if ( isset($block['data']['preview_image_dogclub_banner']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/dogclub-banner.png" style="width:100%; height:auto;">';
else :
    $imgLeft = get_field( 'vk_dcb_image_left' );
    $imgRight = get_field( 'vk_dcb_image_right' );
?>
    <div <?php echo $wrapper_attributes; ?>>
        <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" templateLock="false" />
        <?php echo wp_get_attachment_image( $imgLeft, 'large', "", ["class" => "vetskitchen-dogclub-banner__left-image d-none d-md-block"] ); ?>
        <?php echo wp_get_attachment_image( $imgRight, 'medium', "", ["class" => "vetskitchen-dogclub-banner__right-image d-none d-md-block"] ); ?>
    </div>
<?php
endif;    
?>