<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Project Setup Instructions

Follow these steps to set up and run the project locally:

### Prerequisites

1. Install [PHP](https://www.php.net/) (version 8.2 or higher).
2. Install [Composer](https://getcomposer.org/).
3. Install [Node.js](https://nodejs.org/) (version 16 or higher).
4. Set up a database (e.g., MySQL) and create a new database for the project.

### Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd property-listings
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment File**
   - Create a `.env` file in the root directory by copying the example file:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials and other configurations:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders**
   - Run the database migrations:
     ```bash
     php artisan migrate
     ```
   - Seed the database with demo data:
     ```bash
     php artisan db:seed
     ```

6. **Build Frontend Assets**
   ```bash
   npm run dev
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   The application will be available at [http://localhost:8000](http://localhost:8000).

### Admin and User Credentials

- **Admin Account**
  - Email: `admin@test.com`
  - Password: `password`

- **User Account**
  - Email: `test@test.com`
  - Password: `password`

### Notes

- The `.env` file is not included in the repository for security reasons. You must create it manually as described above.
- Ensure that the storage and bootstrap/cache directories are writable by the web server.
- For production, use `npm run build` to compile the assets and configure a proper web server like Nginx or Apache.

For any issues, feel free to contact the project maintainer.

### Database Schema Overview

The project uses a relational database with the following key tables:

1. **users**
   - `id`: Primary key.
   - `name`: Name of the user.
   - `email`: Unique email address of the user.
   - `role` : Roles admin or user.
   - `email_verified_at`: Timestamp for email verification.
   - `password`: Encrypted password.
   - `remember_token`: Token for "remember me" functionality.
   - `created_at` and `updated_at`: Timestamps for record creation and updates.

2. **properties**
   - `id`: Primary key.
   - `title`: Title of the property.
   - `description`: Description of the property.
   - `type`: Type of the property (e.g., apartment, house).
   - `price`: Price of the property.
   - `location`: Location of the property.
   - `status`: Status of the property (e.g., available, sold).
   - `image`: Path to the property image.
   - `deleted_at`: Timestamp for soft deletes.
   - `created_at` and `updated_at`: Timestamps for record creation and updates.

3. **jobs**
   - `id`: Primary key.
   - `queue`: Name of the queue.
   - `payload`: Job payload.
   - `attempts`: Number of attempts made to process the job.
   - `reserved_at`, `available_at`, `created_at`: Timestamps for job processing.

4. **failed_jobs**
   - `id`: Primary key.
   - `uuid`: Unique identifier for the failed job.
   - `connection`: Connection name.
   - `queue`: Queue name.
   - `payload`: Job payload.
   - `exception`: Exception details.
   - `failed_at`: Timestamp when the job failed.

5. **job_batches**
   - `id`: Primary key.
   - `name`: Name of the job batch.
   - `total_jobs`, `pending_jobs`, `failed_jobs`: Job counts.
   - `failed_job_ids`: IDs of failed jobs.
   - `options`: Additional options for the job batch.
   - `cancelled_at`, `created_at`, `finished_at`: Timestamps for job batch lifecycle events.

This schema is designed to support user management, property listings, and job processing for background tasks.
