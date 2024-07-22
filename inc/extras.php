<?php 
/*
* Posts Grid Load More Ajax
*/
add_action('wp_ajax_nopriv_vk_posts_load_more', 'vk_posts_load_more');
add_action('wp_ajax_vk_posts_load_more', 'vk_posts_load_more');
function vk_posts_load_more() {
    $type = $_POST['type'];
    $page = 2;
    $args = array(
        'post_type'         => $type,
        // 'posts_per_page'    => 20,
        'post_status'       => 'publish',
        'paged'             => $page,
    );
    if( $_POST['tax'] ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $_POST['tax'],
                'terms'    => $_POST['term']
            )
        );
    }

    $the_query = new WP_Query($args);
    $max_page = $the_query->max_num_pages;
    ob_start();
    while ( $the_query->have_posts() ) : $the_query->the_post();
        get_template_part( 'partials/content', $type );
    endwhile; wp_reset_postdata();
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'page' => $page, 'max_page' => $max_page ) );
    exit;
}