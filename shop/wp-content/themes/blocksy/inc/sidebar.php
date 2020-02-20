<?php
/**
 * Sidebar helpers
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Blocksy
 */

function blocksy_get_sidebars_list() {
	return apply_filters('blocksy_sidebars_list', [
		[
			'name' => __('Main Sidebar', 'blocksy'),
			'id' => 'sidebar-1'
		]
	]);
}

function blocksy_proper_sidebar_id($id) {
	if ($id === 'sidebar-1') {
		return $id;
	}

	if (! class_exists('BlocksySidebarsManager')) {
		return 'sidebar-1';
	}

	$manager = new BlocksySidebarsManager();

	if (! isset($manager->get_all()[$id])) {
		return 'sidebar-1';
	}

	return 'ct-dynamic-sidebar-' . $id;
}

function blocksy_get_sidebar_picker_option($args = []) {
	$args = wp_parse_args($args, [
		'id' => 'sidebar',
		'wrap' => null,
		'prefix' => null
	]);

	$sidebar_list = blocksy_get_sidebars_list();

	$choices = [];

	foreach ($sidebar_list as $sidebar) {
		$choices[$sidebar['id']] = $sidebar['name'];
	}

	$option = [
		$args['id'] => [
			'label' => __('Choose Sidebar/Widget Area', 'blocksy'),
			'type' => 'ct-select',
			'value' => 'sidebar-1',
			'view' => 'text',
			'design' => 'block',
			'setting' => ['transport' => 'postMessage'],
			'choices' => blocksy_ordered_keys($choices),

			// 'sectionAttr' => [ 'class' => 'ct-manage-sidebars' ],
			// 'linkAttr' => [
			// 	'href' => admin_url('widgets.php'),
			// 	'target' => '_blank',
			// 	'class' => 'button'
			// ],
			// 'link' => 'Manage Sidebars',
		]

	];

	if ($args['prefix']) {
		$option[$args['id']]['selective_refresh'] = [
			[
				'id' => $args['id'],
				'selector' => '#sidebar',
				'container_inclusive' => true,
				'render_callback' => function () use ($args) {
					echo blocksy_render_sidebar($args['prefix']);
				}
			]
		];
	}

	$option = apply_filters(
		'blocksy_sidebar_picker_option',
		[],
		$option,
		$args
	);

	if ($args['wrap'] && ! empty($option)) {
		return call_user_func($args['wrap'], $option);
	}

	return $option;
}

function blocksy_get_sidebar_prefix() {
	if (function_exists('is_lifterlms') && is_lifterlms()) {
		return 'lms';
	}

	if (is_search()) {
		return 'search';
	}

	if (get_post_type() === 'post') {
		if (is_category() || is_tag()) {
			return 'categories';
		}

		if (is_author()) {
			return 'author';
		}

		if (! is_single()) {
			return 'blog';
		}
	}

	if (get_post_type() === 'product') {
		if (! is_single()) {
			return 'woo_category';
		}

		return 'product';
	}

	if (!is_single() && !is_page()) {
		return null;
	}

	if (is_single()) {
		return 'post';
	}

	if (blocksy_is_page()) {
		return 'page';
	}

	return null;
}

function blocksy_get_sidebar_to_render($prefix = null) {
	if (! $prefix) {
		$prefix = blocksy_get_sidebar_prefix();
	}

	if ($prefix === 'lms') {
		return 'right';
	}

	if ($prefix === 'search') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'search_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'categories') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'categories_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'author') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'author_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'blog') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'blog_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'woo_category') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'woo_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'product') {
		return blocksy_proper_sidebar_id(get_theme_mod(
			'product_sidebar',
			'sidebar-1'
		));
	}

	if ($prefix === 'post' || $prefix === 'page') {
		$default_page_structure = blocksy_default_akg(
			'page_structure_type',
			blocksy_get_post_options(),
			'default'
		);

		if ($default_page_structure !== 'default') {
			return blocksy_proper_sidebar_id(blocksy_default_akg(
				'sidebar',
				blocksy_get_post_options(),
				'sidebar-1'
			));
		}

		return blocksy_proper_sidebar_id(
			get_theme_mod('single_blog_post_sidebar', 'sidebar-1')
		);
	}

	return 'sidebar-1';
}

