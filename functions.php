<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

#$image = 'https://www.sanjuandelsurmls.com/wp-content/uploads/2024/01/sanjuandelsurmls-fb-og.jpeg';


// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:




#add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

#function remove_pgz_theme_support() { 
#    remove_theme_support( 'wc-product-gallery-zoom' );
#}


function add_fb_app_id() {
    ?>
    <meta property="fb:app_id" content="937573288155418">
    <?php
}
add_action('wp_head', 'add_fb_app_id');



function disable_auto_update_emails() {
  remove_action( 'auto_plugin_update_send_email', 'wp_send_update_notification_email' );
  remove_action( 'auto_theme_update_send_email', 'wp_send_update_notification_email' );
}
add_action( 'init', 'disable_auto_update_emails' );


// Create a shortcode for date
function current_date_func( $atts ){
    date_default_timezone_set("America/Managua");
    return date("M j");
}
add_shortcode( 'current_date', 'current_date_func' );



function showad_200() {
    return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6028584914434947"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:360px;height:200px"
     data-ad-client="ca-pub-6028584914434947"
     data-ad-slot="2054747888"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
}

add_shortcode('showad-200', 'showad_200');




function wpse_showad_shortcode() {
    ob_start();
    ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6028584914434947" crossorigin="anonymous"></script>
    <!-- square-single-product-onpage -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6028584914434947" data-ad-slot="4517259694" data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'showad', 'wpse_showad_shortcode' );




function wpse_showad2_shortcode() {
    ob_start();
    ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6028584914434947" crossorigin="anonymous"></script>
    <ins class="adsbygoogle" style="display:inline-block;width:360px;height:200px" data-ad-client="ca-pub-6028584914434947" data-ad-slot="2054747888"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'showad2', 'wpse_showad2_shortcode' );


function change_additional_information_heading($heading) {
    $heading = 'Property Details';
    return $heading;
}
add_filter('woocommerce_product_additional_information_heading', 'change_additional_information_heading');


function woocommerce_product_count_shortcode() {
    $product_count = wp_count_posts('product');
    $count = $product_count->publish;
    
    return $count;
}
add_shortcode('product_count', 'woocommerce_product_count_shortcode');


function change_search_form_placeholder( $html ) {
    // Get the search term from the query string
    $search_term = get_search_query();

    // Update the placeholder text
    $new_placeholder = $search_term ? $search_term : 'Keyword search';

    // Replace the placeholder value in the HTML
    $html = str_replace( 'placeholder="Keyword search"', 'placeholder="' . esc_attr( $new_placeholder ) . '"', $html );

    return $html;
}
add_filter( 'get_search_form', 'change_search_form_placeholder' );



function woocommerce_product_search_form_shortcode() {
    ob_start();
    ?>
    <form role="search" method="get" class="searchform woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="screen-reader-text" for="woocommerce-product-search-field"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
    <input class="inputwidth" type="text" value="" name="s" id="s" placeholder="Keyword search">
    <input class="inputbutton" type="submit" id="searchsubmit" value="Search">
        <input type="hidden" name="post_type" value="product" />
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'woocommerce_product_search_form', 'woocommerce_product_search_form_shortcode' );



function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Property search:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Keyword search" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

add_filter('gettext', 'wpb_rename_woocommerce_strings', 9999, 3);

function wpb_rename_woocommerce_strings($translated, $text, $domain)
{
    if ($domain == 'woocommerce' && trim($translated) == 'Description') {
        return 'What\'s MLS Mario saying...?';
    }
    return $translated;
}


// Add a filter to modify the product tabs
add_filter( 'woocommerce_product_tabs', 'change_additional_information_tab_label', 98 );

function change_additional_information_tab_label( $tabs ) {
    // Change the label of the Additional Information tab
    $tabs['additional_information']['title'] = __( 'Property Details', 'text-domain' );

    return $tabs;
}

//add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
//function woo_rename_tabs( $tabs ) {
 
   //$tabs['description']['title'] = __( 'About this property');   // Rename the Description tab
 
   //return $tabs;
 
//}

function storefront_custom_scripts() {
    if ( is_product() ) {
        wp_enqueue_script( 'storefront-single-product-nav', get_stylesheet_directory_uri() . '/js/single-product-nav.js', array( 'jquery' ), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'storefront_custom_scripts' );




add_filter( 'gettext', 'theme_change_no_products_message' );
add_filter( 'ngettext', 'theme_change_no_products_message' );

function theme_change_no_products_message( $translated ) {
   $translated = str_ireplace('No products were found matching your selection.', 'No properties were found matching your selection.', $translated);
   return $translated;
}


function display_product_sku( $atts ) {
    global $product;

    if ( empty( $product ) ) {
        return '';
    }

    return $product->get_sku();
}
add_shortcode( 'product_sku', 'display_product_sku' );





function embed_nicaragua_mls() {
    return '<iframe src="https://nicaraguamls.com/new//index.php" width="100%" height="500px" style="border:0;"></iframe>';
}
add_shortcode('nicaragua_mls', 'embed_nicaragua_mls');



function print_contact_button() {
    global $product;
    $sku = $product->get_sku();
    $y = "?sku={$sku}#contactus";
    $x = '<button class=alignright style=background-color:#ff0000!important;color:#fff!important;><a href='.$y.'>Contact Us </a></button>'; // Or any style you want to apply
    echo $x;
}

add_action( 'woocommerce_single_product_summary', 'print_contact_button', 6 );

function custom_woocommerce_gettext( $translated, $text, $domain ) {

    if ( $domain == 'woocommerce' ) {

        switch ( $translated ) {

            case 'SKU:':

                $translated = 'Property ID:';
                break;

        }

    }
    return $translated;

}
add_filter( 'gettext', 'custom_woocommerce_gettext', 20, 3 );





add_action( 'init', 'redirect_to_product_by_sku' );

function redirect_to_product_by_sku() {
    if ( isset( $_GET['sku'] ) ) {
        $sku = sanitize_text_field( $_GET['sku'] ); // Clean the SKU
        $args = array(
            'post_type'         => 'product',
            'posts_per_page'    => 1,
            'meta_query'        => array(
                array(
                    'key'   => '_sku',
                    'value' => $sku,
                ),
            ),
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            // Redirect to the product page
            while ( $query->have_posts() ) {
                $query->the_post();
                wp_redirect( get_permalink(), 301 );
                exit;
            }
        }
    }
}



add_action( 'storefront_header', 'add_my_custom_div', 40 );
function add_my_custom_div() {
	echo '<div class="my-custom-header-div"><a class="contactlinks" href=tel:50557519308>505-5751-9308</a></div>';
	#echo  do_shortcode('<span style="align:right;">[aws_search_form]</span>');
	#echo do_shortcode('[su_tooltip title="Speak with an Agent!" text="Give us a call at (505)57519308" class="headerphone" position="bottom" background="#1e73be" shadow="yes" class="headerphone"]57519308[/su_tooltip]');
	#echo do_shortcode('<div class="my-custom-header-div">[su_tooltip title="Speak with an Agent!" text="Give us a call at (505)57519308" class="headerphone" position="bottom" background="#1e73be" shadow="yes" class="headerphone"][su_list icon="icon: volume-control-phone" icon_color="#000"]<ul><li>(505)57519308</li></ul>[/su_list][/su_tooltip]</div>');
}


function change_for_sale_text($translated_text, $text, $domain) {
    if ($text === 'For_Sale') {
        $translated_text = 'For Sale';
    }

    return $translated_text;
}
add_filter('gettext', 'change_for_sale_text', 20, 3);




// Remove the sidebar from single product pages
function remove_sidebar_on_single_products( $is_active_sidebar, $index ) {
    if ( $index !== 'sidebar-1' ) {
        return $is_active_sidebar;
    }

    if ( is_product() ) { // You can use is_singular('product') as well
        return false;
    } 

    return $is_active_sidebar;
}
add_filter( 'is_active_sidebar', 'remove_sidebar_on_single_products', 10, 2 );


// Remove .00 pennies from price display
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );



// Modify text for related products
function custom_change_related_products_text( $translated_text, $text, $domain ) {
    if ( $text === 'Related products' ) {
        $translated_text = 'Other properties you may be interested in';
    }
    return $translated_text;
}
add_filter( 'gettext', 'custom_change_related_products_text', 20, 3 );

