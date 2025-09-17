<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'movie_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'KWi;[^V$1C+)/;9d ,^qoqXlP5U{<Yb]lL_v+hHCRGi0L.o-x$)*4ZOzN,@cTp-a' );
define( 'SECURE_AUTH_KEY',  ']xS5_UOIdMEv.gdUc6o,kd.R&}.Cl-F*DI!Ch&Bb/EEm/<=1aOy:`TuJ<i#?yjai' );
define( 'LOGGED_IN_KEY',    'l[*B,L/`X#(6NdMK&+$yOR_LT:c[)H):s8qn&ut..ZUsRPEB],!#(r6Cze_M,V H' );
define( 'NONCE_KEY',        'Rq+oQj`@T64u>mCA`hv[9`I9`B8Nxl^o4HfQ+T.rc@sT.1n1w>|A#q0Gt4,5Kw2;' );
define( 'AUTH_SALT',        'r~.]N~T+&cYHk8$aKN~bT)0,g9nbBhkE@OTZ@PrsS)nDHg|&}^d])|,mA(;nLM#J' );
define( 'SECURE_AUTH_SALT', 'XZ91.{nb:elUL(9Jku_OKSDh]wCS`It5YCx*4=ko8%xWCl7`E3@nd]a!42I5Ht:<' );
define( 'LOGGED_IN_SALT',   'i<8H!6wXo]X11;Voo9LE+wr.dy6cp?;K7ndjk_w3/ ^Oi,E+~dgY/nG],EHu93Y_' );
define( 'NONCE_SALT',       '9I^||?}B f:|8zv_i%o ]m~Z]^o?>PHiElxkVGRzr^hS241><VMGE^Xm@z8^Y>pp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
