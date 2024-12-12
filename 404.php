<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">


    <header class="page-header">
        <?php get_search_form(); ?>
    </header><!-- .page-header -->
		<main id="main" class="site-main" role="main">

			<div class="error-404 not-found">

				<div class="page-content">

					<header class="page-header">
					</header><!-- .page-header -->

					<?php
					//echo '<section aria-label="' . esc_html__( 'Search', 'storefront' ) . '">';
						

					//echo do_shortcode('[su_tabs vertical="no" anchor_in_url="yes" class="searchtabs"] [su_tab anchor="mysearch" title="Search"][aws_search_form][/su_tab] [su_tab anchor="myai" title="Experimental AI Real Estate Agent"][wpaicg_chatgpt id=8546]	[/su_tab] [/su_tabs]');
					//if ( storefront_is_woocommerce_activated() ) {
					//	the_widget( 'WC_Widget_Product_Search' );
					//} else {
					//	get_search_form();
					//}

					//echo '</section>';

					if ( storefront_is_woocommerce_activated() ) {

						//echo '<div class="fourohfour-columns-2">';

						//	echo '<section class="col-1" aria-label="' . esc_html__( 'Promoted Properties', 'storefront' ) . '">';

								//storefront_promoted_products();
								//echo do_shortcode('[woo_product_slider id="17049"]');

						//	echo '</section>';

							//echo '<nav class="col-2" aria-label="' . esc_html__( 'Property Categories', 'storefront' ) . '">';

								//echo '<h2>' . esc_html__( 'Property Categories', 'storefront' ) . '</h2>';

								//the_widget( 'WC_Widget_Product_Categories', array( 'count' => 1,));

							//echo '</nav>';

						//echo '</div>';
					}

						//echo '<section aria-label="' . esc_html__( 'Popular Properties', 'storefront' ) . '">';

							//echo '<h2>' . esc_html__( 'Popular Properties', 'storefront' ) . '</h2>';

							//$shortcode_content = storefront_do_shortcode(
								//'best_selling_products',
								//array(
									//'per_page' => 4,
									//'columns'  => 4,
								//)
							//);

							//echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

						//echo '</section>';
					?>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
