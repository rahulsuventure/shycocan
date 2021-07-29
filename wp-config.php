<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

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
define( 'DB_NAME', 'shycocan_preview' );

/** MySQL database username */
define( 'DB_USER', 'shycocanpreview' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wptpQf!aFtk3' );

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
define( 'AUTH_KEY',         'ljO]a-*}57^n|YL`5ZM(]^;<7:!!-%TCh2_uy$1]4OF+-]]4Bp`O>Earm#C-E:M3' );
define( 'SECURE_AUTH_KEY',  'yNn}urb)M. [4t4RRwOSh^qC+#W.!zk!_[e7%fZ|Ggq1W(/GH5;UzH:]|gt!O!:+' );
define( 'LOGGED_IN_KEY',    'K4Sz_kl)}/`qE3>/Q;$)uLnQl*&}5p?.5Fe3^{-XXft+aH3AtzD=cW..N3tJfUkI' );
define( 'NONCE_KEY',        'TdWj;Cl[0tD6ga.SSY s#>8((nd`3epNXs7hx_fK;E,+S sZNeK=](3f`3jS<{A>' );
define( 'AUTH_SALT',        'KK.kCplPyv9r5HFHf7?!vNTq`!2y8}dy^lT<CqM{]m%?kqbDYP:Qq13y>X=?-UyW' );
define( 'SECURE_AUTH_SALT', 'QT3r]s#UUWB,*#D+6(iruWTHjI1]o$&6D}#:OvEpi5oh7E,8zyq(]|I&iARo,})X' );
define( 'LOGGED_IN_SALT',   'r6v)g#):h/-quz}fZKp7do?7RQWJ<A4lNd$p:0,jL,C>,&b@vjQCSM}H#u.d+/P4' );
define( 'NONCE_SALT',       'H( % 5{dwlAdtyy%,LvjML ~yAR.e>ei5tElZu N}FGTN4dSskVq9=(++XYSuA*l' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpps_';

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
