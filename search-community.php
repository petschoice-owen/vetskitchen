<?php
/**
 * The template for displaying search results for archive pages
 *
 * This is the template that displays search results for archive by default.
 * 
 * 
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
    <div class="container-fluid container-fluid-custom">
        <h1 class="page-archive-heading"><?php printf( esc_html__( 'Search Results for: %s', 'textdomain' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <div class="row">
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
                            'taxonomy' => 'community-category',
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
        </div>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'partials/content', 'community' ); ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
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