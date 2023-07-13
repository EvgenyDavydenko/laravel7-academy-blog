## Пример создания блога с использованием фреймворка Laravel

1.  Создал проект на базе фреймворка Laravel: `composer create-project laravel/laravel:^7.0`
2.  Создал модель и миграцию для таблицы постов блога: `php artisan make:model Models/Post --migration; php artisan migrate`
3.  Создал фабрику для модели постов и заполнил ее фэйковыми данными: `php artisan make:factory PostFactory --model=Models/Post; php artisan db:seed`
