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
define('DB_NAME', 'bineneDB');

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
define('AUTH_KEY',         '/NZJ(kRka.-gKe@!3=WO]Cf:kefV>cN%UL0eHzG*;.By%_;vY{1J-.,`vQ,*a(bO');
define('SECURE_AUTH_KEY',  'cHoM?2U0C{Ng([s47Z3u3H4|^ZQYZ]_hh}l~Ga{s7We/C3P&;/mFMH{L4)SzRqy0');
define('LOGGED_IN_KEY',    'z9eBadQhPa9PLM_L#`&4*=aMaY?pLt>p%,5[OS5+g2oK TTh&nSX~{Zzw1-Wa{FO');
define('NONCE_KEY',        '3Ea(;E(}C5:Htm`Fv7SK?3z h]ot}/.M]X)_W>#aPVndfLVbG|]70+{0HOi ,iC|');
define('AUTH_SALT',        'ym&ic#K&02i.g|7AmA{5KyS ]oY,= LbjvI)sslL$&xn2fOP%Q]1_O`<Pvj&U1v[');
define('SECURE_AUTH_SALT', '|.)9A!k60!Te[;!VN15$lJGdKK$dR8~GzT,g)^$B%N1l4y;Pe}b:]:q=*Mt)ALj}');
define('LOGGED_IN_SALT',   '%*a~|.-*wz!#WHE+z?gnadg(Mv%7U)[zob|L+H%J<lBplW;|}UiCdN[2xZ|_xod0');
define('NONCE_SALT',       '205(fA!KFIN9BNFqQ|8s!@ bUX@9=m42[/M6v&%:@Kp8u2*8}uQHQom.t!03%R<6');

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
