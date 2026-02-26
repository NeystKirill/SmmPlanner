<?php

declare(strict_types=1);

namespace App\Model;

class PostModel extends BaseModel
{
    protected string $table = 'posts';

    public function getByUser(int $userId, array $filters = [], int $page = 1, int $perPage = 15): array
    {
        $where = ['p.user_id = :user_id'];
        $params = ['user_id' => $userId];

        if (!empty($filters['status'])) {
            $where[] = 'p.status = :status';
            $params['status'] = $filters['status'];
        }
        if (!empty($filters['platform'])) {
            $where[] = 'p.platform = :platform';
            $params['platform'] = $filters['platform'];
        }
        if (!empty($filters['search'])) {
            $where[] = '(p.title LIKE :search OR p.content LIKE :search)';
            $params['search'] = '%' . $filters['search'] . '%';
        }

        $whereStr = implode(' AND ', $where);

        return $this->paginate(
            "SELECT p.*, sa.account_name, sa.platform as account_platform
             FROM {$this->table} p
             LEFT JOIN social_accounts sa ON sa.id = p.social_account_id
             WHERE {$whereStr}
             ORDER BY COALESCE(p.scheduled_at, p.created_at) DESC",
            $params,
            $page,
            $perPage
        );
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} 
            (uuid, user_id, social_account_id, title, content, hashtags, status, platform, scheduled_at)
            VALUES (:uuid, :user_id, :social_account_id, :title, :content, :hashtags, :status, :platform, :scheduled_at)
        ");
        $stmt->execute([
            'uuid' => $this->generateUuid(),
            'user_id' => $data['user_id'],
            'social_account_id' => $data['social_account_id'] ?? null,
            'title' => $data['title'],
            'content' => $data['content'],
            'hashtags' => $data['hashtags'] ?? null,
            'status' => $data['status'] ?? 'draft',
            'platform' => $data['platform'] ?? null,
            'scheduled_at' => $data['scheduled_at'] ?? null,
        ]);
        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("
            UPDATE {$this->table} 
            SET title = :title, content = :content, hashtags = :hashtags,
                status = :status, platform = :platform, scheduled_at = :scheduled_at,
                social_account_id = :social_account_id
            WHERE id = :id
        ");
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'hashtags' => $data['hashtags'] ?? null,
            'status' => $data['status'],
            'platform' => $data['platform'] ?? null,
            'scheduled_at' => $data['scheduled_at'] ?? null,
            'social_account_id' => $data['social_account_id'] ?? null,
        ]);
    }

    public function getUpcoming(int $userId, int $limit = 5): array
    {
        $stmt = $this->db->prepare("
            SELECT p.*, sa.account_name
            FROM {$this->table} p
            LEFT JOIN social_accounts sa ON sa.id = p.social_account_id
            WHERE p.user_id = :user_id AND p.status = 'scheduled' AND p.scheduled_at >= NOW()
            ORDER BY p.scheduled_at ASC
            LIMIT :limit
        ");
        $stmt->bindValue('user_id', $userId, \PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getStats(int $userId): array
    {
        $stmt = $this->db->prepare("
            SELECT 
                COUNT(*) as total,
                SUM(status = 'draft') as drafts,
                SUM(status = 'scheduled') as scheduled,
                SUM(status = 'published') as published,
                SUM(status = 'failed') as failed,
                COALESCE(SUM(likes_count), 0) as total_likes,
                COALESCE(SUM(comments_count), 0) as total_comments
            FROM {$this->table}
            WHERE user_id = :user_id
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch();
    }

    public function getForCalendar(int $userId, string $month): array
    {
        $stmt = $this->db->prepare("
            SELECT p.*, sa.account_name
            FROM {$this->table} p
            LEFT JOIN social_accounts sa ON sa.id = p.social_account_id
            WHERE p.user_id = :user_id 
              AND DATE_FORMAT(COALESCE(p.scheduled_at, p.created_at), '%Y-%m') = :month
            ORDER BY COALESCE(p.scheduled_at, p.created_at) ASC
        ");
        $stmt->execute(['user_id' => $userId, 'month' => $month]);
        return $stmt->fetchAll();
    }

    public function getRecentActivity(int $userId, int $limit = 10): array
    {
        $stmt = $this->db->prepare("
            SELECT p.*, sa.account_name, sa.platform as acc_platform
            FROM {$this->table} p
            LEFT JOIN social_accounts sa ON sa.id = p.social_account_id
            WHERE p.user_id = :user_id
            ORDER BY p.updated_at DESC
            LIMIT :limit
        ");
        $stmt->bindValue('user_id', $userId, \PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
