<?php
/**
 * Visibility helpers
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Blocksy
 */

/**
 * Generate visibility classes
 *
 * @param string $data Devices state.
 */
function blocksy_visibility_classes( $data ) {
	$classes = [];

	if ( isset( $data['mobile'] ) && ! $data['mobile'] ) {
		$classes[] = 'ct-hidden-sm';
	}

	if ( isset( $data['tablet'] ) && ! $data['tablet'] ) {
		$classes[] = 'ct-hidden-md';
	}

	if ( isset( $data['desktop'] ) && ! $data['desktop'] ) {
		$classes[] = 'ct-hidden-lg';
	}

	return implode( ' ', $classes );
}

function blocksy_is_visible($data) {
	return (
		isset($data['mobile']) && $data['mobile']
		||
		isset($data['tablet']) && $data['tablet']
		||
		isset($data['desktop']) && $data['desktop']
	);
}

function blocksy_output_visibility($args = []) {
	$args = wp_parse_args(
		$args,
		[
			'css' => null,
			'tablet_css' => null,
			'mobile_css' => null,
			'value' => null,
			'selector' => '',
			'display' => 'block'
		]
	);

	blocksy_assert_args(
		$args,
		['css', 'tablet_css', 'mobile_css', 'selector', 'value']
	);

	if (! blocksy_is_visible($args['value'])) {
		return;
	}

	$all_enabled = (
		isset($args['value']['mobile']) && $args['value']['mobile']
		&&
		isset($args['value']['tablet']) && $args['value']['tablet']
		&&
		isset($args['value']['desktop']) && $args['value']['desktop']
	);

	if ($all_enabled) {
		return;
	}

	if (isset($args['value']['mobile']) && !$args['value']['mobile']) {
		$args['mobile_css']->put($args['selector'], '--visibility: none');
	} else {
		if (! $all_enabled) {
			$args['mobile_css']->put($args['selector'], '--visibility: ' . $args['display']);
		}
	}

	if (isset($args['value']['tablet']) && !$args['value']['tablet']) {
		$args['tablet_css']->put($args['selector'], '--visibility: none');
	} else {
		if (! $all_enabled) {
			$args['tablet_css']->put($args['selector'], '--visibility: ' . $args['display']);
		}
	}

	if (isset($args['value']['desktop']) && !$args['value']['desktop']) {
		$args['css']->put($args['selector'], '--visibility: none');
	} else {
		if (! $all_enabled) {
			$args['css']->put($args['selector'], '--visibility: ' . $args['display']);
		}
	}
}

