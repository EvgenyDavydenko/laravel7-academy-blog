## Пример создания блога с использованием фреймворка Laravel

1.  Создал проект на базе фреймворка Laravel: `composer create-project laravel/laravel:^7.0`
2.  Создал модель и миграцию для таблицы постов блога: `php artisan make:model Models/Post --migration; php artisan migrate`
3.  Создал фабрику для модели постов и заполнил ее фэйковыми данными: `php artisan make:factory PostFactory --model=Models/Post; php artisan db:seed`
4.  Создал контроллер ресурсов для модели постов: `php artisan make:controller PostController --resource --model=Models/Post`
5.  Добавил в проект css фреймворк Bootstrap: `composer require laravel/ui:^2.4; php artisan ui bootstrap; npm install; npm run dev (export NODE_OPTIONS=--openssl-legacy-provider)`
6.  Реализовал методы index и show в PostController
7.  Реализовал поиск по содержанию постов
8.  Реализовал метод create в PostController
9.  Реализовал метод store в PostController
10. Реализовал метод edit в PostController
