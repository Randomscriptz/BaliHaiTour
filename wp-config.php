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
//define('WP_CACHE', false); //Added by WP-Cache Manager
// define( 'WPCACHEHOME', '' ); //Added by WP-Cache Manager
define('DB_NAME', 'balihait_main');

/** MySQL database username */
define('DB_USER', 'balihait_main');

/** MySQL database password */
define('DB_PASSWORD', 'Kg447OleHyeeEQt9tv2K');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '512M');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'skllymwyvodjm0jzkuyumvzt1vopyuwamdjkcqjdp7w3pjjfclfqeskhgthwi56g');
define('SECURE_AUTH_KEY',  'xpxyeobybr1gvf7ipzw0xbnhtag9arx6dikkoyfahyp4cnt15cvsylmfn3hxnrgh');
define('LOGGED_IN_KEY',    'kvndvspfz1x7tk45gyemoeco2a4wexupkmykigwvg7koya6gohmw2b3bfdq0lqrq');
define('NONCE_KEY',        'apcr8indp1chmwfye8mm6qcnl4w2pppgjigtlcpxzkrjswacbjl4p69xmzosejhl');
define('AUTH_SALT',        'rqwupt8gquek2tex5vse65ct7o0h9cdlmx74luddcrbluji7tabd2i4q0buqx8mg');
define('SECURE_AUTH_SALT', 'lfhjr5ibkxobgflcehfcl5pl88bjgmci1p0thwwu4puihsvgk1dp2g0glafmkcmx');
define('LOGGED_IN_SALT',   'qvrcjeoypefsmkqazaphkvkct4s4wgkpfanhbkd1r6apepa5waadkk3ct7dqfs75');
define('NONCE_SALT',       'ftwn8xskn4gcqocncr3ev4tysmw1gj9mxfoqhuinaxuuzhowa5brl236r0nrmdip');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wphai_';

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
define('WP_DEBUG', ture);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

