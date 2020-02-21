<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( pll__( get_theme_mod( 'tropicana-search-placeholder-text', customizer_library_get_default( 'tropicana-search-placeholder-text' ) ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'tropicana' ); ?>" />
	</label>
	<div class="search-submit-container">
		<a class="search-submit">
			<i class="otb-fa otb-fa-search"></i>
		</a>
	</div>
</form>