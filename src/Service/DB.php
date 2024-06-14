<?php

namespace App\Service;

use PDO;

class DB 
{
    private static $pdo = null;
    public static function getPdo()
    {
        if (self::$pdo === null) {
            $host = '127.0.0.1';
            $db = 'smmplanner(prject)';
            $user = 'root';
            $pass = 'iamkirill15';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$pdo = new PDO($dsn, $user, $pass, $options);
        }

        return self::$pdo;
    }
    public static function getData(int $current_user_id)
    {
        $bug = new \App\Service\SorryBug();
        $pdo = self::getPdo();
        try {
            // Получение данных пользователя
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `users` 
                WHERE `id` = :current_user_id");
            $stmt->execute([':current_user_id' => $current_user_id]);
            $user = $stmt->fetch();

            if (!$user) {
                throw new \Exception("User not found");
            }

            // Получение Instagram-аккаунтов пользователя
            $stmt = $pdo->prepare("
                SELECT `username` 
                FROM `insta-accounts` 
                WHERE `creator` = :username");
            $stmt->execute([':username' => $user['username']]);
            $insta_account = $stmt->fetchAll();

            // Получение задач пользователя
            $stmt = $pdo->prepare("
                SELECT `task_name`, `post_date`, `create_date` 
                FROM `tasks` 
                WHERE `creator` = :username");
            $stmt->execute([':username' => $user['username']]);
            $user_tasks = $stmt->fetchAll();

            // Получение пароля пользователя
            $stmt = $pdo->prepare("SELECT `password` FROM `users` WHERE `id` = :id");
            $stmt->execute([':id' => $_SESSION['auth']['id']]);
            $pass = $stmt->fetch();
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());

            $data = [
                'problem' => 'An error occurred while retrieving the data',
                'href' => '/'
            ];
            $bug->render($data);
            return [];
        }

        return [
            'user' => $user,
            'user_tasks' => $user_tasks,
            'insta_account' => $insta_account,
            'pass' => $pass
        ];
    }
    public static function updateCreators(string $new_username, string $last_username)
    {
        $bug = new \App\Service\SorryBug();
        $pdo = self::getPdo();
        try {
            // Обновление Instagram-аккаунтов пользователя
            $stmt = $pdo->prepare("UPDATE `insta-accounts` SET `creator` = :new_creator WHERE `creator` = :last_creator");
            $stmt->execute([
                ':new_creator' => $new_username,
                ':last_creator' => $last_username
            ]);

            // Обновление задач пользователя
            $stmt = $pdo->prepare("UPDATE `tasks` SET `creator` = :new_creator WHERE `creator` = :last_creator");
            $stmt->execute([
                ':new_creator' => $new_username,
                ':last_creator' => $last_username
            ]);
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());

            $data = [
                'problem' => 'An error occurred while updating the data',
                'href' => '/'
            ];
            $bug->render($data);
        }
    }
}
