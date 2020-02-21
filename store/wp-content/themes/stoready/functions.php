<?php 
add_action( 'wp_enqueue_scripts', 'stoready_enqueue_styles' );
function stoready_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


function stoready_load_google_fonts() {
	wp_enqueue_style( 'stoready-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900&display=swap' ); 
}
add_action( 'wp_enqueue_scripts', 'stoready_load_google_fonts' );



function stoready_customize_register( $wp_customize ) {


	$wp_customize->add_section( 'products_bgcolor', array(
		'title'      => __('Products Background Color','stoready'),
		'description'      => __('This is a child theme only feature','stoready'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'products_bg_select', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'products_bg_select', array(
		'label'       => __( 'Background Color', 'stoready' ),
		'section'     => 'products_bgcolor',
		'priority'   => 1,
		'settings'    => 'products_bg_select',
		) ) );
	$wp_customize->add_section( 'readmore_button', array(
		'title'      => __('Read More Button','stoready'),
		'priority'   => 1,
		'description'      => __('This is a child theme only feature','stoready'),
		'capability' => 'edit_theme_options',
		) );

	$wp_customize->add_setting( 'readmore_button_text', array(
		'default'           => '#fff',

		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_text', array(
		'label'       => __( 'Text Color', 'stoready' ),
		'section'     => 'readmore_button',
		'priority'   => 1,
		'settings'    => 'readmore_button_text',
		) ) );
	$wp_customize->add_setting( 'readmore_button_background', array(
		'default'           => '#f95b41',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_background', array(
		'label'       => __( 'Background Color', 'stoready' ),
		'section'     => 'readmore_button',
		'priority'   => 1,
		'settings'    => 'readmore_button_background',
		) ) );
}
add_action( 'customize_register', 'stoready_customize_register' );
if(! function_exists('stoready_customize_register_output' ) ):
	function stoready_customize_register_output(){
		?>
		<style type="text/css">
			.entry-content-read-more-wrapper a{ color: <?php echo esc_attr(get_theme_mod( 'readmore_button_text')); ?>; }
			.entry-content-read-more-wrapper a{ background: <?php echo esc_attr(get_theme_mod( 'readmore_button_background')); ?>; }
			.main-navigation a, #site-navigation span.dashicons.dashicons-menu:before, .iot-menu-left-ul a { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
			.cart-customlocation svg{ fill: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
			.navigation-wrapper, .main-navigation ul ul, #iot-menu-left, .cart-preview{ background: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			<?php if ( get_theme_mod( 'hide_navigation' ) == '1' ) : ?>
			.navigation-wrapper {display: none;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'display_navigation_tagline' ) == '1' ) : ?>
		.site-description {display:block;}
		.main-navigation a {line-height:63px;}
		.cart-customlocation svg{margin-top:34px;}
		#site-navigation span.dashicons.dashicons-menu {margin-top:25px;}
	<?php endif; ?>

	<?php if ( get_theme_mod( 'navigation_remove_cart' ) == '1' ) : ?>
	.cart-header {display: none;}
<?php endif; ?>
<?php if ( get_theme_mod( 'hide_addtocart' ) == '1' ) : ?>
	ul.products li.product a.button {display: none;}
<?php endif; ?>


<?php if ( get_theme_mod( 'hide_featured_image' ) == '1' ) : ?>
	.single-post .post-thumbnail {
		display: none;
	}
<?php endif; ?>

/* Customize */
ul.products li.product { background: <?php echo esc_attr(get_theme_mod( 'products_bg_select')); ?>; }
.single .content-area a, .page .content-area a, .woocommerce table.shop_table a { color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
.page .content-area a.button, .single .page .content-area a.button {color:#fff;}
a.button,a.button:hover,a.button:active,a.button:focus, button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
.tags-links a, .cat-links a{ border-color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
.single main article .entry-meta *, .single main article .entry-meta, .archive main article .entry-meta *, .comments-area .comment-metadata time{ color: <?php echo esc_attr(get_theme_mod( 'global_byline')); ?>; }
.single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single .content-area th, .blog.related-posts main article h4 a, .single b.fn, .page b.fn, .error404 h1, .search-results h1.page-title, .search-no-results h1.page-title, .archive h1.page-title, .page header.entry-header h1, h2.woocommerce-loop-product__title, .woocommerce-billing-fields label,#order_comments_field label, .wc_payment_method label, form.woocommerce-EditAccountForm.edit-account legend, .product h1.product_title.entry-title, .woocommerce div.product p.price *{ color: <?php echo esc_attr(get_theme_mod( 'global_headline')); ?>; }
.comment-respond p.comment-notes, .comment-respond label, .page .site-content .entry-content cite, .comment-content *, .about-the-author, .page code, .page kbd, .page tt, .page var, .page .site-content .entry-content, .page .site-content .entry-content p, .page .site-content .entry-content li, .page .site-content .entry-content div, .comment-respond p.comment-notes, .comment-respond label, .single .site-content .entry-content cite, .comment-content *, .about-the-author, .single code, .single kbd, .single tt, .single var, .single .site-content .entry-content, .single .site-content .entry-content p, .single .site-content .entry-content li, .single .site-content .entry-content div, .error404 p, .search-no-results p, .woocommerce-Price-amount.amount, .woocommerce ul.products li.product .price, mark.count, p.woocommerce-result-count, .cart-subtotal span.woocommerce-Price-amount.amount, .order-total span.woocommerce-Price-amount.amount, .woocommerce-terms-and-conditions-wrapper .validate-required label, .woocommerce-form-login span, .woocommerce-form-login label, .create-account span, #customer_login .form-row label, .woocommerce-view-order mark,.woocommerce-view-order ins, table tfoot, .woocommerce form .form-row label, .payment_method_stripe label, .variations label, .product span.sku, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce table.shop_attributes th, .woocommerce table.shop_attributes td { color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
.page .entry-content blockquote, .single .entry-content blockquote, .comment-content blockquote { border-color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
.error-404 input.search-field, .about-the-author, .comments-title, .related-posts h3, .comment-reply-title,#add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart_totals h2, .woocommerce table.shop_table td, .woocommerce-checkout .woocommerce-billing-fields h3, #add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods, .woocommerce-checkout #payment ul.payment_methods,.woocommerce div.product .woocommerce-tabs ul.tabs::before { border-color: <?php echo esc_attr(get_theme_mod( 'global_borders')); ?>; }
.product h1.product_title.entry-title:after, .woocommerce-cart h1:after, .woocommerce-account.woocommerce-page h1.entry-title:after, #customer_login h2:after{ background: <?php echo esc_attr(get_theme_mod( 'global_borders')); ?>; }
.woocommerce table.shop_table.woocommerce-checkout-review-order-table, .single article.post table *,.page article.page table *, nav.woocommerce-MyAccount-navigation li{ border-color: <?php echo esc_attr(get_theme_mod( 'global_borders')); ?> !important; }
.wp-block-button__link, ul li.product .button, ul li.product .button:hover, .woocommerce ul.products li.product .product-feed-button .add_to_cart_button, .woocommerce ul.products li.product .product-feed-button .button, .woocommerce ul.products li.product:hover a.added_to_cart.wc-forward, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li span.current:hover, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li, a.checkout-button.button.alt.wc-forward, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce table.shop_table .coupon button.button, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .return-to-shop a.button.wc-backward, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce-checkout button#place_order, .woocommerce .woocommerce-message a.button.wc-forward, .woocommerce-message a.button.wc-forward:hover, .woocommerce-message a.button.wc-forward:focus, div#customer_login form.woocommerce-EditAccountForm.edit-account button.woocommerce-Button.button, .woocommerce-form-login button.woocommerce-Button.button, #customer_login button.woocommerce-Button.button, a.button, a.button:hover, a.button:active, a.button:focus, button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce-account a.woocommerce-button.button.view, .woocommerce-account a.woocommerce-button.button.view:hover, .woocommerce-account a.woocommerce-button.button.view:active, .woocommerce-account a.woocommerce-button.button.view:focus, .woocommerce .woocommerce-MyAccount-content a.button, .woocommerce .woocommerce-MyAccount-content a.button:hover, .woocommerce .woocommerce-MyAccount-content a.button:active, .woocommerce .woocommerce-MyAccount-content a.button:focus, form#add_payment_method button#place_order, .woocommerce-Address a.edit, .woocommerce table a.button.delete, .woocommerce table a.button.delete:hover, button.single_add_to_cart_button.button.alt, button.single_add_to_cart_button.button.alt:hover, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{ background: <?php echo esc_attr(get_theme_mod( 'global_button_background')); ?>; }
.single .content-area a.wp-block-button__link, .page .content-area a.wp-block-button__link, .wp-block-button__link, ul li.product .button, ul li.product .button:hover, .woocommerce ul.products li.product .product-feed-button .add_to_cart_button, .woocommerce ul.products li.product .product-feed-button .button, .woocommerce ul.products li.product:hover a.added_to_cart.wc-forward, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li span.current:hover, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li, a.checkout-button.button.alt.wc-forward, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce table.shop_table .coupon button.button, .woocommerce table.shop_table input#coupon_code, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, #secondary .search-form input.search-submit, .search-form input.search-submit, input.search-submit, a.button, a.button:hover, a.button:active, a.button:focus, button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce-Address a.edit, .woocommerce table a.button.delete, .woocommerce table a.button.delete:hover,button.single_add_to_cart_button.button.alt, button.single_add_to_cart_button.button.alt:hover, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt { color: <?php echo esc_attr(get_theme_mod( 'global_button_text')); ?> !important; }
.woocommerce table.shop_table input#coupon_code, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-account a.woocommerce-button.button.view, .woocommerce-account a.woocommerce-button.button.view:hover, .woocommerce-account a.woocommerce-button.button.view:active, .woocommerce-account a.woocommerce-button.button.view:focus, .woocommerce .woocommerce-MyAccount-content a.button, .woocommerce .woocommerce-MyAccount-content a.button:hover, .woocommerce .woocommerce-MyAccount-content a.button:active, .woocommerce .woocommerce-MyAccount-content a.button:focus, form#add_payment_method button#place_order, .woocommerce-Address a.edit,.woocommerce table a.button.delete, .woocommerce table a.button.delete:hover, button.single_add_to_cart_button.button.alt, button.single_add_to_cart_button.button.alt:hover,.woocommerce .product .woocommerce-tabs ul.tabs.wc-tabs li.active,.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{ border-color: <?php echo esc_attr(get_theme_mod( 'global_button_background')); ?> !important; }
.woocommerce span.onsale { color: <?php echo esc_attr(get_theme_mod( 'global_sale_text')); ?>; }
.woocommerce span.onsale { background: <?php echo esc_attr(get_theme_mod( 'global_sale_bg')); ?>; }
.woocommerce .woocommerce-ordering select, .woocommerce .quantity input.qty, .woocommerce form input, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .select2-container--default .select2-selection--single, .error-404 input.search-field, div#stripe-card-element, div#stripe-exp-element, div#stripe-cvc-element, .woocommerce div.product form.cart .variations select { background: <?php echo esc_attr(get_theme_mod( 'global_input_bg')); ?>; }
.woocommerce .woocommerce-ordering select, .woocommerce .quantity input.qty, .woocommerce form input, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .select2-container--default .select2-selection--single, .error-404 input.search-field, .select2-container--default .select2-selection--single .select2-selection__rendered, div#stripe-card-element, div#stripe-exp-element, div#stripe-cvc-element, .woocommerce div.product form.cart .variations select { color: <?php echo esc_attr(get_theme_mod( 'global_input_text')); ?>; }
.woocommerce .woocommerce-ordering select, .woocommerce .quantity input.qty, .woocommerce form input, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .select2-container--default .select2-selection--single, .woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select, .error-404 input.search-field, div#stripe-card-element, div#stripe-exp-element, div#stripe-cvc-element, .woocommerce div.product form.cart .variations select { border-color: <?php echo esc_attr(get_theme_mod( 'global_input_bg')); ?> !important; }
.select2-container--default .select2-selection--single .select2-selection__arrow b{ border-color: <?php echo esc_attr(get_theme_mod( 'global_input_text')); ?> transparent transparent transparent; }
.single article.post table *,.page article.page table *, .woocommerce .woocommerce-checkout #payment ul.payment_methods, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce-checkout form.woocommerce-form.woocommerce-form-login.login{ background: #<?php echo esc_attr(get_theme_mod( 'background_color')); ?>; }
body.custom-background.blog, body.blog, body.custom-background.archive, body.archive, body.custom-background.search-results, body.search-results{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_site_background')); ?>; }
.blog main article, .search-results main article, .archive main article, .related-posts.blog main article{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_post_background')); ?>; }
.blog main article h2 a, .search-results main article h2 a, .archive main article h2 a{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_headline')); ?>; }
.blog main article .entry-meta, .archive main article .entry-meta, .search-results main article .entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_byline')); ?>; }
.blog main article p, .search-results main article p, .archive main article p { color: <?php echo esc_attr(get_theme_mod( 'blog_post_excerpt')); ?>; }
.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover { background: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_bg')); ?>; }
.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_link')); ?>; }

<?php if ( get_theme_mod( 'fullwidth_productpages' ) == '1' ) : ?>
	.single-product div#primary.content-area { width: 100%; max-width: 100%; }
	.single-product aside#secondary { display: none; }
<?php endif; ?>
<?php if ( get_theme_mod( 'hide_addtocart' ) == '1' ) : ?>
	ul.products li.product a.button {display: none;}
<?php endif; ?>

<?php if ( get_theme_mod( 'postpage_related_products' ) == '1' ) : ?>
	section.related.products {display: none;}
<?php endif; ?>

</style>
<?php }
add_action( 'wp_head', 'stoready_customize_register_output' );
endif;
