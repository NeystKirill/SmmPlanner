<?php
namespace App\Controller ; 

class Profile 
{
     /**
     * Метод для отображения главной страницы пользователя.
     */
    public function run(): void
    {
        $current_user_id = $_SESSION['auth']['id'];
        $data = \App\Service\DB::getData( $current_user_id) ; 
        // Создание и render страницы Profile
        $view_user = new \App\View\Profile();
        $data = [
            "title" => "User Profile",   
            "page_name" => "User Profile:", 
            "user" => $data['user'],
            "insta" => $data['insta_account'], 
            "tasks" => $data['user_tasks'] 
        ]; 
    
        $view_user->render($data);
    }    
     /**
     * Метод для изменения пароля пользователя.
     */       
    public function runChangePass(): void
    {
        $current_user_id = $_SESSION['auth']['id'];
        $pdo = \App\Service\DB::getPdo();
        $data = \App\Service\DB::getData( $current_user_id) ; 
        try {
            $validator = $this->getValidator(true);
            
            // Проверка текущего пароля
            if (password_verify($_POST['current-Password'], $data['pass']['password']) && isset($_POST['current-Password'])) 
            {
                $passwordHash = password_hash($_POST['new-Password'], PASSWORD_DEFAULT);
                // Проверка запроса и проверка валидации данных
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) {
                    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                    {
                        die('CSRF token validation failed');
                    }
                    $stmt = $pdo->prepare("
                        UPDATE `users`
                        SET `password` = :password 
                        WHERE `id` = :id
                    ");
                    $stmt->execute([
                        ':password' => $passwordHash,
                        ':id' => $_SESSION['auth']['id']
                    ]);

                    header('Location: /profile');
                    return;
                }
            } else
            {
                $message_pass = 'Current password is wrong!';
            }
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to change the password. Please try again later.', '/profile');
            return; 
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.', '/profile');
            return; 
        } 

        // Создание и render страницы Change Password
        $change_pass = new \App\View\Profile\FormPass();
        $data = [
            "message" => [$validator->get_messages(), $message_pass],
            "action_to" => $_SERVER['REQUEST_URI'],
            "user" => $data['user'],
            "insta" => $data['insta_account'], 
            "tasks" => $data['user_tasks'] 
        ];

        $change_pass->render($data);
    }
     /**
     * Метод для изменения вида профиля пользователя.
     */
    public function runChangeAppear(): void 
    {
        $current_user_id = $_SESSION['auth']['id'];
        $pdo = \App\Service\DB::getPdo();
        $data = \App\Service\DB::getData($current_user_id) ;
        $message_pass = '';
    
        try {
            $validator = $this->getValidator(false);
            if (password_verify($_POST['current-Password'], $data['pass']['password'])) {
            // Проверка запроса и проверка валидации данных
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) {
                    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                    {
                        die('CSRF token validation failed');
                    }
                    $photoContent = null;
    
                    // Обработка загруженной фотографии
                    if (isset($_FILES['new-Photo']) && $_FILES['new-Photo']['error'] === UPLOAD_ERR_OK) {
                        $photoTmpPath = $_FILES['new-Photo']['tmp_name'];
                        $photoInfo = getimagesize($photoTmpPath);
                        $photoContent = file_get_contents($photoTmpPath);
    
                        if ($photoInfo === false) {
                            $this->renderError('Invalid image file', '/profile');
                            return;
                        }
    
                        if ($photoContent === false) {
                            $this->renderError('Error reading image file', '/profile');
                            return;
                        }
                    }
    
                    // Логика обновления данных в БД
                    if ($photoContent !== null) {
                        $stmt = $pdo->prepare("
                            UPDATE `users`
                            SET `username` = :username, `icon` = :icon, `email` = :email, `sec_email` = :sec_email
                            WHERE `id` = :id
                        ");
                        $stmt->execute([
                            ':username' => $_POST['new-Name'],
                            ':icon' => $photoContent,
                            ':email' => $_POST['new-Email'],
                            ':sec_email' => $_POST['sec-Email'],
                            ':id' => $current_user_id
                        ]);
                        \App\Service\DB::updateCreators($_POST['new-Name'] , $data['user']['username']) ;
                    } else {
                        $stmt = $pdo->prepare("
                            UPDATE `users`
                            SET `username` = :username, `email` = :email, `sec_email` = :sec_email
                            WHERE `id` = :id
                        ");
                        $stmt->execute([
                            ':username' => $_POST['new-Name'],
                            ':email' => $_POST['new-Email'],
                            ':sec_email' => $_POST['sec-Email'],
                            ':id' => $current_user_id
                        ]);
                        \App\Service\DB::updateCreators($_POST['new-Name'] , $data['user']['username']) ;
                    }
                    header('Location: /profile');
                    return;
                
            }} else {
                    $message_pass = 'Current password is wrong!';
                }
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to change user data. Please try again later.', '/profile/appear');
            return;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.', '/profile/appear');
            return;
        }
    
        // Создание и render страницы Change Appearance
        $change_appear = new \App\View\Profile\FormAppear();
        $data = [
            "title" => "User Profile",
            "message" => [$validator->get_messages(), $message_pass],
            "user" => $data['user'],
            "insta" => $data['insta_account'],
            "tasks" => $data['user_tasks'],
        ];
    
        $change_appear->render($data);
    }
     /**
     * Метод для удаления выбраныз данных пользователя .
     */
    public function runDelete(): void
    {
    $pdo = \App\Service\DB::getPdo();

    //try {
        // Проверка того, передан ли id user через POST
        if (isset($_POST['id'])) {
            if ($_GET['type'] == 'icon') {
                // Удаление иконки пользователя (установка в NULL)
                $stmt = $pdo->prepare("
                    UPDATE `users`
                    SET `icon` = ''
                    WHERE `id` = :id
                ");
                $stmt->execute([':id' => $_POST['id']]);
            } else if ($_GET['type'] == 'second_email') {
                // Удаление дополнительного email пользователя (установка в NULL)
                $stmt = $pdo->prepare("
                    UPDATE `users`
                    SET `sec_email` = ''
                    WHERE `id` = :id
                ");
                $stmt->execute([':id' => $_POST['id']]);
            }
            header('Location: /profile');
            exit;
        }

        // Создание и render страницы подтверждения удаления данных
        $delete = new \App\View\Profile\FormDelete();
        $data = [
            "title" => "Delete data",
            "page_name" => "Delete your data:",
            "action_to" => [
                'delete' => $_SERVER['REQUEST_URI'],
                'cancel' => '/profile'
            ]
        ];
        $delete->render($data);
/*
    } catch (\PDOException $e) {
        error_log($e->getMessage());
        $this->renderError('An error occurred while trying to delete the user data. Please try again later.', '/profile');
        exit;
    } catch (\Exception $e) {
        error_log($e->getMessage());
        $this->renderError('An unexpected error occurred. Please try again later.', '/profile');
        exit;
    }
*/
    }
      /**
     * Метод для получения валидатора.
     * 
     * @return \App\Service\Validator
     */
    private function getValidator($isPass = false): \App\Service\Validator
    {
    $validator = new \App\Service\Validator();
    $validator
    ->set_rule('current-Password', function($value) {
        return !empty($value);
    }, 'Current password is required'); 
    if ($isPass)
    {
        $validator 
        ->set_rule('new-Password', function($value) {
            return preg_match('/.{3,25}$/', $value);
        }, 'Password length should be between 3 and 25 characters')
        ->set_rule('new-Password-check', function($value, $data) {
            return isset($data['new-Password']) && $data['new-Password'] === $value; 
        }, 'Passwords do not match')  ;
    } else 
    {
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
            ->set_rule('sec-Email', function($value) {
                return !is_null($value) && mb_strlen($value) > 0;
            }, 'Secondary email is necessary')
            ->set_rule('sec-Email', function($value) {
                return preg_match('/^[^@]+@[^@]+\.[^@]+$/', $value);
            }, 'Secondary email is incorrect')
            ->set_rule('sec-Email', function($value) {
                return preg_match('/@(gmail\.com|mail\.ru|yandex\.com|outlook\.com|yahoo\.com)$/', $value);
            }, 'We do not service the email domain you provide')
            ->set_rule('new-Name', function($value) {
                return preg_match('/.{3,25}$/', $value);
            }, 'Name length is incorrect, expected 3-25 symbols');
    }
        
    
    
    return $validator;
    }   
      /**
     * Метод для отображения ошибки.
     * 
     * @param string $message Сообщение об ошибке
     * @param string $href URL для перенаправления
     */
    private function renderError(string $message, string $href)
    {
        $bug = new \App\Service\SorryBug();
        $data = [
            'problem' => $message,
            'href' => $href
        ];
        $bug->render($data);
    }
}