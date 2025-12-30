<?php
/**
 * Configuración global del proyecto
 * AgendaEloquent - MVC
 */

/**
 * BASE_URL
 * Ajusta esto al nombre de la carpeta del proyecto dentro de htdocs
 * Ejemplo:
 *  http://localhost/mvc-framework
 */
define('BASE_URL', '/mvc-framework');

/**
 * Entorno (opcional, pero buena práctica)
 */
define('APP_NAME', 'AgendaEloquent');
define('APP_ENV', 'local'); // local | production
define('DB_HOST', 'localhost'); // true | false

/**
 * Zona horaria
 */
date_default_timezone_set('Europe/Madrid');
