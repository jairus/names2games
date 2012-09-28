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
define('DB_NAME', 'names2games');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'TQ-O=u>ZC)C1<[[b SSIPbsO,%PUK`FA04zyMX# ~|<$0Y,^7],(@OD]te<wwcBq');
define('SECURE_AUTH_KEY',  'JV;uIjn-vN)/IcPjJTYBN(0/.+qWtg6:$$AAM`W*c)KueHs}V*~/Vrao1+x]OHB]');
define('LOGGED_IN_KEY',    'm2xTx0g~)z4S=l#n.DJ( oWa*4t=}2~.bmV%%X3&0zpSXyX#}%`dlil`mnYEZ^F,');
define('NONCE_KEY',        'fP?Vrsp]P%R#By01#h_b4R5l>e_9v%dM1!L7Pp0L#Tc34kyORRIlIb/I;`8LD:eV');
define('AUTH_SALT',        '@[<dE9_MT,TwuAyUuCW7vf+S@3>`.{({ov^:>B9eiC3RX@pJPT)F*b[S`n{~FAHb');
define('SECURE_AUTH_SALT', 'Td92S Y}i|`!wQA:)[cDNU-}BZFgRh[q(vT*No&{V:C~8IR:g=h$&l@v# nijWE}');
define('LOGGED_IN_SALT',   ')Pi-ydwGrp;l @6{h6F:AQ1{ V5%KIM2;7I>NY/E}|AeTl=K,U5y/TKRBT& 5]al');
define('NONCE_SALT',       'N <lO`}Rmx-9$;ae;u;VGl$3$7VM&s]W[)Gk0wpgV5U!2+`L,FeNk02ZdZz+l;!Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
