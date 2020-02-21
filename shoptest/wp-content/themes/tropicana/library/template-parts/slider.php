<?php
global $tropicana_slider_type, $tropicana_slider_shortcode, $tropicana_demo_slides;

if ( $tropicana_slider_type == 'plugin' ) :
?>
	<div class="slider-padder">
		<div class="slider-container">
			<?php
			if ( get_theme_mod( 'tropicana-slider-plugin-shortcode', customizer_library_get_default( 'tropicana-slider-plugin-shortcode' ) ) != '' ) {
				echo do_shortcode( sanitize_text_field( get_theme_mod( 'tropicana-slider-plugin-shortcode' ) ) );
			}
			?>
	    </div>
    </div>
<?php
elseif ( $tropicana_slider_type == 'default' ) :
	$opacity_classes 	  		= array();
	$translucent_logo_container = get_theme_mod( 'tropicana-layout-logo-container-opacity', customizer_library_get_default( 'tropicana-layout-logo-container-opacity' ) ) < 1;
	$translucent_navigation 	= get_theme_mod( 'tropicana-navigation-menu-opacity', customizer_library_get_default( 'tropicana-navigation-menu-opacity' ) ) < 1;	

	if ( get_theme_mod( 'tropicana-slider-text-overlay-text-shadow', customizer_library_get_default( 'tropicana-slider-text-overlay-text-shadow' ) ) ) {
		$opacity_classes[] = 'text-shadow';
	}

	$slider_categories = get_theme_mod( 'tropicana-slider-categories' );
	
	if ( $slider_categories ) {
        
		$slider_query = new WP_Query( 'cat=' . implode(',', $slider_categories) . '&posts_per_page=-1&orderby=date&order=DESC&id=slider' );
	        
		if ( $slider_query->have_posts() ) :
?>	
			<div class="slider-padder">
				<div class="slider-container default loading">
				
					<div class="controls-container one-third">
						<div class="controls">
							<div class="prev one-third square-solid">
								<i class="otb-fa otb-fa-angle-left"></i>
							</div>
							<div class="next one-third square-solid">
								<i class="otb-fa otb-fa-angle-right"></i>
							</div>
						</div>
					</div>
				
					<ul class="slider">
				                    
						<?php
						while ( $slider_query->have_posts() ) : $slider_query->the_post();
						?>
				                    
						<li class="slide">
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'full', array( 'class' => '' ) );
							endif;
							?>
	
							<div class="opacity"></div>
	
				            <?php 
				            $content = trim( get_the_content() );
				            
				            if ( !empty( $content ) ) {
				            ?>
				            <div class="overlay-container">
				            	
								<div class="overlay">
									<div class="opacity <?php echo implode( ' ', $opacity_classes ); ?>">
										<?php
										echo wp_kses_post( $content );
										?>
									</div>
								</div>
				            	
							</div>
							<?php 
							}
							?>
						</li>
				        
						<?php
						endwhile;
						wp_reset_postdata();
						?>
				                    
					</ul>
					
					<div class="pagination"></div>
					
				</div>
			</div>
	
<?php
		elseif ( $translucent_logo_container || $translucent_navigation ) :
?>
			<div class="slider-placeholder"></div>
<?php
		endif;
	
	} else {
?>

		<div class="slider-padder">
			<div class="slider-container default loading">
			
				<div class="controls-container one-third">
					<div class="controls">
						<div class="prev one-third square-solid">
							<i class="otb-fa otb-fa-angle-left"></i>
						</div>
						<div class="next one-third square-solid">
							<i class="otb-fa otb-fa-angle-right"></i>
						</div>
					</div>
				</div>
	                        
	            <ul class="slider">
					<?php
					foreach ( $tropicana_demo_slides as $slide ) {
					?>
	            	
					<li class="slide">
						<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php esc_attr_e('Demo Slide', 'tropicana'); ?>" />
	                    <div class="opacity"></div>
						<div class="overlay-container">
						
		                    <div class="overlay">
		                    	<div class="opacity one-third centered per-line centered-text <?php echo implode( ' ', $opacity_classes ); ?>">
									<?php
									echo wp_kses_post( trim( $slide['text'] ) );
									?>
		                        </div>
		                	</div>
	                    </div>
	                </li>
	                
	                <?php
	                }
	                ?>
	                
	            </ul>
	            
				<div class="pagination"></div>
	        </div>
        </div>

<?php
	}
else :
?>

	<div class="slider-padder">
		<div class="slider-container">
			<?php
			echo do_shortcode( sanitize_text_field( $tropicana_slider_shortcode ) );
			?>
		</div>
	</div>
<?php
endif;