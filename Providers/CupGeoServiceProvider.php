<?php

namespace Modules\CupGeo\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class CupGeoServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('CupGeo', 'Database/Migrations'));
        $this->cupparisPublish();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('CupGeo', 'Config/config.php') => config_path('cupgeo.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('CupGeo', 'Config/config.php'), 'cupgeo'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/cupgeo');

        $sourcePath = module_path('CupGeo', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/cupgeo';
        }, \Config::get('view.paths')), [$sourcePath]), 'cupgeo');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/cupgeo');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'cupgeo');
        } else {
            $this->loadTranslationsFrom(module_path('CupGeo', 'Resources/lang'), 'cupgeo');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('CupGeo', 'Database/factories'));
        }
    }


    public function cupparisPublish() {
        //Publishing configs
        $this->publishes([
            __DIR__ . '/../config/foorms' => config_path('foorms'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../config/datafile-foorms' => config_path('foorms'),
        ], 'config-datafile-foorms');

        //Publishing and overwriting app folders
        $this->publishes([
            __DIR__ . '/../app/Models' => app_path('Models'),
            __DIR__ . '/../app/Models/Relations' => app_path('Models/Relations'),
            __DIR__ . '/../app/Policies' => app_path('Policies'),
        ], 'models');

        $this->publishes([
            __DIR__ . '/../app/DatafileModels' => app_path('DatafileModels'),
            __DIR__ . '/../app/DatafileProviders' => app_path('DatafileProviders'),
        ], 'datafile-models');

        //Publishing and overwriting public folders
        $this->publishes([
            __DIR__ . '/../public/admin/ModelConfs' => public_path('admin/ModelConfs'),
            __DIR__ . '/../public/admin/pages' => public_path('admin/pages'),
        ], 'public');
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
