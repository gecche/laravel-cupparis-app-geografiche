# laravel-cupparis-app-geografiche

Procedura di installazione

1 - php artisan vendor:publish 
    (copia i files)
2 - php artisan install-cupparis-package cupparis-app-geografiche
    (aggiorna il json generale)
3 - php artisan migrate
4 - php artisan db:seed --class=CupGeoSeeder
    (popola le tabelle geografiche con la versione dei files in corso)

Procedura di disinstallazione

1 - php artisan uninstall-cupparis-package cupparis-app-geografiche --json
    (cancella i files, aggiorna il json generale e cancella il json del pacchetto)
2 - eventualmente: 
    a - php artisan migrate:rollback
    b - cancellare i files di migrazione manualmente che iniziano con "cup_geo" 
