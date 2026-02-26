<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\PostModel;
use App\Model\SocialAccountModel;
use App\Model\UserModel;

class DashboardController extends BaseController
{
    public function index(): void
    {
        $this->requireAuth();
        $userId = $_SESSION['auth']['id'];

        $postModel = new PostModel();
        $accountModel = new SocialAccountModel();

        $postStats = $postModel->getStats($userId);
        $accounts = $accountModel->getByUser($userId);
        $upcoming = $postModel->getUpcoming($userId, 8);
        $recentActivity = $postModel->getRecentActivity($userId, 10);
        $platformStats = $accountModel->getPlatformStats($userId);
        $totalFollowers = $accountModel->getTotalFollowers($userId);

        
        $currentMonth = date('Y-m');
        $calendarPosts = $postModel->getForCalendar($userId, $currentMonth);

        $this->render('pages/dashboard.twig', [
            'postStats' => $postStats,
            'accounts' => $accounts,
            'upcoming' => $upcoming,
            'recentActivity' => $recentActivity,
            'platformStats' => $platformStats,
            'totalFollowers' => $totalFollowers,
            'calendarPosts' => $calendarPosts,
            'currentMonth' => $currentMonth,
        ]);
    }
}
