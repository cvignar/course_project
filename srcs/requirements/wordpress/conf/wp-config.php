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
define('DB_NAME', 'MYSQL_DB');

/** MySQL database username */
define('DB_USER', 'MYSQL_USER');

/** MySQL database password */
define('DB_PASSWORD', 'MYSQL_PASSWORD');

/** MySQL hostname */
define('DB_HOST', 'WP_DB_HOST');

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
define('AUTH_KEY',         '>d;PiR F?(qWHM5kE]:)Xl43YXCy]AN&a~?EhXt=Q[av)?;y!tmBvh|T@(G$*$c{');
define('SECURE_AUTH_KEY',  '.AD#C}1H-$!5@:WBx`spL1||-cNmA~q}]{!irlQ&W_[(Xli+8i&Or2C!U(0zM:g>');
define('LOGGED_IN_KEY',    '4</=ax|dY$ ?GL0ep[PJ/K<2ywK%M-2S#Ba9P-W=TJVua0buoWYi6$b3F|Qr%^Jk');
define('NONCE_KEY',        ',mpbitf~3o4$@6CINF|T~9>bEt9V=2NdE/[h-^^I=Mw&&I&`Y%r2PW|^6)3OlDD[');
define('AUTH_SALT',        'j]I7u>oK>JzH- +36fq>`-QTxK(,B+*^9yH!)B#b|]~9`gk]zL8n+Y-u5usU+`<>');
define('SECURE_AUTH_SALT', 'T%W@yC c%HMemj%:>1L(:zBe[{sn1l2?>ysI7~hY3]?>F;ssDD4&5!_Zyp4+D~e?');
define('LOGGED_IN_SALT',   ';+q(@|8;0H7$n!;n$J1j_Dg/nVJ#mwi|[/UlqV}N*kPxzSOW1!QE+M6JZt#y0F!R');
define('NONCE_SALT',       'BNy.]tHQ]b(Wv=v!4zua{!y!|(z}/|4K=)v.{*Dz4@SLTo`db,|P:^%8$Tw|!]pa');
define('WP_CACHE_KEY_SALT', 'wp.cvignar.info');
define('WP_CACHE', true);
$redis_server = array( 'host' => 'redis', 'port' => 6379, );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'WP_TABLE_PREFIX';

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
define('WP_DEBUG', WP_DEBUG);

define('WP_CORE_UPDATE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define( 'UPLOADS', 'wp-content/uploads' );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
