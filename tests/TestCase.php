<?php

namespace Rumspeed\LaravelNotes\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Rumspeed\LaravelNotes\LaravelNotesServiceProvider;
use Rumspeed\LaravelNotes\Tests\Stubs\Models\User;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Rumspeed\\LaravelNotes\\Tests\\Stubs\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->migrate();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelNotesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        // Models are in another location when testing
        $app['config']->set('auth.model', User::class);
        $app['config']->set('notes.authors.model', User::class);
    }

    /**
     * Migrate the tables.
     */
    protected function migrate(): void
    {
        $migrations = array_map('realpath', [
            __DIR__.'/../database/migrations',
            __DIR__.'/fixtures/migrations',
        ]);

        foreach ($migrations as $path) {
            $this->loadMigrationsFrom($path);
        }
    }
}
