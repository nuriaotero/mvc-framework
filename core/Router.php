<?php
session_start();

require 'vendor/autoload.php';
require 'config/database.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/AgendaEloquent';
$route = str_replace($base, '', $uri);

use App\Controllers\AuthController;
use App\Controllers\ContactController;

switch ($route) {

    case '/':
    case '/login':
        (new AuthController)->login();
        break;

    case '/register':
        (new AuthController)->register();
        break;

    case '/logout':
        (new AuthController)->logout();
        break;

    case '/dashboard':
        (new ContactController)->index();
        break;

    case '/contact/store':
        (new ContactController)->store();
        break;

    case '/contact/update':
        (new ContactController)->update();
        break;

    case preg_match('/\/contact\/delete\/(\d+)/', $route, $m) ? true : false:
        (new ContactController)->delete($m[1]);
        break;

    default:
        http_response_code(404);
        echo "404";
}
