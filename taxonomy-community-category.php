<?php
/**
 * The template for displaying taxonomy pages
 *
 * This is the template that displays all taxonomies by default.
 * Please note that this is the WordPress construct of taxonomy
 * and that other 'taxonomies' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();
?>

    <?php if ( have_posts() ) : ?>
        <div class="container">
            <h1 class="page-title"><?php single_term_title(); ?></h1>
            <div class="categories">
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
            <?php the_posts_pagination(); ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <div class="container">
            <h1 class="archive-heading">There are no posts at the moment.</h1>
        </div>
    <?php endif; ?>
<?php
get_footer();