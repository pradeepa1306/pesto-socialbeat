<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pesto_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wFn& lBn]sc}kZrEiMM(A~0~Hf:f#bs/gqn/;^$!t/&M)7E|FAIz{>W]s$@T.!LK' );
define( 'SECURE_AUTH_KEY',  '(K1F,TowU% :7j@becsk7Lb@/l:jy#MTkte1 (X$_uH+5Km2N!bhz&EaCDmEaC<%' );
define( 'LOGGED_IN_KEY',    'YsmwaWKoSkr1:SL~r=*Am7/8BG8QrFo(jNue_,WP7Yvs6z1<QvbPPc?<=vTw<,(7' );
define( 'NONCE_KEY',        ',)lE5&n(x3rxq[6fjm{=)Na?;&=V|=y(aa%1xE!&=_Qrk7W//3>NaOyM,!gkla[(' );
define( 'AUTH_SALT',        ')#H:tMoz!1u(IlNgdl!hm kg1LA$~`!U~AsAp{[KBo*M9XE_eB{{XrCo@k&k=9uX' );
define( 'SECURE_AUTH_SALT', '1.Q(f6T!}hrw|&oo[.o.#;kzLg;HX[zz6,XCah}FGS,7vf-^hZ{iZ`I_eW&x$sLn' );
define( 'LOGGED_IN_SALT',   '_3+b*H*QUBd[p/>7$1Kg?]Dda,6=##+:ci(!Uz/:C}5^FdZDDXaR_AeJoA$3G1UA' );
define( 'NONCE_SALT',       '(_!hR_mQ3fpP<:Dn(g><PrQNbCef=M$3@mVsY?u&Ef]Wyn(*)rBm/]&XitFw16Hk' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
