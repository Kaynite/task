# How to run the project

Clone the repo then run the follwing commands one by one.

```console
composer install

cp .env.example .env

php artisan key:generate

touch database/database.sqlite

php artisan migrate

php artisan serve
```
