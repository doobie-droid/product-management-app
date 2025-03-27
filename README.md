# Product Management App

Submission for Pay4me assessment, includes CRUD application via FilamentPHP, Testing with PestPHP and doc generation with Laravel Scribe
<br><br>
The app has been hosted https://pay4me.laravel.cloud <br>
You can visit the admin panel [here][hosted-url-admin]

### LOGIN DETAILS

| User Type | Email             | Password |
| --------- | ----------------- | -------- |
| Admin     | admin@example.com | password |
| Non-Admin | user@example.com  | password |

<br>

### LOCAL SETUP

1. clone repository
2. copy .env.example file to .env and also to .env.testing file. Go to [Configuration](#configuration) to set DB details

```
cp .env.example .env && cp .env.example .env.testing
```

3. Download Dependencies

```
composer install
```

4. Set encryption key

```
php artisan key:generate
```

5. Perform migrations and seed database and migrate db for testing database

```
php artisan migrate --seed && php artisan migrate  --env=testing
```

### DOCUMENTATION

1. To generate the documentation, you can run

```
php artisan scribe:generate
```

2. You can visit the documentation at [/docs][documentation-link]

### TESTING

1. After setting up, you can run the tests by running:

```
php artisan test
```

2. To see code coverage for the tests, install [xdebug][xdebug-url] and then run

```
php artisan test --coverage
```

### configuration

Please modify these values in the `.env` file.

-   DB_DATABASE=product_db
-   DB_PASSWORD=**\*\*\*\*** (Put your password here, leave blank if your mysql root uses no password)

Please modify these values in the `.env.testing` file.

-   DB_DATABASE=product_db_testing
-   DB_PASSWORD=**\*\*\*\*** (Put your password here, leave blank if your mysql root uses no password)

[xdebug-url]: https://xdebug.org/docs/install
[hosted-url-admin]: https://pay4me.laravel.cloud/admin
[documentation-link]: https://pay4me.laravel.cloud/docs
