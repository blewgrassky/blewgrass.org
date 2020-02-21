<?php
/**
 * Tropicana functions and definitions
 *
 * @package Tropicana
 */
define( 'TROPICANA_THEME_VERSION', '1.0.33' );

global $tropicana_solidify_breakpoint, $tropicana_mobile_menu_breakpoint, $tropicana_demo_slides;

if ( empty( $tropicana_demo_slides ) ) {
	$tropicana_demo_slides = array(
		'slide1' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default01.jpg',
 			'text' => sprintf( __( '<h2>On an Island in the Sun</h2><h3>We\'ll be playing and having fun</h3><p>When you\'re on a golden sea, you don\'t need no memory</p><p>Just a place to call your own, as we drift into the zone</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'tropicana' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/tropicana/' ), __( 'Read More', 'tropicana' ) )
		),
		'slide2' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default02.jpg',
			'text' => sprintf( __( '<h2>On an Island in the Sun</h2><h3>We\'ll be playing and having fun</h3><p>When you\'re on a golden sea, you don\'t need no memory</p><p>Just a place to call your own, as we drift into the zone</p><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'tropicana' ), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/tropicana/' ), __( 'Read More', 'tropicana' ) )
		),
		'slide3' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default03.jpg',
			'text' => sprintf( __( '<h2>You can\'t stop the waves</h2><h3>But you can learn to surf</h3><p><a href="%1$s" target="_blank" rel="nofollow" class="button no-bottom-margin">%2$s</a></p>', 'tropicana'), esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/tropicana/' ), __( 'Read More', 'tropicana' ) )
		)
	);
}

if ( ! function_exists( 'tropicana_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tropicana_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 837; /* pixels */
	}
	
	add_editor_style( array( 'library/css/editor-style.css', tropicana_fonts_url() ) );
	
	if ( !get_theme_mod( 'otb_tropicana_dot_org' ) ) set_theme_mod( 'otb_tropicana_dot_org', true );
	if ( !get_theme_mod( 'otb_tropicana_activated' ) ) set_theme_mod( 'otb_tropicana_activated', date('Y-m-d') );
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tropicana, use a find and replace
	 * to change 'tropicana' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tropicana', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tropicana' ),
		'footer-bottom-bar-right' => __( 'Footer Bottom Bar - Right', 'tropicana' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		)
	);
	
	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}
	
	// The custom header is used if no slider is enabled
	add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/library/images/headers/default04.jpg',
		'width'         => 1920,
		'height'        => 905,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
		'video' 		=> false
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tropicana_custom_background_args', array(
		'default-image' => ''
	) ) );
    
    add_theme_support( 'title-tag' );

	// Gutenberg Support
    add_theme_support( 'align-wide' );
    
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'tropicana-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}	
	
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
}
endif; // tropicana_theme_setup
add_action( 'after_setup_theme', 'tropicana_theme_setup' );

