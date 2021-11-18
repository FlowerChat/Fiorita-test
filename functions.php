<?php
/**
 * PinkPetals functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PinkPetals
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'pinkpetals_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pinkpetals_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on PinkPetals, use a find and replace
		 * to change 'pinkpetals' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pinkpetals', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'pinkpetals' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'pinkpetals_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'pinkpetals_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pinkpetals_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pinkpetals_content_width', 640 );
}
add_action( 'after_setup_theme', 'pinkpetals_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pinkpetals_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pinkpetals' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pinkpetals' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pinkpetals_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pinkpetals_scripts() {
	wp_enqueue_style( 'pinkpetals-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'pinkpetals-main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css');

	wp_style_add_data( 'pinkpetals-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pinkpetals-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pinkpetals_scripts' );

/**
 * Implement the Custom fonts feature.
 */

function enqueue_custom_fonts() {
	if(!is_admin()) {
		wp_register_style('source_sans_pro', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,600&display=swap');
		wp_enqueue_style('source_sans_pro');
	}	
}

add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
/*disable woocommerce css*/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


/*shop archive loop disable all  testing*/

add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

/*function wrapping_into_container() {
	echo '<div class="container">';
}*/

add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 ); 

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_image', 10 );

function custom_loop_product_image() {
    global $product;
    $size = 'woocommerce_single';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? $product->get_image( $image_size ) : '';
}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );


add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );



/*function wrapping_into_container_end() {
	echo '</div>';
}*/


/* remove shop page title*/



add_filter('woocommerce_show_page_title', 'pinkpetals_hide_shop_page_title');
 
function pinkpetals_hide_shop_page_title($title) {
   if (is_shop()) $title = false;
   return $title;
}




//Removing anything from a product page

// Before content
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

add_action('woocommerce_before_main_content', 'pinkpetals_product_open_div', 15); 
function pinkpetals_product_open_div() {
	if (! is_product()) {
		return;
	}
	echo '<div class="container">';
	

}
  
// Left column
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
 
// Right column
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
 
// Right column - add to cart
do_action( 'woocommerce_before_add_to_cart_form' );
do_action( 'woocommerce_before_add_to_cart_button' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
 
remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
do_action( 'woocommerce_before_quantity_input_field' );
do_action( 'woocommerce_after_quantity_input_field' );
do_action( 'woocommerce_after_add_to_cart_button' );
do_action( 'woocommerce_after_add_to_cart_form' );
 
// Right column - meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
do_action( 'woocommerce_product_meta_start' );
do_action( 'woocommerce_product_meta_end' );
 
// Right column - sharing
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
do_action( 'woocommerce_share' );
 
// Tabs, upsells and related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );
do_action( 'woocommerce_product_after_tabs' );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
 
// Reviews
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
do_action( 'woocommerce_review_before_comment_text', $comment );
remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
do_action( 'woocommerce_review_after_comment_text', $comment );
 
// After content
do_action( 'woocommerce_after_single_product' );
do_action( 'woocommerce_after_main_content' );

//Building a page again






add_action('woocommerce_after_main_content', 'pinkpetals_product_close_div', 50); 
function pinkpetals_product_close_div() {
	if (! is_product()) {
		return;
	}
	echo '</div>';
	
	
}