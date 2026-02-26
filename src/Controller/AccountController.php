<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\SocialAccountModel;

class AccountController extends BaseController
{
    private SocialAccountModel $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new SocialAccountModel();
    }

    public function index(): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $accounts = $this->isAdmin()
            ? $this->model->getAllWithUser()
            : $this->model->getByUser($userId);

        $platformStats = $this->model->getPlatformStats($userId);

        $this->render('pages/accounts.twig', [
            'accounts' => $accounts,
            'platformStats' => $platformStats,
            'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
        ]);
    }

    public function create(): void
    {
        $this->requireAuth();

        if (!$this->isPost()) {
            $this->render('pages/accounts-form.twig', [
                'account' => null,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $errors = $this->validate();
        if (!empty($errors)) {
            $this->render('pages/accounts-form.twig', [
                'account' => $_POST,
                'errors' => $errors,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $this->model->create([
            'user_id' => $_SESSION['auth']['id'],
            'platform' => $_POST['platform'],
            'account_name' => $this->sanitize($_POST['account_name']),
            'account_url' => $this->sanitize($_POST['account_url'] ?? ''),
            'access_token' => $_POST['access_token'] ?? null,
            'followers_count' => (int)($_POST['followers_count'] ?? 0),
        ]);

        $this->setFlash('success', 'Account connected successfully!');
        $this->redirect('/accounts');
    }

    public function edit(int $id): void
    {
        $this->requireAuth();
        $account = $this->model->find($id);

        if (!$account || (!$this->isAdmin() && $account['user_id'] != $_SESSION['auth']['id'])) {
            $this->setFlash('error', 'Account not found or access denied.');
            $this->redirect('/accounts');
        }

        if (!$this->isPost()) {
            $this->render('pages/accounts-form.twig', [
                'account' => $account,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $this->model->update($id, [
            'platform' => $_POST['platform'],
            'account_name' => $this->sanitize($_POST['account_name']),
            'account_url' => $this->sanitize($_POST['account_url'] ?? ''),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
            'followers_count' => (int)($_POST['followers_count'] ?? 0),
        ]);

        $this->setFlash('success', 'Account updated successfully!');
        $this->redirect('/accounts');
    }

    public function delete(int $id): void
    {
        $this->requireAuth();
        $account = $this->model->find($id);

        if ($account && ($this->isAdmin() || $account['user_id'] == $_SESSION['auth']['id'])) {
            $this->model->delete($id);
            $this->setFlash('success', 'Account removed.');
        } else {
            $this->setFlash('error', 'Access denied.');
        }

        $this->redirect('/accounts');
    }

    private function validate(): array
    {
        $errors = [];
        if (empty($_POST['platform'])) $errors['platform'] = 'Platform is required.';
        if (empty($_POST['account_name'])) $errors['account_name'] = 'Account name is required.';
        return $errors;
    }
}
