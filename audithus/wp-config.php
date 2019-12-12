<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dev_digiperforma_co_14');

/** MySQL database username */
define('DB_USER', 'ng6xav53');

/** MySQL database password */
define('DB_PASSWORD', 'Ta4Yvdka');

/** MySQL hostname */
define('DB_HOST', 'mysql.dev.digiperforma.co');

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
define('AUTH_KEY',         'w8?1)`qF6Xv4!a:FtjXAhvXGe)6Xi8&0NcONvl1U^_FllUTYNScA9VdLFJSOjCsw');
define('SECURE_AUTH_KEY',  'K$;:Cn7:sZCKW2NJnCAN:mr^Ok_OPjd^?7PoOBK0X^&I`"X_s&iYVhi1mMTits+O');
define('LOGGED_IN_KEY',    '2`Ml1045%A(tg|Q:mMVJB;ir^II+vw8|$J_J5)V_Q(hHaH*)zZM:O/;&U6YxHfHW');
define('NONCE_KEY',        'gsiesX(R89i/L)b^09|"thKm7hh"J%l6eRKrOlIg"_o6pGAwWO?/;LAv;f5OffPg');
define('AUTH_SALT',        'QKG;IZYmpyX2`E)05VM~?b1bNgA;s)&s/T~xquTE`V~W_k7g4+xK1L~rV07JZ%b9');
define('SECURE_AUTH_SALT', 'iAM)aLSjmalMqpuzdrLNh!Lyr`G:U%k!AWtl0nnLEl2(/;W)Qb/@2vHfO8X)GvvJ');
define('LOGGED_IN_SALT',   'B9@INv*n!$?bQlcs16$or|v$fo%q4A)*t4D3?9"8"6V(2;*Yaf?GQvcO%t_^F!pn');
define('NONCE_SALT',       '2)LVwBR;Pfa9@mLnF+NYCp78usTL2xc7M+_B5eRASS:T"A@D4@@4eTEQl7@!V0EP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_phnzu3_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

