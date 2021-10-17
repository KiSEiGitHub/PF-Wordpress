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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'projetgroupeteam7' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'RN,C{(!NR!Div~(;yyAVzIkH)|Q}EL@S7V,tzPEOsA`n;_sN+1,Y<j^SQrDc(9ni' );
define( 'SECURE_AUTH_KEY',  '=(1w~`9CwsUcWNR<|PhxV1zAwMyWfhows!0,Wk&uT+o1-ovQw^EO.!hqq@P;|<0l' );
define( 'LOGGED_IN_KEY',    '>Z9=`<D3v5e}lipR=$pQJ8&(vmLCXi!x;ajj2&VFO++1Q5Stps]^:H@&v&e4tE[R' );
define( 'NONCE_KEY',        '{gGRm[O)NLA)&rQ)H6 )b2r6}wjY _7F2g2IXOE4iowJM0.qK=~S]Fj9+v$x{]&P' );
define( 'AUTH_SALT',        'P&;PC1SI#w^TN@$a>?RWUKR$DoME!|l!J/iCU& 0w0&=-}B+1pa%y}4E5kMH;SYH' );
define( 'SECURE_AUTH_SALT', 'e`1`?Uq/%:6YWT?TqTEdd)x=DIF%_gN!Jwa#~qP|}|AA6c2NFRl_6tY.SxyzILhm' );
define( 'LOGGED_IN_SALT',   'rai8+2YV;uAxG~i}86=pX34v/NLoefT=b_D(io,Z#HPBsUhk.8S#XwE$V^FuK>*M' );
define( 'NONCE_SALT',       '${Z&Xw9UReFG MOYl5K1QT>9F$o}L=P[x&E6P?rRPnUH@w)3PVnx$})hK]@Qrr :' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
