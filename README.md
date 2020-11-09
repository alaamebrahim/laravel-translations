# setting package
#### This package tends to add settings functionality to laravel applications
##### Its built on top of laravel voyager package

#### Requirements
- PHP 7.1 or higher.
- Laravel 5.8 or higher.
- Tailwind installed.
- Spatie/permission installed and have two rules:
    - developer role : responsible for adding new settings.
    - admin role: responsible for updating/deleting setting values.


#### Installation
- run `compose require alaame/setting`
- run `php artisan migrate`
- add `AMESetting::webRoutes();` in web.php file in whatever place you want.
- access setting admin page using `/setting` and it's dependent on where you put `AMESetting::routes();` You can check the right path using `php artisan route:list`.

#### usage 

After adding new options from setting admin page, you can access your setting using global helper function `setting('setting_name')` or using blade directive `@setting('setting_name')`

