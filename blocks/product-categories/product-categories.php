<?php

/**
 * Product Categories Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-product-categories',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_product_categories']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/product-categories.png" style="width:100%; height:auto;">';
else :
    $categories = get_field( 'vk_product_categories' );
    if( $categories ):
?>  
    <div <?php echo $wrapper_attributes; ?>>
       <?php
        echo '<ul class="products columns-2">';
        foreach( $categories as $category ) {
            wc_get_template(
                'content-product_cat.php',
                array(
                    'category' => $category,
                )
            );
        }
        echo '</ul>';
       ?>
    </div>
<?php
    wp_reset_postdata();
    endif;
endif;    
?>