

CREATE DATABASE IF NOT EXISTS smm_planner CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE smm_planner;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid CHAR(36) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    avatar VARCHAR(255) DEFAULT NULL,
    bio TEXT DEFAULT NULL,
    role ENUM('admin','manager','viewer') NOT NULL DEFAULT 'manager',
    theme ENUM('dark','light') NOT NULL DEFAULT 'dark',
    accent_color VARCHAR(7) DEFAULT '#6366f1',
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    last_login_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS social_accounts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid CHAR(36) NOT NULL UNIQUE,
    user_id INT UNSIGNED NOT NULL,
    platform ENUM('instagram','facebook','twitter','tiktok','vk','telegram','youtube') NOT NULL,
    account_name VARCHAR(100) NOT NULL,
    account_url VARCHAR(500),
    access_token TEXT,
    refresh_token TEXT,
    token_expires_at TIMESTAMP NULL,
    followers_count INT UNSIGNED DEFAULT 0,
    following_count INT UNSIGNED DEFAULT 0,
    posts_count INT UNSIGNED DEFAULT 0,
    avatar_url VARCHAR(500),
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    last_synced_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_platform (user_id, platform)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid CHAR(36) NOT NULL UNIQUE,
    user_id INT UNSIGNED NOT NULL,
    social_account_id INT UNSIGNED,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    media_urls JSON DEFAULT NULL,
    hashtags TEXT,
    status ENUM('draft','scheduled','published','failed','cancelled') NOT NULL DEFAULT 'draft',
    scheduled_at TIMESTAMP NULL,
    published_at TIMESTAMP NULL,
    platform ENUM('instagram','facebook','twitter','tiktok','vk','telegram','youtube'),
    likes_count INT UNSIGNED DEFAULT 0,
    comments_count INT UNSIGNED DEFAULT 0,
    shares_count INT UNSIGNED DEFAULT 0,
    views_count INT UNSIGNED DEFAULT 0,
    error_message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (social_account_id) REFERENCES social_accounts(id) ON DELETE SET NULL,
    INDEX idx_user_status (user_id, status),
    INDEX idx_scheduled (scheduled_at),
    INDEX idx_platform (platform)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS calendar_events (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT UNSIGNED NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME,
    color VARCHAR(7) DEFAULT '#6366f1',
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    INDEX idx_date (event_date)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS analytics (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    social_account_id INT UNSIGNED NOT NULL,
    snapshot_date DATE NOT NULL,
    followers_count INT UNSIGNED DEFAULT 0,
    following_count INT UNSIGNED DEFAULT 0,
    posts_count INT UNSIGNED DEFAULT 0,
    total_likes INT UNSIGNED DEFAULT 0,
    total_comments INT UNSIGNED DEFAULT 0,
    total_shares INT UNSIGNED DEFAULT 0,
    engagement_rate DECIMAL(5,2) DEFAULT 0.00,
    reach INT UNSIGNED DEFAULT 0,
    impressions INT UNSIGNED DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (social_account_id) REFERENCES social_accounts(id) ON DELETE CASCADE,
    UNIQUE KEY unique_snapshot (social_account_id, snapshot_date)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS activity_log (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    action VARCHAR(100) NOT NULL,
    entity_type VARCHAR(50),
    entity_id INT UNSIGNED,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_action (user_id, action),
    INDEX idx_created (created_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    color VARCHAR(7) DEFAULT '#6366f1',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS post_tags (
    post_id INT UNSIGNED NOT NULL,
    tag_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO users (uuid, username, email, password, full_name, role, theme) VALUES
(UUID(), 'admin', 'admin@smmplanner.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TiGc0gkT5RFpQ3SyGZx1e1bSiSjy', 'Administrator', 'admin', 'dark'),
(UUID(), 'manager', 'manager@smmplanner.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TiGc0gkT5RFpQ3SyGZx1e1bSiSjy', 'Content Manager', 'manager', 'dark');

INSERT INTO social_accounts (uuid, user_id, platform, account_name, account_url, followers_count, following_count, posts_count) VALUES
(UUID(), 1, 'instagram', '@brandofficial', 'https://instagram.com/brandofficial', 125400, 891, 342),
(UUID(), 1, 'twitter', '@brandofficial', 'https://twitter.com/brandofficial', 44200, 1200, 1893),
(UUID(), 1, 'facebook', 'Brand Official', 'https://facebook.com/brandofficial', 89300, 0, 721),
(UUID(), 2, 'instagram', '@manager_acct', 'https://instagram.com/manager_acct', 5600, 430, 87);

INSERT INTO posts (uuid, user_id, social_account_id, title, content, status, platform, scheduled_at, likes_count, comments_count) VALUES
(UUID(), 1, 1, 'Monday Morning Vibes', 'Start your week with positive energy! 🌟 #MondayMotivation #brand', 'published', 'instagram', NOW() - INTERVAL 2 DAY, 1423, 87),
(UUID(), 1, 1, 'Product Launch Announcement', 'Big news coming this week! Stay tuned 🚀 #ProductLaunch #Innovation', 'scheduled', 'instagram', NOW() + INTERVAL 1 DAY, 0, 0),
(UUID(), 1, 2, 'Weekend Special Offer', 'Special 20% off this weekend only! Use code WEEKEND20 🎉', 'draft', 'twitter', NULL, 0, 0),
(UUID(), 1, 3, 'Behind The Scenes', 'Our amazing team at work! #TeamWork #Culture #BTS', 'scheduled', 'facebook', NOW() + INTERVAL 3 DAY, 0, 0);
