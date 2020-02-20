/**
 * Tropicana Theme Custom Functionality
 *
 */
( function( $ ) {

	var sliderParagraphMargin = parseFloat( tropicana.sliderParagraphMargin );
	var sliderButtonMargin = parseFloat( tropicana.sliderButtonMargin );
	var headerImageParagraphMargin = parseFloat( tropicana.headerImageParagraphMargin );
	var headerImageButtonMargin = parseFloat( tropicana.headerImageButtonMargin );

    var siteHeaderHeight 	   = 0;
	var mobile_menu_breakpoint = parseInt( tropicana.mobile_menu_breakpoint );

	var $header = $( '.site-header' );
	var $branding = $('.site-header .branding');
	var $title = $( '.site-header .title' );
	var $main_navigation = $( '.main-navigation' );
	//var $description = $( '.site-header .description' );
	
	//var site_branding_padding_top = parseInt( tropicana.site_branding_padding_top );
	//var site_branding_padding_bottom = parseInt( tropicana.site_branding_padding_bottom );

	var solidify = false;
	
    $( document ).ready( function() {
    	var scrollbar_width = tropicana_get_scrollbar_width();
    	$('body:not(.mobile-device) .slider-container.default .slider .slide').css( 'width', 'calc(100vw - ' + scrollbar_width + 'px)' ).css( 'max-width', 'calc(100vw - ' + scrollbar_width + 'px)' );
    	
    	tropicana_image_has_loaded();
    	
    	$('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).load();
	    	}
	    });
    	
        // Add button to sub-menu parent to show nested pages on the mobile menu
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="otb-fa otb-fa-angle-right"></i></span>' );
        
        // Sub-menu toggle button
        $( '.main-navigation a[href="#"], .menu-dropdown-btn' ).bind( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).parent().find('.otb-fa:first').toggleClass('otb-fa-angle-right').toggleClass('otb-fa-angle-down');
        });

        var focused_mobile_menu_item;
        
        // Remove all hover classes from menu items when anything  on the page is clicked
        $( document ).bind( 'click', function(e) {
        	if ( e.target != focused_mobile_menu_item ) {
        		$( 'body.mobile-device .main-navigation li.menu-item-has-children' ).removeClass('hover');
        	}
        	
        	focused_mobile_menu_item = null;
        });

        $( 'body.mobile-device .main-navigation li.menu-item-has-children > a' ).bind( 'click', function(e) {
        	e.preventDefault();
        	menu_item = $(this).parent();

        	// If a menu item with a submenu is clicked that doesn't have a # for a URL show the submenu
        	if ( menu_item.find('a').attr('href') != '#' && !menu_item.hasClass('hover') ) {
        		focused_mobile_menu_item = e.target;        		
        		menu_item.addClass('hover');
        		
        	// If the submenu is already displaying then go to it's URL
        	} else if ( menu_item.hasClass('hover') ) {
        		window.location.href = menu_item.find('a').attr('href');
        	}
        });

        // Set the vertical position of the side-aligned social links - a third of the users screen height
        $('.side-aligned-social-links').css('top', function() {
        	return screen.height / 3;
        });
        
        tropicana_toggle_header_element_opacity();
        tropicana_calculate_site_header_height();
    	tropicana_set_slider_height();
    	tropicana_set_slider_elements_spacing();
    	tropicana_set_header_image_elements_spacing();
    	
    	// Wrap the SiteOrigin Layout Slider widget navigation controls in a container div for styling purposes
    	$('.sow-slide-nav.sow-slide-nav-next, .sow-slide-nav.sow-slide-nav-prev').wrapAll('<div class="otb-sow-slide-nav-wrapper"></div');

		// Add selected menu item indicators
    	$(".main-navigation.rollover-underline .menu > ul > li > a, .main-navigation.rollover-underline ul.menu > li > a, .main-navigation.rollover-overline .menu > ul > li > a, .main-navigation.rollover-overline ul.menu > li > a").append("<div class='indicator'></div>");
    	
    	// Once the header image has loaded remove the loading class and set the height to auto 
        if ( $(".header-image img").length > 0 ) {
    	    var img = $('<img/>');
    	    img.attr("src", $(".header-image img").attr("src") ); 
    		
    	    img.on('load', function() {
            	$('.header-image .overlay .opacity.per-line h1').wrapInner('<span></span>');
            	$('.header-image .overlay .opacity.per-line h2').wrapInner('<span></span>');
            	$('.header-image .overlay .opacity.per-line h3').wrapInner('<span></span>');
            	$('.header-image .overlay .opacity.per-line p:not(.no-background)').wrapInner('<span></span>');
    	    	
    			initFittext();
    			initFitbutton();
    			tropicana_pad_text_overlay_container();
    	    	
    	    	$('.site-header').removeClass('forced-solid');
    	    	$('.header-image').removeClass('loading');
    	    	$('.header-image').css('height', 'auto');
    		});
        }
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
            $( '.main-navigation #main-menu' ).addClass( 'animate' );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
            $( '.main-navigation #main-menu' ).addClass( 'animate' );
        });
        
        $( '.main-navigation' ).on( 'transitionend webkittransitionend', function() {
        	$( '.main-navigation #main-menu' ).removeClass( 'animate' );
        });
        
        // Show / Hide navigation search slidedown
        $(".search-button").click(function(e){
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").css('visibility', 'visible');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150, function() {
	        		$(".search-slidedown").css('visibility', 'hidden');
	        	});
        	}
        });

        // Show border on focus of sidebar search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of sidebar product search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_product_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        });
        
        // Custom click functionality required because of replacing the search widget button with a link 
        $(".search-submit").bind('click', function(event) {
        	var form = $(this).parents("form");

            // Don't search if no keywords have been entered
        	if ( form.find(".search-field").val() == "") {
        		event.preventDefault();
        	} else {
        		form.submit();
        	}
        });
        	
    });
    
    $(window).resize(function () {
    	clearTimeout( window.resizedFinished );
    	
    	// Use setTimeout to stop the code from running before the window has finished resizing
    	window.resizedFinished = setTimeout(function() {

			initFittext();
			initFitbutton();
			tropicana_scale_slider_controls();
			tropicana_set_slider_controls_visibility();
	        tropicana_toggle_header_element_opacity();
	    	//tropicana_calculate_site_header_height();
	        tropicana_pad_text_overlay_container();
	    	tropicana_set_search_block_position();
	    	tropicana_set_slider_elements_spacing();
	    	tropicana_set_header_image_elements_spacing();
			tropicana_constrain_text_overlay_opacity();
			//tropicana_set_left_right_opacity_heights();
			
		}, 0);
    }).resize();
    
    $(window).on('load', function() {
    	tropicana_home_slider();
    	tropicana_set_search_block_position();
    });
    
    $(window).scroll(function(e) {
		animateInitialPageScroll = false;
		
		var scrollTop = parseInt( $(window).scrollTop() ) + 28;
    });
    
    function tropicana_scale_slider_controls() {
    	// Slider control buttons
    	var sliderControlButtons = $('.slider-container.default .prev, .slider-container.default .next');
		var maxsliderControlButtonSize = 49;
		var minsliderControlButtonSize = 26;

		// Slider control arrows
    	var sliderControlArrows  = $('.slider-container.default .prev .otb-fa, .slider-container.default .next .otb-fa');
		var maxsliderControlArrowSize;
		var sliderControlArrowLineHeight;
    	
		if ( sliderControlButtons.hasClass('large') ) {
			var maxsliderControlArrowSize = 75;
			var minsliderControlArrowSize = 40;
			var maxsliderControlArrowLineHeight = 75;
			var minsliderControlArrowLineHeight = 40;
			var compressor = 1;
		} else if ( sliderControlButtons.hasClass('round-solid') ) {
			var maxsliderControlArrowSize = 55;
			var minsliderControlArrowSize = 30;
			var maxsliderControlArrowLineHeight = 55;
			var minsliderControlArrowLineHeight = 30;
			var compressor = 2;
		} else {
			var maxsliderControlArrowSize = 37;
			var minsliderControlArrowSize = 26;
			var maxsliderControlArrowLineHeight = 45;
			var minsliderControlArrowLineHeight = 18;
			var compressor = 2.5;
		}
		
		var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		
		var sliderControlButtonHeight = Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlButtonSize), minsliderControlButtonSize);
		
		sliderControlButtons.css({
			'height': sliderControlButtonHeight,
			'width': sliderControlButtonHeight
		});
		
		if ( sliderControlButtons.hasClass('square') ) {
			sliderControlArrowLineHeight = sliderControlButtonHeight * (91.8367346938776 / 100);
		} else if ( sliderControlButtons.hasClass('square-solid') ) {
			sliderControlArrowLineHeight = sliderControlButtonHeight * (91.8367346938776 / 100);
		} else if ( sliderControlButtons.hasClass('round') ) {
			sliderControlArrowLineHeight = sliderControlButtonHeight * (87 / 100);
		} else if ( sliderControlButtons.hasClass('large') ) {
			sliderControlArrowLineHeight = sliderControlButtonHeight * (94 / 100);
		}
		
		sliderControlArrows.css({
			'font-size': Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlArrowSize), minsliderControlArrowSize),
			'line-height': sliderControlArrowLineHeight + 'px'
		});
	}
    
    function tropicana_constrain_text_overlay_opacity() {
    	var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		var sliderTextOverlayOpacity = $('.slider-container.default .slider .slide .overlay-container .overlay .opacity');
		var headerImageTextOverlay = $('.header-image .overlay-container .overlay');
		var headerImageTextOverlayOpacity = $('.header-image .overlay-container .overlay .opacity');
		
		if ( !$('.slider-container.default').hasClass('loading') && sliderTextOverlayOpacity.length > 0 && sliderTextOverlayOpacity.outerHeight() >= sliderTextOverlay.height() ) {
			sliderTextOverlayOpacity.addClass('constrained');
		} else {
			sliderTextOverlayOpacity.removeClass('constrained');
		}
		
		if ( !$('.header-image').hasClass('loading') && headerImageTextOverlayOpacity.length > 0 && headerImageTextOverlayOpacity.outerHeight() >= headerImageTextOverlay.height() ) {
			headerImageTextOverlayOpacity.addClass('constrained');
		} else {
			headerImageTextOverlayOpacity.removeClass('constrained');
		}
    }
    
    function tropicana_set_slider_controls_visibility() {
    	var sliderContainer = $('.slider-container.default'); 
		var controlsContainer = $( '.slider-container.default .controls-container' );
		var textOverlayOpacity = $( '.slider-container.default .slider .slide .overlay-container .overlay .opacity' );

		if ( !sliderContainer.hasClass('loading') && controlsContainer.length > 0 && textOverlayOpacity.length > 0 && textOverlayOpacity.css('display') != 'none' ) {
			var prevButton = $( '.slider-container.default .controls-container .controls .prev' );
			var nextButton = $( '.slider-container.default .controls-container .controls .next' );
			
			var prevButtonLeftOffset = 0;
			var nextButtonLeftOffset = 0;

			var textOverlayOpacityLeftOffset = textOverlayOpacity.offset().left - sliderContainer.offset().left;
			var textOverlayOpacityRightOffset = controlsContainer.width() - ( textOverlayOpacityLeftOffset + textOverlayOpacity.outerWidth() );
			
			if ( prevButton.css('left').indexOf('px') > -1 ) {
				prevButtonLeftOffset = parseFloat( prevButton.css('left').replace('px', '') ); 
			} else if ( prevButton.css('left').indexOf('%') > -1 ) {
				prevButtonLeftOffset = ( parseFloat( prevButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
	
			if ( nextButton.css('right').indexOf('px') > -1 ) {
				nextButtonLeftOffset = parseFloat( nextButton.css('left').replace('px', '') ); 
			} else if ( nextButton.css('right').indexOf('%') > -1 ) {
				nextButtonLeftOffset = ( parseFloat( nextButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
			
			if (
				textOverlayOpacityLeftOffset - ( prevButtonLeftOffset + prevButton.outerWidth() ) <= 10 || 
				nextButtonLeftOffset - textOverlayOpacityRightOffset <= 10
			) {
				controlsContainer.css('display', 'none');
			} else {
				controlsContainer.css('display', 'block');
			}
    	}
    }
	
    // Initalise OTBFitText
    function initFittext() {
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity h1, .slider-container.default .slider .slide .overlay-container .overlay .opacity h2, .slider-container.default .slider .slide .overlay-container .overlay .opacity h3').OTBFitText(2, { minFontSize: '17px', maxFontSize: '48px' });
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity').OTBFitText(3, { minFontSize: '13px', maxFontSize: '24px' });
        $('.header-image .overlay-container .overlay .opacity h1, .header-image .overlay-container .overlay .opacity h2, .header-image .overlay-container .overlay .opacity h3').OTBFitText(2, { minFontSize: '17px', maxFontSize: '48px' });
        $('.header-image .overlay-container .overlay .opacity').OTBFitText(2.5, { minFontSize: '13px', maxFontSize: '24px' });
    }

    // Initalise fitbutton
    function initFitbutton() {
		$('.slider-container.default .slider .slide .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
		$('.header-image .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
    }
    
    function tropicana_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', ( $('.search-button').position().left + parseInt( $('.search-button').css('padding-left').replace('px', '') ) ) - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    function tropicana_calculate_site_header_height() {
    	// This might need to be looked at
    	siteHeaderHeight = $('.site-top-bar').outerHeight(true) + $('.site-logo-area').outerHeight(true) + $('.main-navigation').outerHeight(true);
    }
    
    function tropicana_toggle_header_element_opacity() {
    	
    	if ( !($('body').hasClass('mobile-device') && $('.site-header').hasClass('mobile-sticky-disabled')) ) {
    	
		    if ( tropicana_get_viewport().width <= parseInt( tropicana.solidify_breakpoint ) ) {
	    		if ( $('.site-header').hasClass('transparent') ) {
	    			$('.site-header').data('opacity', 'transparent');
	    			$('.site-header').removeClass('transparent');
	    		} else if ( $('.site-header').hasClass('translucent') ) {
	    			$('.site-header').data('opacity', 'translucent');
	    			$('.site-header').removeClass('translucent');
	    		}
	
	    		if ( $('.site-header').hasClass('floated') ) {
	    			$('.site-header').addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $('.site-header').data('opacity') == 'transparent' || $('.site-header').data('opacity') == 'translucent' ) && solidify ) {
	    			$('.site-header').addClass('fauxSolid');
	    		}
	    		
	    		if ( $('.main-navigation').hasClass('transparent') ) {
	    			$('.main-navigation').data('opacity', 'transparent');
	    			$('.main-navigation').removeClass('transparent');
	    		} else if ( $('.main-navigation').hasClass('translucent') ) {
	    			$('.main-navigation').data('opacity', 'translucent');
	    			$('.main-navigation').removeClass('translucent');
	    		}
	    		
	    		if ( $('.main-navigation').hasClass('floated') ) {
	    			$('.main-navigation').addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $('.main-navigation').data('opacity') == 'transparent' || $('.main-navigation').data('opacity') == 'translucent' ) && solidify ) {
	    			$('.main-navigation').addClass('fauxSolid');
	    		}
	    		
		    } else {
		    	if ( !$('.site-header').hasClass('fauxSolid') && !$('.site-header').hasClass('floated') ) {
		    		$('.site-header').addClass( $('.site-header').data('opacity' ) );
		    	}
		    	if ( $('.site-header').hasClass('mustBeFloated') ) {
		    		$('.site-header').addClass( 'floated' );
	        		$('.site-header').removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    	if ( !$('.main-navigation').hasClass('fauxSolid') && !$('.main-navigation').hasClass('floated') ) {
		    		$('.main-navigation').addClass( $('.main-navigation').data('opacity' ) );
		    	}
		    	if ( $('.main-navigation').hasClass('mustBeFloated') ) {
		    		$('.main-navigation').addClass( 'floated' );
	        		$('.main-navigation').removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    }
		    
    	}
	    
    }
    
    function tropicana_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) + parseInt( $('.slider-container').css('paddingTop').replace('px', '') ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) + parseInt( $('.header-image').css('paddingTop').replace('px', '') ) );
    		}
    	}
    }
    
    function tropicana_set_slider_elements_spacing() {
		// Remove the bottom border of a button nested inside a paragraph if it's the last element on a slide
		$('.slider-container.default .slider .slide .overlay .opacity p:last-child > a.button, .slider-container.default .slider .slide .overlay .opacity p:last-child > button').addClass('no-bottom-margin');
		$('.slider-container.default .slider .slide .overlay .opacity.per-line p:last-child > a.button, .slider-container.default .slider .slide .overlay .opacity.per-line p:last-child > button').parent().addClass('no-background');

    	if ( tropicana_get_viewport().width <= 960 ) {
	    	$('.slider-container.default .opacity a.button:hidden, .slider-container.default .opacity button:hidden').parent('p').css('display', 'none');
	    	
	    	$('.slider-container.default .slide').each( function() {
	    		$(this).find('.opacity *:visible:first').css('margin-top', 0);
	    		$(this).find('.opacity *:visible:last').css('margin-bottom', 0);
	    	});
    	} else {
    		$('.slider-container.default .opacity p').css({ 'margin-top' : sliderParagraphMargin + 'em', 'margin-bottom' : sliderParagraphMargin + 'em' });
    		$('.slider-container.default .opacity a.button, .slider-container.default .opacity button').css({ 'margin-top' : sliderButtonMargin + 'em', 'margin-bottom' : sliderButtonMargin + 'em' });
    		
    		$('.slider-container.default .opacity a.button:hidden, .slider-container.default .opacity button:hidden').parent('p').css('display', 'block');
    	}
    }
    
    function tropicana_set_header_image_elements_spacing() {
		// Remove the bottom border of a button nested inside a paragraph if it's the last element on the header image
		$('.header-image .overlay .opacity p:last-child > a.button, .header-image .overlay .opacity p:last-child > button').addClass('no-bottom-margin');
		$('.header-image .overlay .opacity.per-line p:last-child > a.button, .header-image .overlay .opacity.per-line p:last-child > button').parent().addClass('no-background');

		if ( tropicana_get_viewport().width <= 960 ) {
	    	$('.header-image .opacity a.button:hidden, .header-image .opacity button:hidden').parent('p').css('display', 'none');
	    	
    		$('.header-image').find('.opacity *:visible:first').css('margin-top', 0);
    		$('.header-image').find('.opacity *:visible:last').css('margin-bottom', 0);
    	} else {
    		$('.header-image .opacity p').css({ 'margin-top' : headerImageParagraphMargin + 'em', 'margin-bottom' : headerImageParagraphMargin + 'em' });
    		$('.header-image .opacity a.button, .header-image .opacity button').css({ 'margin-top' : headerImageButtonMargin + 'em', 'margin-bottom' : headerImageButtonMargin + 'em' });
    		
    		$('.header-image .opacity a.button:hidden, .header-image .opacity button:hidden').parent('p').css('display', 'block');
    	}
    }
    
    function tropicana_pad_text_overlay_container() {
    	var textOverlayOffset;
    	var sliderControlsOffset = 0;
		var main_navigation_parent_item;
		
		if ( $('.main-navigation .menu > li').length > 0 ) {
			main_navigation_parent_item = $('.main-navigation .menu > li');
		} else {
			main_navigation_parent_item = $('.main-navigation .menu > ul > li');
		}

    	if ( $('.site-header').hasClass('translucent') || $('.site-header').hasClass('transparent') || $('.site-header').hasClass('floated') || $('.site-header').hasClass('mustBeFloated') ) {

    		textOverlayOffset = $('.site-header .site-logo-area').outerHeight(true);
    		sliderControlsOffset = $('.site-header .site-logo-area').outerHeight(true);
    		
    		// Only include the height of the navigation menu if it's positioned below the site logo container
    		// NB: THIS NEEDS TO BE RETHOUGHT BECAUSE IF THE LOGO COMES DOWN LOWER THAN THE NAV THE PADDING SHOULD BE BASED ON THE LOGO
    		// ALSO IN THE EVENT THAT THE NAVIGATION MENU IS POSITIONED BELOW THE SITE LOGO AND IS TRANSPARENT IT SHOULD NOT COUNT THE ENTIRE NAVGATION HEIGHT
    		//if ( $('.site-header.left-aligned .main-navigation.inline').length > 0 ) {
    		
    		if ( !$('.main-navigation').hasClass('below-header-media') ) {
    		
	    		// Reduce the offset if the rollover style of the navigation menu is an underline and the navigation menu is inline or transparent
	    		if ( ( $('.site-header.transparent .main-navigation.inline').length > 0 || $('.site-header.floated .main-navigation.inline').length > 0 || $('.main-navigation.transparent').length > 0 ) && ( $('.main-navigation.rollover-underline').length > 0 || $('.main-navigation.rollover-overline').length > 0 ) ) {
	    			
	    			if ( !$('.main-navigation').hasClass('inline') ) {
		    			textOverlayOffset = textOverlayOffset + parseInt( $('.main-navigation').height() );
		    			sliderControlsOffset = sliderControlsOffset + parseInt( $('.main-navigation').height() );
	    			}
	    			
	    			textOverlayOffset = textOverlayOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
	    			sliderControlsOffset = sliderControlsOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
	    			
	    			if ( $( '.main-navigation .menu .indicator' ).length > 0 ) {
	    				textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
	    				sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
	    			}
	    			
	    		} else {
	    			textOverlayOffset += $('.main-navigation').outerHeight(true);
	    			sliderControlsOffset += $('.main-navigation').outerHeight(true);
	    		}
	    		
    		}
    		
    	} else if ( ( $('.main-navigation.translucent').length > 0 || $('.main-navigation.transparent').length > 0 ) && !$('.main-navigation').hasClass('below-header-media') ) {
    		textOverlayOffset = $('.main-navigation').outerHeight(true);
    		sliderControlsOffset = $('.main-navigation').outerHeight(true);
    		
    		// Reduce the offset if the rollover style of the navigation menu is an underline and the navigation menu is inline or transparent
    		if ( $('.main-navigation.transparent').length > 0 && ( $('.main-navigation.rollover-underline').length > 0 || $('.main-navigation.rollover-overline').length > 0 ) ) {
				textOverlayOffset = textOverlayOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				sliderControlsOffset = sliderControlsOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				
				if ( $( '.main-navigation .menu .indicator' ).length > 0 ) {
					textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
					
					textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
				}
			}
    		
    	}
    	
    	if ( textOverlayOffset ) {
			// If the default slider is being used and there's a text overlay then set the top padding 
			if ( $('.slider-container.default .slider .slide .overlay-container').length > 0 ) {
				$('.slider-container .slider .slide .overlay-container').css('paddingTop', textOverlayOffset);
				$('.slider-container .controls-container').css('marginTop', sliderControlsOffset);
				
			// If there's a header image text overlay then set the top padding
			} else if ( $('.header-image .overlay-container').length > 0 ) {
				// You need to include the height of the top bar as the overlay container has an absolute position and doesn't obey the padding set in tropicana_set_top_bar_offset
				$('.header-image .overlay-container').css('paddingTop', textOverlayOffset);
			}
			
    	}
	}
    
    function tropicana_get_viewport() {
        var e = window;
        var a = 'inner';
        
        if ( !('innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
    	
        return {
        	width: e[ a + 'Width' ],
        	height: e[ a + 'Height' ]
        };
    }
    
    function tropicana_get_scrollbar_width() {

  	  // Creating invisible container
  	  const outer = document.createElement('div');
  	  outer.style.visibility = 'hidden';
  	  outer.style.overflow = 'scroll'; // forcing scrollbar to appear
  	  outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
  	  document.body.appendChild(outer);

  	  // Creating inner element and placing it in the container
  	  const inner = document.createElement('div');
  	  outer.appendChild(inner);

  	  // Calculating difference between container's full width and the child width
  	  const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

  	  // Removing temporary elements from the DOM
  	  outer.parentNode.removeChild(outer);

  	  return scrollbarWidth;
  	}
    
    function tropicana_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load',function(){
    		container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load', function(){
	    	container = $(this).parents('.featured-image-container');
	    	
	    	if ( ( container.hasClass('round') || container.hasClass('square') || container.hasClass('tall') || container.hasClass('medium') || container.hasClass('short') ) ) {
	    		container.css('background-image', 'url("' + $(this).attr('src') + '")' );
		    	
	    		if ( !container.hasClass('disable-style-for-mobile') ) {
	    			$(this).remove();
	    		}
	    	}
	    	
	    	container.removeClass('loading');
	    	
	    	(function(container){ 
	    	    setTimeout(function() { 
	    	    	container.addClass('transition');
	    	    }, 50);
	    	})(container);	    	
	    });
	}
    
    function tropicana_home_slider() {
    	if ( $('.slider').length ) {
    	
	        $(".slider").carouFredSel({
	            responsive: true,
	            circular: true,
	            infinite: false,
	            width: 1200,
	            height: 'variable',
	            items: {
	                visible: 1,
	                width: 1200,
	                height: 'variable'
	            },
	            onCreate: function(items) {
	            	$('.slider-container.default .slider .slide .overlay-container .overlay .opacity.per-line h1').wrapInner('<span></span>');
	            	$('.slider-container.default .slider .slide .overlay-container .overlay .opacity.per-line h2').wrapInner('<span></span>');
	            	$('.slider-container.default .slider .slide .overlay-container .overlay .opacity.per-line h3').wrapInner('<span></span>');
	            	$('.slider-container.default .slider .slide .overlay-container .overlay .opacity.per-line p:not(.no-background)').wrapInner('<span></span>');
	            	
        			initFittext();
        			initFitbutton();

            		tropicana_pad_text_overlay_container();
        			
	            	$('.site-header').removeClass('forced-solid');
	            	$('.slider-container').css('height', 'auto');
	            	$('.slider-container').removeClass('loading');
	            	
            		tropicana_set_slider_controls_visibility();
	    			tropicana_constrain_text_overlay_opacity();
	            },
	            scroll: {
	                fx: 'uncover-fade',
	                duration: tropicanaSliderTransitionSpeed
	            },
	            auto: false,
	            pagination: '.pagination',
	            prev: ".prev",
	            next: ".next",
	            swipe: {
	            	onTouch: true
	            }
	        });

    	}
    }
    
} )( jQuery );