<?php
define( 'WP_CACHE', true );

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
define('MEDYLIFE_URL', '//www.medylife.com'); 
define('WP_HOME', 'https://medylife.com');
define('WP_SITEURL', 'https://medylife.com');
define('FORCE_SSL_ADMIN', true);

$_SERVER['HTTPS'] = 'on';
/* GoDaddy HTTPS Fix */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) 
    && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'medylife');
/** MySQL database username */
define('DB_USER', 'medylife');
/** MySQL database password */
define('DB_PASSWORD', 'Medylife@12345');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');
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
define('AUTH_KEY',         'G#agGH<Uen3nAyJ [.rW-C1_#`FNL*`hp&j!P[kVNmh]_aZ5hOglQU4$)TTXy+/y');
define('SECURE_AUTH_KEY',  '_TA*OVBcmF>^w[o-Ddy>QJKJ-|7Toadl2X#:n^L&!+}Zcyu$`.=0AHbt-!9o_{lw');
define('LOGGED_IN_KEY',    '}tkH~3b]T4X%[6[S1CG O$0~~v/ ztZk:JBL]g#wvP>54{+6*4VC|OH;Rg(IR,x ');
define('NONCE_KEY',        'f4Mu5ucyeZ!1X{XLgI}Xb$ - Tw9Zw~|dF0{8/P7m>SI&OKeaP?-qE,iMq?5))*|');
define('AUTH_SALT',        '=I4s<d7GS6&>52PsD|H+pYJOU=C+(dQhXc?:e#ngooy&+yS D%=}S$%#y|mKFHIh');
define('SECURE_AUTH_SALT', 'GB J8cZ:4|-}/)MNC~=U;]xU3q?$5zRul}e?(l{Zz+TYYVj#|Ge6.%aYr|G(+1yy');
define('LOGGED_IN_SALT',   'E1;a_=}3m^b>L5t+K42,$0{RTw|)c@t}ylI+#O3|N94~kbmGc6X(NPX@sD93WY%D');
define('NONCE_SALT',       '}`dJ*V=>q|<Kc^p-@u(h]-*.|!e_dm>-$CMCIthuF>-&zG${ 6|gU!n}8@HCgT+z');
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
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
