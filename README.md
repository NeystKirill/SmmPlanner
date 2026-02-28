# 📱 SMM Planner

> Веб-приложение для управления публикациями в социальных сетях. Планируйте, управляйте и отслеживайте контент для Instagram, Facebook, Twitter, TikTok, VK, Telegram и YouTube из единого интерфейса.

---

## ✨ Возможности

- **Дашборд** — обзор активности: запланированные публикации, статистика аккаунтов, последние посты
- **Управление постами** — создание, редактирование, удаление публикаций со статусами: `draft`, `scheduled`, `published`, `failed`, `cancelled`
- **Календарь** — визуальное отображение запланированного контента
- **Социальные аккаунты** — подключение и управление аккаунтами нескольких платформ, отслеживание подписчиков
- **Управление пользователями** — три роли: `admin`, `manager`, `viewer`
- **Профиль** — смена пароля, загрузка аватара, настройка темы (тёмная/светлая)
- **Безопасность** — CSRF-защита, хешированные пароли, HTTP-only сессии
- **Логирование** — журнал активности пользователей

---

## 🛠 Технологии

| Компонент | Технология |
|---|---|
| Backend | PHP >= 8.2 |
| Маршрутизация | nikic/fast-route |
| Шаблоны | Twig 3 |
| База данных | MySQL (InnoDB, utf8mb4) |
| Валидация | respect/validation |
| Изображения | intervention/image |
| Почта | PHPMailer |
| Логирование | Monolog |
| UUID | ramsey/uuid |
| Окружение | vlucas/phpdotenv |
| Фронтенд | HTML / CSS / JavaScript (OneUI) |

---

## 📁 Структура проекта

```
SmmPlanner/
├── config/
│   └── app.php               # Конфигурация приложения (сессии, БД и т.д.)
├── database/
│   └── schema.sql            # SQL-схема и тестовые данные
├── src/
│   ├── Controller/
│   │   ├── BaseController.php      # Базовый контроллер (Twig, CSRF, flash, auth)
│   │   ├── LoginController.php     # Авторизация / выход
│   │   ├── DashboardController.php # Главная страница
│   │   ├── PostController.php      # CRUD постов + календарь
│   │   ├── AccountController.php   # CRUD социальных аккаунтов
│   │   ├── ProfileController.php   # Профиль, аватар, пароль
│   │   └── UsersController.php     # Управление пользователями (admin)
│   ├── Model/
│   │   ├── BaseModel.php
│   │   ├── UserModel.php
│   │   ├── PostModel.php
│   │   └── SocialAccountModel.php
│   └── Service/
│       └── Database.php            # PDO-сервис
├── templates/
│   ├── layouts/
│   │   └── app.twig              # Базовый макет
│   └── pages/
│       ├── login.twig
│       ├── dashboard.twig
│       ├── posts.twig
│       ├── posts-form.twig
│       ├── calendar.twig
│       ├── accounts.twig
│       ├── accounts-form.twig
│       ├── users.twig
│       ├── users-form.twig
│       └── profile.twig
├── storage/
│   └── cache/twig/               # Кэш скомпилированных шаблонов
├── vendor/                       # Зависимости Composer
├── .env                          # Переменные окружения
├── .htaccess                     # Конфигурация Apache
├── nginx.conf                    # Конфигурация Nginx
├── composer.json
└── index.php                     # Точка входа, маршрутизатор
```

---

## ⚙️ Установка

### Требования

- PHP >= 8.2 (с расширениями: `pdo_mysql`, `mbstring`, `gd`, `fileinfo`)
- MySQL >= 5.7 / MariaDB >= 10.3
- Composer
- Nginx или Apache

### 1. Клонирование репозитория

```bash
git clone https://github.com/NeystKirill/SmmPlanner.git
cd SmmPlanner
```

### 2. Установка зависимостей

```bash
composer install --optimize-autoloader
```

### 3. Настройка окружения

Скопируйте `.env` и заполните параметры под своё окружение:

```bash
cp .env .env
```

```env
APP_NAME="SMM Planner"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smm_planner
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

SESSION_LIFETIME=7200
TIMEZONE=Europe/Moscow

MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=your_mail_password
MAIL_FROM=noreply@smmplanner.com
MAIL_FROM_NAME="SMM Planner"

UPLOAD_MAX_SIZE=5242880
UPLOAD_PATH=public/uploads
```

### 4. Создание базы данных

```bash
mysql -u root -p < database/schema.sql
```

Схема автоматически создаёт БД `smm_planner`, все таблицы и добавляет тестовые данные с двумя аккаунтами.

### 5. Права на директории

```bash
chmod -R 775 storage/
chmod -R 775 public/uploads/
```

### 6. Настройка веб-сервера

**Nginx** — используйте готовый файл `nginx.conf` из репозитория:

```bash
sudo cp nginx.conf /etc/nginx/sites-available/smmplanner
sudo ln -s /etc/nginx/sites-available/smmplanner /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

**Apache** — файл `.htaccess` уже настроен, включите `mod_rewrite`:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## 🚀 Быстрый старт

После установки перейдите на `http://your-domain.com` и войдите с тестовыми учётными данными:

| Роль | Email | Пароль |
|---|---|---|
| Admin | `admin@smmplanner.com` | `password123` |
| Manager | `manager@smmplanner.com` | `password123` |

> ⚠️ Смените пароли после первого входа!

---

## 🗄 Схема базы данных

| Таблица | Описание |
|---|---|
| `users` | Пользователи с ролями (admin / manager / viewer) |
| `social_accounts` | Подключённые аккаунты соцсетей |
| `posts` | Публикации с медиафайлами, хештегами и статусами |
| `calendar_events` | Привязка постов к датам в календаре |
| `analytics` | Снапшоты метрик аккаунтов (охват, ER и т.д.) |
| `activity_log` | Журнал действий пользователей |
| `tags` / `post_tags` | Теги и их связь с постами |

---

## 🔒 Безопасность

- Все пароли хешируются через `bcrypt` (`password_hash`)
- CSRF-токены на всех формах
- Session cookie: `HttpOnly`, `SameSite=Lax`, `Secure` (при HTTPS)
- Ролевая система доступа: admin-страницы проверяют роль на уровне контроллера
- Входные данные санируются через `htmlspecialchars`

---

## 🧪 Тесты

```bash
composer test
# или напрямую
./vendor/bin/phpunit
```

---

## 🌐 Поддерживаемые платформы

Instagram · Facebook · Twitter / X · TikTok · VK · Telegram · YouTube

---

## 🤝 Участие в разработке

1. Форкните репозиторий
2. Создайте ветку: `git checkout -b feature/my-feature`
3. Зафиксируйте изменения: `git commit -m "Add: my feature"`
4. Отправьте: `git push origin feature/my-feature`
5. Откройте Pull Request

---

## 👤 Автор

**NeystKirill** — [github.com/NeystKirill](https://github.com/NeystKirill)
