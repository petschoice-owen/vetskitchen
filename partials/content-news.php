<?php 
    $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large' ); 
    if ( !empty($featured_img) ) : ?>
        <div class="col-md-6 col-12">
            <div class="text">
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a>
                </h3>
                <div class="excerpt"><?php the_excerpt(); ?></div>
                <!-- <div class="date">
                    <?php $post_date = get_the_date( 'F jS Y' ); ?>
                    <p class="date"><?php echo esc_html($post_date); ?></p>
                </div> -->
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="image">
                <a href="<?php the_permalink(); ?>" class="post-link post-image" title="Read More">
                    <img src="<?php echo esc_url($featured_img[0]); ?>" class="featured-image" alt="<?php the_title_attribute(); ?>" />
                </a>
            </div>
        </div>
    <?php else : ?>
        <div class="col-12">
            <div class="text">
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a>
                </h3>
                <div class="excerpt"><?php the_excerpt(); ?></div>
                <!-- <div class="date">
                    <?php $post_date = get_the_date( 'F jS Y' ); ?>
                    <p class="date"><?php echo esc_html($post_date); ?></p>
                </div> -->
            </div>
        </div>
    <?php endif; 
?>