<?php
namespace App\Controller;

class Login 
{
    /**
     * Обрабатывает попытку входа пользователя в систему.
     */
    public function run() 
    {
        $message = null ;
        if (!isset($_SESSION['csrf_token'])) {
            // Генерация нового CSRF токена, если он еще не установлен
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        if (isset($_POST['login-email'], $_POST['login-password'], $_POST['csrf_token'])) {
            // Проверка CSRF токена
            if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $message = 'Security error. Please try again.';
                $this->renderPage($message);
                return;
            }

            // Получение PDO соединения.
            $pdo = \App\Service\DB::getPdo();

            // Подготовка запроса на выборку пользователя по электронной почте.
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `users`
                WHERE `email` = :email
            ");
            $stmt->execute([':email' => $_POST['login-email']]);
            
            if ($user = $stmt->fetch()) {
                // Проверка хеша пароля пользователя.
                if (password_verify($_POST['login-password'], $user['password'])) {
                    $_SESSION['auth'] = $user;
                    header('Location: /');
                    exit;
                } else {
                    $message = 'You entered incorrect password, please try again';
                }
            } else {
                $message = 'You entered incorrect email , please try again';
            }
        }

        // Рендеринг страницы входа с сообщением об ошибке (если оно есть).
        $this->renderPage($message);
    }

    /**
     * Рендерит страницу входа.
     *
     * @param string|null $message Сообщение об ошибке для отображения пользователю.
     */
    private function renderPage($message)
    {
        $view_login = new \App\View\Login();
        $data = [
            "title" => "Log in",
            "message" => $message
        ];
        $view_login->render($data);
    }

    /**
     * Выполняет выход пользователя из системы.
     */
    public function run_logout()
    {
        unset($_SESSION['auth']);
        header('Location: /');
        exit;
    }
}
