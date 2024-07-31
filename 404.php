<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
    <div class="container">
        <div class="row h-100 py-5 my-5 text-center justify-content-center align-items-center">
            <div class="col-12 pb-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spaniel-dog.webp" alt="dog" class="img-fluid mb-5" width="280px">
                <h2 class="mb-0 text-dark"><?php echo __( 'THAT PAGE CAN’T BE FOUND.', 'vetskitchen' ); ?></h2>
                <p class="mb-4 text-dark"><?php echo __( "It looks like nothing was found at this location.", 'vetskitchen' ); ?></p>
                <a href="<?php echo home_url();?>" class="btn-orange"><?php echo __( 'GO TO HOME', 'vetskitchen' ); ?></a>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
