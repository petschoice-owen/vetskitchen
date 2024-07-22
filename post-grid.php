<?php

/**
 * Post Grid Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'invert-post-grid js-post-grid',
        'id'    =>  $block['anchor']
    ]
);
?>
<?php
if ( $block['data']['preview_image_post_grid'] ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/preview-post-grid.png" style="width:100%; height:auto;">';
else :
    $grid_title = get_field('title');
    $grid_type = get_field('invert_post_grid_type');
    
    $args = array(
        'post_type'      => $grid_type,
        'posts_per_page' => 3,
        'post_status'    => 'publish',
    );
    
    if ($grid_type === 'post') {
        $grid_cat = get_field('invert_post_grid_posts_cat');
        $grid_tags = array();
        $grid_tags = get_field('invert_post_grid_tags');

        
        if ($grid_cat || $grid_tags) {
            if ($grid_cat) {
                $args['cat'] = $grid_cat;
            }
            if ($grid_tags) {
                $args['tag__in'] = $grid_tags;
            }
        }
    }
    
    $the_query = new WP_Query($args)
?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="container js-invert-posts-wrapper">
        <?php if( $grid_title ): ?><h2 class="mb-5"><?php echo $grid_title; ?></h2><?php endif; ?>
        <?php if( $the_query ): ?>
            <div class="invert-post-grid__wrapper invert-post-grid__wrapper--3col js-invert-posts-list">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'large');
                        $featured_image = $featured_image ? $featured_image : get_template_directory_uri() . '/assets/images/svg/icon-image.svg';
                        $alt_image = $thumbnail_id ? get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ) :  get_the_title() . __( ' featured', 'invert' );  ?>
                        <a class="invert-post-grid__post <?php echo $post_cat->slug ?>-post" href="<?php echo get_the_permalink(); ?>" aria-label="Go to the <?php echo get_the_title(); ?> post">
                            <figure>
                                <img src="<?php echo $featured_image; ?>" class="img-fluid <?php echo has_post_thumbnail() ? '' : 'no-featured-image'; ?>" alt="<?php echo $alt_image; ?>" />
                            </figure>
                            <p class="meta"><?php echo get_the_date( 'd M Y' ); ?></p>
                            <h3 class="title"><?php echo get_the_title(); ?></h3>
                            <span class="read-more"><?php echo __('Read more', 'invert') ?></span> >
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        <?php endif;  ?>
        <?php if ( $the_query->max_num_pages > 1 ) : ?>
            <div class="mt-5 pt-4 text-center js-posts-load-more-wrapper">
                <a href="#" class="btn-primary-outline js-posts-load-more"  data-cat="<?php echo $grid_cat; ?>"  data-type="<?php echo $grid_type; ?>"><?php echo get_field( 'invert_post_grid_button_text' ) ? get_field( 'invert_post_grid_button_text' ) : __( 'See More', 'invert' ); ?></a>
                <div class="invert-loader"></div>
            </div>
        <?php endif; ?>
    </div>
</div>