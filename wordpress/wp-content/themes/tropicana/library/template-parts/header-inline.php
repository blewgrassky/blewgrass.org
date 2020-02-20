<?php
if ( get_theme_mod( 'tropicana-header-show-top-bar', customizer_library_get_default( 'tropicana-header-show-top-bar' ) ) ) :
	get_template_part( 'library/template-parts/top-bar' );
endif;

$logo = '';
$logo_link_content = '';
$title_classes = array();

if ( get_theme_mod( 'tropicana-logo-link-content', customizer_library_get_default( 'tropicana-logo-link-content' ) ) == "" ) {
	$logo_link_content = home_url( '/' );
} else {
	$logo_link_content = get_permalink( get_theme_mod( 'tropicana-logo-link-content' ) );
}

if ( function_exists( 'has_custom_logo' ) ) {
	if ( has_custom_logo() ) {
		$logo = get_custom_logo();
	}
} else if ( get_theme_mod( 'tropicana-logo' ) ) {
	$logo = "<a href=\"". esc_url( $logo_link_content ) ."\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) ."\" class=\"custom-logo-link\"><img src=\"". esc_url( get_theme_mod( 'tropicana-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) ."\" class=\"custom-logo\" /></a>";
}

if ( get_theme_mod( 'tropicana-site-title-uppercase', customizer_library_get_default( 'tropicana-site-title-uppercase' ) ) ) {
	$title_classes[] = 'uppercase';
}
?>

<div class="site-logo-area border-bottom">
	<div class="site-container">
	    
	    <div class="branding">
	        <?php
			if ( $logo ) {
	       		echo $logo;
	        
			} else {
			?>
				<a href="<?php echo esc_url( $logo_link_content ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="title <?php echo implode( ' ', $title_classes ); ?>"><?php bloginfo( 'name' ); ?></a>
				<div class="description"><?php bloginfo( 'description' ); ?></div>
	        <?php
	        }
	        ?>
		</div>
		
		<?php
		$top_right = '';
	    
		if ( tropicana_is_woocommerce_activated() && get_theme_mod( 'tropicana-header-shop-links', customizer_library_get_default( 'tropicana-header-shop-links' ) ) ) {
			$top_right = 'shop-links';
		} else { 
			$top_right = 'social-links';
		}
		?>
	    
	    <div class="site-header-right <?php echo $top_right == '' ? 'top-empty' : ''; ?>">
	        
	        <div class="top <?php echo $top_right == '' ? 'empty' : $top_right; ?>">
		        <?php
		        switch ($top_right) {
		    		case 'shop-links':
		    			get_template_part( 'library/template-parts/shop-links' );
		    			break;
	
		    		case 'social-links':
		    			get_template_part( 'library/template-parts/social-links' );
		    			break;
		    	}
		    	?>
	        </div>

	        <div class="bottom navigation-menu">
	        	<div class="main-navigation-container">

				<?php
				get_template_part( 'library/template-parts/navigation-menu' );
				?>

				</div>
			</div>

	    </div>
	    <div class="clearboth"></div>
	    
	</div>
</div>
