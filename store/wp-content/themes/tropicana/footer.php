<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tropicana
 */
?>

	</div><!-- #content -->
</div><!-- .content-container -->

<footer id="colophon" class="site-footer" role="contentinfo">
	
	<div class="site-footer-widgets widget-title-short-underline">
        <div class="site-container">
        
            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="widgets-container">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
    		<?php endif; ?>
    		
            <div class="clearboth"></div>
        </div>
    </div>
	
	<div class="site-footer-bottom-bar">
	
		<div class="site-container">
			
			<div class="site-footer-bottom-bar-left">
				
				<?php printf( __( 'Theme by <a href="%1$s" rel="nofollow">%2$s</a>', 'tropicana' ), esc_url( 'https://www.outtheboxthemes.com' ), __( 'Out the Box', 'tropicana' ) ); ?>
                
			</div>
	        
	        <div class="site-footer-bottom-bar-right">
	        
	        	<?php wp_nav_menu( array( 'theme_location' => 'footer-bottom-bar-right','container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>

	        </div>
	        
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
</footer><!-- #colophon -->

<?php
if ( get_theme_mod( 'tropicana-social-right-aligned-buttons', customizer_library_get_default( 'tropicana-social-right-aligned-buttons' ) ) ) {
?>
<div class="side-aligned-social-links">
<?php
get_template_part( 'library/template-parts/social-links' );
?>
</div>
<?php 
}
?>

<?php wp_footer(); ?>

</body>
</html>