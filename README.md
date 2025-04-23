<p align="center"><a href="" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About Project

This project is about simple Rest API for test.

## Requirement

Xampp lastest version
Composer latest version

## How to install

It's simple.

```
git clone 
cd [task-tracker]
composer install
php artisan migrate
php artisan serve

```
Then server will be created http://localhost:8000

I used Mysql.
After install, "task_tracker" database will be created and admin, developer users will be created automatically.

## Explain how to use this API.

EndPoint are following this.

- GET /api/tasks – get all 

Will get all tasks and return json.

- POST /api/posts – store

- GET /api/posts/{id} – show

- PUT/PATCH /api/posts/{id} – update

- DELETE /api/posts/{id} – destroy
