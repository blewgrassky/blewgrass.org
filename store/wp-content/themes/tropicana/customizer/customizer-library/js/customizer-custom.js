/**
 * Tropicana Customizer Custom Functionality
 *
 */
( function( $ ) {
	
	function tropicana_set_option( id, value ) {
		var api = wp.customize;
		
		var control = api.control.instance( id );
	    control.setting.set( value );
	    return;
	}		
	
    $( window ).on('load', function() {
    	
    	// Show / Hide Navigation Menu Color setting
    	tropicana_toggle_navigation_settings();
        
        $( '#customize-control-tropicana-navigation-menu-alignment select' ).on( 'change', function() {
        	tropicana_toggle_navigation_settings();
        } );
        
        function tropicana_toggle_navigation_settings() {
        	var navigationLayout = $( '#customize-control-tropicana-navigation-menu-alignment select' ).val();
        	
            if ( navigationLayout == 'inline' ) {
            	$( '#customize-control-tropicana-navigation-menu-color' ).hide();
            } else {
            	$( '#customize-control-tropicana-navigation-menu-color' ).show();
            }
        }    	
        
    	// Show / Hide menu dropdowns
        
        // Top Right
        $( '#customize-control-tropicana-header-top-right select' ).on( 'change', function() {
        	tropicana_toggle_header_top_right_menu_select();
        } );
        
        function tropicana_toggle_header_top_right_menu_select() {
        	var headerWidgetArea = $( '#customize-control-tropicana-header-top-right select' ).val();
        	var headerLayout = $( '#customize-control-tropicana-header-alignment select' ).val();
        	
            if ( headerWidgetArea == 'tropicana-header-top-right-menu' && headerLayout == 'left-aligned' ) {
                $( '#customize-control-tropicana-header-top-right-menu' ).show();
            } else {
                $( '#customize-control-tropicana-header-top-right-menu' ).hide();
            }
        }

        // Bottom Right
        $( '#customize-control-tropicana-header-bottom-right select' ).on( 'change', function() {
        	tropicana_toggle_header_bottom_right_menu_select();
        } );
        
        function tropicana_toggle_header_bottom_right_menu_select() {
        	var headerWidgetArea = $( '#customize-control-tropicana-header-bottom-right select' ).val();
        	var headerLayout = $( '#customize-control-tropicana-header-alignment select' ).val();
        		
            if ( headerWidgetArea == 'tropicana-header-bottom-right-menu' && headerLayout == 'left-aligned' ) {
                $( '#customize-control-tropicana-header-bottom-right-menu' ).show();
            } else {
                $( '#customize-control-tropicana-header-bottom-right-menu' ).hide();
            }
        }

        // Show / Hide Rollover Opacity Setting
        tropicana_toggle_rollover_style_settings();
        
        $( '#customize-control-tropicana-navigation-menu-rollover-style select' ).on( 'change', function() {
        	tropicana_toggle_rollover_style_settings();
        } );
        
        function tropicana_toggle_rollover_style_settings() {
        	var rolloverStyle = $( '#customize-control-tropicana-navigation-menu-rollover-style select' ).val();

        	if ( rolloverStyle == 'rollover-font-color' ) {
        		$( '#customize-control-tropicana-navigation-menu-rollover-background-color' ).hide();
	            $( '#customize-control-tropicana-navigation-menu-rollover-font-color' ).show();
        	
            } else if ( rolloverStyle == 'rollover-underline' || rolloverStyle == 'rollover-overline' ) {
	            $( '#customize-control-tropicana-navigation-menu-rollover-background-color' ).hide();
	            $( '#customize-control-tropicana-navigation-menu-rollover-font-color' ).hide();

            } else if ( rolloverStyle == 'rollover-background-color' ) {
                $( '#customize-control-tropicana-navigation-menu-rollover-background-color' ).show();
                $( '#customize-control-tropicana-navigation-menu-rollover-font-color' ).show();

            }
        }        
        
    	// Show / Hide right aligned social media buttons settings
        $( '#customize-control-tropicana-social-right-aligned-buttons input' ).on( 'change', function() {
        	tropicana_toggle_right_aligned_social_media_button_settings();
        } );
        
        function tropicana_toggle_right_aligned_social_media_button_settings() {
        	if ( $( '#customize-control-tropicana-social-right-aligned-buttons input' ).prop('checked') ) {
        		$( '#customize-control-tropicana-social-right-aligned-buttons-alignment' ).show();
        		$( '#customize-control-tropicana-social-right-aligned-buttons-shape' ).show();
        		$( '#customize-control-tropicana-social-right-aligned-buttons-anchored' ).show();
        	} else {
        		$( '#customize-control-tropicana-social-right-aligned-buttons-alignment' ).hide();
        		$( '#customize-control-tropicana-social-right-aligned-buttons-shape' ).hide();
        		$( '#customize-control-tropicana-social-right-aligned-buttons-anchored' ).hide();
        	}
        }        
        
        
    	// Show / Hide mobile menu settings
    	tropicana_toggle_mobile_menu_settings();
    	
        $( '#customize-control-tropicana-mobile-menu input' ).on( 'change', function() {
        	tropicana_toggle_mobile_menu_settings();
        } );
        
        function tropicana_toggle_mobile_menu_settings() {
        	if ( $( '#customize-control-tropicana-mobile-menu input' ).prop('checked') ) {
        		$( '#customize-control-tropicana-mobile-menu-activate-on-mobile' ).show();
        		$( '#customize-control-tropicana-mobile-menu-button-color' ).show();
        		$( '#customize-control-tropicana-mobile-menu-color-scheme' ).show();
        		$( '#customize-control-tropicana-mobile-menu-breakpoint' ).show();
        	} else {
        		$( '#customize-control-tropicana-mobile-menu-activate-on-mobile' ).hide();
        		$( '#customize-control-tropicana-mobile-menu-button-color' ).hide();
        		$( '#customize-control-tropicana-mobile-menu-color-scheme' ).hide();
        		$( '#customize-control-tropicana-mobile-menu-breakpoint' ).hide();
        	}
        }        

        
    	// Show / Hide slider settings
        tropicana_toggle_slider_settings();
        
        $( '#customize-control-tropicana-slider-type select' ).on( 'change', function() {
        	tropicana_toggle_slider_settings();
        } );
        
        function tropicana_toggle_slider_settings() {
        	var sliderType = $( '#customize-control-tropicana-slider-type select' ).val();
        	
            if ( sliderType == 'tropicana-slider-default' ) {
            	$( '#customize-control-tropicana-default-slider-info' ).show();
            	$( '#customize-control-tropicana-slider-plugin-info' ).hide();
                $( '#customize-control-tropicana-slider-categories' ).show();
                $( '#customize-control-tropicana-slider-all-pages' ).show();
                $( '#customize-control-tropicana-slider-blog-posts' ).show();
                $( '#customize-control-tropicana-slider-display-directional-buttons' ).show();
                $( '#customize-control-tropicana-slider-display-pagination' ).show();
                $( '#customize-control-tropicana-slider-button-style' ).show();
                
                $( '#customize-control-tropicana-slider-text-overlay-heading' ).show();
                $( '#customize-control-tropicana-slider-overlay-opacity' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-opacity' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-uppercase-headings' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-text-shadow' ).show();
                
                $( '#customize-control-tropicana-slider-text-overlay-style' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-text-alignment' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-horizontal-alignment' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-max-height' ).show();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-opacity' ).show();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-text' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-vertical-position' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-width' ).show();
                $( '#customize-control-tropicana-slider-text-overlay-padding' ).show();
                
                // Spacing settings
                $( '#customize-control-tropicana-slider-spacing-heading' ).show();
                $( '#customize-control-tropicana-slider-heading-line-height' ).show();
                $( '#customize-control-tropicana-slider-paragraph-line-height' ).show();
                $( '#customize-control-tropicana-slider-paragraph-margin' ).show();
                $( '#customize-control-tropicana-slider-button-margin' ).show();
                
                // Responsive settings
                $( '#customize-control-tropicana-slider-responsive-heading' ).show();
                $( '#customize-control-tropicana-slider-hide-text-overlay' ).show();
                $( '#customize-control-tropicana-slider-hide-headings' ).show();
                $( '#customize-control-tropicana-slider-hide-paragraphs' ).show();
                $( '#customize-control-tropicana-slider-hide-buttons' ).show();
                $( '#customize-control-tropicana-slider-has-min-width' ).show();

            	tropicana_toggle_slider_min_width();
                
            	// Slideshow settings
                $( '#customize-control-tropicana-slider-transition-speed' ).show();
                $( '#customize-control-tropicana-slider-transition-effect' ).show();
                $( '#customize-control-tropicana-slider-autoscroll' ).show();
                
                tropicana_toggle_slider_autoscroll_settings();
                
                $( '.divider.default-slider' ).parent('li').show();
                
                $( '#customize-control-tropicana-slider-plugin-shortcode' ).hide();
                
                // Header image visibility warning
                $( '#customize-control-tropicana-slider-enabled-warning' ).show();
                
            } else if ( sliderType == 'tropicana-slider-plugin' ) {
            	$( '#customize-control-tropicana-default-slider-info' ).hide();
            	$( '#customize-control-tropicana-slider-plugin-info' ).show();
                $( '#customize-control-tropicana-slider-categories' ).hide();
                $( '#customize-control-tropicana-slider-all-pages' ).show();
                $( '#customize-control-tropicana-slider-blog-posts' ).show();
                $( '#customize-control-tropicana-slider-display-directional-buttons' ).hide();
                $( '#customize-control-tropicana-slider-display-pagination' ).hide();
                $( '#customize-control-tropicana-slider-button-style' ).hide();
                
                $( '#customize-control-tropicana-slider-overlay-opacity' ).hide();
                
                $( '#customize-control-tropicana-slider-text-overlay-heading' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-opacity' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-uppercase-headings' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-text-shadow' ).hide();
                
                $( '#customize-control-tropicana-slider-text-overlay-style' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-text-alignment' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-horizontal-alignment' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-max-height' ).hide();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-opacity' ).hide();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-text' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-vertical-position' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-width' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-padding' ).hide();
                
                // Spacing settings
                $( '#customize-control-tropicana-slider-spacing-heading' ).hide();
                $( '#customize-control-tropicana-slider-heading-line-height' ).hide();
                $( '#customize-control-tropicana-slider-paragraph-line-height' ).hide();
                $( '#customize-control-tropicana-slider-paragraph-margin' ).hide();
                $( '#customize-control-tropicana-slider-button-margin' ).hide();
                
                // Responsive settings
                $( '#customize-control-tropicana-slider-responsive-heading' ).hide();
                $( '#customize-control-tropicana-slider-hide-text-overlay' ).hide();
                $( '#customize-control-tropicana-slider-hide-headings' ).hide();
                $( '#customize-control-tropicana-slider-hide-paragraphs' ).hide();
                $( '#customize-control-tropicana-slider-hide-buttons' ).hide();
                $( '#customize-control-tropicana-slider-has-min-width' ).hide();
                $( '#customize-control-tropicana-slider-min-width' ).hide();
                
                // Slideshow settings
                $( '#customize-control-tropicana-slider-transition-speed' ).hide();
                $( '#customize-control-tropicana-slider-transition-effect' ).hide();
                $( '#customize-control-tropicana-slider-autoscroll' ).hide();
                $( '#customize-control-tropicana-slider-autoscroll-pause-on-hover' ).hide();
                $( '#customize-control-tropicana-slider-speed' ).hide();
                
                $( '.divider.default-slider' ).parent('li').hide();
                
                $( '#customize-control-tropicana-slider-plugin-shortcode' ).show();
                
                // Header image visibility warning
                $( '#customize-control-tropicana-slider-enabled-warning' ).show();
                
            } else {
            	$( '#customize-control-tropicana-default-slider-info' ).hide();
            	$( '#customize-control-tropicana-slider-plugin-info' ).hide();
	            $( '#customize-control-tropicana-slider-categories' ).hide();
                $( '#customize-control-tropicana-slider-all-pages' ).hide();
                $( '#customize-control-tropicana-slider-blog-posts' ).hide();
                $( '#customize-control-tropicana-slider-display-directional-buttons' ).hide();
                $( '#customize-control-tropicana-slider-display-pagination' ).hide();
                $( '#customize-control-tropicana-slider-button-style' ).hide();
                $( '#customize-control-tropicana-slider-overlay-opacity' ).hide();
                
                $( '#customize-control-tropicana-slider-text-overlay-heading' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-opacity' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-uppercase-headings' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-text-shadow' ).hide();
                
                $( '#customize-control-tropicana-slider-text-overlay-style' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-text-alignment' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-horizontal-alignment' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-max-height' ).hide();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-opacity' ).hide();
                $( '#customize-control-tropicana-slider-constrain-text-overlay-text' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-vertical-position' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-width' ).hide();
                $( '#customize-control-tropicana-slider-text-overlay-padding' ).hide();
                
                // Spacing settings
                $( '#customize-control-tropicana-slider-spacing-heading' ).hide();
                $( '#customize-control-tropicana-slider-heading-line-height' ).hide();
                $( '#customize-control-tropicana-slider-paragraph-line-height' ).hide();
                $( '#customize-control-tropicana-slider-paragraph-margin' ).hide();
                $( '#customize-control-tropicana-slider-button-margin' ).hide();
                
                // Responsive settings
                $( '#customize-control-tropicana-slider-responsive-heading' ).hide();
                $( '#customize-control-tropicana-slider-hide-text-overlay' ).hide();
                $( '#customize-control-tropicana-slider-hide-headings' ).hide();
                $( '#customize-control-tropicana-slider-hide-paragraphs' ).hide();
                $( '#customize-control-tropicana-slider-hide-buttons' ).hide();
                $( '#customize-control-tropicana-slider-has-min-width' ).hide();
                $( '#customize-control-tropicana-slider-min-width' ).hide();
                
                // Slideshow settings
                $( '#customize-control-tropicana-slider-transition-speed' ).hide();
                $( '#customize-control-tropicana-slider-transition-effect' ).hide();
                $( '#customize-control-tropicana-slider-autoscroll' ).hide();
                $( '#customize-control-tropicana-slider-autoscroll-pause-on-hover' ).hide();
                $( '#customize-control-tropicana-slider-speed' ).hide();
                
                $( '.divider.default-slider' ).parent('li').hide();
                
                $( '#customize-control-tropicana-slider-plugin-shortcode' ).hide();
             
                // Header image visibility warning
                $( '#customize-control-tropicana-slider-enabled-warning:not(:has(.dont-hide))' ).hide();
                
            }
        }
    	
        // Show / hide slider min width
        $( '#customize-control-tropicana-slider-has-min-width input' ).on( 'change', function() {
        	tropicana_toggle_slider_min_width();
        } );
        
        function tropicana_toggle_slider_min_width() {
        	if ( $( '#customize-control-tropicana-slider-has-min-width input' ).prop('checked') && $( '#customize-control-tropicana-slider-has-min-width input' ).is(':visible') ) {
        		$( '#customize-control-tropicana-slider-min-width' ).show();
        	} else {
        		$( '#customize-control-tropicana-slider-min-width' ).hide();
        	}
        }        
        
    	// Show / Hide Slider autoscroll settings
        $( '#customize-control-tropicana-slider-autoscroll input' ).on( 'change', function() {
        	tropicana_toggle_slider_autoscroll_settings();
        } );
        
        function tropicana_toggle_slider_autoscroll_settings() {
        	if ( $( '#customize-control-tropicana-slider-autoscroll input' ).prop('checked') ) {
        		$( '#customize-control-tropicana-slider-autoscroll-pause-on-hover' ).show();
        		$( '#customize-control-tropicana-slider-speed' ).show();
        	} else {
        		$( '#customize-control-tropicana-slider-autoscroll-pause-on-hover' ).hide();
        		$( '#customize-control-tropicana-slider-speed' ).hide();
        	}
        }        

        // Show / hide header image min width
        tropicana_toggle_header_image_min_width();
        
        $( '#customize-control-tropicana-header-image-has-min-width input' ).on( 'change', function() {
        	tropicana_toggle_header_image_min_width();
        } );
        
        function tropicana_toggle_header_image_min_width() {
        	if ( $( '#customize-control-tropicana-header-image-has-min-width input' ).prop('checked') && $( '#customize-control-tropicana-header-image-has-min-width input' ).is(':visible') ) {
        		$( '#customize-control-tropicana-header-image-min-width' ).show();
        	} else {
        		$( '#customize-control-tropicana-header-image-min-width' ).hide();
        	}
        }
        
    	// Show / hide woocommerce sidebar alignment
        tropicana_toggle_shop_sidebar_alignment();
    	
        $( '#customize-control-tropicana-layout-woocommerce-shop-full-width input' ).on( 'change', function() {
        	tropicana_toggle_shop_sidebar_alignment();
        } );
        
        function tropicana_toggle_shop_sidebar_alignment() {
        	if ( $( '#customize-control-tropicana-layout-woocommerce-shop-full-width input' ).prop('checked') ) {
        		$( '#customize-control-tropicana-woocommerce-shop-sidebar-alignment' ).hide();
        	} else {
        		$( '#customize-control-tropicana-woocommerce-shop-sidebar-alignment' ).show();
        	}
        }
        
        // Show / hide blog post options
        var blogPostLayout = $( '#customize-control-tropicana-blog-layout select' ).val();
        
        $( '#customize-control-tropicana-blog-layout select' ).on( 'change', function() {
        	blogPostLayout = $( this ).val();
        } );
        
    	// Show / hide full height featured image options
        tropicana_toggle_full_height_featured_image_options();
        
        $( '#customize-control-tropicana-featured-image-height select' ).on( 'change', function() {
	    	tropicana_toggle_full_height_featured_image_options();
        } );
        
        function tropicana_toggle_full_height_featured_image_options() {
            var featuredImageHeight = $( '#customize-control-tropicana-featured-image-height select' ).val();
        	
            if ( featuredImageHeight == 'full' && blogPostLayout == 'blog-post-top-layout' ) {
            	$( '#customize-control-tropicana-featured-image-full-width' ).show();
            	
            	tropicana_toggle_full_width_top_layout_featured_image_settings();
            	
            } else if ( featuredImageHeight != 'full' && blogPostLayout == 'blog-post-top-layout' ) {
            	$( '#customize-control-tropicana-featured-image-full-width' ).hide();
            	$( '#customize-control-tropicana-featured-image-alignment-top-layout' ).hide();
            } else {
            	$( '#customize-control-tropicana-featured-image-full-width' ).hide();
            }
        }
        
        // Show / hide full width top layout featured image options
        $( '#customize-control-tropicana-featured-image-full-width input' ).on( 'change', function() {
        	tropicana_toggle_full_width_top_layout_featured_image_settings();
        } );
        
        function tropicana_toggle_full_width_top_layout_featured_image_settings() {
        	if ( $( '#customize-control-tropicana-featured-image-full-width input' ).prop('checked') ) {
        		$( '#customize-control-tropicana-featured-image-alignment-top-layout' ).hide();
        	} else {
        		$( '#customize-control-tropicana-featured-image-alignment-top-layout' ).show();
        	}
        }
        
        
        // Show / hide blog archive options
        tropicana_toggle_blog_archive_settings();
        
        $( '#customize-control-tropicana-blog-archive-layout select' ).on( 'change', function() {
        	tropicana_toggle_blog_archive_settings();
        } );
        
        function tropicana_toggle_blog_archive_settings() {
        	var blogArchiveLayout = $( '#customize-control-tropicana-blog-archive-layout select' ).val();
        	
            if ( blogArchiveLayout == 'tropicana-blog-archive-layout-full' ) {
                $( '#customize-control-tropicana-blog-excerpt-length' ).hide();
        		$( '#customize-control-tropicana-blog-read-more-text' ).hide();
                
            } else if ( blogArchiveLayout == 'tropicana-blog-archive-layout-excerpt' ) {
                $( '#customize-control-tropicana-blog-excerpt-length' ).show();
                $( '#customize-control-tropicana-blog-read-more-text' ).show();
             
                tropicana_toggle_blog_read_more_settings();
                
            }
        }
        
    } );
    
} )( jQuery );