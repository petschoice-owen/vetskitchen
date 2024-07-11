<?php

/**
 * Tabs Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-tabs',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
$allowed_blocks = array( 'acf/vetskitchen-tab-content' );
$template = array( array( 'acf/vetskitchen-tab-content', array() ) );
?>
<?php
if ( isset($block['data']['preview_image_tabs']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/tabs.png" style="width:100%; height:auto;">';
else :
    if ( have_rows( 'vk_tab_navigation' ) ) :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <div class="nav nav-tabs" role="tablist">
            <?php while ( have_rows( 'vk_tab_navigation' ) ) :  the_row(); ?>
                <div class="nav-link<?php echo get_row_index() === 1 ? ' active' : ''; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo get_sub_field( 'target_id' ); ?>" type="button" role="tab" aria-controls="<?php echo get_sub_field( 'target_id' ); ?>" aria-selected="<?php echo get_row_index() === 1 ? 'true' : 'false'; ?>"><?php echo get_sub_field( 'title' ); ?></div>
            <?php endwhile; ?>
        </div>
        <div class="tab-content">
            <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" templateLock="false" />
        </div>
    </div>
<?php
    endif;
endif;    
?>