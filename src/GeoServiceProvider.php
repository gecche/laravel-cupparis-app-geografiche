<?php namespace Gecche\Cupparis\App;

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
        if (!is_dir(config_path('foorms'))) {
            mkdir(config_path('foorms'));
        }
        $this->publishes([
            __DIR__ . '/../config-packages/auth.php' => config_path('auth.php'),
            __DIR__ . '/../config-packages/breeze.php' => config_path('breeze.php'),
            __DIR__ . '/../config-packages/filesystems.php' => config_path('filesystems.php'),
            __DIR__ . '/../config-packages/foorm.php' => config_path('foorm.php'),
            __DIR__ . '/../config-packages/image.php' => config_path('image.php'),
            __DIR__ . '/../config-packages/imagecache.php' => config_path('imagecache.php'),
            __DIR__ . '/../config-packages/permission.php' => config_path('permission.php'),
            __DIR__ . '/../config-packages/themes.php' => config_path('themes.php'),
            __DIR__ . '/../config-packages/foorms/user.php' => config_path('foorms/user.php'),
        ], 'public');


        //Publishing and overwriting app folders
        $this->publishes([
            __DIR__ . '/../bootstrap/app.php' => base_path('bootstrap/app.php'),
            __DIR__ . '/../app/Console/Kernel.php' => app_path('Console/Kernel.php'),
            __DIR__ . '/../app/Console/Commands' => app_path('Console/Commands'),
            __DIR__ . '/../app/Foorm' => app_path('Foorm'),
            __DIR__ . '/../app/Models' => app_path('Models'),
            __DIR__ . '/../app/Policies' => app_path('Policies'),
            __DIR__ . '/../app/Services' => app_path('Services'),
            __DIR__ . '/../app/Providers/AppServiceProvider.php' => app_path('Providers/AppServiceProvider.php'),
            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
            __DIR__ . '/../app/Http/Controllers/Controller.php' => app_path('Http/Controllers/Controller.php'),
            __DIR__ . '/../app/Http/Controllers/DownloadController.php' => app_path('Http/Controllers/DownloadController.php'),
            __DIR__ . '/../app/Http/Kernel.php' => app_path('Http/Kernel.php'),
        ], 'public');

        //Publishing and overwriting databases folders
        $this->publishes([
            __DIR__ . '/../database/factories' => database_path('factories'),
            __DIR__ . '/../database/migrations' => database_path('migrations'),
            __DIR__ . '/../database/seeds' => database_path('seeds'),
        ], 'public');

        //Publishing and overwriting resources folders
        $this->publishes([
            __DIR__ . '/../resources/documenti' => base_path('resources/documenti'),
            __DIR__ . '/../resources/lang' => base_path('resources/lang'),
            __DIR__ . '/../resources/views/bootstrap4/includes' => base_path('resources/views/bootstrap4/includes'),
        ], 'public');

        //Publishing and overwriting public folders
        $this->publishes([
            __DIR__ . '/../public/bootstrap4' => public_path('bootstrap4'),
            __DIR__ . '/../public/images' => public_path('images'),
            //__DIR__ . '/../public/js/edit_area' => public_path('js/edit_area'),
            //__DIR__ . '/../public/crud-vue/components' => public_path('crud-vue/components'),
            //__DIR__ . '/../public/crud-vue/ModelConfs' => public_path('crud-vue/ModelConfs'),
            //__DIR__ . '/../public/crud-vue/plugins' => public_path('crud-vue/plugins'),
        ], 'public');
        $this->publishes([
            __DIR__ . '/../public/bootstrap4/components' => public_path('bootstrap4/components'),
            //__DIR__ . '/../public/images' => public_path('images'),
            //__DIR__ . '/../public/js/edit_area' => public_path('js/edit_area'),
            //__DIR__ . '/../public/crud-vue/components' => public_path('crud-vue/components'),
            //__DIR__ . '/../public/crud-vue/ModelConfs' => public_path('crud-vue/ModelConfs'),
            //__DIR__ . '/../public/crud-vue/plugins' => public_path('crud-vue/plugins'),
        ], 'public-js');



        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

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
