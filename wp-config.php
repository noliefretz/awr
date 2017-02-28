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
define('DB_NAME', 'awr_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Mc18=Vg.-8ZS=U-Mk6kkI~<9yyI2+xkO[hL:!a|mbDt7:YseB>Z1UeM7}M|Y@VG(');
define('SECURE_AUTH_KEY',  '*poQaL($Yj6VSXW,Rk!B-@i^cvIzfl7wC;ph`ZIVxM,FN*7c@;XR/a9S8I-Agd7!');
define('LOGGED_IN_KEY',    'a>DN0TxuNr`KdJn!=)7dDp;Ya6=z<swE=887^yqR3bi`N%E/Et)#;^3r~ko]pY<:');
define('NONCE_KEY',        '6tUBHM2Ig;V:M+7%RC9xhYT,=%wBBtqCmzaW,!qwl=o-vPJ8G.,bc(/3t0Yqi8{j');
define('AUTH_SALT',        ';Xy[TxqaUyVCehvf__6K-.l4kp3a Dj;*V6TL``=g:Ry:.X1@*Os#Rfy_$9_@(b1');
define('SECURE_AUTH_SALT', 'U$ 5;2:eY*b%<M^&,%C:Smj[McZ)``|jV*m,|$j^j*hP@Cf7>sUz3Y#a7rCm bQ|');
define('LOGGED_IN_SALT',   '&5,+,Ex68~p2}b9`U&::7YZ#1>ea&ZG[2lWGdged4wNc?K}?#6#:uE+%QcwWVa}S');
define('NONCE_SALT',       '!>trX3O_U;_M-f:.?c0{`3@L9u* pB $d(6H2QW55~:b~+ }wp+7Q8}~d!3,?AtK');

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
