<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php matangi_content_class();?>>
		<main id="main" <?php matangi_main_class(); ?>>
			<?php
			/**
			 * matangi_before_main_content hook.
			 *
			 */
			do_action( 'matangi_before_main_content' );

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) : ?>

					<div class="comments-area">
						<?php comments_template(); ?>
					</div>

				<?php endif;

			endwhile;

			/**
			 * matangi_after_main_content hook.
			 *
			 */
			do_action( 'matangi_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * matangi_after_primary_content_area hook.
	 *
	 */
	 do_action( 'matangi_after_primary_content_area' );

	 matangi_construct_sidebars();

get_footer();
