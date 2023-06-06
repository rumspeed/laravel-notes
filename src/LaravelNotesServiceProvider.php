<?php

namespace Rumspeed\LaravelNotes;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rumspeed\LaravelNotes\Commands\LaravelNotesCommand;

class LaravelNotesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-notes')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-notes_table')
            ->hasCommand(LaravelNotesCommand::class);
    }
}
