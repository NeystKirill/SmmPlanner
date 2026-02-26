<?php

declare(strict_types=1);

namespace App\Model;

class SocialAccountModel extends BaseModel
{
    protected string $table = 'social_accounts';

    public function getByUser(int $userId): array
    {
        $stmt = $this->db->prepare("
            SELECT sa.*, 
                COUNT(p.id) as total_posts,
                SUM(p.status = 'scheduled') as scheduled_posts,
                SUM(p.status = 'published') as published_posts
            FROM {$this->table} sa
            LEFT JOIN posts p ON p.social_account_id = sa.id
            WHERE sa.user_id = :user_id
            GROUP BY sa.id
            ORDER BY sa.created_at DESC
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function getAllWithUser(): array
    {
        $stmt = $this->db->query("
            SELECT sa.*, u.username, u.full_name, u.avatar
            FROM {$this->table} sa
            JOIN users u ON u.id = sa.user_id
            ORDER BY sa.created_at DESC
        ");
        return $stmt->fetchAll();
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} 
            (uuid, user_id, platform, account_name, account_url, access_token, followers_count, following_count)
            VALUES (:uuid, :user_id, :platform, :account_name, :account_url, :access_token, :followers_count, :following_count)
        ");
        $stmt->execute([
            'uuid' => $this->generateUuid(),
            'user_id' => $data['user_id'],
            'platform' => $data['platform'],
            'account_name' => $data['account_name'],
            'account_url' => $data['account_url'] ?? null,
            'access_token' => $data['access_token'] ?? null,
            'followers_count' => $data['followers_count'] ?? 0,
            'following_count' => $data['following_count'] ?? 0,
        ]);
        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("
            UPDATE {$this->table} 
            SET platform = :platform, account_name = :account_name, 
                account_url = :account_url, is_active = :is_active,
                followers_count = :followers_count
            WHERE id = :id
        ");
        return $stmt->execute([
            'id' => $id,
            'platform' => $data['platform'],
            'account_name' => $data['account_name'],
            'account_url' => $data['account_url'] ?? null,
            'is_active' => $data['is_active'] ?? 1,
            'followers_count' => $data['followers_count'] ?? 0,
        ]);
    }

    public function getTotalFollowers(int $userId): int
    {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(followers_count), 0) FROM {$this->table} WHERE user_id = :user_id
        ");
        $stmt->execute(['user_id' => $userId]);
        return (int)$stmt->fetchColumn();
    }

    public function getByPlatform(string $platform): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE platform = :platform AND is_active = 1");
        $stmt->execute(['platform' => $platform]);
        return $stmt->fetchAll();
    }

    public function getPlatformStats(int $userId): array
    {
        $stmt = $this->db->prepare("
            SELECT platform, COUNT(*) as count, SUM(followers_count) as followers
            FROM {$this->table}
            WHERE user_id = :user_id AND is_active = 1
            GROUP BY platform
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }
}
