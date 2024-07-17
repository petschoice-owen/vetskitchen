<?php

/**
 * Testimonials Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-testimonials'
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_testimonials']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/testimonials.png" style="width:100%; height:auto;">';
else :
?>
    <?php if ( have_rows( 'vk_testimonials' ) ) : ?>
    <div <?php echo $wrapper_attributes; ?>>
        <?php while ( have_rows( 'vk_testimonials' ) ) : the_row(); ?>
            <div class="vetskitchen-testimonials__item">
                <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'large', "", ["class" => "image"] ); ?>
                <div class="quote-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#008077" d="M448 296c0 66.3-53.7 120-120 120h-8c-17.7 0-32-14.3-32-32s14.3-32 32-32h8c30.9 0 56-25.1 56-56v-8H320c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64h64c35.3 0 64 28.7 64 64v32 32 72zm-256 0c0 66.3-53.7 120-120 120H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h8c30.9 0 56-25.1 56-56v-8H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64h64c35.3 0 64 28.7 64 64v32 32 72z"/></svg>
                </div>
                <div class="content">
                    <?php echo get_sub_field( 'content' ); ?>
                    <?php echo get_sub_field( 'name' ) ? '<div class="name">'. get_sub_field( 'name' ) .'</div>': ''; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
<?php
endif;    
?>