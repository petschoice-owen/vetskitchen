<?php

/**
 * Accordion Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-accordion',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_accordion']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/accordion.png" style="width:100%; height:auto;">';
else :
?>
    <?php if ( have_rows( 'vk_accordion' ) ) : ?>
        <div <?php echo $wrapper_attributes; ?>>
            <?php while ( have_rows( 'vk_accordion' ) ) : the_row(); ?>
            <div class="vetskitchen-accordion__item">
                <div class="vetskitchen-accordion__item-header" data-bs-toggle="collapse" data-bs-target="#<?php echo $block['id']. '-' .get_row_index(); ?>" aria-expanded="false" aria-controls="vk-accordion-<?php echo get_row_index(); ?>">
                    <?php echo get_sub_field( 'vk_accordion_heading' ); ?>
                </div>
                <div id="<?php echo $block['id']. '-' . get_row_index(); ?>" class="collapse">
                    <div class="vetskitchen-accordion__item-content">
                        <?php echo get_sub_field( 'vk_accordion_content' ); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php
endif;    
?>