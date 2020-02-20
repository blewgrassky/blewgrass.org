<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'Wd`2k`Zkzrd.HJRu`8+TdcS3jkyl{Knk$5IR`|56_E>__|ap|A44tB9xoUl!:a2]');
define('SECURE_AUTH_KEY',  'j&/$[Yh/k=[1U;k@n+be4><Ik20t-_i4gsFjZ&HD-SJ~J>;6q_`,[.W{(-0T^g[k');
define('LOGGED_IN_KEY',    '2D6UQkisT}hM=!Nuu~OOqocKeq->MLqvt`ZI8(Wj[5D#di;e,o U-FB:-9G 4!S~');
define('NONCE_KEY',        '<%E{aqe#|[:W!im6M(v9oI[<Pqd$Gr*$VE|Q=;U _K$z.|E4TlIEu<Fy/%/ccv+2');
define('AUTH_SALT',        'ssu*[Au.jrnTc5*(_/~oz5tn(;I@GX{:R~+G>@,M!9U(}nmy_4G7)xj~*J81cMAG');
define('SECURE_AUTH_SALT', 'nHG8pe5B7EX,^R?$#:BBXx%j PVG3h8MH28NOf!4^{m94%Av@}KS I(Py;sc,0-y');
define('LOGGED_IN_SALT',   '}uQCB#eBccW&_W^i4i1cooA+Eqht<x<9j9wQKY/tvAU4]bx*uNvL?Hls-5_~}_[N');
define('NONCE_SALT',       '^Q|1.C@bevwx[YTMoT<x}Y#y`vg|8k34%m?8sW-Om.=+s[xFhRfK3p:iz?C5`zGm');

/** define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );
*/

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
