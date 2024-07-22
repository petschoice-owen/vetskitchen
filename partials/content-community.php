<?php 
    $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large' ); 
    if ( !empty($featured_img) ) : ?>
        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <a href="<?php the_permalink(); ?>" class="post-link">
                <div class="featured-image-wrapper">
                    <img src="<?php echo esc_url($featured_img[0]); ?>" class="featured-image" alt="<?php the_title_attribute(); ?>" />
                </div>
                <div class="details">
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php $post_date = get_the_date( 'F jS Y' ); ?>
                    <p class="date"><?php echo esc_html($post_date); ?></p>
                </div>
            </a>
        </div>
    <?php else : ?>
        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <a href="<?php the_permalink(); ?>" class="post-link no-featured-image">
                <div class="details">
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php $post_date = get_the_date( 'F jS Y' ); ?>
                    <p class="date"><?php echo esc_html($post_date); ?></p>
                </div>
            </a>
        </div>
    <?php endif; 
?>