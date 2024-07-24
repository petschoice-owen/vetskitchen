<?php
/**
 * The template for displaying all posts
 *
 * This is the template that displays all posts by default.
 * Please note that this is the WordPress construct of posts
 * and that other 'posts' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
    <div class="container-fluid container-fluid-custom">
        <!-- <div class="row">
            <div class="col-12">
                <div class="categories">
                    <ul class="community-categories-list">
                        <li>
                            <a href="/community" class="all">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                                </svg>
                            </a>
                        </li>
                        <?php $terms = get_terms( array(
                            'taxonomy' => 'news-category',
                            'hide_empty' => false,
                        ) ); ?>
                        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                            <?php foreach ( $terms as $term ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li>
                            <a href="#" id="search_community" class="search">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="search-wrapper">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/community' ); ?>">
                            <label>
                                <input type="hidden" name="post_type" value="community" />
                                <input type="search" class="search-field"
                                    placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
                                    value="<?php echo get_search_query() ?>" name="s" />
                            </label>
                            <button type="submit" class="search-submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-single-post">
                    <?php 
                        $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); 
                        $post_date = get_the_date( 'F jS Y' );
                        if ( !empty($featured_img) ) : ?>
                            <div class="content">
                                <div class="featured-image-wrapper">
                                    <img src="<?php echo esc_url($featured_img[0]); ?>" class="featured-image" alt="<?php the_title_attribute(); ?>" />
                                </div>
                                <h1 class="single-post-heading"><?php the_title(); ?></h1>
                                <p class="date"><?php echo esc_html($post_date); ?></p>
                                <?php the_content(); ?>
                            </div>
                        <?php else : ?>
                            <div class="content no-featured-image">
                                <h1 class="single-post-heading"><?php the_title(); ?></h1>
                                <p class="date"><?php echo esc_html($post_date); ?></p>
                                <?php the_content(); ?>
                            </div>
                        <?php endif; 
                    ?>
                    <div class="share-buttons">
                        <a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet/?text=<?php the_permalink(); ?>" class="x" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" class="linkedin" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/?text=<?php the_permalink(); ?>" class="whatsapp" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                        </a>
                        <a href="mailto:?subject=<?php the_permalink(); ?>" class="email" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="back-button">
                        <a href="/news" class="go-back">« Back to News</a>
                    </div>
                </div>
            </div>
            <!-- <?php
                $categories = get_the_terms(get_the_ID(),'news-category');
                if ( $categories ) {
                    $category_ids = array();
                    foreach( $categories as $category ) {
                        $category_ids[] = $category->term_id;
                    }
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 4, 
                        'post__not_in' => array( get_the_ID() ),
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'news-category',
                            'terms' => $category_ids,
                            ),
                        ),
                        'orderby' => 'rand', 
                    );
                    $related_posts_query = new WP_Query( $args );
                    if ( $related_posts_query->have_posts() ) : ?>
                        <div class="related-posts">
                            <h2 class="section-heading">Related Articles</h2>
                            <div class="row">
                                <?php while ( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); ?>
                                    <?php get_template_part( 'partials/content', 'news' ); ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php wp_reset_postdata();
                    endif;
                }
            ?> -->
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <div class="container no-result">
        <h1 class="page-archive-heading">Sorry, there are no related posts for your search: <span class="searched-word"><?php echo get_search_query() ?></span></h1>
        <div class="page-archive-description">
            <p>Please try your search again or browse our community posts <a href="/community">here</a>.</p>
        </div>
    </div>
<?php endif; ?>

<?php
get_footer();