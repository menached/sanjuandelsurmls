<style>
.contactusbutton{
    background-color:green;
    color:white;
text-decoration:none;
}
</style>
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs, the version of the template file will be bumped, and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<?php 
//echo do_shortcode('[su_spacer size=100]');
?>
<?php //get_search_form(); ?>




<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<a class="contactusbutton" href="./#contactus" title="Write to us about this property.">RealEstate@NicaraguaMLS.com</a>
    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>

    <div class="summary entry-summary">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */

// Get the default product meta data
        ob_start();
        do_action( 'woocommerce_single_product_summary' );
        $product_summary = ob_get_clean();

        // Replace labels 'Category:' with 'City:' and 'Tags:' with 'Features:'
        $product_summary = str_replace( 'Category:', 'City:', $product_summary );
        $product_summary = str_replace( 'Tags:', 'Features:', $product_summary );

        // Output the modified product meta data
        echo $product_summary;
        ?>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );


    echo do_shortcode(' [su_tabs vertical="no" anchor_in_url="yes" class="searchtabs"]
        [su_tab anchor="contactus" title="Contact us!" class="navtabs"] [contact-form-7 id="17485" title="Real Estate Inquiry"] [/su_tab]
        [su_tab anchor="myai" title="MLS Mario GPT-4 AI Real Estate Agent" class="navtabs"] [wpaicg_chatgpt] [/su_tab]
        [su_tab url="https://sanjuandelsurmls.com/preparing-your-nicaraguan-home-listing-with-nicaraguanmls-your-trusted-real-estate-partners/" target="self" anchor="getlisted" title="Sellers get listed!" class="navtabs"] <h2>Get listed</h2><a href=https://sanjuandelsurmls.com>Sellers get listed!</a> [/su_tab]
        [/su_tabs] ');
        #echo do_shortcode('[showad-200][showad]');
    ?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