if ( ! function_exists( 'tropicana_fonts_url' ) ) :
	/**
	 * Register custom fonts.
	 */
	function tropicana_fonts_url() {
		$fonts_url = '';
	
		$font_families = array();
	
		$font_families[] = 'Roboto Slab:100,300,400,500,600,700,800';
		$font_families[] = 'Roboto:100,300,400,500,600,700,800';
		$font_families[] = 'Open Sans:300,300italic,400,400italic,600,600italic,700,700italic';
		$font_families[] = 'Lora:400italic';
	
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
	
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
		return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Enqueue admin scripts and styles.
 */
function tropicana_admin_scripts( $hook ) {
	wp_enqueue_style( 'tropicana-admin-css', get_template_directory_uri() . '/library/css/admin.css', array(), TROPICANA_THEME_VERSION );
	wp_enqueue_script( 'tropicana-admin-js', get_template_directory_uri() . '/library/js/admin.js', TROPICANA_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'tropicana_admin_scripts' );

// Adjust content_width for full width pages
function tropicana_adjust_content_width() {
    global $content_width;

	if ( tropicana_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

    if ( is_page_template( 'template-full-width.php' ) || is_page_template( 'template-full-width-no-bottom-margin.php' ) ) {
    	$content_width = 1140;
	} else if ( ( is_page_template( 'template-left-primary-sidebar.php' ) || basename( get_page_template() ) === 'page.php' ) && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	} else if ( tropicana_is_woocommerce_activated() && is_shop() && get_theme_mod( 'tropicana-layout-woocommerce-shop-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-shop-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( tropicana_is_woocommerce_activated() && is_product() && get_theme_mod( 'tropicana-layout-woocommerce-product-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-product-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( tropicana_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'tropicana-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( tropicana_is_woocommerce_activated() && !is_active_sidebar( 'shop-sidebar' ) && ( is_shop() && !get_theme_mod( 'tropicana-layout-woocommerce-shop-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-shop-full-width' ) ) || is_product() && !get_theme_mod( 'tropicana-layout-woocommerce-product-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-product-full-width' ) ) ) ) {
		$content_width = 1140;
	}
}
add_action( 'template_redirect', 'tropicana_adjust_content_width' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function tropicana_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'otb-dashboard-news', // Widget slug.
		__( 'Out the Box News', 'tropicana' ), // Title.
		'otb_dashboard_news' // Display function.
	);
	
	// Move the Out the Box widget to the top
	global $wp_meta_boxes;

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$ours      = array( 'otb-dashboard-news' => $dashboard['otb-dashboard-news'] );
	unset($dashboard['otb-dashboard-news']);

	$wp_meta_boxes['dashboard']['normal']['core'] = array_merge( $ours, $dashboard ); // WPCS: override ok.
}
add_action( 'wp_dashboard_setup', 'tropicana_add_dashboard_widgets', 20 );

/**
 * Create the function to output the contents of your Dashboard Widget.
 */
function otb_dashboard_news() {
	$feed = array(
		array(
			'url'          => 'https://www.outtheboxthemes.com/feed/',
			'items'        => 4,
			'show_summary' => 0,
			'show_author'  => 0,
			'show_date'    => 1,
		),
	);

	wp_dashboard_primary_output( 'otb_dashboard_widget_news', $feed );

	if( function_exists( 'wp_print_community_events_markup' ) ) {
		?>
		<p class="community-events-footer">
			<?php
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/blog/' ),
				__( 'Blog', 'tropicana' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'tropicana' )
			);
			echo ' | ';

			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				esc_url( 'https://www.outtheboxthemes.com/documentation/tropicana/' ),
				__( 'Documentation', 'tropicana' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'tropicana' )
			);
			echo ' | ';
			
			printf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer" style="color: #2ebd59">%2$s <span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
				/* translators: If a Rosetta site exists (e.g. https://es.wordpress.org/news/), then use that. Otherwise, leave untranslated. */
				esc_url( 'https://www.outtheboxthemes.com/wordpress-themes/tropicana/' ),
				__( 'Get Premium', 'tropicana' ),
				/* translators: accessibility text */
				__( '(opens in a new window)', 'tropicana' )
			);
			?>
		</p>
		<?php
	}	
}

function tropicana_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Tropicana! We hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/tropicana/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'tropicana_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?tropicana-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_tropicana_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'tropicana_review_notice' );
}

function tropicana_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['tropicana-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'tropicana_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'tropicana_review_notice_dismissed' );

function tropicana_admin_notice() {
	$user_id = get_current_user_id();
	
	$message = array (
		'id' => 3,
		'text' => 'Start the new year off with a bang with our <a href="https://www.outtheboxthemes.com/go/theme-notification-2020-sale-wordpress-themes/">2020 20% off sale</a> until the end of January!'
	);
	
	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'tropicana_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice otb-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><div class="container"><img src="https://www.outtheboxthemes.com/wp-content/uploads/2018/02/logo-charcoal.png" class="logo" /><p>%2$s <a href="?tropicana-admin-notice-dismissed&tropicana-admin-notice-id=%3$s" class="dismiss">Dismiss this notice</a></p></div></div>', esc_attr( $class ), $message['text'], $message['id'] );
	}
}

if ( date('Y-m-d') <= '2020-01-31' ) {
	add_action( 'admin_notices', 'tropicana_admin_notice' );
}

