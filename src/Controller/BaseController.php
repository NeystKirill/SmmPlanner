<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

abstract class BaseController
{
    protected Environment $twig;
    protected array $flashMessages = [];

    public function __construct()
    {
        $loader = new FilesystemLoader(ROOT_PATH . '/templates');
        $this->twig = new Environment($loader, [
            'cache' => ROOT_PATH . '/storage/cache/twig',
            'debug' => (bool)($_ENV['APP_DEBUG'] ?? false),
            'auto_reload' => true,
        ]);

        if ($_ENV['APP_DEBUG'] ?? false) {
            $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        $this->registerTwigExtensions();
        $this->loadFlashMessages();
    }

    private function registerTwigExtensions(): void
    {
        
        $this->twig->addGlobal('app_name', $_ENV['APP_NAME'] ?? 'SMM Planner');
        $this->twig->addGlobal('current_url', $_SERVER['REQUEST_URI'] ?? '/');
        $this->twig->addGlobal('auth', $_SESSION['auth'] ?? null);
        $this->twig->addGlobal('flash', $this->getFlashMessages());

        
        $this->twig->addFilter(new TwigFilter('time_ago', function (string $datetime): string {
            $diff = time() - strtotime($datetime);
            if ($diff < 60) return 'just now';
            if ($diff < 3600) return floor($diff / 60) . 'm ago';
            if ($diff < 86400) return floor($diff / 3600) . 'h ago';
            if ($diff < 604800) return floor($diff / 86400) . 'd ago';
            return date('M j', strtotime($datetime));
        }));

        $this->twig->addFilter(new TwigFilter('platform_icon', function (string $platform): string {
            return match ($platform) {
                'instagram' => 'fab fa-instagram',
                'facebook' => 'fab fa-facebook',
                'twitter' => 'fab fa-twitter',
                'tiktok' => 'fab fa-tiktok',
                'youtube' => 'fab fa-youtube',
                'telegram' => 'fab fa-telegram',
                'vk' => 'fab fa-vk',
                default => 'fas fa-globe',
            };
        }));

        $this->twig->addFilter(new TwigFilter('platform_color', function (string $platform): string {
            return match ($platform) {
                'instagram' => '#E1306C',
                'facebook' => '#1877F2',
                'twitter' => '#1DA1F2',
                'tiktok' => '#000000',
                'youtube' => '#FF0000',
                'telegram' => '#0088CC',
                'vk' => '#4A76A8',
                default => '#6366f1',
            };
        }));

        $this->twig->addFilter(new TwigFilter('status_badge', function (string $status): string {
            return match ($status) {
                'published' => 'badge-success',
                'scheduled' => 'badge-primary',
                'draft' => 'badge-secondary',
                'failed' => 'badge-danger',
                'cancelled' => 'badge-warning',
                default => 'badge-secondary',
            };
        }));

        $this->twig->addFilter(new TwigFilter('number_format', function ($number): string {
            if ($number >= 1000000) return round($number / 1000000, 1) . 'M';
            if ($number >= 1000) return round($number / 1000, 1) . 'K';
            return (string)$number;
        }));

        
        $this->twig->addFunction(new TwigFunction('asset', function (string $path): string {
            return '/' . ltrim($path, '/');
        }));

        $this->twig->addFunction(new TwigFunction('csrf_token', function (): string {
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
            return $_SESSION['csrf_token'];
        }));
    }

    protected function render(string $template, array $data = []): void
    {
        echo $this->twig->render($template, $data);
    }

    protected function redirect(string $url, int $code = 302): void
    {
        header("Location: {$url}", true, $code);
        exit;
    }

    protected function json(mixed $data, int $code = 200): void
    {
        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function setFlash(string $type, string $message): void
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
    }

    protected function getFlashMessages(): array
    {
        $messages = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);
        return $messages;
    }

    protected function loadFlashMessages(): void
    {
        $this->flashMessages = $this->getFlashMessages();
        $this->twig->addGlobal('flash', $this->flashMessages);
    }

    protected function validateCsrf(): void
    {
        $token = $_POST['_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            http_response_code(419);
            die('CSRF token mismatch');
        }
    }

    protected function requireAuth(): void
    {
        if (!isset($_SESSION['auth'])) {
            $this->redirect('/login');
        }
    }

    protected function requireAdmin(): void
    {
        $this->requireAuth();
        if ($_SESSION['auth']['role'] !== 'admin') {
            $this->redirect('/?error=forbidden');
        }
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function input(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    protected function sanitize(string $value): string
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    protected function isAdmin(): bool
    {
        return ($_SESSION['auth']['role'] ?? '') === 'admin';
    }
}
