# Laravel Multi-Tenant Application

## Overview
This project is a **multi-tenant Laravel application** with separate databases for tenants and a central **landlord** database. It allows each tenant to have its own isolated data while the landlord database manages tenant information.

## Tech Stack
- Laravel Framework
- PostgreSQL / MySQL
- Laravel Tenancy Package (Stancl/Tenancy)
- Docker (Optional)
- Redis (Optional)

## Installation
### Prerequisites
Ensure you have the following installed:
- PHP (>= 8.0)
- Composer
- MySQL / PostgreSQL
- Laravel  

### Setup Instructions
1. **Clone the repository:**
   ```sh
   git clone <repository-url>
   cd project-directory
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Create and configure `.env` file:**
   ```sh
   cp .env.example .env
   ```
   Update database configurations for landlord and tenants:
   ```env
   DB_CONNECTION=pgsql
   DB_DATABASE=landlord_db
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```

4. **Run migrations:**
   ```sh
   php artisan migrate --database=landlord
   ```

5. **Seed the landlord database (optional):**
   ```sh
   php artisan db:seed --class=LandlordSeeder
   ```

6. **Create a new tenant:**
   ```sh
   php artisan tenants:create example.com
   ```
   This command will:
   - Create a tenant entry in the landlord database
   - Provision a new tenant database
   - Run tenant migrations

7. **Run the application:**
   ```sh
   php artisan serve
   ```

## Multi-Tenancy Management
- **Creating a Tenant**
  ```sh
  php artisan tenants:create tenant1.com
  ```
- **Switching to a Tenant Database**
  ```php
  tenancy()->initialize($tenant);
  ```
- **Running Migrations for Tenants**
  ```sh
  php artisan tenants:migrate
  ```
- **Rolling Back Migrations for Tenants**
  ```sh
  php artisan tenants:migrate:rollback
  ```

## Deployment
1. Configure environment variables for production.
2. Use a queue system for tenant provisioning.
3. Set up a load balancer (if required).
4. Configure domain handling for tenant resolution.

## Contributing
1. Fork the repository.
2. Create a feature branch.
3. Commit changes and push.
4. Open a pull request.

## License
This project is licensed under the MIT License.

