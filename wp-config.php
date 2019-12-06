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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/users/zalohovane/profi-chiptuning.cz/fap-dpf-filtry.cz/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'fapdpffiltrycz');

/** MySQL database username */
//define('DB_USER', 'fapdpffiltrycz');
define('DB_USER', 'profi-chiptuning');

/** MySQL database password */
//define('DB_PASSWORD', 'DFdfzuk515fr');
define('DB_PASSWORD', 'wam9WuOQVKWB6PJ4');

/** MySQL hostname */
define('DB_HOST', 'mysql-g1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Z`SMW{2au?l /$]Bxn-!|c[gw>F)Bzt08tyb=V)1}yK`c_[MA;P9bfsbj~c/&16$');
define('SECURE_AUTH_KEY',  '*#:[2`k[3{Pl8j)KJ/j=7jy;18]~>Kh+1,isX@N+0?){m4@znk;IGbzBO2+*}Zeu');
define('LOGGED_IN_KEY',    'p}UU;)Pz%).ME69S[yHZ;b6}j&7Iy@3bE!ylFAGE3r>$%bBG?SYog&~:}ep@0mP)');
define('NONCE_KEY',        '<W7Z}|qEl 6cMW/c~7L}!hT0&H,ZAP_>Z$MbGsH?MwJk,lM,)}d!o*`,`jn2p(aO');
define('AUTH_SALT',        '&a~IejCC;Gi?4;liux%@&&N=]o,0gc#L>bKj)16$eQp`GtT%+lK/Nk<O<*ywUhnB');
define('SECURE_AUTH_SALT', 'xJzWOS*RZ9Ko?#)(Oc74%W}ip%XIR[gT^7Kf~@zbkU2X^3OxQ7P?:V),`ZgBilYf');
define('LOGGED_IN_SALT',   'JQE2MhnM84>PreRREHRhA6nU6^^4&+$VOM$;l#rNiani6Yk#7U}Yd[~ZL}Fwc/,J');
define('NONCE_SALT',       'nqk]Je3Qs&hwD:aivJ29^YciS2T}3e(A+(@@U S3of%uPh~t;D5xzum<wi]&!U[b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);
//define('WP_DEBUG', true);
//define( 'WP_DEBUG_DISPLAY', true );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
