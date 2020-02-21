<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function tropicana_customizer_library_options() {
	global $tropicana_top_bar_color, $tropicana_widget_title_content_font_color, $tropicana_widget_title_sidebar_font_color, $tropicana_widget_title_underline_color, $tropicana_navigation_menu_rollover_background_color;
	
	// Theme defaults
	$page_content_background_color = '#FFFFFF';
	
	// Top Bar
	$tropicana_top_bar_color = '#8ea535';
	$top_bar_font_color = '#FFFFFF';
	
	// Header
	$header_border_bottom_color = '#cacfd0';
	
	// Site Logo Area
	$header_color = '#FFFFFF';
	$site_title_font_color = '#8ea535';
	$header_transparent_site_title_font_color = '#8ea535';
	
	$header_solid_link_font_color = '#8ea535';
	$header_solid_link_rollover_font_color = '#7f9430';
	
	$header_solid_font_color = '#1A1A1A';
	$header_transparent_font_color = '#FFFFFF';
	
	// Navigation Menu
	$navigation_menu_color = '#F1F1F0';
	$navigation_menu_solid_font_color = '#1A1A1A';
	$navigation_menu_transparent_font_color = '#FFFFFF';
	$tropicana_navigation_menu_rollover_background_color = '#8ea535';
	$navigation_menu_rollover_font_color = '#8ea535';
	
	$navigation_menu_border_top_color = '#cacfd0';
	$navigation_menu_transparent_border_top_color = '#FFFFFF';
	
	$navigation_menu_border_bottom_color = '#cacfd0';
	$navigation_menu_transparent_border_bottom_color = '#FFFFFF';
	
	$background_color = '#FFFFFF';
	$primary_color = '#8ea535';
	$secondary_color = '#7f9430';
	$link_color = '#8ea535';
	$link_rollover_color = '#7f9430';
	
	// Slider
	$slider_text_overlay_font_color = '#FFFFFF';
	$slider_overlay_background_color = '#000000';
	$slider_text_overlay_background_color = '#000000';

	// Header Image
	$header_image_text_overlay_font_color = '#FFFFFF';
	$header_image_overlay_background_color = '#000000';
	$header_image_text_overlay_background_color = '#000000';

	$footer_color = '#8ea535';
	$footer_font_color = '#FFFFFF';

	// Fonts
    $body_font_color = '#1a1a1a';
    $page_title_font_color = '#000000';
    $heading_font_color = '#8ea535';
    $form_input_font_color = '#1a1a1a';
    $tropicana_widget_title_content_font_color = '#000000';
    $tropicana_widget_title_sidebar_font_color = '#000000';
    $tropicana_widget_title_underline_color = '#8ea535';
    
    $slider_shortcode = null;

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$dividerCount = 0;
	
	// Site Identity
	$section = 'title_tagline';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Identity', 'tropicana' ),
		'priority' => '25'
	);
	
	if ( ! function_exists( 'has_custom_logo' ) ) {
		$options['tropicana-logo'] = array(
			'id' => 'tropicana-logo',
			'label'   => __( 'Logo', 'tropicana' ),
			'section' => $section,
			'type'    => 'image'
		);
	}
    
    // Colors Settings
    $panel = 'tropicana-colors';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Colors', 'tropicana' ),
    	'priority' => '30'
    );
    
    	// General Settings - Sub-section
	    $section = 'tropicana-general-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'General', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['tropicana-background-color'] = array(
			'id' => 'tropicana-background-color',
			'label'   => __( 'Background Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $background_color
		);
		
		$options['tropicana-primary-color'] = array(
			'id' => 'tropicana-primary-color',
			'label'   => __( 'Primary Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $primary_color
		);	    

		$options['tropicana-secondary-color'] = array(
			'id' => 'tropicana-secondary-color',
			'label'   => __( 'Secondary Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $secondary_color
		);
		
    	// Site Logo Area - Sub-section
	    $section = 'tropicana-site-logo-area-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Logo Area', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['tropicana-header-color'] = array(
			'id' => 'tropicana-header-color',
			'label'   => __( 'Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $header_color
		);

	    $options['tropicana-site-title-font-color'] = array(
	    	'id' => 'tropicana-site-title-font-color',
	    	'label'   => __( 'Site Title Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $site_title_font_color
	    );
	    
	    $options['tropicana-header-solid-font-color'] = array(
	    	'id' => 'tropicana-header-solid-font-color',
	    	'label'   => __( 'Solid - Font Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $header_solid_font_color,
	    	'description' => __( 'This is the color that the text will be when the site logo area is solid', 'tropicana' )
	    );
	    
	    $options['tropicana-header-transparent-font-color'] = array(
	    	'id' => 'tropicana-header-transparent-font-color',
	    	'label'   => __( 'Transparent - Font Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $header_transparent_font_color,
	    	'description' => __( 'This is the color that the text will be when the site logo area is transparent', 'tropicana' )
	    );
	    
    	// Navigation Menu - Sub-section
	    $section = 'tropicana-navigation-menu-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
		$options['tropicana-navigation-menu-color'] = array(
			'id' => 'tropicana-navigation-menu-color',
			'label'   => __( 'Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $navigation_menu_color
		);
		
	    $options['tropicana-navigation-menu-solid-font-color'] = array(
	    	'id' => 'tropicana-navigation-menu-solid-font-color',
	    	'label'   => __( 'Solid - Font Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $navigation_menu_solid_font_color,
	    	'description' => __( 'This is the color that the text will be when the navigation menu is solid', 'tropicana' )
	    );
	
	    $options['tropicana-navigation-menu-transparent-font-color'] = array(
	    	'id' => 'tropicana-navigation-menu-transparent-font-color',
	    	'label'   => __( 'Transparent - Font Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $navigation_menu_transparent_font_color,
	    	'description' => __( 'This is the color that the text will be when the navigation menu is transparent', 'tropicana' )
	    );
	    
    	// Page Content - Sub-section
	    $section = 'tropicana-page-content-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Content', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['tropicana-page-title-font-color'] = array(
	    	'id' => 'tropicana-page-title-font-color',
	    	'label'   => __( 'Page Title / Widget Title Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $page_title_font_color
	    );
	    
	    $options['tropicana-heading-font-color'] = array(
	    	'id' => 'tropicana-heading-font-color',
	    	'label'   => __( 'Heading Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $heading_font_color
	    );
	    
	    $options['tropicana-body-font-color'] = array(
	    	'id' => 'tropicana-body-font-color',
	    	'label'   => __( 'Body Text Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $body_font_color
	    );
	    
		$options['tropicana-link-color'] = array(
			'id' => 'tropicana-link-color',
			'label'   => __( 'Link Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $link_color
		);
		
		$options['tropicana-link-rollover-color'] = array(
			'id' => 'tropicana-link-rollover-color',
			'label'   => __( 'Link Rollover Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $link_rollover_color
		);
	    
	    $options['tropicana-form-input-font-color'] = array(
	    	'id' => 'tropicana-form-input-font-color',
	    	'label'   => __( 'Form Input Text Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $form_input_font_color
	    );
		
    	// Footer - Sub-section
	    $section = 'tropicana-footer-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Footer', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
		$options['tropicana-footer-color'] = array(
			'id' => 'tropicana-footer-color',
			'label'   => __( 'Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $footer_color
		);
		
	    $options['tropicana-footer-font-color'] = array(
	    	'id' => 'tropicana-footer-font-color',
	    	'label'   => __( 'Font Color', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $footer_font_color
	    );
		
		
    // Fonts Settings
    $panel = 'tropicana-fonts';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Fonts', 'tropicana' ),
    	'priority' => '30'
    );
    
    	// Site Title - Sub-section
	    $section = 'tropicana-site-title-fonts';
	    $font_choices = customizer_library_get_font_choices();
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Title', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-site-title-font'] = array(
	    	'id' => 'tropicana-site-title-font',
	    	'label'   => __( 'Font', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $font_choices,
	    	'default' => 'Roboto Slab'
	    );
	    
		$options['tropicana-site-title-font-size'] = array(
			'id' => 'tropicana-site-title-font-size',
			'label'   => __( 'Size', 'tropicana' ),
			'section' => $section,
			'type'    => 'pixels',
			'default' => 37
		);	    
	
	    $options['tropicana-site-title-uppercase'] = array(
	    	'id' => 'tropicana-site-title-uppercase',
	    	'label'   => __( 'Uppercase', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 0
	    );
    
    	// Navigation Menu - Sub-section
	    $section = 'tropicana-navigation-menu-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['tropicana-navigation-menu-font'] = array(
	    	'id' => 'tropicana-navigation-menu-font',
	    	'label'   => __( 'Font', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $font_choices,
	    	'default' => 'Roboto'
	    );
	    
	    $options['tropicana-navigation-menu-uppercase'] = array(
	    	'id' => 'tropicana-navigation-menu-uppercase',
	    	'label'   => __( 'Uppercase', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1
	    );
	    
    	// Page Title - Sub-section
	    $section = 'tropicana-page-title-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Title', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-page-title-font'] = array(
	    	'id' => 'tropicana-page-title-font',
	    	'label'   => __( 'Font', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $font_choices,
	    	'default' => 'Roboto'
	    );
	    
    	// Heading - Sub-section
	    $section = 'tropicana-heading-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Heading', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-heading-font'] = array(
	    	'id' => 'tropicana-heading-font',
	    	'label'   => __( 'Font', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $font_choices,
	    	'default' => 'Roboto Slab'
	    );
	    
    	// Body Text - Sub-section
	    $section = 'tropicana-body-fonts';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Body Text', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-body-font'] = array(
	    	'id' => 'tropicana-body-font',
	    	'label'   => __( 'Font', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $font_choices,
	    	'default' => 'Roboto'
	    );

    // Styling Settings
    $panel = 'tropicana-styling';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Styling', 'tropicana' ),
    	'priority' => '30'
    );
    
    	// Paragraph - Sub-section
	    $section = 'tropicana-styling-paragraph';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Paragraph', 'tropicana' ),
	    	'panel' => $panel
	    );
	    
	    $choices = array(
	    	'cozy-paragraph-line-height' => 'Cozy',
	    	'comfortable-paragraph-line-height' => 'Comfortable'
	    );
	    $options['tropicana-paragraph-line-height'] = array(
	    	'id' => 'tropicana-paragraph-line-height',
	    	'label'   => __( 'Line Height', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'comfortable-paragraph-line-height'
	    );

    	// Widgets - Sub-section
	    $section = 'tropicana-styling-widget';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Widget', 'tropicana' ),
	    	'panel' => $panel
	    );

	    $choices = array(
	    	'widget-bottom-border' => 'Bottom',
	    	'widget-box-border' => 'Box'
	    );
	    $options['tropicana-widget-border-style'] = array(
	    	'id' => 'tropicana-widget-border-style',
	    	'label'   => __( 'Sidebar Widget Border Style', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'widget-box-border'
	    );

    	// Page Builders - Sub-section
	    $section = 'tropicana-styling-page-builders';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Builders', 'tropicana' ),
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-page-builders-use-theme-styles'] = array(
	    	'id' => 'tropicana-page-builders-use-theme-styles',
	    	'label'   => __( 'Use theme styles', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
	    	'description' => ''
	    );
    
    // Header Settings
    $panel = 'tropicana-header';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Header', 'tropicana' ),
    	'priority' => '35'
    );
    
    	// Top Bar - Sub-section
	    $section = 'tropicana-header-top-bar';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Top Bar', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['tropicana-header-show-top-bar'] = array(
	    	'id' => 'tropicana-header-show-top-bar',
	    	'label'   => __( 'Show Top Bar', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1
	    );
	    
		// Site Logo Area - Sub-section
	    $section = 'tropicana-header-site-logo-area';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Logo Area', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['tropicana-header-shop-links'] = array(
	    	'id' => 'tropicana-header-shop-links',
	    	'label'   => __( 'Shop Links', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 0,
			'description' => __( 'Display the My Account and Checkout links when WooCommerce is active.', 'tropicana' )
	    );
	    
	    // Navigation Menu - Sub-section
	    $section = 'tropicana-header-navigation-menu';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $choices = array(
	    	'left-aligned' => 'Left aligned',
	    	'inline' => 'Inline'
	    );
	    $options['tropicana-navigation-menu-alignment'] = array(
	    	'id' => 'tropicana-navigation-menu-alignment',
	    	'label'   => __( 'Alignment', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'inline'
	    );
	    
	    $choices = array(
	    	'rollover-font-color' => 'Font Color',
	    	'rollover-underline' => 'Underline',
	    );
	    $options['tropicana-navigation-menu-rollover-style'] = array(
	    	'id' => 'tropicana-navigation-menu-rollover-style',
	    	'label'   => __( 'Rollover Style', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'rollover-font-color'
	    );
	    
		$options['tropicana-navigation-menu-rollover-background-color'] = array(
			'id' => 'tropicana-navigation-menu-rollover-background-color',
			'label'   => __( 'Rollover Background Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $tropicana_navigation_menu_rollover_background_color
		);
	    
		$options['tropicana-navigation-menu-rollover-font-color'] = array(
			'id' => 'tropicana-navigation-menu-rollover-font-color',
			'label'   => __( 'Rollover Font Color', 'tropicana' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $navigation_menu_rollover_font_color
		);
		
		// Global Settings - Sub-section
	    $section = 'tropicana-header-text';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Header Text', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['tropicana-header-info-text-one'] = array(
	    	'id' => 'tropicana-header-info-text-one',
	    	'label'   => __( 'Info Text', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'text',
	    	'default' => '',
	    	'sanitize_callback' => 'wp_kses_post'
	    );
	    
		// Opacity - Sub-section
	    $section = 'tropicana-header-opacity';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Opacity', 'tropicana' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['tropicana-transparent-header'] = array(
	    	'id' => 'tropicana-transparent-header',
	    	'label'   => __( 'Transparent', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 0
	    );
	    
	    
    // Social Settings
    $section = 'tropicana-social';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Social Media Links', 'tropicana' ),
    	'priority' => '35'
    );
    
    $options['tropicana-social-right-aligned-buttons'] = array(
    	'id' => 'tropicana-social-right-aligned-buttons',
    	'label'   => __( 'Show right aligned social media buttons', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );

    $options['tropicana-social-email'] = array(
    	'id' => 'tropicana-social-email',
    	'label'   => __( 'Email Address', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['tropicana-social-skype'] = array(
    	'id' => 'tropicana-social-skype',
    	'label'   => __( 'Skype Name', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['tropicana-social-tumblr'] = array(
    	'id' => 'tropicana-social-tumblr',
    	'label'   => __( 'Tumblr', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['tropicana-social-flickr'] = array(
    	'id' => 'tropicana-social-flickr',
    	'label'   => __( 'Flickr', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    
    // Search Settings
    $section = 'tropicana-search';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Search', 'tropicana' ),
    	'priority' => '35'
    );
    
    $options['tropicana-navigation-menu-search-button'] = array(
    	'id' => 'tropicana-navigation-menu-search-button',
    	'label'   => __( 'Show Search in the Navigation Menu', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1
    );

    $options['tropicana-navigation-menu-search-button-text'] = array(
    	'id' => 'tropicana-navigation-menu-search-button-text',
    	'label'   => __( 'Search Button Text', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => ''
    );
    
    $options['tropicana-search-placeholder-text'] = array(
    	'id' => 'tropicana-search-placeholder-text',
    	'label'   => __( 'Default Search Field Text', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Search...', 'tropicana' )
    );
    
    $options['tropicana-website-text-no-search-results-heading'] = array(
    	'id' => 'tropicana-website-text-no-search-results-heading',
    	'label'   => __( 'No Search Results Heading', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
		'default' => __( 'Nothing Found!', 'tropicana' )
    );
    $options['tropicana-website-text-no-search-results-text'] = array(
        'id' => 'tropicana-website-text-no-search-results-text',
        'label'   => __( 'No Search Results Message', 'tropicana' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tropicana' )
    );
    
    
    // Slider Settings
    
    $section = 'tropicana-slider';
	
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'tropicana' ),
        'priority' => '35'
    );
    
    $choices = array(
        'tropicana-slider-default' => 'Default Slider',
        'tropicana-slider-plugin' => 'Slider Plugin',
        'tropicana-no-slider' => 'None'
    );
    $options['tropicana-slider-type'] = array(
        'id' => 'tropicana-slider-type',
        'label'   => __( 'Slider', 'tropicana' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
    	'default' => 'tropicana-no-slider'
    );
    
    $options['tropicana-default-slider-info'] = array(
    	'id' => 'tropicana-default-slider-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/tropicana/homepage-slider/default-slider/" target="_blank" rel="nofollow">Read a guide on how to set up the Default Slider</a>', 'tropicana' ),
    );

    $options['tropicana-slider-plugin-info'] = array(
    	'id' => 'tropicana-slider-plugin-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://wordpress.org/plugins/super-simple-slider/" target="_blank" rel="nofollow">Try our Super Simple Slider plugin</a>', 'tropicana' ),
    );
    
    $options['tropicana-slider-categories'] = array(
    	'id' => 'tropicana-slider-categories',
    	'label'   => __( 'Post Categories', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'dropdown-categories',
    	'description' => __( 'Select the categories of the posts you want to display in the slider. The featured image will be the slide image and the post content will display over it. Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.', 'tropicana' )
    );

    $options['tropicana-slider-overlay-opacity'] = array(
    	'id' => 'tropicana-slider-overlay-opacity',
    	'label'   => __( 'Overlay Opacity', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'range',
    	'default' => 0,
    	'input_attrs' => array(
    		'min'   => 0,
    		'max'   => 1,
    		'step'  => 0.1,
    		'style' => 'color: #000000'
   		)
    );
	
    $options['tropicana-slider-has-min-width'] = array(
    	'id' => 'tropicana-slider-has-min-width',
    	'label'   => __( 'Slider image has a minimum width', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['tropicana-slider-min-width'] = array(
    	'id' => 'tropicana-slider-min-width',
    	'label'   => __( 'Minimum Width', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );
    
    $options['tropicana-slider-transition-speed'] = array(
    	'id' => 'tropicana-slider-transition-speed',
    	'label'   => __( 'Transition Speed', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'milliseconds',
    	'default' => 450,
    	'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'tropicana' )
    );
    
    $options['tropicana-slider-plugin-shortcode'] = array(
    	'id' => 'tropicana-slider-plugin-shortcode',
    	'label'   => __( 'Slider Shortcode', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Enter the shortcode given by the slider plugin you\'re using.', 'tropicana' )
    );
    
    
    // Header Image
    $section = 'header_image';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header Image', 'tropicana' ),
    	'priority' => '35'
    );
    
    if ( get_option('page_on_front') > 0 && isset( $custom_fields["slider_shortcode"] ) ) {
    	$custom_fields = get_post_custom( get_option('page_on_front') );
    	$slider_shortcode = trim($custom_fields["slider_shortcode"][0]);
    }
    
	if ( !$slider_shortcode ) {
	    $options['tropicana-slider-enabled-warning'] = array(
	    	'id' => 'tropicana-slider-enabled-warning',
	    	'label'   => __( 'Please note: The header image will not display on your site as the slider is currently enabled. To make the header image visible you will first need to disable the slider.', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'warning',
	    	'priority' => 0
	    );
	} else {
	    $options['tropicana-slider-enabled-warning'] = array(
	    	'id' => 'tropicana-slider-enabled-warning',
	    	'label'   => __( 'Please note: The header image will not display on your site as you have a shortcode set in the Slider Shortcode field of your homepage. To make the header image visible you will first need to remove this.', 'tropicana' ),
	    	'section' => $section,
	    	'type'    => 'warning',
	    	'priority' => 0,
			'class'    => 'dont-hide',
	    );
	}

    $options['tropicana-header-image-overlay-opacity'] = array(
    	'id' => 'tropicana-header-image-overlay-opacity',
    	'label'   => __( 'Overlay Opacity', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'range',
    	'default' => 0,
    	'input_attrs' => array(
    		'min'   => 0,
    		'max'   => 1,
    		'step'  => 0.1,
    		'style' => 'color: #000000'
   		)
    );
    
    $options['tropicana-header-image-text'] = array(
    	'id' => 'tropicana-header-image-text',
    	'label'   => __( 'Text', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'textarea',
    	'default' => __( '<h2>On an Island in the Sun</h2><h3>We\'ll be playing and having fun</h3><p>When you\'re on a golden sea, you don\'t need no memory</p><p>Just a place to call your own, as we drift into the zone</p><p><a href="https://www.outtheboxthemes.com/wordpress-themes/tropicana/" target="_blank" rel="nofollow" class="button no-bottom-margin">Read More</a></p>', 'tropicana' ),
    	'description' => esc_html( __( 'Use <h2></h2> and <h3></h3> tags around heading text and <p></p> tags around body text.', 'tropicana' ) ),
    	'sanitize_callback' => 'wp_kses_post'
    );
    
    $options['tropicana-header-image-has-min-width'] = array(
    	'id' => 'tropicana-header-image-has-min-width',
    	'label'   => __( 'Header image has a minimum width', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['tropicana-header-image-min-width'] = array(
    	'id' => 'tropicana-header-image-min-width',
    	'label'   => __( 'Minimum Width', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );

	
	// WooCommerce
	if ( tropicana_is_woocommerce_activated() ) {

	    // WooCommerce
	    $panel = 'woocommerce';
	    
	    $panels[] = array(
	    	'id' => $panel,
	    	'title' => __( 'WooCommerce', 'tropicana' ),
	    	'priority' => '30'
	    );    

	    	// Layout
		    $section = 'woocommerce-layout';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Layout', 'tropicana' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['tropicana-woocommerce-breadcrumbs'] = array(
		    	'id' => 'tropicana-woocommerce-breadcrumbs',
		    	'label'   => __( 'Display breadcrumbs', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 0
		    );

	    	// Product Catalog
		    $section = 'woocommerce_product_catalog';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Catalog', 'tropicana' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );

		    $options['tropicana-layout-woocommerce-shop-full-width'] = array(
		    	'id' => 'tropicana-layout-woocommerce-shop-full-width',
		    	'label'   => __( 'Full width', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => 0,
		    	'default' => 0
		    );
		    
		    $options['tropicana-woocommerce-products-per-page'] = array(
		    	'id' => 'tropicana-woocommerce-products-per-page',
		    	'label'   => __( 'Products per page', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'text',
		    	'default' => get_option('posts_per_page'),
		    	'description' => __( 'How many products should be shown per page?', 'tropicana' )
		    );

	    	// Product
		    $section = 'woocommerce-product';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product', 'tropicana' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
		    
		    $options['tropicana-layout-woocommerce-product-full-width'] = array(
		    	'id' => 'tropicana-layout-woocommerce-product-full-width',
		    	'label'   => __( 'Full width', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 0
		    );
		    
		    $options['tropicana-woocommerce-product-image-zoom'] = array(
		    	'id' => 'tropicana-woocommerce-product-image-zoom',
		    	'label'   => __( 'Enable zoom on product image', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1
		    );
		    
	    	// Product category / tag page
		    $section = 'woocommerce-category-tag-page';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Category and Tag Page', 'tropicana' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['tropicana-layout-woocommerce-category-tag-page-full-width'] = array(
		    	'id' => 'tropicana-layout-woocommerce-category-tag-page-full-width',
		    	'label'   => __( 'Full width', 'tropicana' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => get_theme_mod( 'tropicana-layout-woocommerce-shop-full-width', 0 )
		    );
		    
	}
    
    // Blog Settings
    $section = 'tropicana-blog';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Blog', 'tropicana' ),
    	'priority' => '50'
    );    

	$options['tropicana-blog-featured-image-size'] = array(
		'id' => 'tropicana-blog-featured-image-size',
		'label'   => __( 'Featured Image Size', 'tropicana' ),
		'section' => $section,
		'type'    => 'dropdown-image-sizes',
		'default' => 'large'
    );	
    
    $choices = array(
		'tropicana-blog-archive-layout-full' => 'Full post',
		'tropicana-blog-archive-layout-excerpt' => 'Excerpt'
    );
    $options['tropicana-blog-archive-layout'] = array(
        'id' => 'tropicana-blog-archive-layout',
        'label'   => __( 'Text Length', 'tropicana' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'tropicana-blog-archive-layout-full'
    );
    
    $options['tropicana-blog-excerpt-length'] = array(
    	'id' => 'tropicana-blog-excerpt-length',
    	'label'   => __( 'Excerpt Length', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 55
    );
    
    $options['tropicana-blog-read-more-text'] = array(
    	'id' => 'tropicana-blog-read-more-text',
    	'label'   => __( 'Read More Text', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 'Read More'
    );
    
    // website Text Settings
    $section = 'tropicana-website-text';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'tropicana' ),
        'priority' => '50'
    );
    $options['tropicana-website-text-404-page-heading'] = array(
        'id' => 'tropicana-website-text-404-page-heading',
        'label'   => __( '404 Page Heading', 'tropicana' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( '404!', 'tropicana' )
    );
    $options['tropicana-website-text-404-page-text'] = array(
        'id' => 'tropicana-website-text-404-page-text',
        'label'   => __( '404 Page Message', 'tropicana' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'You\'ve gone off the map! The page you\'re looking for doesn\'t exist.', 'tropicana' )
    );
    
    // Media
    $section = 'tropicana-media';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Media', 'tropicana' ),
    	'priority' => '50'
    );
    
    $options['tropicana-media-crisp-images'] = array(
    	'id' => 'tropicana-media-crisp-images',
    	'label'   => __( 'Crisp images', 'tropicana' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'description' => __( '<p>This will remove the default anti-aliasing done to scaled images by browsers creating a more crisp image.</p>', 'tropicana' )
    );    
    
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;
	
	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'tropicana_customizer_library_options' );
