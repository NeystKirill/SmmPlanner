<?php

declare(strict_types=1);

namespace App\Model;

class UserModel extends BaseModel
{
    protected string $table = 'users';

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (uuid, username, email, password, full_name, role, theme)
            VALUES (:uuid, :username, :email, :password, :full_name, :role, :theme)
        ");
        $stmt->execute([
            'uuid' => $this->generateUuid(),
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]),
            'full_name' => $data['full_name'] ?? null,
            'role' => $data['role'] ?? 'manager',
            'theme' => $data['theme'] ?? 'dark',
        ]);
        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $fields = [];
        $params = ['id' => $id];
        $allowed = ['username', 'email', 'full_name', 'bio', 'role', 'theme', 'accent_color', 'is_active', 'avatar'];

        foreach ($allowed as $field) {
            if (isset($data[$field])) {
                $fields[] = "{$field} = :{$field}";
                $params[$field] = $data[$field];
            }
        }

        if (empty($fields)) return false;

        $sql = "UPDATE {$this->table} SET " . implode(', ', $fields) . " WHERE id = :id";
        return $this->db->prepare($sql)->execute($params);
    }

    public function updatePassword(int $id, string $newPassword): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET password = :password WHERE id = :id");
        return $stmt->execute([
            'password' => password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]),
            'id' => $id,
        ]);
    }

    public function updateLastLogin(int $id): void
    {
        $this->db->prepare("UPDATE {$this->table} SET last_login_at = NOW() WHERE id = :id")
            ->execute(['id' => $id]);
    }

    public function getAllPaginated(int $page = 1, int $perPage = 15): array
    {
        return $this->paginate(
            "SELECT * FROM {$this->table} ORDER BY created_at DESC",
            [],
            $page,
            $perPage
        );
    }

    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    public function getStats(): array
    {
        $stmt = $this->db->query("
            SELECT 
                COUNT(*) as total,
                SUM(role = 'admin') as admins,
                SUM(role = 'manager') as managers,
                SUM(is_active = 1) as active
            FROM {$this->table}
        ");
        return $stmt->fetch();
    }
}
