<?php

namespace Modules\CupGeo\DatafileProviders;

use App\Models\Area;
use App\Models\Regione;

use Gecche\Cupparis\App\Breeze\BreezeDatafile;
use Modules\CupGeo\Models\CupGeoAreaMondiale;
use Modules\CupGeo\Models\CupGeoContinente;
use Modules\CupGeo\Models\CupGeoNazione;
use Gecche\Cupparis\Datafile\Breeze\BreezeDatafileProvider;
use App\Models\Provincia;
use Gecche\Cupparis\Datafile\Breeze\Contracts\BreezeDatafileInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CupGeoNazioniIstatXls extends BreezeDatafileProvider
{
    /*
     * array del tipo di datafile, ha la seguente forma: array( 'headers' => array( 'header1' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params => paramsArray,type => error|alert), ... 'checkCallbackN' => array(params => paramsArray,type => error|alert), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) 'blocking' => true|false (default false) ) ... 'headerN' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params), ... 'checkCallbackN' => array(params), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) ) 'peremesso' => 'permesso_string' (default 'datafile_upload') 'blocking' => true|false (default false) ) ) I chechCallbacks e transformCallbacks sono dei nomi di funzioni di questo modello (o sottoclassi) dichiarati come protected e con il nome del callback preceduto da _check_ o _transform_ e che accettano i parametri specificati I checkCallbacks hanno anche un campo che specifica se si tratta di errore o di alert I checks servono per verificare se i dati del campo corrispondono ai requisiti richiesti I transforms trasformano i dati in qualcos'altro (es: formato della data da gg/mm/yyyy a yyyy-mm-gg) Vengono eseguiti prima tutti i checks e poi tutti i transforms (nell'ordine specificato dall'array) Blocking invece definisce se un errore nei check di una riga corrisponde al blocco dell'upload datafile o se si può andare avanti saltando quella riga permesso è se il
     */

    protected $modelDatafileName = \App\DatafileModels\CupGeoNazioniIstat::class;
    protected $modelTargetName = \App\Models\CupGeoNazione::class;

    protected $zip = false;
    protected $zipDir = false;
    protected $zipDirName = '';

    protected $chunkRows = 1000;
    protected $fileProperties = [
        'skipEmptyLines' => true,  // Se la procedura salta le righe vuote che trova
        'stopAtEmptyLine' => true, // Se la procedura di importazione si ferma alla prima riga vuota incontrata
        'startingColumn' => 'A',
        'endingColumn' => 'O',
    ];
    protected $filetype = 'excel'; //csv, fixed_text, excel

    /*
     * HEADERS array header => datatype
     */
    public $headers = array(

        'Stato(S)/Territorio(T)',

        'Codice Continente',
        'Denominazione Continente (IT)',

        'Codice Area',
        'Denominazione Area (IT)',
        'Codice ISTAT',

        'Denominazione IT',
        'Denominazione EN',

        'Codice MIN',
        'Codice AT',
        'Codice UNSD_M49',

        'Codice ISO 3166 alpha2',
        'Codice ISO 3166 alpha3',

        'Codice ISTAT_Stato Padre',
        'Codice ISO alpha3_Stato Padre',

    );


    public $associativeHeaders = [

        'Stato(S)/Territorio(T)' => 'stato_territorio',

        'Codice Continente' => 'codice_continente',
        'Denominazione Continente (IT)' => 'nome_continente_it',

        'Codice Area' => 'codice_area',
        'Denominazione Area (IT)' => 'nome_area_it',
        'Codice ISTAT' => 'codice_istat',

        'Denominazione IT' => 'nome_it',
        'Denominazione EN' => 'nome_en',

        'Codice MIN' => 'codice_MIN',
        'Codice AT' => 'codice_catastale',
        'Codice UNSD_M49' => 'codice_UNSD_M49',

        'Codice ISO 3166 alpha2' => 'codice_iso_2',
        'Codice ISO 3166 alpha3' => 'codice_iso_3',

        'Codice ISTAT_Stato Padre' => 'codice_istat_padre',
        'Codice ISO alpha3_Stato Padre' => 'codice_iso_3_padre',

    ];

    public function associateRow(BreezeDatafileInterface $modelDatafile)
    {
        $codice = $modelDatafile->codice_istat;
        $modelTargetName = $this->modelTargetName;
        return $modelTargetName::where('codice_istat', $codice)->firstOrNew([
            'codice_istat' => $codice,
        ]);

    }

    public function formatRow(BreezeDatafileInterface $modelDatafile)
    {

        $codiceArea = $modelDatafile->codice_area;
        $area = CupGeoAreaMondiale::where('codice', $codiceArea)->firstOrCreate(
            [
                'codice' => $codiceArea,
                'nome_it' => $modelDatafile->nome_area_it
            ]
        );

        $codiceContinente = $modelDatafile->codice_continente;
        $continente = CupGeoContinente::where('codice', $codiceContinente)->firstOrCreate(
            [
                'codice' => $codiceContinente,
                'nome_it' => $modelDatafile->nome_continente_it,
            ]
        );

        $codiceParent = trim($modelDatafile->codice_istat_padre);
        $parent = null;
        if ($codiceParent) {
            $parent = CupGeoNazione::where('codice_istat', $codiceParent)->first();
        }

        $fields = [
            'codice_istat',
            'codice_catastale',
            'codice_iso_2',
            'codice_iso_3',
            'nome_it',
            'nome_en',
        ];
        $values = Arr::only($modelDatafile->toArray(), $fields);
        $values = array_map(function ($value) {
            return $value == 'n.d.' ? null : trim($value);
        },$values);

        Log::info(print_r($values,true));

//        $values['flag'] = 0;
        $values['attivo'] = 1;

        $values['continente_id'] = $continente->getKey();
        $values['area_id'] = $area->getKey();

        $values['parent_id'] = $parent ? $parent->getKey() : null;

        return $values;
    }

    public
    function formatDatafileRow($row)
    {


        $newRow = [];
        foreach ($this->associativeHeaders as $headerFile => $dbField) {
            $newRow[$dbField] = Arr::get($row, $headerFile, null);
        }


        $row = $newRow;

        return $row;
    }

}

// End Datafile Core Model