function tropicana_admin_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['tropicana-admin-notice-dismissed'] ) ) {
    	$tropicana_admin_notice_id = $_GET['tropicana-admin-notice-id'];
		add_user_meta( $user_id, 'tropicana_admin_notice_' .$tropicana_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'tropicana_admin_notice_dismissed' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tropicana_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'tropicana' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'This sidebar will appear on the Blog or any page that uses either the Default or Left Primary Sidebar template.', 'tropicana' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer', 'tropicana' ),
		'id' => 'footer',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div><div class="divider"></div>' 
	));
}
add_action( 'widgets_init', 'tropicana_widgets_init' );

function tropicana_set_variables() {
	global $tropicana_solidify_breakpoint, $tropicana_mobile_menu_breakpoint;
	
	$tropicana_mobile_menu_breakpoint = 1000;
	$tropicana_solidify_breakpoint = 1000;
}
add_action('init', 'tropicana_set_variables', 10);

/**
 * Enqueue scripts and styles.
 */
function tropicana_theme_scripts() {
	global $tropicana_solidify_breakpoint;
	
	// Add custom fonts, used in the main stylesheet
	wp_enqueue_style( 'tropicana-fonts', tropicana_fonts_url(), array(), TROPICANA_THEME_VERSION );
	
    if ( get_theme_mod( 'tropicana-header-show-top-bar', customizer_library_get_default( 'tropicana-header-show-top-bar' ) ) ) {
    	wp_enqueue_style( 'tropicana-top-bar', get_template_directory_uri().'/library/css/top-bar.css', array(), TROPICANA_THEME_VERSION );
    }
    
	wp_enqueue_style( 'tropicana-header-left-aligned', get_template_directory_uri().'/library/css/header-left-aligned.css', array(), TROPICANA_THEME_VERSION );
    
	wp_enqueue_style( 'otb-font-awesome-otb-font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/otb-font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'otb-font-awesome-font-awesome-min', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
	
	wp_enqueue_style( 'tropicana-style', get_stylesheet_uri(), array(), TROPICANA_THEME_VERSION );
	
	if ( tropicana_is_woocommerce_activated() ) {
    	wp_enqueue_style( 'tropicana-woocommerce-custom', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), TROPICANA_THEME_VERSION );
	}

	wp_enqueue_script( 'tropicana-navigation-js', get_template_directory_uri() . '/library/js/navigation.js', array(), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'jquery-caroufredsel-js', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'jquery-touchswipe-js', get_template_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'jquery-color-js', get_template_directory_uri() . '/library/js/jquery.color.min.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'tropicana-fittext-js', get_template_directory_uri() . '/library/js/jquery.otbfittext.min.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'tropicana-fitbutton-js', get_template_directory_uri() . '/library/js/jquery.fitbutton.min.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	wp_enqueue_script( 'tropicana-custom-js', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), TROPICANA_THEME_VERSION, true );
	
    $tropicana_client_side_variables = array(
    	'site_url' => site_url(),
    	'page_on_front' => get_post( get_option( 'page_on_front' ) )->post_name,
    	'site_branding_padding_top' => intval( get_theme_mod( 'site_branding_padding_top', customizer_library_get_default( 'site_branding_padding_top' ) ) ),
    	'site_branding_padding_bottom' => intval( get_theme_mod( 'site_branding_padding_bottom', customizer_library_get_default( 'site_branding_padding_bottom' ) ) ),
    	'solidify_breakpoint' => $tropicana_solidify_breakpoint
    );
    
    wp_localize_script( 'tropicana-custom-js', 'tropicana', $tropicana_client_side_variables );

	wp_enqueue_script( 'tropicana-skip-link-focus-fix-js', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), TROPICANA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tropicana_theme_scripts' );

/**
 * Load Gutenberg stylesheet.
*/
function tropicana_gutenberg_assets() {
	wp_enqueue_style( 'tropicana-gutenberg-editor', get_theme_file_uri( '/library/css/gutenberg-editor-style.css' ), false, TROPICANA_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/library/includes/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'tropicana_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

// Include TRT Customize Pro library
require_once( get_template_directory() . '/trt-customize-pro/class-customize.php' );

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/upgrade/upgrade.php';

/**
 * Enqueue Tropicana custom customizer styling.
 */
function tropicana_load_customizer_script() {
    wp_enqueue_script( 'tropicana-customizer-custom-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), TROPICANA_THEME_VERSION, true );
    wp_enqueue_style( 'tropicana-customizer', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css', array(), TROPICANA_THEME_VERSION );
}    
add_action( 'customize_controls_enqueue_scripts', 'tropicana_load_customizer_script' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tropicana_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tropicana_pingback_header' );

if ( ! function_exists( 'tropicana_load_dynamic_css' ) ) :

	/**
	 * Add Dynamic CSS
	 */
	function tropicana_load_dynamic_css() {
		global $tropicana_solidify_breakpoint, $tropicana_mobile_menu_breakpoint;
		
		$tropicana_slider_has_min_width 	  = get_theme_mod( 'tropicana-slider-has-min-width', customizer_library_get_default( 'tropicana-slider-has-min-width' ) );
		$tropicana_slider_min_width 		  = get_theme_mod( 'tropicana-slider-min-width', customizer_library_get_default( 'tropicana-slider-min-width' ) );
		$tropicana_header_image_has_min_width = get_theme_mod( 'tropicana-header-image-has-min-width', customizer_library_get_default( 'tropicana-header-image-has-min-width' ) );
		$tropicana_header_image_min_width 	  = get_theme_mod( 'tropicana-header-image-min-width', customizer_library_get_default( 'tropicana-header-image-min-width' ) );
		
		$include_dir;
		
		wp_register_style( 'out-the-box-dynamic', false );
		wp_enqueue_style( 'out-the-box-dynamic' );
		
		if ( file_exists( get_stylesheet_directory() . '/library/includes/dynamic-css.php' ) ) {
			$include_dir = get_stylesheet_directory();
		} else {
			$include_dir = get_template_directory();
		}
		
		ob_start(); // turn on output buffering
		include( $include_dir . '/library/includes/dynamic-css.php' );
		$css = ob_get_contents(); // get the contents of the output buffer
		ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering
		
		wp_add_inline_style( 'out-the-box-dynamic', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'tropicana_load_dynamic_css' );

// Function to check that it's not a single post or the category, tag or author page
if ( ! function_exists( 'tropicana_not_secondary_blog_page' ) ) :
	function tropicana_not_secondary_blog_page() {
		return ( !is_single() && !is_category() && !is_tag() && !is_author() );
	}
endif;

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'tropicana_is_woocommerce_activated' ) ) :
	function tropicana_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) {
	    	return true;
		} else {
			return false;
		}
	}
endif; // tropicana_is_woocommerce_activated

if ( tropicana_is_woocommerce_activated() ) {
    require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

// Add CSS class to body by filter
function tropicana_add_body_class( $classes ) {
	$classes[] = sanitize_html_class( get_theme_mod( 'tropicana-paragraph-line-height', customizer_library_get_default( 'tropicana-paragraph-line-height' ) ) );
	$classes[] = sanitize_html_class( get_theme_mod( 'tropicana-widget-border-style', customizer_library_get_default( 'tropicana-widget-border-style' ) ) );
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}

	if ( get_theme_mod( 'tropicana-media-crisp-images', customizer_library_get_default( 'tropicana-media-crisp-images' ) ) ) {
		$classes[] = 'crisp-images';
	}
	
	if ( get_theme_mod( 'tropicana-page-builders-use-theme-styles', customizer_library_get_default( 'tropicana-page-builders-use-theme-styles' ) ) ) {
		$classes[] = 'tropicana-page-builders-use-theme-styles';
	}
	
	if ( tropicana_is_woocommerce_activated() && is_shop() && get_theme_mod( 'tropicana-layout-woocommerce-shop-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'tropicana-shop-full-width';
	}
	
	if ( tropicana_is_woocommerce_activated() && is_product() && get_theme_mod( 'tropicana-layout-woocommerce-product-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'tropicana-product-full-width';
	}

	if ( tropicana_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'tropicana-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'tropicana-shop-full-width';
	}
	
	if ( !get_theme_mod( 'tropicana-woocommerce-breadcrumbs', customizer_library_get_default( 'tropicana-woocommerce-breadcrumbs' ) ) ) {
		$classes[] = 'tropicana-shop-no-breadcrumbs';
	}
	
	if ( tropicana_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

	if ( tropicana_is_woocommerce_activated() && is_shop() && !is_active_sidebar( 'shop-sidebar' ) && !get_theme_mod( 'tropicana-layout-woocommerce-shop-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'full-width';
	} else if ( tropicana_is_woocommerce_activated() && is_product() && !is_active_sidebar( 'shop-sidebar' ) && !get_theme_mod( 'tropicana-layout-woocommerce-product-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'full-width';
	} else if ( tropicana_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && !is_active_sidebar( 'shop-sidebar' ) && !get_theme_mod( 'tropicana-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'tropicana-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'tropicana_add_body_class' );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	echo '<div class="hiddenUntilLoadedImageContainer loading">';
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	echo '</div>';
}, 11 );

// Set the number or products per page
function tropicana_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = intval( get_theme_mod( 'tropicana-woocommerce-products-per-page' ) );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'tropicana_loop_shop_per_page', 20 );

if (!function_exists('tropicana_woocommerce_product_thumbnails_columns')) {
	function tropicana_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'tropicana_woocommerce_product_thumbnails_columns' );

/**
 * Replace Read more buttons for out of stock items
 */
// Display an Out of Stock label on out of stock products
add_action( 'woocommerce_after_shop_loop_item_title', 'tropicana_out_of_stock_notice', 10 );
function tropicana_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo esc_html_e( 'Out of Stock', 'tropicana' );
		echo '</p>';
    }
}

// Set the blog excerpt length
function tropicana_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	} else {
		return intval( get_theme_mod( 'tropicana-blog-excerpt-length', customizer_library_get_default( 'tropicana-blog-excerpt-length' ) ) );
	}
}
add_filter( 'excerpt_length', 'tropicana_excerpt_length', 999 );

// Set the blog excerpt read more text
function tropicana_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	} else {
		return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html( pll__( get_theme_mod( 'tropicana-blog-read-more-text', customizer_library_get_default( 'tropicana-blog-read-more-text' ) ) ) ) . '</a>';
	}
}
add_filter( 'excerpt_more', 'tropicana_excerpt_more' );

/**
 * Adjust is_home query if tropicana-slider-categories is set
 */
function tropicana_set_blog_queries( $query ) {
    $slider_categories = get_theme_mod( 'tropicana-slider-categories' );
    $slider_type 	   = get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) );
    
    if ( $slider_categories && $slider_type == 'tropicana-slider-default' ) {
    	
    	$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
    	
    	if ( count($slider_categories) > 0) {
    		// do not alter the query on wp-admin pages and only alter it if it's the main query
    		if ( !is_admin() && !$is_front_page  && $query->get('id') != 'slider' || !is_admin() && $is_front_page && $query->get('id') != 'slider' ){
				$query->set( 'category__not_in', $slider_categories );
    		}
    	}
    }
	    
}
add_action( 'pre_get_posts', 'tropicana_set_blog_queries' );

