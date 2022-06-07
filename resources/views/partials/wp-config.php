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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ovh_wordpress');

/** MySQL database username */
define('DB_USER', 'ovh_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'Dayusecd112020');

/** MySQL hostname */
define('DB_HOST', 'ma292528-001.privatesql:35700');

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
define('AUTH_KEY',         'fgoHwzDDq1JbuvNy2e6IrZEauHzYBIGbZpZVpJoHH1cMgg8xSXmt+2UjfMiy');
define('SECURE_AUTH_KEY',  'HdduMOvKGWK3vXviT5Hgbp5mpCMwynYbDhCsquE1qTVXcNFOD3Y6bpt7qCPD');
define('LOGGED_IN_KEY',    'HCStHj/gr2kROCk8MSr1x6tJ+lEy+PjapatbvFvXs5xsjzi2sGCmIbcz6Yn7');
define('NONCE_KEY',        '1Fs0JU5vHgN0fQZ9iVChhS3DijfsyIi91ANBym/8xGrK+0Ngu0QNVz+UMNRK');
define('AUTH_SALT',        'FVPpmVf4LdzcZAL3kEWXVZctoR7D4HXUZVQWEEgnZZZIMgOf8KC+oL+HggNa');
define('SECURE_AUTH_SALT', 'zixlPYQu2j/XI294Wh0+SNDGXfwDCswTMt0uEsXmQZn6RBLUWXeVKf3IUTW9');
define('LOGGED_IN_SALT',   '/t6Rd5hiQcMn+eqwf5RMgsxqPDxKwQ8ua/TEpSzZP2b5YMZWo1McoxevCrN9');
define('NONCE_SALT',       'Wu2R07EkDBm8LyG59P4n5vxEw9kwLb+cjakuMzt9KN1ioffAPw9q4LG0YZWb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dpf518';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
