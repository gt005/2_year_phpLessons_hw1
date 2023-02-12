# Отчет для Домашней работы по PHP Laravel

#### Хамид Карим бпи 214
#### Вариант: обувь

## Установка (Работаю на Windows 10)
Запустил в Xampp apache и mysql. Php и composer установлены. Установил Laravel командой
```
composer global require laravel/installer
```
Далее создал новый laravel проект командой
```
laravel new main_homework
```
Ошибок было очень много: не было папки vendor, не работал artisan. Затем появилась ошибка No application encryption key has been specified. Короче: ни одна команда не заработала с первого раза.
Сначала сгенерировал ключ командой и запустил проект
```
php artisan key:generate
php artisan serve
```

## Написание кода

Создаю маршруты в routes/web.php, index.blade.php и в папке resources/views и css файл в public/css
```php
Route::get('/', function () {
    return view('index');
});
```
Создаю контроллер главной страницы командой
``` 
php artisan make:controller MainController
```
Далее, так как artisan migrate не работал, я подставил строчку в php.ini
```
extension=php_pdo_mysql.dll
```
После этого миграция заработала. Создал базу данных в phpmyadmin.

Создал модель, миграцию и фабрику для таблицы категорий
```
php artisan make:model Category -mf
```
