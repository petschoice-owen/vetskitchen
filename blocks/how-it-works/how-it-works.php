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
        'class' => 'vetskitchen-how-it-works alignfull',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_how_it_works']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/how-it-works.png" style="width:100%; height:auto;">';
else :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <div class="container">
            <div class="vetskitchen-how-it-works__wrapper">
                <?php if( have_rows( 'vk_hiw_left_content' ) ) : ?>
                    <?php while( have_rows( 'vk_hiw_left_content' ) ) : the_row(); ?>
                        <div class="left-content">
                            <?php echo get_sub_field( 'heading' ) ? '<h2 class="heading">'.get_sub_field( 'heading' ).'</h2>' : ''; ?>
                            <?php echo wp_get_attachment_image( get_sub_field( 'image_desktop' ), 'large', "", ["class" => "left-content__image d-none d-md-block"] ); ?>
                            <?php echo wp_get_attachment_image( get_sub_field( 'image_mobile' ), 'large', "", ["class" => "left-content__image d-md-none"] ); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows( 'vk_hiw_right_content' ) ) : ?>
                    <?php while( have_rows( 'vk_hiw_right_content' ) ) : the_row(); ?>
                        <div class="right-content">
                            <?php if ( have_rows( 'steps' ) ) : ?>
                                <div class="steps">
                                    <?php while( have_rows( 'steps' ) ) : the_row(); ?>
                                        <?php if ( get_sub_field( 'text' ) ) : ?>
                                            <div class="steps__item">
                                                <div class="counter"><?php echo get_row_index(); ?></div>
                                                <div class="text"><?php echo get_sub_field( 'text' ); ?></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <div class="right-content__bottom">
                                <?php echo get_sub_field( 'bottom_text' ) ? '<div class="text">'. get_sub_field( 'bottom_text' ) .'</div>' : ''; ?>
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
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
endif;    
?>