<?php

/**
 * Dog Club Banner Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-inclusions',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_whats_included']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/whats-included.png" style="width:100%; height:auto;">';
else :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <?php echo wp_get_attachment_image( get_field( 'vk_wi_bg' ), 'full', "", ["class" => "vetskitchen-inclusions__bg"] ); ?>
        <div class="vetskitchen-inclusions__wrapper">
            <?php if ( $heading = get_field( 'vk_wi_heading' ) ) : ?>
                <h2><?php echo $heading; ?></h2>
            <?php endif; ?>
            <div class="vetskitchen-inclusions__blocks">
                <?php if( have_rows( 'vk_wi_blocks' ) ) : ?>
                    <?php while( have_rows( 'vk_wi_blocks' ) ) : the_row(); ?>
                        <div class="vetskitchen-inclusions__item">
                            <div class="item-wrap">
                                <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'medium' ); ?>
                                <div class="content">
                                    <?php echo get_sub_field( 'title' ) ? '<div class="title">'.get_sub_field( 'title' ).'</div>' : ''; ?>
                                    <?php echo get_sub_field( 'subtext' ) ? '<div class="subtext">'.get_sub_field( 'subtext' ).'</div>' : ''; ?>
                                </div>
                            </div>
                            <div class="plus-icon d-md-none">
                                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.8136 15.9553H25.0446V6.18667C25.0446 4.77041 24.4815 3.62397 23.5799 2.8488C22.7042 2.09602 21.5788 1.75 20.4998 1.75C19.4208 1.75 18.2953 2.09602 17.4197 2.8488C16.5181 3.62397 15.955 4.77041 15.955 6.18667V15.9553H6.18596C4.76985 15.9553 3.62357 16.5185 2.84855 17.4201C2.09593 18.2957 1.75 19.4211 1.75 20.5C1.75 21.5789 2.09593 22.7043 2.84855 23.5799C3.62357 24.4815 4.76985 25.0447 6.18596 25.0447H15.955V34.8133C15.955 36.2296 16.5181 37.376 17.4197 38.1512C18.2953 38.904 19.4208 39.25 20.4998 39.25C21.5788 39.25 22.7042 38.904 23.5799 38.1512C24.4815 37.376 25.0446 36.2296 25.0446 34.8133V25.0447H34.8136C36.2298 25.0447 37.3762 24.4816 38.1513 23.58C38.904 22.7044 39.25 21.5789 39.25 20.5C39.25 19.4211 38.904 18.2956 38.1513 17.42C37.3762 16.5184 36.2298 15.9553 34.8136 15.9553Z" stroke="#4CC1A1" stroke-width="2.5"></path>
                                </svg>
                            </div>
                        </div>
                        <?php if( get_row_index() !== count(get_field( 'vk_wi_blocks' )) ) : ?>
                            <div class="plus-icon d-none d-md-block">
                                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.8136 15.9553H25.0446V6.18667C25.0446 4.77041 24.4815 3.62397 23.5799 2.8488C22.7042 2.09602 21.5788 1.75 20.4998 1.75C19.4208 1.75 18.2953 2.09602 17.4197 2.8488C16.5181 3.62397 15.955 4.77041 15.955 6.18667V15.9553H6.18596C4.76985 15.9553 3.62357 16.5185 2.84855 17.4201C2.09593 18.2957 1.75 19.4211 1.75 20.5C1.75 21.5789 2.09593 22.7043 2.84855 23.5799C3.62357 24.4815 4.76985 25.0447 6.18596 25.0447H15.955V34.8133C15.955 36.2296 16.5181 37.376 17.4197 38.1512C18.2953 38.904 19.4208 39.25 20.4998 39.25C21.5788 39.25 22.7042 38.904 23.5799 38.1512C24.4815 37.376 25.0446 36.2296 25.0446 34.8133V25.0447H34.8136C36.2298 25.0447 37.3762 24.4816 38.1513 23.58C38.904 22.7044 39.25 21.5789 39.25 20.5C39.25 19.4211 38.904 18.2956 38.1513 17.42C37.3762 16.5184 36.2298 15.9553 34.8136 15.9553Z" stroke="#4CC1A1" stroke-width="2.5"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( $imgRight = get_field( 'vk_wi_image_right' ) ) : ?>
                    <div class="vetskitchen-inclusions__imgright d-none d-md-block">
                        <?php echo $imgRight['link'] ? '<a href="'. $imgRight['link']['url'] .'">' : ''; ?>
                        <?php echo wp_get_attachment_image( $imgRight['image'], 'medium' ); ?>
                        <?php echo $imgRight['link'] ? '</a>' : ''; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if( have_rows( 'vk_wi_bottom_content' ) ) : ?>
                <?php while( have_rows( 'vk_wi_bottom_content' ) ) : the_row(); ?>
                    <div class="vetskitchen-inclusions__bottom">
                        <span class="plus-icon">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M34.8136 15.9553H25.0446V6.18667C25.0446 4.77041 24.4815 3.62397 23.5799 2.8488C22.7042 2.09602 21.5788 1.75 20.4998 1.75C19.4208 1.75 18.2953 2.09602 17.4197 2.8488C16.5181 3.62397 15.955 4.77041 15.955 6.18667V15.9553H6.18596C4.76985 15.9553 3.62357 16.5185 2.84855 17.4201C2.09593 18.2957 1.75 19.4211 1.75 20.5C1.75 21.5789 2.09593 22.7043 2.84855 23.5799C3.62357 24.4815 4.76985 25.0447 6.18596 25.0447H15.955V34.8133C15.955 36.2296 16.5181 37.376 17.4197 38.1512C18.2953 38.904 19.4208 39.25 20.4998 39.25C21.5788 39.25 22.7042 38.904 23.5799 38.1512C24.4815 37.376 25.0446 36.2296 25.0446 34.8133V25.0447H34.8136C36.2298 25.0447 37.3762 24.4816 38.1513 23.58C38.904 22.7044 39.25 21.5789 39.25 20.5C39.25 19.4211 38.904 18.2956 38.1513 17.42C37.3762 16.5184 36.2298 15.9553 34.8136 15.9553Z" stroke="#4CC1A1" stroke-width="2.5"></path>
                            </svg>
                        </span>
                        <?php echo wp_get_attachment_image( get_sub_field( 'vk_wi_bottom_content_image' ), 'medium' ); ?>
                        <?php if ( $text = get_sub_field( 'vk_wi_bottom_content_text' ) ) : ?>
                            <div class="text"><?php echo $text; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php
endif;    
?>