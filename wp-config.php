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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'swa_ct' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9skhSL3xeAnx|AH(uL%yPyucvSmK{IdB^-(UrjzzG|?!W0>Zt`}T+RV.P.Y0assD' );
define( 'SECURE_AUTH_KEY',  'xX{nNLvCII{mGJ=eQWlWqMI9L2UiG?$(m5&(^-p&v1^>L#Yf*CLMhA=Sg,|q2@kh' );
define( 'LOGGED_IN_KEY',    '?!+cVkdulX`mH5[_?.nKM~UL[~Iv Y(:kCpNpX+X^eoMA}L <2N7lymOsU`K6PxY' );
define( 'NONCE_KEY',        '&*apF3_sa13c4O|@]S,uKl1R`R8<]C[K%5EBm.k`nrsL/F:DJKAF3s8)[P.Mc0E=' );
define( 'AUTH_SALT',        '{v@Q@.7;0CI|7OII(FFMzYk+Suz`WF9xN,*wLhKTV4M7Cx=o>t4_vr.C2b5`ud:z' );
define( 'SECURE_AUTH_SALT', '(dx-x_j)sY-NHlzh}c*MYU(UAyY?B&AIg<vb>@wsD:OHwgl=A~R,i9TimoGr^S!L' );
define( 'LOGGED_IN_SALT',   'jhF=%opQI?*M4><FC XUt^9SqrUM CEUjtPH=bC}ixNzC,c_LG%Q2Bao.va%[&^F' );
define( 'NONCE_SALT',       'n6AC%mf 3dGoA7gLYeb{A9D*4~Y5{kJXIZ`eVl_p2_TD^f9_[|&UU]zRUn,;RLB[' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// Disable FTP
define('FS_METHOD', 'direct');

define('FORCE_SSL_LOGIN', false);
define('FORCE_SSL_ADMIN', false);
define( 'CONCATENATE_SCRIPTS', false );
define( 'SCRIPT_DEBUG', true );

define('WP_SITEURL','http://swa.localhost');
define('WP_HOME','http://swa.localhost');


//define('WP_CONTENT_DIR', 'http://127.0.0.1/wordpress/swa-ct/wp-content');

//define('RELOCATE', true);

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
