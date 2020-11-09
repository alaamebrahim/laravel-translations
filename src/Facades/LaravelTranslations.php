<?php

namespace Alaame\LaravelTranslations\Facades;


use Illuminate\Support\Facades\Facade;

class LaravelTranslations extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelTranslations';
    }
}
