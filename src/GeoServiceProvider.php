<?php namespace Gecche\Cupparis\App\Geografiche;

use Gecche\Cupparis\App\Foorm\FoormManager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class GeoServiceProvider extends ServiceProvider
{


    /**
     * Booting
     */
    public function boot()
    {

//        $this->publishes([
//            __DIR__ . '/../config/cupparis-geografiche.php' => config_path('cupparis-geografiche.php'),
//        ], 'public');


        //Publishing configs
        $this->publishes([
//            __DIR__ . '/../config/themes.php' => config_path('themes.php'),
            __DIR__ . '/../config/foorms' => config_path('foorms'),
        ], 'config-foorms');
        $this->publishes([
//            __DIR__ . '/../config/themes.php' => config_path('themes.php'),
            __DIR__ . '/../config/datafile-foorms' => config_path('foorms'),
        ], 'config-datafile-foorms');

        $this->publishes([
//            __DIR__ . '/../config/themes.php' => config_path('themes.php'),
            __DIR__ . '/../cupparis-app-geografiche.json' => base_path('cupparis/cupparis-app-geografiche.json'),
        ], 'config-json');

        //Publishing and overwriting app folders
        $this->publishes([
//            __DIR__ . '/../app/Console/Commands' => app_path('Console/Commands'),
            __DIR__ . '/../app/Models' => app_path('Models'),
            __DIR__ . '/../app/Models/Relations' => app_path('Models/Relations'),
            __DIR__ . '/../app/Policies' => app_path('Policies'),
//            __DIR__ . '/../app/Services' => app_path('Services'),
//            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
//            __DIR__ . '/../app/Http/Controllers/Controller.php' => app_path('Http/Controllers/Controller.php'),
//            __DIR__ . '/../app/Http/Controllers/DownloadController.php' => app_path('Http/Controllers/DownloadController.php'),
//            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
        ], 'models');

        $this->publishes([
            __DIR__ . '/../app/DatafileModels' => app_path('DatafileModels'),
            __DIR__ . '/../app/DatafileProviders' => app_path('DatafileProviders'),
//            __DIR__ . '/../app/Models/Relations' => app_path('Models/Relations'),
        ], 'datafile-models');


        if ($this->app->runningInConsole()) {
            // Export the migration
            if (! class_exists('CreateCupGeoNazioniTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_cup_geo_continenti_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-6) . '_create_cup_geo_continenti_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_aree_mondiali_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-5) . '_create_cup_geo_aree_mondiali_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_nazioni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-4) . '_create_cup_geo_nazioni_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_aree_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-3) . '_create_cup_geo_aree_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_regioni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-2) . '_create_cup_geo_regioni_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_province_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-1) . '_create_cup_geo_province_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_comuni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cup_geo_comuni_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }
        if ($this->app->runningInConsole()) {
            // Export the migration
            if (! class_exists('CreateCupGeoNazioniTable')) {
                $this->publishes([
                    __DIR__ . '/../database/datafile-migrations/create_datafile_cup_geo_comuni_aggiuntive.php' => database_path('migrations/' . date('Y_m_d_His', time()+100) . '_create_datafile_cup_geo_comuni_aggiuntive.php'),
                    __DIR__ . '/../database/datafile-migrations/create_datafile_cup_geo_comuni_istat.php' => database_path('migrations/' . date('Y_m_d_His', time()+101) . '_create_datafile_cup_geo_comuni_istat.php'),
                    __DIR__ . '/../database/datafile-migrations/create_datafile_cup_geo_nazioni_istat.php' => database_path('migrations/' . date('Y_m_d_His', time()+102) . '_create_datafile_cup_geo_nazioni_istat.php'),
                    // you can add any number of migrations here
                ], 'datafile-migrations');
            }
        }
        //Publishing and overwriting databases folders
        $this->publishes([
//            __DIR__ . '/../database/factories' => database_path('factories'),
//            __DIR__ . '/../database/seeds' => database_path('seeds'),
        ], 'db');

        //Publishing and overwriting resources folders
//        $this->publishes([
////            __DIR__ . '/../resources/documenti' => base_path('resources/documenti'),
//            __DIR__ . '/../resources/lang' => base_path('resources/lang'),
////            __DIR__ . '/../resources/views/bootstrap4/includes' => base_path('resources/views/bootstrap4/includes'),
//        ], 'models-confs');

        //Publishing and overwriting public folders
        $this->publishes([
            __DIR__ . '/../public/admin/ModelConfs' => public_path('admin/ModelConfs'),
            __DIR__ . '/../public/admin/pages' => public_path('admin/pages'),
        ], 'public');
//        $this->publishes([
//            __DIR__ . '/../public/bootstrap4/components' => public_path('bootstrap4/components'),
//            //__DIR__ . '/../public/images' => public_path('images'),
//            //__DIR__ . '/../public/js/edit_area' => public_path('js/edit_area'),
//            //__DIR__ . '/../public/crud-vue/components' => public_path('crud-vue/components'),
//            //__DIR__ . '/../public/crud-vue/ModelConfs' => public_path('crud-vue/ModelConfs'),
//            //__DIR__ . '/../public/crud-vue/plugins' => public_path('crud-vue/plugins'),
//        ], 'public-js');



//        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->bootActivityLog();

        $this->bootValidationRules();

    }

    protected function bootActivityLog()
    {
//        Activity::saving(function (Activity $activity) {
//            $activity->properties = $activity->properties->put('ip', request()->getClientIp());
//            $activity->properties = $activity->properties->put('user_agent', request()->userAgent());
//        });
    }

    protected function bootValidationRules()
    {

//        Validator::extend('captcha', 'Gecche\Cupparis\App\Validation\Rules@captcha');
    }
}
