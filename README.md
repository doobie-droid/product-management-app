# Product Management App

Submission for [Pay4me assessment][assessment-pdf], includes CRUD application via FilamentPHP, Testing with PestPHP and doc generation with Laravel Scribe
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

5. Perform migrations and seed database

```
php artisan migrate:seed
```

### DOCUMENTATION

1. To generate the documentation, you can run

```
php artisan scribe:generate
```

2. You can visit the documentation at [/docs][documentation-link]

### configuration

Please modify these values in the `.env` file.

-   DB_DATABASE=product_db
-   DB_DATABASE=**\*\*\*\*** (Put your password here, leave blank if your mysql root uses no password)

Please modify these values in the `.env.testing` file.

-   DB_DATABASE=product_db_testing
-   DB_DATABASE=**\*\*\*\*** (Put your password here, leave blank if your mysql root uses no password)

[hosted-url-admin]: https://pay4me.laravel.cloud/admin
[assessment-pdf]: https://drive.google.com/file/d/1QFlo-qChZIKDgiaAQ26wGFVHOBBcj7G4/view?usp=sharing
[documentation-link]: https://product-management-app-main-irm4rf.laravel.cloud/docs
