<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Backend API on Laravel

This backend API is designed to serve client requests, both public and admin. For the admin part, after authorization,
CRUD requests in the model become available: catalog, products, companies, media library. With separate requests, the
admin can form links between these tables, and uploaded files (for example, images) can be linked to any model.

## Installation

<pre> git clone https://github.com/mikhalkevich/backendAPI </pre>
  <p>Файл .env отсутствует в репозитории и его можно воссоздать по примеру .env.example</p>
  <p>Для установки необходимых модулей необходимо выполнить команду:</p>
<pre>composer install</pre>
После чего необходимо выполнить миграции:
<pre>php artisan migrate</pre>
Запустить проект с помощью команды
<pre>php artisan serve</pre>
Теперь бэкенд станет доступен для клиентских запросов, по умолчанию по хосту: http://localhost:8000

## Documentation
Инструкция по использованию BackendAPI доступна по адресу http://erud.by/backend
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
