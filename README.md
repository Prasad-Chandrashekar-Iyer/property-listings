

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
