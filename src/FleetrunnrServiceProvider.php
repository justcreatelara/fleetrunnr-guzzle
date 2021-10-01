<?php

namespace Jit\Fleetrunnr;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Jit\Fleetrunnr\Commands\FleetrunnrCommand;

class FleetrunnrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('fleetrunnr')
            ->hasConfigFile()
            ->hasCommand(FleetrunnrCommand::class);
    }
}
