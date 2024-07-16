<?php

/**
 * How it Works Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-experts-advice',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_experts_advice']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/experts-advice.png" style="width:100%; height:auto;">';
else :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <?php if ( have_rows( 'vk_ea_top_content' ) ) : ?>
        <?php while ( have_rows( 'vk_ea_top_content' ) ) : the_row(); ?>
            <div class="vetskitchen-experts-advice__top">
                <?php echo get_sub_field( 'heading' ) ? '<h2 class="heading">'.get_sub_field( 'heading' ).'</h2>' : ''; ?>
                <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'large' ); ?>
                <?php echo get_sub_field( 'text' ) ? '<div class="text">'.get_sub_field( 'text' ).'</div>' : ''; ?>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if ( have_rows( 'vk_ea_main_content' ) ) : ?>
        <?php while ( have_rows( 'vk_ea_main_content' ) ) : the_row(); ?>
            <div class="vetskitchen-experts-advice__main">
                <div class="left-content">
                    <?php echo get_sub_field( 'heading' ) ? '<h2 class="heading">'.get_sub_field( 'heading' ).'</h2>' : ''; ?>
                    <?php echo get_sub_field( 'content' ) ? '<div class="content">'.get_sub_field( 'content' ).'</div>' : ''; ?>
                    <?php 
                    $link = get_sub_field('button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="btn-orange" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="right-content">
                    <?php echo wp_get_attachment_image( get_sub_field( 'image_desktop' ), 'large', "", ["class" => "right-content__image d-none d-md-block"] ); ?>
                    <?php echo wp_get_attachment_image( get_sub_field( 'image_mobile' ), 'large', "", ["class" => "right-content__image d-md-none"] ); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
<?php
endif;    
?>