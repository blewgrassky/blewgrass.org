<ul class="social-links">
<?php
if( get_theme_mod( 'tropicana-social-email', customizer_library_get_default( 'tropicana-social-email' ) ) != '' ) :
    echo '<li><a href="' . esc_attr( 'mailto:' . antispambot( get_theme_mod( 'tropicana-social-email' ), 1 ) ) . '" title="';
	esc_attr_e( 'Send us an email', 'tropicana' );
	echo '" class="social-email"><i class="otb-fa otb-fa-envelope-o"></i></a></li>';
endif;

if( get_theme_mod( 'tropicana-social-skype', customizer_library_get_default( 'tropicana-social-skype' ) ) != '' ) :
    echo '<li><a href="' . esc_attr( 'skype:' . get_theme_mod( 'tropicana-social-skype' ) . '?userinfo' ) . '" title="';
	esc_attr_e( 'Contact us on Skype', 'tropicana' );
	echo '" class="social-skype"><i class="otb-fa otb-fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'tropicana-social-tumblr', customizer_library_get_default( 'tropicana-social-tumblr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'tropicana-social-tumblr' ) ) . '" target="_blank" title="';
	esc_attr_e( 'Find us on Tumblr', 'tropicana' );
	echo '" class="social-tumblr"><i class="otb-fa otb-fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'tropicana-social-flickr', customizer_library_get_default( 'tropicana-social-flickr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'tropicana-social-flickr' ) ) . '" target="_blank" title="';
	esc_attr_e( 'Find us on Flickr', 'tropicana' );
	echo '" class="social-flickr"><i class="otb-fa otb-fa-flickr"></i></a></li>';
endif;
?>
</ul>