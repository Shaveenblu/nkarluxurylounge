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
define( 'DB_NAME', 'nkaronli_u709334978_kwucu06zyt' );

/** Database username */
define( 'DB_USER', 'nkaronli_u709334978_EuB1DP8VoY' );

/** Database password */
define( 'DB_PASSWORD', '5~l]7=^mHDXubH!HfttuH?5' );

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
define( 'AUTH_KEY',         ')P+g<|UU+6,HE #o,J} HLFBDg7>GZW#~9=-I&xn/7Ge>m6F,-;BZ(N])^&[uvEJ' );
define( 'SECURE_AUTH_KEY',  ';)xdge`2aM&%(Z##B=e}%xR||^Ye1Bb}T;.|CW[GJ!fQ(_dAx^Vz@,%6o&GNFi:J' );
define( 'LOGGED_IN_KEY',    '8$cop,H3(nxz6&*`M{wuqM.=Qy%<*ggqkr;^;[KwYBSnW0aZUKYi)-vvwB@#^t,$' );
define( 'NONCE_KEY',        's!kh(H/xfRHy-DL))ArC7eL2L1?}jdbp6@#}/c^HYNgRjkk9;U)~XV@/yS4^+-A5' );
define( 'AUTH_SALT',        'XfKq|af^Gf2Fuj7MffWLVgtz<o49sn3}=GP79v=U../g3OE&C2~oj_Igz7zs;Kh4' );
define( 'SECURE_AUTH_SALT', '6o4Y9YhlN0H,@eL#R@}|4!#oB:y}xq>=)x0Gykt3.3c`e`3Z?9GsOw)mAun7SvyZ' );
define( 'LOGGED_IN_SALT',   '|m~NY,eiAh?>{R!EkVljk$}K-!f9/VyY.F6!&q:9F+4EKMVt|u0~Bqr7G8+j2IeB' );
define( 'NONCE_SALT',       'c;%yke{13Jts@,zb) |3x40h/3Qf|{tO|$ty8Bd]YA43^(vpYXAx2ZJp~440z|s%' );

/**#@-*/

/**
 * WordPress database table prefix.
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