function tropicana_filter_recent_posts_widget_parameters( $params ) {
	$slider_categories = get_theme_mod( 'tropicana-slider-categories' );
    $slider_type 	   = get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'tropicana-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter( 'widget_posts_args', 'tropicana_filter_recent_posts_widget_parameters' );

/**
 * Adjust the widget categories query if tropicana-slider-categories is set
 */
function tropicana_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'tropicana-slider-categories' );
    $slider_type 	   = get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'tropicana-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter( 'widget_categories_args', 'tropicana_set_widget_categories_args' );

function tropicana_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'tropicana-slider-categories' );
    $slider_type 	   = get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'tropicana-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter( 'widget_categories_dropdown_args', 'tropicana_set_widget_categories_dropdown_arg' );

if ( ! function_exists( 'tropicana_add_menu_items' ) ) :
	function tropicana_add_menu_items( $items, $args ) {
		
	    if ( $args->theme_location == 'primary' ) {
	
			if( get_theme_mod( 'tropicana-navigation-menu-search-button', customizer_library_get_default( 'tropicana-navigation-menu-search-button' ) ) ) :
				$items .= '<li class="search-button">';
		        $items .= '<a href="">';
		        $items .= esc_html( pll__( get_theme_mod( 'tropicana-navigation-menu-search-button-text', customizer_library_get_default( 'tropicana-navigation-menu-search-button-text' ) ) ) ); 
		        $items .= '<i class="otb-fa otb-fa-search search-btn"></i>';
		        $items .= '</a>';
		        $items .= '</li>';
			endif;
	
	    }
	    return $items;
	}
