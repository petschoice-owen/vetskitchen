<?php

/**
 * Logo Grid Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-logo-grid',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_logo_grid']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/logo-grid.png" style="width:100%; height:auto;">';
else :
?>  
    <?php if ( have_rows( 'vk_logo_grid_list' ) ) : ?>
        <div <?php echo $wrapper_attributes; ?>>
            <?php while ( have_rows( 'vk_logo_grid_list' ) ) : the_row(); ?>
                <?php if( get_sub_field( 'image' ) ) : ?>
                    <div class="vetskitchen-logo-grid__item">
                        <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'medium' ); ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php
endif;    
?>