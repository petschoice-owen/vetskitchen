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

<?php if ( have_posts() ) : 
    $args = array(
        'post_type' => 'community',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'date', 
        'order' => 'DESC',
    ); 
    $posts = new WP_Query( $args ); ?>
    <div class="container-fluid container-fluid-custom">
        <div class="row">
            <div class="col-12">
                <?php $terms = get_terms( array(
                    'taxonomy' => 'community-category',
                    'hide_empty' => false,
                ) );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                    <ul class="community-categories-list">
                        <?php foreach ( $terms as $term ) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                    <?php echo esc_html( $term->name ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <?php 
                $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); 
                if ( !empty($featured_img) ) : ?>
                    <div class="col-md-6 col-12">
                        <a href="<?php the_permalink(); ?>" class="post-link">
                            <div class="featured-image-wrapper">
                                <img src="<?php echo esc_url($featured_img[0]); ?>" class="featured-image" alt="<?php the_title_attribute(); ?>" />
                            </div>
                            <?php $post_date = get_the_date( 'F jS Y' ); ?>
                            <div class="post-meta">
                                <span class="date"><?php echo esc_html($post_date); ?></span>
                            </div>
                            <h2 class="post-title"><?php the_title(); ?></h2>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" async></script> -->
<?php else : ?>
    <div class="container">
        <h1 class="archive-heading">There are no posts at the moment.</h1>
    </div>
<?php endif; ?>

<?php
get_footer();