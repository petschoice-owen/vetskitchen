<?php
/**
 * Wrapper Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-wrapper mx-auto',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_wrapper']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/blocks-preview/preview-wrapper.png" style="width:100%; height:auto;">';
else :
?>
<div <?php echo $wrapper_attributes; ?> style="max-width: <?php echo get_field( 'vk_wrapper_maximum_width') . 'px'; ?>">
    <InnerBlocks />
</div>
<?php endif; ?>