<?php
global $tropicana_show_slider, $tropicana_show_header_image, $tropicana_navigation_menu_position, $tropicana_is_logo_container_transparent, $tropicana_navigation_menu_alignment;

$site_bound = get_theme_mod( 'tropicana-layout-site', customizer_library_get_default( 'tropicana-layout-site' ) );

// If the navigation menu opacity is 0 then it's transparent
$is_navigation_menu_transparent = get_theme_mod( 'tropicana-transparent-header', customizer_library_get_default( 'tropicana-transparent-header' ) );

if ( $is_navigation_menu_transparent && ( !$tropicana_show_slider && !$tropicana_show_header_image ) || $tropicana_navigation_menu_alignment == 'inline' ) {
	$is_navigation_menu_transparent = false;
}

$navigation_menu_classes = array();

$navigation_menu_classes[] = sanitize_html_class( get_theme_mod( 'tropicana-navigation-menu-alignment', customizer_library_get_default( 'tropicana-navigation-menu-alignment' ) ) );

if ( $is_navigation_menu_transparent ) {
	$navigation_menu_classes[] = 'transparent';	
}

if ( get_theme_mod( 'tropicana-navigation-menu-uppercase', customizer_library_get_default( 'tropicana-navigation-menu-uppercase' ) ) ) {
	$navigation_menu_classes[] = 'uppercase';
}

$navigation_menu_classes[] = sanitize_html_class( get_theme_mod( 'tropicana-navigation-menu-alignment', customizer_library_get_default( 'tropicana-navigation-menu-alignment' ) ) );
$navigation_menu_classes[] = sanitize_html_class( get_theme_mod( 'tropicana-navigation-menu-rollover-style', customizer_library_get_default( 'tropicana-navigation-menu-rollover-style' ) ) );

if ( $tropicana_show_slider || $tropicana_show_header_image ) {
	$navigation_menu_classes[] = sanitize_html_class( $tropicana_navigation_menu_position );
}

if ( $tropicana_navigation_menu_alignment != 'inline' ) {
	$navigation_menu_classes[] = 'border-bottom';
}
?>

<nav id="site-navigation" class="main-navigation left-aligned-submenu <?php echo implode( ' ', $navigation_menu_classes ); ?>" role="navigation">
	<span class="header-menu-button"><i class="otb-fa otb-fa-bars"></i></span>
	<div id="main-menu" class="main-menu-container">
		<div class="main-menu-close"><i class="otb-fa otb-fa-angle-right"></i><i class="otb-fa otb-fa-angle-left"></i></div>
		<div class="main-navigation-inner">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
        
		<div class="search-slidedown">
			<div class="container">
				<div class="padder">
					<div class="search-block">
					<?php
					if ( get_theme_mod( 'tropicana-navigation-menu-search-button', customizer_library_get_default( 'tropicana-navigation-menu-search-button' ) ) ) :
						get_search_form();
					endif;
					?>
					</div>
				</div>
			</div>
		</div>
        
	</div>
</nav><!-- #site-navigation -->
