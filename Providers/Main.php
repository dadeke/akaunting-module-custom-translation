<?php

namespace Modules\CustomTranslation\Providers;

use Illuminate\Support\ServiceProvider as Provider;
use Modules\CustomTranslation\Overrides\Illuminate\Translation\Translator;

class Main extends Provider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Override core translator
        $translator = app('translator');
        $customTranslator = new Translator(
            $translator->getLoader(),
            $translator->getLocale()
        );
        $customTranslator->setFallback($translator->getFallback());
        $customTranslator->setSelector($translator->getSelector());
        app()->instance('translator', $customTranslator);
    }

    /**
     * Load migrations.
     *
     * @return void
     */
    public function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
