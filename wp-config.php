<?php
define('WP_CACHE', false);
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
define('DB_NAME', 'oaurpwkm_wordpress');

/** MySQL database username */
define('DB_USER', 'oaurpwkm_tkpalace');

/** MySQL database password */
define('DB_PASSWORD', 'S0rzGgyI');

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
define('AUTH_KEY',         ':Jc6%ZkWI+l-dxFZ!:]s/<ltq9A.k+F[V^yG![Are||H@6]JY@TbxS-LuacG}hBi');
define('SECURE_AUTH_KEY',  'D@( U|f_bP7m`n:7eAy-j` ._85_o{;K,(d5VBNnt(^!nigyDHmUi?V[O1T|Y,2^');
define('LOGGED_IN_KEY',    'oa;#,ZiAjq2t@SW![loP/vWzW:Ec.+4EA<*Q$&?j0iUoe&p^Ou)b;Cs]^=Jy[0;m');
define('NONCE_KEY',        ':rHkLkUVEJ6XH)<>R)hWaAXj7A[Vd=A+),URC6&#zTDD5!RA.+.c~~1T!y.)J28i');
define('AUTH_SALT',        '~I86EL0qP.h7n;$W!S^?}hJClPK9CYE]gkxgtvnr/xV]OR(tAr#620#VAQ^wyH/B');
define('SECURE_AUTH_SALT', '>4f7;h+m0b)gLh2>NIC$efkWS!s=]]> #!3>~Gb!S}ZAg1%Nv_E%{@@`u{BR  bJ');
define('LOGGED_IN_SALT',   'Hwe2LK8R2XH4+x(h:oNuN&N4!6mGDzr./#8c;`p2mjZM eaaX88aBl )^a,Ae5Yb');
define('NONCE_SALT',       'oA`p|n`Mz5kQlF4d>9A|;N5Yjs<,_ot*dMkgRh+1ND976I8}3C$(/#Gr]Wu=)E[s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tkpalacehotel_';

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
