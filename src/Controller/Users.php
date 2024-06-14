<?php
namespace App\Controller ; 
class Users 
{
    /**
     * Метод для отображения списка пользователей.
     */
    public function run(): void
    {
        $current_user_id = $_SESSION['auth']['id'];
        $pdo = \App\Service\DB::getPdo();   
        // Проверка csrf атаки 
        try {
            // Подготавливаем запрос для выборки всех пользователей, кроме текущего
            $stmt = $pdo->prepare("
                SELECT `id`, `email`, `username`, `privilege`
                FROM `users`
                WHERE `id` != :current_user_id
            ");
            // Выполняем запрос
            $stmt->execute([':current_user_id' => $current_user_id]);
            $users = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            $this->renderError('An error occurred while retrieving the users', '/');
            return;
        }

        // Передаем данные во view для отображения списка пользователей
        $view_users = new \App\View\Users();
        $data = [
            "title" => "Users Browser",
            "page_name" => "Connected users here:",
            "users" => $users
        ];

        $view_users->render($data);
    }
    /**
     * Метод для добавления нового пользователя.
     */
    public function runAdd(): void
    {
        $pdo = \App\Service\DB::getPdo();
        $validator = $this->getValidator();

        // Проверка данных из POST-запроса
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
            {
                die('CSRF token validation failed');
            }
            try {
                // Хешируем пароль перед сохранением
                $passwordHash = password_hash($_POST['new-Password'], PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("
                    INSERT INTO `users` (`email`, `sec_email`, `username`, `icon`, `password`, `privilege`) 
                    VALUES (:email, :sec_email, :username, :icon , :password, :privilege)
                ");
                /* !! icon и sec_email может подключить лишь человек 
                который будет использовать аккаунт , изменив icon и sec_email в profile */
                $stmt->execute([
                    ':email' => $_POST['new-Email'],
                    ':sec_email' => '',
                    ':username' => $_POST['new-Name'],
                    ':icon' => '' ,
                    ':password' => $passwordHash,
                    ':privilege' => $_POST['new-Privilege']
                ]);
                header('Location: /users');
                return;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                $this->renderError("An error occurred while adding the user.", '/users/add');
                return;
            }
        }

        // Если данные невалидны, отображаем форму добавления с сообщениями об ошибках
        $adding_user = new \App\View\Users\Form();
        $data = [
            "title" => "Add user",
            "page_name" => "Add your new connected user",
            "data" => $_POST,
            "message" => $validator->get_messages(),
            "check" => $validator->check($_POST),
            "action_to" => $_SERVER['REQUEST_URI']
        ];

        $adding_user->render($data);
    }
    /**
     * Метод для изменения данных пользователя.
     */
    public function runChange(): void
    {
        // Проверяем, передан ли идентификатор пользователя через GET-запрос
        if (!isset($_GET['id'])) {
            header('Location: /users');
            return;
        }

        $pdo = \App\Service\DB::getPdo();

        try {
            // Подготавливаем запрос для выборки данных пользователя
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `users` 
                WHERE `id` = :id    
            ");
            $stmt->execute([':id' => $_GET['id']]);

            if (!$user = $stmt->fetch()) {
                // Если пользователь не найден, отображаем сообщение об ошибке
                $this->renderError('We can\'t find that user!', '/users');
                return;
            }

            $validator = $this->getValidator(true);

            // Проверяем данные из POST-запроса
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) {
                 // Проверка csrf атаки 
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                {
                    die('CSRF token validation failed');
                }
                if ($_POST['New-Password'] == '') {
                    // Если новый пароль не введен, обновляем только основные данные пользователя
                    $stmt = $pdo->prepare("
                        UPDATE `users`
                        SET `email` = :email, `username` = :username, `privilege` = :privilege
                        WHERE `id` = :id
                    ");
                    $stmt->execute([
                        ':email' => $_POST['new-Email'],
                        ':username' => $_POST['new-Name'],
                        ':privilege' => $_POST['new-Privilege'],
                        ':id' => $_GET['id']
                    ]);
                } else {
                    // Если введен новый пароль, хешируем его и обновляем все данные
                    $passwordHash = password_hash($_POST['new-Password'], PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("
                        UPDATE `users`
                        SET `email` = :email, `username` = :username, `password` = :password, `privilege` = :privilege
                        WHERE `id` = :id
                    ");
                    $stmt->execute([
                        ':email' => $_POST['new-Email'],
                        ':username' => $_POST['new-Name'],
                        ':password' => $passwordHash,
                        ':privilege' => $_POST['new-Privilege'],
                        ':id' => $_GET['id']
                    ]);
                }
                header('Location: /users');
                return;
            } else {
                // Если данные невалидны или метод запроса не POST, отображаем форму изменения
                $change_user = new \App\View\Users\Form();
                $data = [
                    "title" => "Change user",
                    "page_name" => "Change user's data:",
                    "data" => $user,
                    "message" => $validator->get_messages(),
                    "action_to" => $_SERVER['REQUEST_URI']
                ];

                $change_user->render($data);
            }
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to change the user. Please try again later.', '/users');
            return;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.', '/users');
            return;
        }
    }
    /**
     * Метод для удаления пользователя.
     */
    public function runDelete(): void
    {
        $pdo = \App\Service\DB::getPdo();

        try {
            // Проверяем данные из POST-запроса для удаления
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                 // Проверка csrf атаки 
                 if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                 {
                     die('CSRF token validation failed');
                 }
                $stmt = $pdo->prepare("
                    DELETE FROM `users`
                    WHERE `id` = :id
                ");
                $stmt->execute([':id' => $_POST['id']]);
                header('Location: /users');
                return;
            } else if (!isset($_GET['id'])) {
                // Если идентификатор пользователя не передан, перенаправляем на страницу main страницу users
                header('Location: /users');
                return;
            }

            // Подготавливаем запрос для выборки данных пользователя и дальнейшей его проверки .
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `users`
                WHERE `id` = :id
            ");
            $stmt->execute([':id' => $_GET['id']]);

            if (!$user = $stmt->fetch()) {
                // Если пользователь не найден, отображаем сообщение об ошибке
                $this->renderError('We can\'t find that user!', '/');
                return;
            }

            // Отображаем форму подтверждения удаления пользователя
            $delete = new \App\View\Users\FormDelete();
            $data = [
                "title" => "Delete user",
                "page_name" => "Delete user's data:",
                "data" => $user,
                "action_to" => [
                    'delete' => $_SERVER['REQUEST_URI'],
                    'cancel' => '/users'
                ]
            ];
            $delete->render($data);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to delete the user. Please try again later.', '/');
            return;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.', '/');
            return;
        }
    }
    /**
     * Метод для получения валидатора.
     * 
     * @param bool $ischange - Флаг того какой метод используеться .
     * @return \App\Service\Validator
     */
    public function getValidator(bool $ischange = false): \App\Service\Validator
    {
        $validator = new \App\Service\Validator();
        $validator
            ->set_rule('new-Email', function($value) {
                return !is_null($value) && mb_strlen($value) > 0;
            }, 'Email is necessary')
            ->set_rule('new-Email', function($value) {
                return preg_match('/^[^@]+@[^@]+\.[^@]+$/', $value);
            }, 'Email is incorrect')
            ->set_rule('new-Email', function($value) {
                return preg_match('/@(gmail\.com|mail\.ru|yandex\.com|outlook\.com|yahoo\.com)$/', $value);
            }, 'We do not service the email domain you provide')
            ->set_rule('new-Name', function($value) {
                return preg_match('/.{3,25}$/', $value);
            }, 'Name length is incorrect, expected 3-12 symbols')
            ->set_rule('new-Privilege', function($value) {
                return in_array((int)$value, [0, 1]);
            }, 'Incorrect privilege')
            ->set_rule('new-Password-check', function($value, $data) {
                return isset($data['new-Password']) && $data['new-Password'] === $value;
            }, 'Not the same password');

        if ($ischange) {
            $validator->set_rule('new-Password', function($value) {
                return $value == '' || preg_match('/.{4,25}$/', $value);
            }, 'Password is incorrect, expected 4-8 symbols');
        } else {
            $validator->set_rule('new-Password', function($value) {
                return preg_match('/.{4,25}$/', $value);
            }, 'Password is incorrect, expected 4-8 symbols');
        }

        return $validator;
    }
    /**
     * Метод для отображения ошибки пользователю.
     * 
     * @param string $message - Сообщение об ошибке
     * @param string $href - URL для перенаправления
     */
    private function renderError(string $message, string $href): void
    {
        $bug = new \App\Service\SorryBug();
        $data = [
            'problem' => $message,
            'href' => $href
        ];
        $bug->render($data);
    }
}