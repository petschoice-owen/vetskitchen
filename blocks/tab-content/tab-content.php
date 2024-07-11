<?php

/**
 * Tab Content Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-tab__content tab-pane fade',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<div <?php echo $wrapper_attributes; ?> role="tabpanel">
    <InnerBlocks  />
</div>