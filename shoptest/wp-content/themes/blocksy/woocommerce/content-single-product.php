<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

$product_class = '';

$content_area_style = get_theme_mod('product_content_style', 'wide');

if (get_theme_mod('gallery_style', 'horizontal') === 'vertical') {
	global $product;

	if (count($product->get_gallery_image_ids()) > 0) {
		$product_class = 'thumbs-left';
	}
}

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

?>

<div
	id="product-<?php the_ID(); ?>"
	<?php wc_product_class($product_class, get_the_ID()); ?>
	data-structure="<?php echo $content_area_style ?>">

	<?php

		blocksy_add_customizer_preview_cache(function () {
			return blocksy_html_tag(
				'div',
				['data-id' => 'single-sale-flash'],
				blocksy_collect_and_return(function () {
					woocommerce_show_product_sale_flash();
				})
			);
		});

		echo '<div class="product-entry-wrapper">';

		if (get_theme_mod('has_product_single_onsale', 'yes') === 'yes') {
			woocommerce_show_product_sale_flash();
		}

		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php

			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	</div>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php
	woocommerce_upsell_display();
	woocommerce_output_related_products();
	do_action('woocommerce_after_single_product');
?>

