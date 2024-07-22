<?php
/**
 * The template for displaying archive news pages
 *
 * This is the template that displays all archives news by default.
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
        <h1 class="page-archive-heading">Latest News From Vet's Kitchen</h1>
        <!-- <div class="page-archive-description">
            <p>Browse our articles on a range of topics, to help make pet parenting that little bit easier. <br> If there is any topic you would like information on, please get in touch!</p>
        </div> -->
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row row-posts">
                <?php get_template_part( 'partials/content', 'news' ); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <div class="container no-result">
        <h1 class="page-archive-heading">Sorry, there are no related posts for your search: <span class="searched-word"><?php echo get_search_query() ?></span></h1>
        <div class="page-archive-description">
            <p>Please try your search again or browse our news posts <a href="/news">here</a>.</p>
        </div>
    </div>
<?php endif; ?>

<?php
get_footer();