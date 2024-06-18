# SmmPlanner

SmmPlanner is a social media management dashboard designed to streamline the process of planning, scheduling, and managing social media content across various platforms.

## Table of Contents

- [Description](#description)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contribution](#contribution)
- [License](#license)

## Description

SmmPlanner allows users to manage multiple social media accounts, schedule posts, and analyze performance metrics. It is built using PHP, FastRoute, PSR-4, OneUI, and object-oriented programming (OOP).

## Features

- Schedule posts for multiple social media platforms
- Manage content calendars
- Analyze post performance
- User-friendly interface
- Integration with various social media APIs

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Nginx or Apache
- Composer
- Node.js and npm

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/NeystKirill/SmmPlanner.git
    cd SmmPlanner
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Set up environment variables:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database and other configurations.

4. Run database migrations:
    ```bash
    php artisan migrate
    ```

5. Start the development server:
    ```bash
    php artisan serve
    ```
