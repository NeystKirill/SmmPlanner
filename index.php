<?php

session_start(); // Старт сессии. Необходим для работы с переменными сессии.
require 'vendor/autoload.php'; // Подключение автозагрузчика классов Composer.

// Проверка наличия данных аутентификации пользователя. Если нет данных и текущий URL не соответствует странице входа, перенаправляем пользователя на страницу входа.
if (!isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] !== '/log_in') {
    header('Location: /log_in'); // Перенаправление на страницу входа.
    return; // Остановка дальнейшего выполнения скрипта.
}

// Создание диспетчера маршрутов с использованием библиотеки FastRoute.
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Определение маршрутов для приложения
    $r->addRoute(['GET', 'POST'], '/', function() {
        $main_controller = new \App\Controller\Main(); // Создание экземпляра контроллера для главной страницы.
        $main_controller->run(); // Выполнение метода run контроллера.
    });

    $r->addRoute(['GET', 'POST'], '/sing_up', function() {
      
    });

    $r->addRoute(['GET', 'POST'], '/log_in', function() {
        $controller = new App\Controller\Login(); // Создание экземпляра контроллера для страницы входа.
        $controller->run(); // Выполнение метода run контроллера.
    });
  ###  dhdhdhdh

    $r->addRoute(['GET', 'POST'], '/log_out', function() {
        $controller = new App\Controller\Login(); // Создание экземпляра контроллера для выхода из системы.
        $controller->run_logout(); // Выполнение метода run_logout контроллера для выхода.
    });
    $r->addRoute('GET', '/insta', function() {
        $controller = new App\Controller\Insta(); // Создание экземпляра контроллера для выхода из системы
        $controller->run(); // Выполнение метода run_logout контроллера для выхода.
    });
    $r->addRoute('GET', '/tasks', function() {
        $controller = new App\Controller\Tasks(); // Создание экземпляра контроллера для выхода из системы.
        $controller->run(); // Выполнение метода run_logout контроллера для выхода.
    });
    if (isset($_SESSION['auth']) && $_SESSION['auth']['privilege'] == 1)
    {
        $r->addRoute('GET', '/users', function() {
        $controller = new App\Controller\Users(); //
        $controller->run(); // Выполнение метода run контроллера.

        });
    }
    # в случае ошибки выдавать sorryBug
    elseif (isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] == '/users' && !$_SESSION['auth']['privilege'] == 1)
    {
        $bug = new App\View\SorryBug ; 
        $data = [
            'problem' => 'Sorry but you dont have access to this page!'
        ] ;
        $bug->render($data);
    }
    

   
});

// Получение метода и URI текущего запроса
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Удаление строки запроса (если есть) и декодирование URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Обработка маршрута
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found'; // Вывод сообщения о том, что страница не найдена.
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed'; // Вывод сообщения о том, что метод не разрешен.
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars); // Выполнение обработчика маршрута с переменными.
        break;
}
?>
