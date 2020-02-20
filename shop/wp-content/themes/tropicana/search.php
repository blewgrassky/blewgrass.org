<?php
/**
 * The template for displaying search results pages.
 *
 * @package Tropicana
 */

get_header(); ?>

	<section id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
            
            <?php if ( function_exists( 'bcn_display' ) ) : ?>
            <div class="breadcrumbs">
                <?php bcn_display(); ?>
            </div>
            <?php endif; ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'tropicana' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			
			<div class="archive-container">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'library/template-parts/content', 'search' );
					?>
	
				<?php endwhile; ?>
	
				<?php tropicana_paging_nav(); ?>
				
			</div><!-- .archive-container -->

		<?php else : ?>

			<?php get_template_part( 'library/template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php
get_footer();