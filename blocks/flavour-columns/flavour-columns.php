<?php

/**
 * Flavour Columns Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-flavour-columns'
    ]
);
?>
<?php if ( isset($block['data']['preview_image_flavour_columns']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/blocks-preview/flavour-columns.png" style="width:100%; height:auto;">';
else : ?>

    <?php if( have_rows('flavour_columns') ): ?>
        <div <?php echo $wrapper_attributes; ?>>
            <div class="container">
                <div class="row">
                    <?php while( have_rows('flavour_columns') ): the_row(); 
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        ?>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <img src="<?php echo $icon; ?>" class="icon" alt="<?php echo $title; ?>" />
                            <p class="title"><?php echo $title; ?></p>
                            <p class="description"><?php echo $description; ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- <div <?php echo $wrapper_attributes; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6">
                    <img src="" class="icon" alt="" />
                    <p class="title"></p>
                    <p class="description"></p>
                </div>
            </div>
        </div>
    </div> -->

<?php endif; ?>