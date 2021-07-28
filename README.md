<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Install Application

1.  Copy env.example

2.  Create new file, paste all env.example content and save as .env

3.  Configure
    -   APP_NAME
    -   APP_URL (required)
    -   DB_DATABASE (required)
    -   DB_USERNAME (required)
    -   DB_PASSWORD (required)

4) if you want to use send email feature, please configure some variable below.
    - MAIL_HOST
    - MAIL_PORT
    - MAIL_USERNAME
    - MAIL_PASSWORD

input this command below on your terminal inside this project directory.

5. Install Laravel

    > composer install

6. Generate Key

    > php artisan key:generate

7. Link storage to public

    > php artisan storage:link

8. Migrate the database and seed the data by input this command on your terminal
    > php artisan migrate --seed
9. Or reset the database if already migrated.
    > php artisan migrate:fresh --seed

Application is now Ready.

# How to Send email notification

Before you can crete new employee and send email to the Company. Please run this command below to active the queue process.

1. Start processing jobs on the queue as a daemon
    > php artisan queue:work
