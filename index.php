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
    
    $r->addRoute(['GET', 'POST'], '/log_in', fn() => (new App\Controller\Login())->run());

    $r->addRoute(['GET', 'POST'], '/log_out', fn() => (new App\Controller\Login())->run_logout());

    $r->addRoute(['GET', 'POST'], '/',fn() => (new App\Controller\Main())->run());

    # $r->addRoute(['GET', 'POST'], '/sing_up', fn() => (new App\Controller\SingUp())->run());
    $r->addRoute(['GET' , 'POST'], '/insta', fn() => (new App\Controller\Insta())->run());

    $r->addRoute(['GET' , 'POST'], '/insta/add', fn() => (new App\Controller\Insta())->runAdd());

    $r->addRoute(['GET' , 'POST'], '/insta/change', fn() => (new App\Controller\Insta())->runChange($_SESSION['auth']['privilege']));

    $r->addRoute(['GET' , 'POST'], '/insta/delete', fn() => (new App\Controller\Insta())->runDelete($_SESSION['auth']['privilege']));
    
    $r->addRoute(['GET' , 'POST'], '/tasks', fn() => (new App\Controller\Tasks())->run());

    $r->addRoute(['GET' , 'POST'], '/tasks/add', fn() => (new App\Controller\Tasks())->runAdd());

    $r->addRoute(['GET' , 'POST'], '/tasks/change', fn() => (new App\Controller\Tasks())->runChange($_SESSION['auth']['privilege']));

    $r->addRoute(['GET' , 'POST'], '/tasks/delete', fn() => (new App\Controller\Tasks())->runDelete($_SESSION['auth']['privilege']));

    $r->addRoute(['GET' , 'POST'], '/profile', fn() => (new App\Controller\Profile())->run());

    $r->addRoute(['GET' , 'POST'], '/profile/password', fn() => (new App\Controller\Profile())->runChangePass());

    $r->addRoute(['GET' , 'POST'], '/profile/appear', fn() => (new App\Controller\Profile())->runChangeAppear());

    $r->addRoute(['GET' , 'POST'], '/profile/delete', fn() => (new App\Controller\Profile())->runDelete());

    //$r->addRoute(['GET' , 'POST'], '/insta/change', fn() => (new App\Controller\Insta())->runChange());

    if (isset($_SESSION['auth']) && $_SESSION['auth']['privilege'] == 1)
    {
        // Users routes : 
        $r->addRoute('GET', '/users', fn() => (new App\Controller\Users())->run());

        $r->addRoute(['GET' , 'POST'], '/users/add', fn() => (new App\Controller\Users())->runAdd());

        $r->addRoute(['GET' , 'POST'], '/users/change', fn() => (new App\Controller\Users())->runChange());

        $r->addRoute(['GET' , 'POST'], '/users/delete' , fn() => (new App\Controller\Users())->runDelete());

        // Insta accounts routes:


        // Tasks routes : 

    } elseif (isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] == '/users')
    {
        $bug = new App\Service\SorryBug ; 
        $data = [
            'problem' => 'Sorry but you dont have access to this page!' ,
            'href' => '/' 
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

