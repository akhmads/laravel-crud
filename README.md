# Laravel 11 CRUD Demo Package

Simple CRUD (Create, Read, Update, Delete) using laravel

## Installation

Open terminal or command prompt and go to your laravel project

```
composer require akhmads/laravel-crud:dev-main
```

Open file `bootstrap/providers.php`, add `Akhmads\Crud\CrudServiceProvider::class`

```php
return [
    App\Providers\AppServiceProvider::class,
    Akhmads\Crud\CrudServiceProvider::class,
];
```

then run the artisan command

```
php artisan demo:install
```