endif;
add_filter( 'wp_nav_menu_items', 'tropicana_add_menu_items', 10, 2 );

function tropicana_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => __( 'Elementor Page Builder', 'tropicana' ),
			'slug'      => 'elementor',
			'required'  => false
		),
		array(
			'name'      => __( 'Page Builder by SiteOrigin', 'tropicana' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'tropicana' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'Recent Posts Widget Extended', 'tropicana' ),
			'slug'      => 'recent-posts-widget-extended',
			'required'  => false
		),
		array(
			'name'      => __( 'Beam me up Scotty', 'tropicana' ),
			'slug'      => 'beam-me-up-scotty',
			'required'  => false
		),
		array(
			'name'      => __( 'WPForms', 'tropicana' ),
			'slug'      => 'wpforms-lite',
			'required'  => false
		),
		array(
			'name'      => __( 'Photo Gallery by Supsystic', 'tropicana' ),
			'slug'      => 'gallery-by-supsystic',
			'required'  => false
		),
		array(
			'name'      => __( 'Recent Posts Widget Extended', 'tropicana' ),
			'slug'      => 'recent-posts-widget-extended',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'tropicana' ),
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => __( 'Instagram Slider Widget', 'tropicana' ),
			'slug'      => 'instagram-slider-widget',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'tropicana',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tropicana_register_required_plugins' );

