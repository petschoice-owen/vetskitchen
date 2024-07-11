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
        'id'    =>  isset($block['id'])
    ]
);
$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/button' );
$template = array( array( 'core/heading', array() ) );
?>
<?php
if ( isset($block['data']['preview_image_dogclub_banner']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/dogclub-banner.png" style="width:100%; height:auto;">';
else :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" templateLock="false" />
    </div>
<?php
endif;    
?>