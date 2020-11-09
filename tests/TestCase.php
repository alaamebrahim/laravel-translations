<?php
/**
 * Created by Alaa mohammed.
 * User: alaa
 * Date: ٢٩‏/٨‏/٢٠١٩
 * Time: ٩:٥٩ م
 */

namespace Alaame\Setting\Tests;

use Alaame\Setting\LaravelTranslationsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__. "/../database/factories");
    }

    /**
     * @return array
     */
    protected function getApplicationProviders()
    {
        return [
            LaravelTranslationsServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testDatabase');
        $app['config']->set('database.connections.testDatabase', [
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
    }

}
