### How to install

1. Clone the repository:

```bash
git clone https://github.com/Shimofu16/CWIS.git
```

2. Install Composer dependencies:

```bash
composer install
```

3. Create a `.env` file and copy the contents of `.env.example` into it.

4. Update the database connection information in the `.env` file.

5. Create a database for the system.

6. Run the following command to migrate the database:

```bash
php artisan migrate
```

7. Run the following command to seed the database with some sample data:

```bash
php artisan db:seed
```

8. Start the development server:

```bash
php artisan serve
```

9. Visit `http://127.0.0.1:8000` in your web browser.
