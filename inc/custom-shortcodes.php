<?php
// Full Width Slider Shortcode
function custom_full_width_slider_shortcode( $atts ){
    global $product;
    ob_start();
    ?>
    <?php if ( $product->get_image_id() ) : ?>
        <div class="full-width-slider">
            <?php foreach ( $product->get_gallery_image_ids() as $image_id ) : ?>
                <div class="slide">
                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}
add_shortcode( 'full_width_slider', 'custom_full_width_slider_shortcode' );
