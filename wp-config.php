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
define('DB_NAME', 'wpx');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

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
define('AUTH_KEY',         'NbAb|?^c&9U/vA;x3!,9)AGw$h.+2>*z}%#pU])]^j7gL)ID73AioP{!DA^>>r1C');
define('SECURE_AUTH_KEY',  'N.-^i3dAczz]HD6myo0DQ&h|%18*3Nx}d7n(LG08}|A|ggkBH=PD)4jB`YXJgPuB');
define('LOGGED_IN_KEY',    '=YQ-FK)sIr.S.y}$]lf@ggY?Ca<;i-0](<d81,9r9G?H>*vMmnZ^5s8/[0S~R)%~');
define('NONCE_KEY',        'cGY/s2@05JW?i5(G6Gy8*Ucnez=x(Q~`yo&tZZv]GfT*9B*J<R?=aK]C5( k*_Eb');
define('AUTH_SALT',        'w(0^1C01~yt8#t$KDKb0<@louQ~(<lwcZJ.w*WsTn17r_HHT~3BdWPE3k%j0JD?E');
define('SECURE_AUTH_SALT', 'qi[fc>kV}6qppS5IUWVq_7XwIv@23Y8P:7|j,5L|m*PM(3YXX3SP^5;`t*l|B<]?');
define('LOGGED_IN_SALT',   'KR.M/g31FlwAO?7QjFQw#Qg?1Q|V7w%?dI#rC;Ei#@,P}t LxD]g2N,P(05$@K?C');
define('NONCE_SALT',       '9F`fo;({(5Dr~[yMl39-,RIexQg);3qo8h~(30IBd7&N`8jj2,[_V2sk|p7lzVR&');

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
