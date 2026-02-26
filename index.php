<?php

declare(strict_types=1);

define('ROOT_PATH', __DIR__);

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

date_default_timezone_set($_ENV['TIMEZONE'] ?? 'UTC');
$debug = filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN);
error_reporting($debug ? E_ALL : 0);
ini_set('display_errors', $debug ? '1' : '0');

$config = require __DIR__ . '/config/app.php';
session_name($config['session']['name']);
session_set_cookie_params([
    'lifetime' => $config['session']['lifetime'],
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

foreach (['storage/cache/twig', 'storage/logs', 'public/uploads/avatars'] as $dir) {
    if (!is_dir(__DIR__ . '/' . $dir)) {
        mkdir(__DIR__ . '/' . $dir, 0755, true);
    }
}

$publicRoutes = ['/login', '/login/process'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!isset($_SESSION['auth']) && !in_array($uri, $publicRoutes)) {
    header('Location: /login');
    exit;
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {

    
    $r->addRoute('GET', '/login', [App\Controller\LoginController::class, 'showLogin']);
    $r->addRoute('POST', '/login/process', [App\Controller\LoginController::class, 'processLogin']);
    $r->addRoute(['GET', 'POST'], '/logout', [App\Controller\LoginController::class, 'logout']);

    
    $r->addRoute('GET', '/', [App\Controller\DashboardController::class, 'index']);
    $r->addRoute('GET', '/dashboard', [App\Controller\DashboardController::class, 'index']);

    
    $r->addRoute('GET', '/accounts', [App\Controller\AccountController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/accounts/create', [App\Controller\AccountController::class, 'create']);
    $r->addRoute(['GET', 'POST'], '/accounts/{id:\d+}/edit', [App\Controller\AccountController::class, 'edit']);
    $r->addRoute('POST', '/accounts/{id:\d+}/delete', [App\Controller\AccountController::class, 'delete']);

    
    $r->addRoute('GET', '/posts', [App\Controller\PostController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/posts/create', [App\Controller\PostController::class, 'create']);
    $r->addRoute(['GET', 'POST'], '/posts/{id:\d+}/edit', [App\Controller\PostController::class, 'edit']);
    $r->addRoute('POST', '/posts/{id:\d+}/delete', [App\Controller\PostController::class, 'delete']);
    $r->addRoute('GET', '/calendar', [App\Controller\PostController::class, 'calendar']);

    
    $r->addRoute('GET', '/profile', [App\Controller\ProfileController::class, 'index']);
    $r->addRoute('POST', '/profile/update', [App\Controller\ProfileController::class, 'update']);
    $r->addRoute('POST', '/profile/password', [App\Controller\ProfileController::class, 'changePassword']);
    $r->addRoute('POST', '/profile/avatar', [App\Controller\ProfileController::class, 'uploadAvatar']);
    $r->addRoute('POST', '/profile/delete', [App\Controller\ProfileController::class, 'deleteAccount']);

    
    $r->addRoute('GET', '/users', [App\Controller\UsersController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/users/create', [App\Controller\UsersController::class, 'create']);
    $r->addRoute(['GET', 'POST'], '/users/{id:\d+}/edit', [App\Controller\UsersController::class, 'edit']);
    $r->addRoute('POST', '/users/{id:\d+}/delete', [App\Controller\UsersController::class, 'delete']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '<h1>404 - Page Not Found</h1>';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo '<h1>405 - Method Not Allowed</h1>';
        break;

    case FastRoute\Dispatcher::FOUND:
        [$controllerClass, $method] = $routeInfo[1];
        $vars = $routeInfo[2];

        $controller = new $controllerClass();
        $controller->$method(...array_values($vars));
        break;
}
