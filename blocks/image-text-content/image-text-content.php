<?php

/**
 * Image with Text Content Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$fulltextClass = get_field( 'vk_itc_fullwidth_content' ) ? 'fullwidth-text' : '';
$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-image-text-content ' . $fulltextClass,
    ]
);
?>
<?php if ( isset($block['data']['preview_image_text_content']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/blocks-preview/image-text-content.jpg" style="width:100%; height:auto;">';
else : ?>

    <div <?php echo $wrapper_attributes; ?>>
        <div class="row image-<?php echo get_field( 'image_position' ); ?> <?php echo get_field( 'vk_itc_nogap' ) ? 'g-0' : ''; ?>">
            <div class="col-md-6 col-12 col-image">
                <div class="wrapper-image<?php echo get_field( 'vk_itc_hide_image_mobile' ) ? ' d-none d-md-block' : ''; ?>">
                    <?php echo wp_get_attachment_image( get_field('image'), 'large', "", ["class" => "image"] ); ?>
                </div>
                <?php echo get_field( 'vk_itc_text_below_image' ) ? '<div class="subtext">'. get_field( 'vk_itc_text_below_image' ) .'</div>' : ''; ?>
            </div>
            <div class="col-md-6 col-12 col-content">
                <InnerBlocks />
            </div>
        </div>
    </div>

<?php endif; ?>