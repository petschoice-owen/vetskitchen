<?php 
    $featured_img = wp_get_attachment_image(get_post_thumbnail_id(), 'large' ); 
?>
<div class="col-12 col-sm-6 d-flex">
    <a href="<?php the_permalink(); ?>" class="grid-post w-100">
        <?php if ( !empty($featured_img) ) :  ?>
            <?php echo $featured_img; ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-default.png" class="placeholder-img" alt="placeholder">
        <?php endif; ?>
        <div class="details">
            <h3 class="post-title"><?php the_title(); ?></h3>
            <p class="date"><?php echo esc_html( get_the_date( 'F jS Y' ) ); ?></p>
        </div>
    </a>
</div>