<?php 
/*
* Posts Grid Load More Ajax
*/
add_action('wp_ajax_nopriv_invert_posts_load_more', 'invert_posts_load_more');
add_action('wp_ajax_invert_posts_load_more', 'invert_posts_load_more');
function invert_posts_load_more() {
    $cat = $_POST['cat'];
    $type = $_POST['type'];
    // $page = (isset($_POST['page'])) ? $_POST['page'] : 1;
    $offset = $_POST['offset'];
    $newOffset = 6 + $offset;
    $args = array(
        'post_type'         => $type,
        'posts_per_page'    => -1,
        'post_status'       => 'publish',
        'offset'            => $offset
    );
    if( 'post' === $type && $cat ) {
        $args['cat'] = $cat;
    }
    $totalposts = new WP_Query( $args );
    $totalpostsCount = $totalposts->found_posts;

    $args['posts_per_page'] = 6;
    $the_query = new WP_Query($args);
    ob_start();
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
        $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'large');
        $featured_image = $featured_image ? $featured_image : get_template_directory_uri() . '/assets/images/img-default.png';
        $alt_image = $thumbnail_id ? get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ) :  $title . 'featured image';  ?>
        <a class="invert-post-grid__post" href="<?php echo get_the_permalink(); ?>" aria-label="Go to the <?php echo get_the_title(); ?> post">
            <figure>
                <img src="<?php echo $featured_image; ?>" class="img-fluid" alt="<?php echo $alt_image; ?>" />
            </figure>
            <p class="meta"><?php echo get_the_date( 'd M Y' ); ?></p>
            <h3 class="title"><?php echo get_the_title(); ?></h3>
            <span class="read-more"><?php echo __('Read more', 'invert') ?></span> >
        </a>
    <?php endwhile; wp_reset_postdata();
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'offset' => $newOffset, 'total' => $totalpostsCount ) );
    exit;
}