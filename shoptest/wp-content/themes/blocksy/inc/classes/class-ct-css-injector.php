<?php
/**
 * CSS Injector
 * Helper object for including dynamic styles into head of the document,
 * with possibilities of extending it.
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package Blocksy
 */

defined('ABSPATH') || die("Don't run this file directly!");

class Blocksy_Css_Injector {
	/**
	 * Temporary CSS attributes.
	 *
	 * @var array $attr Attributes.
	 */
	private $attr = array();

	/**
	 * Keyword that allows skiping a certain CSS rule from getting in the output.
	 */
	public static function get_skip_rule_keyword($suffix = '') {
		return 'CT_CSS_SKIP_RULE' . $suffix;
	}

	public static function get_inline_keyword($suffix = '') {
		return 'CT_CSS_INLINE_CSS' . $suffix;
	}

	/**
	 * Injector constructor.
	 */
	public function __construct() {
		$this->additional_symbols = array('-', '%', 'px', 's');
	}

	/**
	 * Parse each temporary structure and transform it into actual CSS.
	 */
	public function build_css_structure() {
		$content = '';

		if (isset($this->attr[Blocksy_Css_Injector::get_inline_keyword()])) {
			$content = implode('', $this->attr[Blocksy_Css_Injector::get_inline_keyword()]);
			unset($this->attr[Blocksy_Css_Injector::get_inline_keyword()]);
		}

		if (count($this->attr)) {
			$content .= "\n" . $this->convert_to_css();
		}

		$content = $this->css_minify($content);

		return $content;
	}

	/**
	 * Add new line in CSS structure.
	 *
	 * @param string|array $selector CSS class, id, tag.
	 * @param string|array $rules CSS syntax.
	 */
	public function put($selector, $rules) {
		$normalized = $this->normalize_inputs($selector, $rules);

		if (! $normalized) {
			return;
		}

		$selector = $normalized['selector'];
		$rules = $normalized['rules'];

		if (! isset($this->attr[$selector])) {
			$this->attr[$selector] = [];
		}

		foreach ($rules as $line) {
			$line = trim($line);

			if (
				! $line
				||
				in_array($line, $this->attr[$selector], true)
			) {
				continue;
			}

			$this->attr[$selector][] = $line;
		}

		if ($selector !== Blocksy_Css_Injector::get_inline_keyword()) {
			$this->attr[$selector] = $this->remove_dublication(
				$this->attr[$selector]
			);
		}
	}

	private function normalize_inputs($selector, $preliminary_rules) {
		if (is_string($preliminary_rules) && trim($preliminary_rules) === '') {
			return false;
		}

		if (is_array($selector)) {
			$selector = implode(",\n", $selector);
		}

		$rules = [];

		if ($selector === Blocksy_Css_Injector::get_inline_keyword()) {
			$rules = is_array($preliminary_rules) ? $preliminary_rules : [
				$preliminary_rules
			];
		} else {
			// Convert string to array.
			if (! is_array($preliminary_rules)) {
				$rules = explode(';', $preliminary_rules);
			} else {
				/**
				 * Support nested rules.
				 */
				foreach ($preliminary_rules as $maybe_rule) {
					$current_rules = explode(';', $maybe_rule);

					foreach ($current_rules as $current_rule) {
						$rules[] = $current_rule;
					}
				}
			}
		}

		return [
			'selector' => $selector,
			'rules' => $rules
		];
	}

	/**
	 * Merge selectors that have the same CSS. This has the effect of increasing
	 * the weight of the selectors.
	 */
	private function merge_class_with_the_same_css() {
		return;

		$new_names = [];
		$used = [];

		foreach ($this->attr as $key => $values) {
			if (isset($used[$key])) {
				continue;
			}

			foreach ($this->attr as $sub_key => $sub_values) {
				if ($sub_key !== $key && $values === $sub_values) {
					$used[$sub_key] = 1;
					$new_names[$key][] = $sub_key;
					$used[$key] = 1;
				}
			}
		}

		// Merge classes.
		foreach ($new_names as $parent => $childs) {
			$class_name = $parent . ",\n" . join(",\n", $childs);
			$this->attr[$class_name] = $this->attr[$parent];

			// Remove CSS from main structure.
			if (isset($this->attr[$parent])) {
				unset($this->attr[$parent]);
			}

			// Remove all childs css.
			foreach ($childs as $child_class) {
				if (isset($this->attr[$child_class])) {
					unset($this->attr[$child_class]);
				}
			}
		}
	}

	/**
	 * Convert this->attr to a CSS string.
	 */
	private function convert_to_css() {
		$css = '';

		$this->merge_class_with_the_same_css();

		foreach ($this->attr as $key => $values) {
			$section = '';

			$section .= $key . " {\n";

			$content = '';

			foreach ($values as $line) {
				$line = trim( $line );

				if (! $this->is_empty_style($line)) {
					if (strpos($key, '@media') === false) {
						$line = str_replace(';', '', $line);
					}

					$content .= "    {$line}";

					if (strpos($key, '@media') === false) {
						$content .= ";\n";
					}
				}
			}

			// CSS is not empty.
			if ($content) {
				$section .= $content;
			} else {
				continue;
			}

			$section .= "}\n\n";
			$css .= $section;
		}

		// Erase structure.
		$this->attr = [];

		return $css;
	}

	/**
	 * Check if a CSS rule is empty.
	 *
	 * @param string $line Single rule.
	 */
	private function is_empty_style($line) {
		$parts = explode(':', $line);

		if (count($parts) <= 1) {
			return false;
		}

		if (! isset($parts[1])) {
			return true;
		}

		$parts[1] = str_replace($this->additional_symbols, '', $parts[1]);

		return strlen(trim($parts[1])) === 0;
	}

	/**
	 * Remove dublications of CSS rules.
	 * Input: array( 'color: red', 'color: blue' )
	 * Output: array( 'color: blue' )
	 * Return the last rule.
	 *
	 * @param array $rules CSS Rules.
	 * @return array
	 */
	protected function remove_dublication($rules) {
		$applied_rules = [];
		$applied_css_properties = [];

		foreach ($rules as $line) {
			if (strpos($line, self::get_skip_rule_keyword()) !== false) {
				continue;
			}

			/**
			 * font-family: value;
			 *      ^------------------ $css_property
			 *                ^---------$css_value
			 */
			$css_property = substr($line, 0, strpos($line, ':'));

			if (in_array($css_property, $applied_css_properties, true)) {
				continue;
			}

			/**
			 * Skip redundant variables
			 * --a: var(--a)
			 */
			if (strpos($css_property, '--') === 0) {
				if (strpos(explode(':', $line)[1], $css_property) !== false) {
					continue;
				}
			}

			$applied_rules[] = $line;
			$applied_css_properties[] = $css_property;
		}

		krsort($applied_rules);

		return $applied_rules;
	}

	/**
	 * Very rudimentary CSS minifier.
	 *
	 * @param string $minify CSS to be minified.
	 */
	private function css_minify($minify) {
		if (defined('WP_DEBUG') && WP_DEBUG) {
			// return $minify;
		}

		/* remove comments */
		$minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

		/* remove tabs, spaces, newlines, etc. */
		$minify = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $minify );
		/* remove space after colons */
		$minify = str_replace( ': ', ':', $minify );

		return $minify;
	}
}

