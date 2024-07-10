<?php

/**
 * Image with Text Content Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-image-text-content'
    ]
);
?>
<?php if ( isset($block['data']['preview_image_text_content']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/blocks-preview/image-text-content.jpg" style="width:100%; height:auto;">';
else : ?>

    <div <?php echo $wrapper_attributes; ?>>
        <div class="row image-<?php echo get_field('image_position'); ?>">
            <div class="col-md-6 col-12 col-image">
                <div class="wrapper-image">
                    <img src="<?php echo get_field('image'); ?>" class="image" alt="" />
                </div>
            </div>
            <div class="col-md-6 col-12 col-content">
                <InnerBlocks />
            </div>
        </div>
    </div>

<?php endif; ?>