<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\UserModel;

class UsersController extends BaseController
{
    private UserModel $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function index(): void
    {
        $this->requireAdmin();
        $page = max(1, (int)($_GET['page'] ?? 1));
        $result = $this->model->getAllPaginated($page, 15);
        $stats = $this->model->getStats();

        $this->render('pages/users.twig', [
            'users' => $result['items'],
            'pagination' => $result,
            'stats' => $stats,
        ]);
    }

    public function create(): void
    {
        $this->requireAdmin();

        if (!$this->isPost()) {
            $this->render('pages/users-form.twig', [
                'user' => null,
                'roles' => ['admin', 'manager', 'viewer'],
            ]);
            return;
        }

        $errors = [];
        if (empty($_POST['username'])) $errors['username'] = 'Username is required.';
        if (empty($_POST['email'])) $errors['email'] = 'Email is required.';
        if (empty($_POST['password'])) $errors['password'] = 'Password is required.';
        if (strlen($_POST['password'] ?? '') < 8) $errors['password'] = 'Password must be at least 8 chars.';

        if ($this->model->findByEmail($_POST['email'])) {
            $errors['email'] = 'Email already in use.';
        }
        if ($this->model->findByUsername($_POST['username'])) {
            $errors['username'] = 'Username already taken.';
        }

        if (!empty($errors)) {
            $this->render('pages/users-form.twig', [
                'user' => $_POST,
                'errors' => $errors,
                'roles' => ['admin', 'manager', 'viewer'],
            ]);
            return;
        }

        $this->model->create([
            'username' => $this->sanitize($_POST['username']),
            'email' => $this->sanitize($_POST['email']),
            'password' => $_POST['password'],
            'full_name' => $this->sanitize($_POST['full_name'] ?? ''),
            'role' => in_array($_POST['role'] ?? '', ['admin', 'manager', 'viewer']) ? $_POST['role'] : 'manager',
        ]);

        $this->setFlash('success', 'User created successfully!');
        $this->redirect('/users');
    }

    public function edit(int $id): void
    {
        $this->requireAdmin();
        $user = $this->model->find($id);

        if (!$user) {
            $this->setFlash('error', 'User not found.');
            $this->redirect('/users');
        }

        if (!$this->isPost()) {
            $this->render('pages/users-form.twig', [
                'user' => $user,
                'roles' => ['admin', 'manager', 'viewer'],
            ]);
            return;
        }

        $this->model->update($id, [
            'full_name' => $this->sanitize($_POST['full_name'] ?? ''),
            'email' => $this->sanitize($_POST['email']),
            'role' => in_array($_POST['role'] ?? '', ['admin', 'manager', 'viewer']) ? $_POST['role'] : 'manager',
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ]);

        $this->setFlash('success', 'User updated successfully!');
        $this->redirect('/users');
    }

    public function delete(int $id): void
    {
        $this->requireAdmin();

        if ($id === (int)$_SESSION['auth']['id']) {
            $this->setFlash('error', 'You cannot delete your own account here.');
            $this->redirect('/users');
        }

        $this->model->delete($id);
        $this->setFlash('success', 'User deleted.');
        $this->redirect('/users');
    }
}
