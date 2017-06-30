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
define('DB_NAME', 'mentorcell_blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'rootroot');

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
define('AUTH_KEY',         '8I+DF6Ww> jO UuoWlQ<YIp6zN=53YF@th|=U!-/yDn|nufbc~;QjMjxMfP&^Pj7');
define('SECURE_AUTH_KEY',  'o]}>A.]NNMuY;$3^[]1W`=RM^>V3j5^Yttq1|3`Xg-@#>?SDeHqI&+RI(<?^}:9E');
define('LOGGED_IN_KEY',    'vqIt_:7Xv?>ZOv_CifwjrtWEMu9HR$D[hEmHwSE5SE_M!/,n.w)6OA/h|8u>F:L0');
define('NONCE_KEY',        ':GHK>`=E/{+!Hw~p)M|CBm9_VWlcv.^2X@SLrbpI8A{#AF(-+oKpXA>d>9<8iss&');
define('AUTH_SALT',        'CrGmPJtveu c#F^R@tM-kyM>M8!QFo&P=QHRce@:cC=Ie!T]bG!uM_MkTGz+kREp');
define('SECURE_AUTH_SALT', 'AY@Zw8K=ykna,Mx=ps@F.7ObH0uJ]/)o>]TjD0yfy`T/_4zj<$US/4TJG}9=*usB');
define('LOGGED_IN_SALT',   'xFR*Tyn=xF+{~Y1TyfN{mHS2^;HJmN]bx<[6}YGA1XtPP<kg>iRhRQ^FlPd43PuE');
define('NONCE_SALT',       ',}%!U#]!-~@-8*!]=B)c>=?y+PI0MbUw~F)d*%)J7M|%:VfNViK8)9qfaO>{7py[');

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
