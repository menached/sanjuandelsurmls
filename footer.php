<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			//do_action( 'storefront_footer' );
			?>
<?php echo "<a style=\"color:#fff;\" class=whiteit href=/>2023 Nicaragua MLS</a> "; ?>
		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        var $easyzoom = $('.woocommerce-product-gallery__image').easyZoom();
        var api = $easyzoom.data('easyZoom');

        api.teardown();
    });
</script>


<script>
jQuery(document).ready(function($) {
    // Disable zoom on product images
    $('.woocommerce-product-gallery').trigger('zoom.destroy');
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const widgetRegion = document.querySelector('.header-widget-region');
    if (widgetRegion && widgetRegion.innerText.trim() === '') {
        widgetRegion.style.display = 'none';
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const masthead = document.getElementById('masthead');
    const colFull = masthead.querySelector('.col-full');

    if (colFull && colFull.innerText.trim() === '') {
        colFull.style.display = 'none';
    }
});

</script>

</body>
</html>
