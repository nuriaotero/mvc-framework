<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/config/config.php';

use App\Controllers\AuthController;
use App\Controllers\ContactController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/mvc-framework'; // AJUSTA A TU CARPETA
$route = str_replace($base, '', $uri);

switch ($route) {

    case '/':
    case '/login':
        (new AuthController())->login();
        break;

    case '/register':
        (new AuthController())->register();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        (new ContactController())->index();
        break;

    case '/contact/store':
        (new ContactController())->store();
        break;

    case '/contact/update':
        (new ContactController())->update();
        break;

    case preg_match('/\/contact\/delete\/(\d+)/', $route, $m) ? true : false:
        (new ContactController())->delete($m[1]);
        break;

    default:
        http_response_code(404);
        echo '404 - Página no encontrada';
}
