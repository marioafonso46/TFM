<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'rF!+h;x&J&*)C{!<XG)l%tm:jv_]:7jK%mCk530Rxrx6^kv2nE)@UV/115bHUE(Y');
define('SECURE_AUTH_KEY', '=6:_NGqluIR0xaT^hEDOXL UFywBqB#|Km40CD66tkg4*86P-YQOm:$i~x=p8/6u');
define('LOGGED_IN_KEY', 'xc]rt/+^[H8r#2:eDAbVk#IWs0sVN[1Q=i=WuCDiU(Du*Lsaa/H)otIcXUrrZ5l{');
define('NONCE_KEY', 'F1Ebh3Q_R^0cL3*x=5R4j2AP$P_W^:!vTL  U~1@z35@>|L,Wv~5Mn;[eD 2uU=_');
define('AUTH_SALT', 'yA40n)OHZGS7I#U1rofLF![}qbFyqW0u?odKW-?.b+8P=k3OU1^3n`mCPs{F IAX');
define('SECURE_AUTH_SALT', 'khe@JsaQ&GiYjFk8@Qhko{fhxuKH.*)J9mgl=^S-bFs4UigkMZwTxZUlfsdh>%zO');
define('LOGGED_IN_SALT', ':u<tnGm13,BS$I^2)*=R,xk}d[!gL^x%uZ6^=U2=y`Rs<tJ:fS#Zx w!/]?xYI^a');
define('NONCE_SALT', 'F !$B*3I!lh_mB>@#gCfcY8Hxr5![oY;o}D^ad^Y-*w>`2~~1_`{[h870hxF=!>P');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

