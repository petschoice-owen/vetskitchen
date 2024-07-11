<?php

/**
 * Checklist Slider Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-checklist-slider js-checklist-slider',
        'id'    =>  isset($block['id'])
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_checklist_slider']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/checklist-slider.png" style="width:100%; height:auto;">';
else :
    $iconColor = get_field( 'vk_checklist_slider_icon_color' );
?>
    <?php if ( have_rows( 'vk_checklist_slider' ) ) : ?>
        <div <?php echo $wrapper_attributes; ?>>
            <?php while ( have_rows( 'vk_checklist_slider' ) ) : the_row(); ?>
                <?php if ( $text = get_sub_field( 'text' ) ) : ?>
                    <div class="vetskitchen-checklist-slider__item">
                        <i class="icon icon-g-82" <?php echo $iconColor ? 'style="color: '.$iconColor.';"' : ''; ?>></i>
                        <span><?php echo $text; ?></span>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php
endif;    
?>