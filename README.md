# Contacts Management Application

This project is a Contacts Management Application that allows users to perform CRUD operations on contacts and group them. The frontend is implemented using Vue.js, interacting with a Laravel backend.

## Project Setup

### Requirements

-   PHP >= 8.0
-   Composer
-   Node.js & npm
-   MySQL

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/Mwakai/contact-management-system
    cd contact-management-system
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Install JavaScript dependencies:

    ```bash
    npm install
    ```

4. Copy `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

## Database Configuration

1. Update `.env` with your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

## Migrations

Run the migrations to create the necessary tables:

```bash
php artisan migrate
```

## Start Laravel

```bash
php artisan serve
```

## Project Structure

```bash
├── app
│   ├── Controllers
│   │   ├── ContactController.php
│   │   └── GroupController.php
│   ├── Models
│   │   ├── Contact.php
│   │   └── Group.php
├── database
│   ├── migrations
│   │   ├── 2023_xx_xx_create_contacts_table.php
│   │   └── 2023_xx_xx_create_groups_table.php
├── resources
│   ├── js
│   │   ├── Components
│   │   │   ├── EditContact.vue
│   │   │   ├── ConfirmModal.vue
│   │   │   ├── GroupForm.vue
│   │   └── Pages
│   │       ├── Dashboard.vue
│   │       └── Welcome.vue
│   │       └── Groups
│   │           └── Index.vue
├── routes
│   └── web.php
└── .env.example


```
