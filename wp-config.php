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

if ( $_SERVER['SERVER_NAME'] === 'greenflashbrew.com'){

define('DB_NAME', 'greenfu7_2016site');

/** MySQL database username */
define('DB_USER', 'greenfu7_word180');

/** MySQL database password */
define('DB_PASSWORD', 'WQy9GUAnXWF8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

}else{

	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'greenbrew');
	/** MySQL database username */
	define('DB_USER', 'root');
	/** MySQL database password */
	define('DB_PASSWORD', 'root');
	/** MySQL hostname */
	define('DB_HOST', 'localhost');
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	/** The Database Collate type. Don't change this if in doubt. */
	
	define('WP_HOME','http://localhost'); 
	
	define('WP_SITEURL','http://localhost');
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'ft]AD/GtvYtMc|sF-]o!sL>[CPRx(eD?qlN%]Ivlp/&[(KG%HeDY>E_Xx=%HB-YD|p)$*?lfo*cO{AEPdi^=/<[t|rwTpOQars{rCp+r]IcLPC;YP*uZUbhX)arI?i|Z');
define('SECURE_AUTH_KEY', 'J$)P[QfFmj@@Kd(%UGnvB?k-qir$kpM<y%FTcK]GdMvETxLHa{FtURy(})KMd^SLD_zcAWZbHSSaYkZ-DD&/P;(rCE{pytpApK^c)$^fmY;CJnlvQkGizTJ%zof[N^|[');
define('LOGGED_IN_KEY', '$-aZ!U%X&&$({>=XmxsEiZ|FjAhaXA<b*VW}NfrBoXHuQSYoc>/|pfljQnOUhP(g&XRlI+Huu/=-TZ]N<{al|{{l/B+)-_BYEobE+L{$Jxx?qhb;_JKXdPCM<<yt*A)+');
define('NONCE_KEY', 'Gc)o]}Alel$giW+>O_dwh[fi>!w<dOf{@!(S-*%OAbZ<SaRpw_VnzOS}LtMb?Fq-RgQPbG}rlm&SyuqTWEF(YDvwdT<gfRHr]QQ^ESF(+DRKF$+@uXaIyekRJ?NNBbL^');
define('AUTH_SALT', 'qW?@Nip*>p&-B]Y)L$|$[=!-twwotlq^!F|Inz)&@?f[Eh>d-/uOLY?y(TSCVemcN_;-%fn<->]{I[oHOHj(iZOo/BHYKxlaBJv>[-OOb-F]s[tp]}&rWOB&XhpCg&;w');
define('SECURE_AUTH_SALT', 'k-/m<uX;LsXLK%uG*ZYIZeUAF@wG-cnG[c]LhTx=eh(eS!?Wo(__%;$e-x$Zko|z<FMRlWqImSPfT=txBcM<Rn!|Y}C/MMlqkG(RO>By!aWCgz;s/olnfJgSI(VOBA_F');
define('LOGGED_IN_SALT', '=Gm/yFl?UR?yqj;]{_k^=MG-ty|bSN/t%)Ou%UD-kWmlL]$b>Zqm&Pum@*(Ef[wk+YF|U)SSOmNS]c;o(rxtVTsvZCLpr&?i?Qf^*=$=_I|Qe!)kasmcMo@SDqQlHU@f');
define('NONCE_SALT', '|q-wD![AOfUuMY;jqphp)!Wdk-H*?ugAsE|N!]G+qIN[veNiWZq<X/@BvgigexP|HcIm>NPK{bpiAJ_InRlsVbkDAWcten<kSQY!zm>j^GQa+!^Z!zNSWBlIo@^?%yIC');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
//$table_prefix = 'wp_omyp_';
$table_prefix = 'odp_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}

define('WP_HOME','http://www.greenflashbrew.com');
define('WP_SITEURL','http://www.greenflashbrew.com');
