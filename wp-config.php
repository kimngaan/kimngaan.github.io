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
define('DB_NAME', 'cv');

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
define('AUTH_KEY',         'jbzxym4vwr6cbtlwbbij3cxmjg4dwh1qasqu9gakmo9l2rtedbcnv0hlt0eos2pc');
define('SECURE_AUTH_KEY',  't2tebgjqyqdbmpghzzapsi66cyor0rpw4ofzdfyvixk5fizc9nuczhmfy5r6ia3i');
define('LOGGED_IN_KEY',    'exwupng2la8xquyecspyu8uwolueoqyxefnmvuldt9uthhhlxlp1oefvp3wihjum');
define('NONCE_KEY',        'i2p2kwzruhxaxzqj8ehrushnd88qosxdkjb9d01nvzfxrbg04p2w8ryyvz1ldauj');
define('AUTH_SALT',        '0fuc7nalpdp5z5ljhnr9jrbr7hnj8ebtewvsxm2wb1zoxxiv17957jsohwqhhocv');
define('SECURE_AUTH_SALT', 'tk9unj7ouzpkwbvjhimddpkpfrszzw0ebbfmrdgcqpsissnyx4yvxcwb4ohwb8db');
define('LOGGED_IN_SALT',   'wv8tug0ptk5rhznf1qbthjtfam14ku7admvehyaqo8nqstefzgtdp75zgrjq7sx4');
define('NONCE_SALT',       'yukycqbpn4iyp2lwwpjpxmzjsfascmp6wxch5mtktqijkiil6oiz1dxwjtupg9cw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2s_';

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
