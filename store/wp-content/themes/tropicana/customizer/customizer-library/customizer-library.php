<?php
/**
 * Customizer Library
 *
 * @package        Customizer_Library
 * @author         Devin Price, The Theme Foundry
 * @license        GPL-2.0+
 * @version        1.3.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Continue if the Customizer_Library isn't already in use.
if ( ! class_exists( 'Customizer_Library' ) ) :

// 	echo plugin_dir_path( __FILE__ ) . '<br />';
// 	echo get_template_directory() . '\customizer\customizer-library';

	// Helper functions to output the customizer controls.
	require get_template_directory() . '/customizer/customizer-library/extensions/interface.php';

	// Helper functions for customizer sanitization.
	require get_template_directory() . '/customizer/customizer-library/extensions/sanitization.php';

	// Helper functions to build the inline CSS.
	require get_template_directory() . '/customizer/customizer-library/extensions/style-builder.php';

	// Helper functions for fonts.
	require get_template_directory() . '/customizer/customizer-library/extensions/fonts.php';

	// Utility functions for the customizer.
	require get_template_directory() . '/customizer/customizer-library/extensions/utilities.php';

	// Customizer preview functions.
	require get_template_directory() . '/customizer/customizer-library/extensions/preview.php';

	// Arbitrary content controls
	require get_template_directory() . '/customizer/customizer-library/custom-controls/content.php';

	// Heading control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/heading.php';

	// Divider control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/divider.php';

	// Info control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/info.php';
	
	// Warning control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/warning.php';
	
	// Dropdown Categories control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/dropdown-categories.php';
	
	// Dropdown image sizes control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/dropdown-image-sizes.php';
	
	// Pixels control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/pixels.php';

	// Milliseconds control
	require get_template_directory() . '/customizer/customizer-library/custom-controls/milliseconds.php';
	
	/**
	 * Class wrapper with useful methods for interacting with the theme customizer.
	 */
	class Customizer_Library {

		/**
		 * The one instance of Customizer_Library.
		 *
		 * @since 1.0.0.
		 *
		 * @var   Customizer_Library_Styles    The one instance for the singleton.
		 */
		private static $instance;

		/**
		 * The array for storing $options.
		 *
		 * @since 1.0.0.
		 *
		 * @var   array    Holds the options array.
		 */

		public $options = array();

		/**
		 * Instantiate or return the one Customizer_Library instance.
		 *
		 * @since  1.0.0.
		 *
		 * @return Customizer_Library
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_options( $options = array() ) {
			$this->options = array_merge( $options, $this->options );
		}

		public function get_options() {
			return $this->options;
		}

	}

endif;