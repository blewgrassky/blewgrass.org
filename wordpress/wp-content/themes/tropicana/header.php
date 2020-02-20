<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tropicana
 */
?><!DOCTYPE html><!-- Tropicana -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php
global $tropicana_show_slider, $tropicana_slider_type, $tropicana_navigation_menu_alignment;
$tropicana_show_slider = false;

// Check if a slider should display
// If it's the homepage and the default slider is active
if ( is_front_page() && get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) ) == 'tropicana-slider-default' ) {
	$tropicana_show_slider = true;
	$tropicana_slider_type = 'default';
	
// If it's the homepage and the plugin slider is active and there's a shortcode
} else if ( is_front_page() && get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) ) == 'tropicana-slider-plugin' && get_theme_mod( 'tropicana-slider-plugin-shortcode', customizer_library_get_default( 'tropicana-slider-plugin-shortcode' ) ) != '' ) {
	$tropicana_show_slider = true;
	$tropicana_slider_type = 'plugin';
}

global $tropicana_show_header_image;
$tropicana_show_header_image = false;

// Check if a header image should display
// If it's the homepage and a header image has been set and the slider is disabled
if ( is_front_page() && get_header_image() && get_theme_mod( 'tropicana-slider-type', customizer_library_get_default( 'tropicana-slider-type' ) ) == 'tropicana-no-slider' ) {
	$tropicana_show_header_image = true;
}

global $is_logo_container_transparent;

$is_logo_container_transparent = get_theme_mod( 'tropicana-transparent-header', customizer_library_get_default( 'tropicana-transparent-header' ) );

if ( $is_logo_container_transparent && !$tropicana_show_slider && !$tropicana_show_header_image ) {
	$is_logo_container_transparent = false;
}

$header_classes = array();
$tropicana_navigation_menu_alignment = get_theme_mod( 'tropicana-navigation-menu-alignment', customizer_library_get_default( 'tropicana-navigation-menu-alignment' ) );

if ( $is_logo_container_transparent ) {
	$header_classes[] = 'transparent ';
}

?>

<header id="masthead" class="site-header left-aligned <?php echo $tropicana_show_slider || $tropicana_show_header_image ? 'has-header-media' : ''; ?> <?php echo ( $tropicana_show_slider && $tropicana_slider_type == 'default' ) || $tropicana_show_header_image ? 'forced-solid' : ''; ?> <?php echo implode( ' ', $header_classes ); ?>" role="banner">
    
    <?php
    // If the Navigation Menu alignment is set to inline then load the inline header include
    if ( get_theme_mod( 'tropicana-navigation-menu-alignment', customizer_library_get_default( 'tropicana-navigation-menu-alignment' ) ) == 'inline' ) {
		get_template_part( 'library/template-parts/header', 'inline' );
	} else {
		get_template_part( 'library/template-parts/header', 'left-aligned' );
	}
	?>
    
</header><!-- #masthead -->

<script type='text/javascript'>
/* <![CDATA[ */
	var tropicanaSliderTransitionSpeed = parseInt(<?php echo intval( get_theme_mod( 'tropicana-slider-transition-speed', customizer_library_get_default( 'tropicana-slider-transition-speed' ) ) ); ?>);
/* ]]> */
</script>

<?php
if ( $tropicana_show_slider ) :
	get_template_part( 'library/template-parts/slider' );
elseif ( $tropicana_show_header_image ) :
	get_template_part( 'library/template-parts/header-image' );
endif;

$page_template = basename( get_page_template() );
$no_sidebar = false;

if ( ( $page_template == 'template-left-sidebar.php' && !is_active_sidebar( 'sidebar-1' ) ) ) {
	$no_sidebar = true;
}
?>

<div class="content-container <?php echo $tropicana_show_slider || $tropicana_show_header_image ? 'has-header-media' : ''; ?> <?php echo ( $tropicana_show_slider || $tropicana_show_header_image ) ? 'extra-padded' : ''; ?>">
	<div id="content" class="site-content site-container <?php echo ( $no_sidebar ) ? 'no-sidebar' : ''; ?>">