/**
 * Get sidebar position.
 */
function blocksy_sidebar_position_attr() {
	return (
		blocksy_sidebar_position() === 'none'
	) ? '' : 'data-sidebar="' . blocksy_sidebar_position() . '"';
}

/**
 * Get single page structure.
 */
function blocksy_get_single_page_structure() {
	$default_page_structure = blocksy_default_akg(
		'page_structure_type',
		blocksy_get_post_options(),
		'default'
	);

	if ($default_page_structure !== 'default') {
		return $default_page_structure;
	}

	if (blocksy_is_page()) {
		return get_theme_mod('single_page_structure', 'type-4');
	}

	if (! is_single()) {
		return 'none';
	}

	return get_theme_mod('single_blog_post_structure', 'type-3');
}

/**
 * Sidebar position.
 */
function blocksy_sidebar_position($prefix = null) {
	if (! $prefix) {
		$prefix = blocksy_get_sidebar_prefix();
	}

	if ($prefix === 'lms') {
		return 'right';
	}

	$listing_source = blocksy_get_posts_listing_source();

	$blog_post_structure = blocksy_akg_or_customizer(
		'structure',
		$listing_source,
		'grid'
	);

	if ($prefix === 'search') {
		if (
			get_theme_mod('search_has_sidebar', 'no') === 'no'
			||
			$blog_post_structure === 'gutenberg'
		) {
			return 'none';
		}

		return get_theme_mod('search_sidebar_position', 'right');
	}

	if ($prefix === 'categories') {
		if (
			get_theme_mod('categories_has_sidebar', 'no') === 'no'
			||
			$blog_post_structure === 'gutenberg'
		) {
			return 'none';
		}

		return get_theme_mod('categories_sidebar_position', 'right');
	}

	if ($prefix === 'author') {
		if (
			get_theme_mod('author_has_sidebar', 'no') === 'no'
			||
			$blog_post_structure === 'gutenberg'
		) {
			return 'none';
		}

		return get_theme_mod('author_sidebar_position', 'right');
	}

	if ($prefix === 'blog') {
		if (
			get_theme_mod('blog_has_sidebar', 'no') === 'no'
			||
			$blog_post_structure === 'gutenberg'
		) {
			return 'none';
		}

		return get_theme_mod('blog_sidebar_position', 'right');
	}

	if ($prefix === 'woo_category') {
		if (get_theme_mod('woo_has_sidebar', 'no') === 'no') {
			return 'none';
		}

		return get_theme_mod('woo_sidebar_position', 'right');
	}

	if ($prefix === 'product') {
		if (get_theme_mod('product_has_sidebar', 'no') === 'no') {
			return 'none';
		}

		return get_theme_mod( 'product_sidebar_position', 'right' );
	}

	if ($prefix !== 'page' && $prefix !== 'post') {
		return 'right';
	}

	$page_structure_type = blocksy_get_single_page_structure();

	if ('type-1' === $page_structure_type) {
		return 'right';
	}

	if ('type-2' === $page_structure_type) {
		return 'left';
	}

	return 'none';
}

/**
 * Get page structure.
 */
function blocksy_get_page_structure() {
	$page_structure_type = blocksy_get_single_page_structure();

	if ('type-3' === $page_structure_type) {
		return 'narrow';
	}

	if ('type-4' === $page_structure_type) {
		return 'normal';
	}

	if ('type-5' === $page_structure_type) {
		return 'normal';
	}

	return 'none';
}

function blocksy_get_page_container_width() {
	$page_structure_type = blocksy_get_single_page_structure();

	if (blocksy_get_page_structure() === 'narrow') {
		return 'ct-container-narrow';
	}

	return 'ct-container';
}
