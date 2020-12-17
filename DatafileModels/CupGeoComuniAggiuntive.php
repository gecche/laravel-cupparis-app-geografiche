<?php

namespace Modules\CupGeo\DatafileModels;

use Gecche\Cupparis\App\Breeze\BreezeDatafile;

class CupGeoComuniAggiuntive extends BreezeDatafile {

	protected $table = 'datafile_cup_geo_comuni_aggiuntive';

    public static $rules = array(
        'codice_istat' => 'required|exists:cup_geo_comuni,codice_istat',
    );

}
