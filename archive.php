<?php
/**
 * The template for displaying archive pages
 *
 * This is the template that displays all archives by default.
 * Please note that this is the WordPress construct of archives
 * and that other 'archives' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();
?>

    <?php if ( have_posts() ) : ?>
        <div class="container">
            
            <?php  while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
                <a href="<?php the_permalink(); ?>" class="post-link">
                    <div class="featured-image-wrapper">
                        <img src="<?php echo $featured_img[0]; ?>" class="featured-image" alt="<?php the_title(); ?>" />
                    </div>
                    <?php $post_date = get_the_date( 'F jS Y' ); ?>
                    <div class="post-meta">
                        <span class="date"><?php echo $post_date; ?></span>
                    </div>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <div class="container">
            <h1 class="archive-heading">There are no posts at the moment.</h1>
        </div>
    <?php endif; ?>


	
<?php
get_footer();