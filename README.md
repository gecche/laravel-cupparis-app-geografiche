# laravel-cupparis-app-geografiche

Procedura di installazione

1 - php artisan vendor:publish 
    (copia i files)
2 - php artisan install-cupparis-package cupparis-app-geografiche
    (aggiorna il json generale)
3 - php artisan migrate
4 - php artisan db:seed --class=CupGeoSeeder
    (popola le tabelle geografiche con la versione dei files in corso)

5 - per le bandiere, un casino... per il momento:
    da public/admin/assets/css : 
    ln -s ../../../../vendor/components/flag-icon-css/css/flag-icon.css flag-icon.css
    da public/admin/assets/ : 
    ln -s ../../../vendor/components/flag-icon-css/flags flags
    in head aggiungere
    {!! Theme::css('assets/css/flag-icon.css') !!}
    
    
```    
php artisan vendor:publish --provider="Gecche\Cupparis\App\Geografiche\GeoServiceProvider"
composer dump-autoload
php artisan install-cupparis-package cupparis-app-geografiche
php artisan migrate
php artisan db:seed --class=CupGeoSeeder
ln -s ../../../../vendor/components/flag-icon-css/css/flag-icon.css public/admin/assets/css/flag-icon.css
ln -s ../../../vendor/components/flag-icon-css/flags public/admin/assets/flags
```

con laravel-modules

```    
php artisan vendor:publish --provider="Modules\CupGeo\Providers\CupGeoServiceProvider"
composer dump-autoload
php artisan install-cupparis-package CupGeo
php artisan module:migrate CupGeo
php artisan module:migrate CupGeo --subpath=datafile
php artisan module:seed CupGeo
ln -s ../../../../vendor/components/flag-icon-css/css/flag-icon.css public/admin/assets/css/flag-icon.css
ln -s ../../../vendor/components/flag-icon-css/flags public/admin/assets/flags
```

Procedura di disinstallazione

1 - php artisan uninstall-cupparis-package cupparis-app-geografiche --json
    (cancella i files, aggiorna il json generale e cancella il json del pacchetto)
2 - eventualmente: 
    a - php artisan migrate:rollback
    b - cancellare i files di migrazione manualmente che iniziano con "cup_geo" 

```    
rm public/admin/assets/css/flag-icon.css
rm public/admin/assets/flags

php artisan uninstall-cupparis-package cupparis-app-geografiche --json
php artisan migrate:rollback
rm -f database/migrations/*create_cup_geo_*.php
rm -f database/migrations/*create_datafile_cup_geo_*.php
```    

con laravel-modules

```    
rm public/admin/assets/css/flag-icon.css
rm public/admin/assets/flags

php artisan uninstall-cupparis-package CupGeo
php artisan migrate:rollback --path=Modules/CupGeo/Database/Migrations/datafile
php artisan module:migrate-rollback 
```    