/**
 * Determine if Custom Post Type
 * usage: if ( is_this_a_custom_post_type() )
 *
 * References/Modified from:
 * @link https://codex.wordpress.org/Function_Reference/get_post_types
 * @link http://wordpress.stackexchange.com/users/73/toscho <== love this person!
 * @link http://wordpress.stackexchange.com/a/95906/64742
 */
function tropicana_is_this_a_custom_post_type( $post = NULL ) {

    $all_custom_post_types = get_post_types( array ( '_builtin' => false ) );

    //* there are no custom post types
    if ( empty ( $all_custom_post_types ) ) return false;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    //* could not detect current type
    if ( ! $current_post_type )
        return false;

    return in_array( $current_post_type, $custom_types );
}

/**
 * Remove blog menu link class 'current_page_parent' when on an unrelated CPT
 * or search results page
 * or 404 page
 * dep: is_this_a_custom_post_type() function
 * modified from: https://gist.github.com/ajithrn/1f059b2201d66f647b69
 */
function tropicana_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link( $classes, $item, $args ) {
    if ( tropicana_is_this_a_custom_post_type() || is_search() || is_404() ) {
        $blog_page_id = intval( get_option('page_for_posts') );

        if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
			unset( $classes[array_search( 'current_page_parent', $classes )] );
        }

	}

    return $classes;
}
add_filter( 'nav_menu_css_class', 'tropicana_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link', 10, 3 );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function tropicana_pll_register_string() {
		// Header
		pll_register_string( 'tropicana-header-info-text-one', get_theme_mod( 'tropicana-header-info-text-one' ), 'tropicana', false );
		
		// Search
		pll_register_string( 'tropicana-navigation-menu-search-button-text', get_theme_mod( 'tropicana-navigation-menu-search-button-text' ), 'tropicana', false );
		pll_register_string( 'tropicana-search-placeholder-text', get_theme_mod( 'tropicana-search-placeholder-text' ), 'tropicana', false );
		pll_register_string( 'tropicana-website-text-no-search-results-heading', get_theme_mod( 'tropicana-website-text-no-search-results-heading' ), 'tropicana', false );
		pll_register_string( 'tropicana-website-text-no-search-results-text', get_theme_mod( 'tropicana-website-text-no-search-results-text' ), 'tropicana', true );
		
		// Header media
		pll_register_string( 'tropicana-header-image-text', get_theme_mod( 'tropicana-header-image-text' ), 'tropicana', true );
		
		// Blog read more
		pll_register_string( 'tropicana-blog-read-more-text', get_theme_mod( 'tropicana-blog-read-more-text' ), 'tropicana', true );
		
		// 404
		pll_register_string( 'tropicana-website-text-404-page-heading', get_theme_mod( 'tropicana-website-text-404-page-heading' ), 'tropicana', true );
		pll_register_string( 'tropicana-website-text-404-page-text', get_theme_mod( 'tropicana-website-text-404-page-text' ), 'tropicana', true );
	}
	add_action( 'after_setup_theme', 'tropicana_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}
