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
            __DIR__ . '/../config/foorms/cup_geo_area.php' => config_path('foorms/cup_geo_area.php'),
            __DIR__ . '/../config/foorms/cup_geo_comune.php' => config_path('foorms/cup_geo_comune.php'),
            __DIR__ . '/../config/foorms/cup_geo_nazione.php' => config_path('foorms/cup_geo_nazione.php'),
            __DIR__ . '/../config/foorms/cup_geo_provincia.php' => config_path('foorms/cup_geo_provincia.php'),
            __DIR__ . '/../config/foorms/cup_geo_regione.php' => config_path('foorms/cup_geo_regione.php'),
        ], 'config-foorms');


        //Publishing and overwriting app folders
        $this->publishes([
//            __DIR__ . '/../app/Console/Commands' => app_path('Console/Commands'),
//            __DIR__ . '/../app/Foorm' => app_path('Foorm'),
            __DIR__ . '/../app/Models/CupGeoNazione.php' => app_path('Models/CupGeoNazione.php'),
            __DIR__ . '/../app/Models/CupGeoArea.php' => app_path('Models/CupGeoArea.php'),
            __DIR__ . '/../app/Models/CupGeoRegione.php' => app_path('Models/CupGeoRegione.php'),
            __DIR__ . '/../app/Models/CupGeoProvincia.php' => app_path('Models/CupGeoProvincia.php'),
            __DIR__ . '/../app/Models/CupGeoComune.php' => app_path('Models/CupGeoComune.php'),
            __DIR__ . '/../app/Models/Relations/CupGeoRegioneRelations.php' => app_path('Models/Relations/CupGeoRegioneRelations.php'),
            __DIR__ . '/../app/Models/Relations/CupGeoProvinciaRelations.php' => app_path('Models/Relations/CupGeoProvinciaRelations.php'),
            __DIR__ . '/../app/Models/Relations/CupGeoComuneRelations.php' => app_path('Models/Relations/CupGeoComuneRelations.php'),
//            __DIR__ . '/../app/Services' => app_path('Services'),
//            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
//            __DIR__ . '/../app/Http/Controllers/Controller.php' => app_path('Http/Controllers/Controller.php'),
//            __DIR__ . '/../app/Http/Controllers/DownloadController.php' => app_path('Http/Controllers/DownloadController.php'),
//            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
        ], 'models');

//        $this->publishes([
//            __DIR__ . '/../app/Policies/CupGeoAreaPolicy.php' => app_path('Policies/CupGeoAreaPolicy.php'),
//            __DIR__ . '/../app/Policies/CupGeoComunePolicy.php' => app_path('Policies/CupGeoComunePolicy.php'),
//            __DIR__ . '/../app/Policies/CupGeoNazionePolicy.php' => app_path('Policies/CupGeoNazionePolicy.php'),
//            __DIR__ . '/../app/Policies/CupGeoProvinciaPolicy.php' => app_path('Policies/CupGeoProvinciaPolicy.php'),
//            __DIR__ . '/../app/Policies/CupGeoRegionePolicy.php' => app_path('Policies/CupGeoRegionePolicy.php'),
//        ], 'policies');


        if ($this->app->runningInConsole()) {
            // Export the migration
            if (! class_exists('CreateCupGeoNazioniTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_cup_geo_nazioni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-4) . '_create_cup_geo_nazioni_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_aree_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-3) . '_create_cup_geo_aree_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_regioni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-2) . '_create_cup_geo_regioni_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_province_table.php' => database_path('migrations/' . date('Y_m_d_His', time()-1) . '_create_cup_geo_province_table.php'),
                    __DIR__ . '/../database/migrations/create_cup_geo_comuni_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cup_geo_comuni_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
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
