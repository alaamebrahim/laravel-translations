<?php

namespace Alaame\LaravelTranslations;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class LaravelTranslationsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerBladeDirective();
    }

    public function register()
    {
        $this->app->bind('LaravelTranslations', function () {
            return new LaravelTranslations();
        });
    }

    private function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/Config/ame-translations.php' => config_path('ame-translations.php'),
        ], 'ame-translations');
    }

    protected function registerBladeDirective()
    {
        Cache::remember('translations', config('ame-translations.cache_ttl'), function () {
            $translations = collect();
            foreach (config('ame-translations.supported-locales') as $locale) { // supported locales
                $translations[$locale] = [
                    'php' => $this->phpTranslations($locale),
                    'json' => $this->jsonTranslations($locale),
                ];
            }

            return $translations;
        });

        Blade::directive('translations', function () {
            return '<script>window._translations =' . Cache::get('translations') . '</script>';
        });
    }

    private function phpTranslations($locale)
    {
        if (!is_dir(resource_path("lang/$locale"))) {
            mkdir(resource_path("lang/$locale"));
        }

        $path = resource_path("lang/$locale");

        return collect(File::allFiles($path))->flatMap(function ($file) use ($locale) {
            $key = ($translation = $file->getBasename('.php'));

            return [$key => trans($translation, [], $locale)];
        });
    }

    private function jsonTranslations($locale)
    {
        $path = resource_path("lang/$locale.json");

        if (is_string($path) && is_readable($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }


}
