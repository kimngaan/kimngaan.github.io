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
define('DB_NAME', 'rfgd_19780773_w444');

/** MySQL database username */
define('DB_USER', '19780773_1');

/** MySQL database password */
define('DB_PASSWORD', '3@SHK7Up]8');

/** MySQL hostname */
define('DB_HOST', 'sql101.byetcluster.com');

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
define('AUTH_KEY',         'wf2mdevaly5dzwhoqybplvnmturyajbulujcf1fmbgaqeghlu6ibdmfu4vqyaehh');
define('SECURE_AUTH_KEY',  'jdouwk5ep6l6sdlrptm0vcanuq5flldsvnqncxsrxsavau2bifr6ceofxfunjwww');
define('LOGGED_IN_KEY',    'ajgsho9yvscqalmh70pf7foe5yxa7uurfgkdl0oib2jhzdalizsnar2vpflof1nj');
define('NONCE_KEY',        'oqwfz7er7yqkdwwfaggyv2zcd4m4omfpbeb1x9htzzqur7bk59cajv7xtufvoebj');
define('AUTH_SALT',        'ksqhuxvuffvfjo0xhzh3fhm83oxm62mhsuokyqkcpl6j2zldzbuhe9mbbljdwbfm');
define('SECURE_AUTH_SALT', 'mbfjcc8mbqqxikngotnjewuamm63josjcysqescndaq2t9jb0k2qoy2ipi1teads');
define('LOGGED_IN_SALT',   'mjtkl9cb5sdzr41fgkpgvr2ihtxm4xh8o7ppssjtovkqpuwbsrotgtajrwzco0lu');
define('NONCE_SALT',       'tfsultxh6devxxlwcdczsc69cgngxhdj7x650jw1fjtmxcuqrfyyl2g3adap1mea');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpuq_';

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
