<?php

/**
 * Posts Grid Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-posts-grid',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_posts_grid']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/posts-grid.png" style="width:100%; height:auto;">';
else :
    global $post;
    $option = get_field( 'vk_pg_option' );
    $post_type = get_field( 'vk_pg_post_type' );
    $postsList = get_field( 'vk_pg_posts' );
    if( 'recent' === $option ) {
        $postsList = get_posts(array(
            'post_type'      => $post_type,
            'numberposts'    => 2,
            'post_status'    => 'publish'
        ));
    }
    if( $postsList ):
?>  
    <div <?php echo $wrapper_attributes; ?>>
        <div class="row">
            <?php
            foreach( $postsList as $post ):
                setup_postdata($post);
                echo get_template_part( 'partials/content', 'any' );
            endforeach;
            ?>
        </div>
    </div>
<?php
    wp_reset_postdata();
    endif;
endif;    
?>