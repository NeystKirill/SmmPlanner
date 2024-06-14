<?php
namespace App\Controller;

class Tasks 
{
     /**
     * Метод для отображения списка задач.
     */
    public function run(): void
    {
        try {
            // Получаем подключение к базе данных
            $pdo = \App\Service\DB::getPdo();
            // Подготавливаем и выполняем запрос на выборку всех задач
            $stmt = $pdo->prepare("
                SELECT *
                FROM `tasks`
            ");
            $stmt->execute();
        } catch (\PDOException $e) {
            // Логируем ошибку и показываем сообщение об ошибке пользователю
            error_log("Database error: " . $e->getMessage());
            $this->renderError('An error occurred while retrieving the tasks', '/');
            return;
        }

        // Создаем и рендерим страницу задач
        $view_tasks = new \App\View\Tasks();
        $data = [
            "title" => "Active tasks",
            "page_name" => "Current Tasks:",
            "data" => $stmt->fetchAll()
        ];
        $view_tasks->render($data);
    }
     /**
     * Метод для добавления новой задачи.
     */
    public function runAdd(): void
    {
        $validator = $this->getValidator();
        // Проверка запроса и валидации данных
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) { 
             // Проверка csrf атаки 
             if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
             {
                 die('CSRF token validation failed');
             }
            // Проверка наличия загруженного изображения
            if (isset($_FILES['new-Photo']) && $_FILES['new-Photo']['error'] === UPLOAD_ERR_OK) {
                // Обработка загруженного изображения
                $photo_tmp_path = $_FILES['new-Photo']['tmp_name'];
                $photo_info = getimagesize($photo_tmp_path);
                $photo_content = file_get_contents($photo_tmp_path);

                if ($photo_info === false) {
                    $this->renderError('Invalid image file', '/tasks/add');
                    return;
                } else if ($photo_content === false) {
                    $this->renderError('Error reading image file', '/tasks/add');
                    return;
                }
            } else {
                $this->renderError('File upload error: ' . $_FILES['new-Photo']['error'], '/tasks/add');
                return;
            }

            try {
                // Вставка данных в базу данных
                $pdo = \App\Service\DB::getPdo();
                $stmt = $pdo->prepare("
                    INSERT INTO `tasks` (`creator`, `task_name`, `photo`, `description`, `post_date`)
                    VALUES (:creator, :task_name, :photo, :description, :post_date)
                ");
                $stmt->execute([
                    ':creator' => $_SESSION['auth']['username'],
                    ':task_name' => $_POST['new-Name'],
                    ':photo' => $photo_content,
                    ':description' => $_POST['new-Description'],
                    ':post_date' => $_POST['new-Date']
                ]);

                header('Location: /tasks');
                return;
            } catch (\Exception $e) {
                error_log($e->getMessage());
                $this->renderError('An error occurred while trying to add new task. Please try again later.', '/tasks');
                return;
            }
        }

        // Создание и рендер страницы добавления задачи
        $adding_task = new \App\View\Tasks\Form();
        $data = [
            "title" => "Adding task",
            "page_name" => "Add new task",
            "data" => $_POST,
            "message" => $validator->get_messages(),
            "check" => $validator->check($_POST),
            "action_to" => $_SERVER['REQUEST_URI']
        ];

        $adding_task->render($data);
    }
     /**
     * Метод для изменения задачи только для тех у кого есть привелегия admin(1).
     * 
     * @param int $privilege Привилегии пользователя
     */
    public function runChange(int $privilege): void
    {
        // Проверка прав на изменение задачи - !задачу может изменить только админ либо создатель этого же задания! 
        if (($privilege == 1 && $_GET['creator'] != $_SESSION['auth']['username']) || $_GET['creator'] == $_SESSION['auth']['username']) {
            // Проверка наличия ID задачи в GET-запросе
            if (!isset($_GET['id'])) {
                header('Location: /tasks');
                return;
            }

            // Подготовка и выполнение запроса на выборку задачи
            $pdo = \App\Service\DB::getPdo();
            $stmt = $pdo->prepare("
                SELECT *
                FROM `tasks`
                WHERE `id` = :id
            ");
            $stmt->execute([':id' => $_GET['id']]);

            // Если задача не найдена, показываем сообщение об ошибке
            if (!$task = $stmt->fetch()) {
                $this->renderError("We can't find that task!", '/tasks');
                return;
            }

            $validator = $this->getValidator();

            // Проверка запроса и валидации данных
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) {
                $photoContent = null;
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                {
                    die('CSRF token validation failed');
                }
                // Проверка и обработка загруженного файла фотографии
                if (isset($_FILES['new-Photo']) && $_FILES['new-Photo']['error'] === UPLOAD_ERR_OK) {
                    $photoTmpPath = $_FILES['new-Photo']['tmp_name'];
                    $photoInfo = getimagesize($photoTmpPath);
                    $photoContent = file_get_contents($photoTmpPath);

                    if ($photoInfo === false) {
                        $this->renderError('Invalid image file', '/tasks');
                        return;
                    } else if ($photoContent === false) {
                        $this->renderError('Error reading image file', '/tasks');
                        return;
                    }
                } else if (!isset($_FILES['new-Photo'])) {
                    $this->renderError('File upload error: ' . $_FILES['new-Photo']['error'], '/tasks');
                    return;
                }

                // Если фотография существует и чтение содержимого прошло успешно:
                if ($photoContent !== null) {
                    try {
                        // Логика обновления данных в базе данных
                        $stmt = $pdo->prepare("
                            UPDATE `tasks`
                            SET `photo` = :photo, `task_name` = :task_name, `description` = :description, `post_date` = :post_date
                            WHERE `id` = :id
                        ");
                        $stmt->execute([
                            ':photo' => $photoContent,
                            ':task_name' => $_POST['new-Name'],
                            ':description' => $_POST['new-Description'],
                            ':post_date' => $_POST['new-Date'],
                            ':id' => $_GET['id']
                        ]);
                        header('Location: /tasks');
                        return;
                    } catch (\Exception $e) {
                        error_log($e->getMessage());
                        $this->renderError('An error occurred while trying to change task. Please try again later.', '/tasks');
                        return;
                    }
                } else {
                    // Обновление данных без изменения фотографии
                    $stmt = $pdo->prepare("
                        UPDATE `tasks`
                        SET `task_name` = :task_name, `description` = :description, `post_date` = :post_date
                        WHERE `id` = :id
                    ");
                    $stmt->execute([
                        ':task_name' => $_POST['new-Name'],
                        ':description' => $_POST['new-Description'],
                        ':post_date' => $_POST['new-Date'],
                        ':id' => $_GET['id']
                    ]);
                }

                header('Location: /tasks');
                return;
            }

            // Создание и рендер страницы изменения задачи
            $change_task = new \App\View\Tasks\Form();
            $data = [
                "title" => "Change task",
                "page_name" => "Change task:",
                "data" => $task,
                "message" => $validator->get_messages(),
                "action_to" => $_SERVER['REQUEST_URI']
            ];

            $change_task->render($data);
        } else {
            // Показ ошибки, если изменение задачи не разрешено
            $this->renderError('You can\'t change this task!', '/tasks');
            return;
        }
    }
     /**
     * Метод для удаления задачи.
     * 
     * @param int $privilege Привилегии пользователя
     */
    public function runDelete(int $privilege): void
    {
         // Проверка прав на изменение задачи - !задачу может изменить только админ либо создатель этого же задания! 
        if (($privilege == 1 && $_GET['creator'] != $_SESSION['auth']['username']) || $_GET['creator'] == $_SESSION['auth']['username']) {
            $pdo = \App\Service\DB::getPdo();

            // Проверка наличия ID задачи в POST-запросе
            if (isset($_POST['id'])) {
                try {
                    // Логика удаления данных из базы данных
                    $stmt = $pdo->prepare("
                        DELETE
                        FROM `tasks`
                        WHERE `id` = :id
                    ");
                    $stmt->execute([':id' => $_POST['id']]);
                    header('Location: /tasks');
                    return;
                } catch (\Exception $e) {
                    error_log($e->getMessage());
                    $this->renderError('An error occurred while trying to delete the task. Please try again later.', '/tasks');
                    return;
                }
            }

            // Проверка наличия ID задачи в GET-запросе
            if (!isset($_GET['id'])) {
                header('Location: /tasks');
                return;
            }

            // Подготовка и выполнение запроса на выборку задачи
            $stmt = $pdo->prepare("
                SELECT *
                FROM `tasks`
                WHERE `id` = :id
            ");
            $stmt->execute([':id' => $_GET['id']]);

            if (!$task = $stmt->fetch()) {
                $this->renderError('We can\'t find that task!', '/tasks');
                return;
            }

            // Создание и рендер страницы подтверждения удаления задачи
            $delete = new \App\View\Tasks\FormDelete();
            $data = [
                "title" => "Delete current task",
                "page_name" => "Delete task:",
                "data" => $task,
                "action_to" => [
                    'delete' => $_SERVER['REQUEST_URI'],
                    'cancel' => '/tasks'
                ]
            ];
            $delete->render($data);
        } else {
            // Показ ошибки, если удаление задачи не разрешено
            $this->renderError('You can\'t delete this task!', '/tasks');
            return;
        }
    }
     /**
     * Метод для получения валидатора.
     * 
     * @return \App\Service\Validator
     */
    public function getValidator(): \App\Service\Validator
    {
        $validator = new \App\Service\Validator();
        $validator
        ->set_rule('new-Name', function($value) {
            return preg_match('/.{1,50}$/', $value);
        }, 'Wrong description, expected maximum 50 symbols')
            ->set_rule('new-Date', function($value) {
                $currentDateTime = date('Y-m-d\TH:i');
                return ($currentDateTime < $value && $value < '2035-01-01 12:00');
            }, 'Wrong date')
            ->set_rule('new-Description', function($value) {
                return preg_match('/.{1,100}$/', $value);
            }, 'Wrong description, expected maximum 100 symbols');
        return $validator;
    }
     /**
     * Метод для отображения ошибки.
     * 
     * @param string $message Сообщение об ошибке
     * @param string $href URL для перенаправления
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
