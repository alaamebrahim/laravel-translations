# laravel translations package
#### A tiny package that enables you to share translations in resources/lang folder with your frontend


#### Why to use
- Use `.json` translation files which has key,value pairs beside original `.php` files.
- Share all translations in `.json` and `.php` files with frontend.

#### Requirements
- PHP 7.4 or higher.

#### Installation
- run `compose require alaame/setting`
- publish config file `php artisan vendor:publish --provider="Alaame\LaravelTranslations\LaravelTranslationsServiceProvider"`

#### usage 

- Just add `@translations` directive in blade file where you want your frontend to read translations from, there will be available javascript variable `window._translations` that you can use anywhere in your js files included AFTER this directive.
- package will read any `.json` or `.php` within `resources/lang` directory and make it available to frontend through `@translations` directive .
- If your config `supported-locales` contains a locale that not present or not created, package will create the folder automatically.

