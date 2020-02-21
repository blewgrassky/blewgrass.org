<?php
$left = '';
if ( empty( wp_kses_post( get_theme_mod( 'tropicana-header-info-text-one', customizer_library_get_default( 'tropicana-header-info-text-one' ) ) ) ) ) {
	$left = ''; 
} else {
	$left = 'info-text-one';
}

$right = '';
if ( tropicana_is_woocommerce_activated() ) {
	$right = 'shop-links';
}

?>
    <div class="site-top-bar <?php echo $left == '' ? 'left-empty' : ''; ?> <?php echo $right == '' ? 'right-empty' : ''; ?>">
        
        <div class="site-container">
            
            <div class="site-top-bar-left <?php echo $left == '' ? 'empty' : $left; ?>">
        		<?php
        		if ( $left == 'info-text-one' ) {
    				get_template_part( 'library/template-parts/info-text' );
    			}
				?>            
            </div>
            
            <div class="site-top-bar-right <?php echo $right == '' ? 'empty' : $right; ?>">
        		<?php
		        if ( $right == 'shop-links' ) {
	    			get_template_part( 'library/template-parts/shop-links' );
		    	}
				?>                
            </div>
            <div class="clearboth"></div>
            
        </div>
    </div>
