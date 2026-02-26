<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\UserModel;

class ProfileController extends BaseController
{
    private UserModel $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function index(): void
    {
        $this->requireAuth();
        $user = $this->model->find($_SESSION['auth']['id']);
        $this->render('pages/profile.twig', ['user' => $user]);
    }

    public function update(): void
    {
        $this->requireAuth();

        $this->model->update($_SESSION['auth']['id'], [
            'full_name' => $this->sanitize($_POST['full_name'] ?? ''),
            'bio' => $this->sanitize($_POST['bio'] ?? ''),
            'theme' => in_array($_POST['theme'] ?? '', ['dark', 'light']) ? $_POST['theme'] : 'dark',
            'accent_color' => $_POST['accent_color'] ?? '#6366f1',
        ]);

        $_SESSION['auth']['full_name'] = $this->sanitize($_POST['full_name'] ?? '');
        $_SESSION['auth']['theme'] = $_POST['theme'] ?? 'dark';

        $this->setFlash('success', 'Profile updated successfully!');
        $this->redirect('/profile');
    }

    public function changePassword(): void
    {
        $this->requireAuth();

        if (!$this->isPost()) {
            $this->redirect('/profile');
        }

        $user = $this->model->find($_SESSION['auth']['id']);
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (!$this->model->verifyPassword($currentPassword, $user['password'])) {
            $this->setFlash('error', 'Current password is incorrect.');
            $this->redirect('/profile');
        }

        if (strlen($newPassword) < 8) {
            $this->setFlash('error', 'Password must be at least 8 characters.');
            $this->redirect('/profile');
        }

        if ($newPassword !== $confirm) {
            $this->setFlash('error', 'Passwords do not match.');
            $this->redirect('/profile');
        }

        $this->model->updatePassword($_SESSION['auth']['id'], $newPassword);
        $this->setFlash('success', 'Password changed successfully!');
        $this->redirect('/profile');
    }

    public function uploadAvatar(): void
    {
        $this->requireAuth();

        if (empty($_FILES['avatar']['tmp_name'])) {
            $this->setFlash('error', 'No file uploaded.');
            $this->redirect('/profile');
        }

        $file = $_FILES['avatar'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($ext, $allowed)) {
            $this->setFlash('error', 'Invalid file type.');
            $this->redirect('/profile');
        }

        $uploadDir = ROOT_PATH . '/public/uploads/avatars/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $filename = 'avatar_' . $_SESSION['auth']['id'] . '_' . time() . '.' . $ext;
        move_uploaded_file($file['tmp_name'], $uploadDir . $filename);

        $avatarPath = '/uploads/avatars/' . $filename;
        $this->model->update($_SESSION['auth']['id'], ['avatar' => $avatarPath]);
        $_SESSION['auth']['avatar'] = $avatarPath;

        $this->setFlash('success', 'Avatar updated!');
        $this->redirect('/profile');
    }

    public function deleteAccount(): void
    {
        $this->requireAuth();
        $user = $this->model->find($_SESSION['auth']['id']);

        if (!$this->model->verifyPassword($_POST['password'] ?? '', $user['password'])) {
            $this->setFlash('error', 'Incorrect password. Account not deleted.');
            $this->redirect('/profile');
        }

        $this->model->delete($_SESSION['auth']['id']);
        session_destroy();
        $this->redirect('/login');
    }
}
