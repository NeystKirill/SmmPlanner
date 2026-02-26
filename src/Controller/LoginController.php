<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\UserModel;

class LoginController extends BaseController
{
    public function showLogin(): void
    {
        if (isset($_SESSION['auth'])) {
            $this->redirect('/');
        }
        $this->render('pages/login.twig');
    }

    public function processLogin(): void
    {
        $identifier = trim($_POST['identifier'] ?? '');
        $password = $_POST['password'] ?? '';
        $remember = !empty($_POST['remember']);

        if (empty($identifier) || empty($password)) {
            $this->setFlash('error', 'Please fill in all fields.');
            $this->redirect('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->findByEmail($identifier) ?? $userModel->findByUsername($identifier);

        if (!$user || !$userModel->verifyPassword($password, $user['password'])) {
            $this->setFlash('error', 'Invalid credentials. Please try again.');
            $this->redirect('/login');
        }

        if (!$user['is_active']) {
            $this->setFlash('error', 'Your account has been deactivated.');
            $this->redirect('/login');
        }

        
        $_SESSION['auth'] = [
            'id' => $user['id'],
            'uuid' => $user['uuid'],
            'username' => $user['username'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'role' => $user['role'],
            'avatar' => $user['avatar'],
            'theme' => $user['theme'],
            'accent_color' => $user['accent_color'],
        ];

        $userModel->updateLastLogin((int)$user['id']);

        if ($remember) {
            $lifetime = 30 * 24 * 3600;
            session_set_cookie_params($lifetime);
            session_regenerate_id(true);
        }

        $this->redirect('/');
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/login');
    }
}
