<?php
if ( get_theme_mod( 'post_categories') == 'no' ) return;

$categories = get_the_category( $post->ID );
$separator  = ', ';
$output     = '';

if ( $categories ) {
	echo '<p class="post-categories">';
	echo '<span>' . esc_html_x( 'Published in', 'PUBLISHED IN post category', 'modern-store' ) . '</span> ';
	foreach ( $categories as $category ) {
		if ( $category === end( $categories ) && $category !== reset( $categories ) ) {
			$output = rtrim( $output, ", " );
			$output .= ' ' . esc_html_x( 'and', 'category AND category', 'modern-store' ) . ' ';
		}
		// translators: placeholder is the name of the post category
		$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( _x( "View all posts in %s", 'View all posts in post category', 'modern-store' ), esc_html( $category->name ) ) ) . '">' . esc_html( $category->cat_name ) . '</a>' . $separator;
	}
	echo wp_kses_post( trim( $output, $separator ) );
	echo "</p>";
}