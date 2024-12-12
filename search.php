<style>
#content > div > header > div {display:none;}

.notfoundimage {position:relative;float:right;max-width:90%;padding-right:5%;}
@media (min-width: 768px) {
    
    #content > div {border:1px solid #1e73b3!important;padding-top:15px;margin-bottom:15px;}

}

@media (max-width: 767px) {
    #content > div {border:1px solid #1e73b3;padding:15px;margin-left:3px;margin-right:3px;}
    .entry-title {font-size:1em;}
}

#content > div > header > h2 {color:green;font-size:1em;}


.wrapelements {
    display: flex; /* Make .wrapelements a flex container */
    width: 100%; /* Set the width to 100% */
    align-items: center; /* Center items vertically */
}

.wrapelements .search-field {
    flex-grow: 1; /* Allow the input field to grow and take up available space */
    width: auto; /* Reset any specific width on the input field */
    margin-right: 0.5em; /* Optional: add some space between the input and the button */
    height: 40px; /* Set the height of the input field */
}

.wrapelements .inputbutton {
    flex-shrink: 0; /* Prevent the button from shrinking */
    height: 40px; /* Set the height of the button */
}

</style>

<?php
get_header();

if ( have_posts() ) : ?>
            <?php //get_search_form(); ?>


<form role="search" method="get" id="searchform" class="searchform" action="https://sanjuandelsurmls.com/">
    <div class="wrapelements">
        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="inputwidth search-field" placeholder="<?php echo esc_attr__( 'Keyword search&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" class="inputbutton <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>"><?php echo esc_html_x( 'Search', 'submit button', 'woocommerce' ); ?></button>

        <select style=display:none; name="orderby" class="orderby">
            <option value="price-desc"><?php _e( 'Sort by price high to low', 'woocommerce' ); ?></option>
            <option value="price-asc"><?php _e( 'Sort by price low to high', 'woocommerce' ); ?></option>
        </select>
    </div>
</form>

    <header class="page-header">
        <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'storefront' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
    </header><!-- .page-header -->
<?php


    while ( have_posts() ) :
        the_post();
        $product = wc_get_product( get_the_id() );
        ?>

        <article id="post-<?php the_id(); ?>">
            <header class="entry-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>">
<?php if($product->get_sale_price() == 0){?>
                <h5 class=alignright><?php echo wc_price( $product->get_regular_price() ); ?></h5>
<?php } else { ?>
                <h5 class=alignright><?php echo wc_price( $product->get_sale_price() ); ?></h5>
<?php } ?>
                    <?php
                        $search_term = esc_html( get_search_query() );
                        $highlighted_title = str_ireplace( $search_term, '<span style="background-color: yellow;">'.$search_term.'</span>', $product->get_name() );
        #$search_term = esc_html(get_search_query());
        #$highlighted_description = str_ireplace($search_term, '<span style="background-color: yellow;">' . $search_term . '</span>', do_shortcode($product->get_short_description()));
        #echo $highlighted_description;
                        echo $highlighted_title;
                    ?>
                </a></h3>

                <?php if($product): ?>
                    <div class="product-image">
                        <?php
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'single-post-thumbnail' );
                        ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php echo $product->get_name(); ?>" />
                    </div>
                <?php endif; ?>

            </header><!-- .entry-header -->

            <div class="entry-content">




                <?php if($product): ?>
                    <?php
                        #$search_term = esc_html( get_search_query() );
                        #$highlighted_description = str_ireplace( $search_term, '<span style="background-color: yellow;">'.$search_term.'</span>', do_shortcode($product->get_description()));
                        #echo $highlighted_description;
                        $search_term = esc_html(get_search_query());
                        $highlighted_description = str_ireplace($search_term, '<span style="background-color: yellow;">' . $search_term . '</span>', do_shortcode($product->get_short_description()));
                        echo $highlighted_description;
                    ?>
                <?php else: ?>
                    <?php
                        $search_term = esc_html( get_search_query() );
                        $highlighted_excerpt = str_ireplace( $search_term, '<span style="background-color: yellow;">'.$search_term.'</span>', do_shortcode(get_the_excerpt()));
                        echo $highlighted_excerpt;
                    ?>
                <?php endif; ?>






            </div><!-- .entry-content -->
        </article><!-- #post-## -->


<p><hr class=aligncenter width=50%></p>
    <?php
    endwhile;

?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
else :
    //get_search_form();
?>

<form role="search" method="get" id="searchform" class="searchform" action="https://sanjuandelsurmls.com/">
    <div class="wrapelements">
        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="inputwidth search-field" placeholder="<?php echo esc_attr__( 'Keyword search&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" class="inputbutton <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>"><?php echo esc_html_x( 'Search', 'submit button', 'woocommerce' ); ?></button>
    </div>
</form>


<?php
    echo "<h3>Nada. Try another search!</h3>";
    echo "<img src=https://sanjuandelsurmls.com/wp-content/uploads/2023/11/order-a-comps-report.png class=notfoundimage>";
    #echo "<h4>Extraordinary Deals</h4>";
    #echo do_shortcode('[featured_products]');
    #echo do_shortcode('[su_row][su_column size="1/2" center="no" class=""]Column content[/su_column] [su_column size="1/2" center="no" class=""][featured_products[/su_column][/su_row]');

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'orderby' => isset( $_GET['orderby'] ) ? sanitize_text_field( $_GET['orderby'] ) : 'date',
        'order' => 'DESC'
    );

    //$args = array(
      //'post_type' => 'product',
      //'posts_per_page' => 4,
      //'orderby' => 'date',
      //'order' => 'DESC'
    //);

    $loop = new WP_Query( $args );

    if ( $loop->have_posts() ) {
      while ( $loop->have_posts() ) : $loop->the_post();
        #wc_get_template_part( 'content', 'product' );
            the_post();
            $product = wc_get_product( get_the_id() );
            ?>

        <?php
        endwhile;

    } else {
      echo __( 'No products found' );
    }
    wp_reset_postdata();



endif;

get_footer();
