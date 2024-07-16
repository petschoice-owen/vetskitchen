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
	<div class="container">
        <h1 class="single-post-heading"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
<?php
get_footer();