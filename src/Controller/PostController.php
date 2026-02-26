<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\PostModel;
use App\Model\SocialAccountModel;

class PostController extends BaseController
{
    private PostModel $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PostModel();
    }

    public function index(): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $filters = [
            'status' => $_GET['status'] ?? '',
            'platform' => $_GET['platform'] ?? '',
            'search' => $_GET['q'] ?? '',
        ];

        $page = max(1, (int)($_GET['page'] ?? 1));
        $result = $this->model->getByUser($userId, $filters, $page, 12);
        $stats = $this->model->getStats($userId);

        $this->render('pages/posts.twig', [
            'posts' => $result['items'],
            'pagination' => $result,
            'stats' => $stats,
            'filters' => $filters,
            'statuses' => ['draft', 'scheduled', 'published', 'failed', 'cancelled'],
            'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
        ]);
    }

    public function create(): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $accountModel = new SocialAccountModel();
        $accounts = $accountModel->getByUser($userId);

        if (!$this->isPost()) {
            $this->render('pages/posts-form.twig', [
                'post' => null,
                'accounts' => $accounts,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $errors = $this->validatePost();
        if (!empty($errors)) {
            $this->render('pages/posts-form.twig', [
                'post' => $_POST,
                'accounts' => $accounts,
                'errors' => $errors,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $scheduledAt = null;
        if (!empty($_POST['scheduled_at'])) {
            $scheduledAt = date('Y-m-d H:i:s', strtotime($_POST['scheduled_at']));
        }

        $status = $scheduledAt ? 'scheduled' : ($_POST['status'] ?? 'draft');

        $this->model->create([
            'user_id' => $userId,
            'social_account_id' => $_POST['social_account_id'] ?? null,
            'title' => $this->sanitize($_POST['title']),
            'content' => $_POST['content'],
            'hashtags' => $_POST['hashtags'] ?? null,
            'status' => $status,
            'platform' => $_POST['platform'] ?? null,
            'scheduled_at' => $scheduledAt,
        ]);

        $this->setFlash('success', 'Post ' . ($status === 'scheduled' ? 'scheduled' : 'saved') . ' successfully!');
        $this->redirect('/posts');
    }

    public function edit(int $id): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $post = $this->model->find($id);
        if (!$post || (!$this->isAdmin() && $post['user_id'] != $userId)) {
            $this->setFlash('error', 'Post not found or access denied.');
            $this->redirect('/posts');
        }

        $accountModel = new SocialAccountModel();
        $accounts = $accountModel->getByUser($userId);

        if (!$this->isPost()) {
            $this->render('pages/posts-form.twig', [
                'post' => $post,
                'accounts' => $accounts,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $errors = $this->validatePost();
        if (!empty($errors)) {
            $this->render('pages/posts-form.twig', [
                'post' => array_merge($post, $_POST),
                'accounts' => $accounts,
                'errors' => $errors,
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'vk', 'telegram', 'youtube'],
            ]);
            return;
        }

        $scheduledAt = null;
        if (!empty($_POST['scheduled_at'])) {
            $scheduledAt = date('Y-m-d H:i:s', strtotime($_POST['scheduled_at']));
        }

        $this->model->update($id, [
            'title' => $this->sanitize($_POST['title']),
            'content' => $_POST['content'],
            'hashtags' => $_POST['hashtags'] ?? null,
            'status' => $_POST['status'] ?? 'draft',
            'platform' => $_POST['platform'] ?? null,
            'scheduled_at' => $scheduledAt,
            'social_account_id' => $_POST['social_account_id'] ?? null,
        ]);

        $this->setFlash('success', 'Post updated successfully!');
        $this->redirect('/posts');
    }

    public function delete(int $id): void
    {
        $this->requireAuth();
        $post = $this->model->find($id);

        if ($post && ($this->isAdmin() || $post['user_id'] == $_SESSION['auth']['id'])) {
            $this->model->delete($id);
            $this->setFlash('success', 'Post deleted.');
        } else {
            $this->setFlash('error', 'Access denied.');
        }

        $this->redirect('/posts');
    }

    public function calendar(): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $month = $_GET['month'] ?? date('Y-m');
        $posts = $this->model->getForCalendar($userId, $month);

        $this->render('pages/calendar.twig', [
            'posts' => $posts,
            'month' => $month,
            'monthName' => date('F Y', strtotime($month . '-01')),
        ]);
    }

    private function validatePost(): array
    {
        $errors = [];
        if (empty($_POST['title'])) $errors['title'] = 'Title is required.';
        if (empty($_POST['content'])) $errors['content'] = 'Content is required.';
        if (strlen($_POST['content'] ?? '') > 2200) $errors['content'] = 'Content too long (max 2200 chars).';
        return $errors;
    }
}
