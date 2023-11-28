<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'piacopello' );

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
define( 'AUTH_KEY',         'Vu[A:2n+xyTde3s$dKcg%igc&)qG{K9rm*[qkP[{RW@tLw5._9Fr7$UC#*FsB4YV' );
define( 'SECURE_AUTH_KEY',  'u=uM4,XIlfI0UC:%d4uY}6riR:AJCl)Ou/C|@aNbX0Ch!x8nOyB}xIw@{#Vx2/PT' );
define( 'LOGGED_IN_KEY',    ']Wl]J!uvH,bpT@Gm}w.#+zbs VB*y i=Ww:PY)!8lUimLX%eCocB@IrUkO+3qanT' );
define( 'NONCE_KEY',        '^wr/4kBm3^4}_aE>.o|ryOz)33JCM`/W}z5M`^( FhpAU&}4_xu<!vJ*2Sas]$m>' );
define( 'AUTH_SALT',        'h%EAJUFWak6Jb,web= u,1}M+}t!Q[{(1]pMppBIyM+qwMhR@;kuCS;x($^Cr7g#' );
define( 'SECURE_AUTH_SALT', 'ym[Jdz^A/cae/j )Rzs;m)k7/=A*3ddIs1:+kpekJo06&UeeVwxaDfv9NnM5[B:z' );
define( 'LOGGED_IN_SALT',   'aMf!dQ3)82$`w:q+l3pD~s.`6j :+}nHXTS~>Q|g,{Jl^eF0*DEbFKpvD8_?S:U>' );
define( 'NONCE_SALT',       '@TodESo,M4/R,{.G9F{gkfg@^<bT8)EvXN]9a^2&H#[u[H0O_?es0A>|x`)BbU$.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pi_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
