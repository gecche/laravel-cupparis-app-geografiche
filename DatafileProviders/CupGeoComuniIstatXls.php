<?php

namespace Modules\CupGeo\DatafileProviders;

use App\Models\CupGeoArea;
use App\Models\CupGeoNazione;
use App\Models\CupGeoProvincia;
use App\Models\CupGeoRegione;
use Gecche\Cupparis\Datafile\Breeze\BreezeDatafileProvider;
use Gecche\Cupparis\Datafile\Breeze\Contracts\BreezeDatafileInterface;
use Illuminate\Support\Arr;

class CupGeoComuniIstatXls extends BreezeDatafileProvider
{
    /*
     * array del tipo di datafile, ha la seguente forma: array( 'headers' => array( 'header1' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params => paramsArray,type => error|alert), ... 'checkCallbackN' => array(params => paramsArray,type => error|alert), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) 'blocking' => true|false (default false) ) ... 'headerN' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params), ... 'checkCallbackN' => array(params), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) ) 'peremesso' => 'permesso_string' (default 'datafile_upload') 'blocking' => true|false (default false) ) ) I chechCallbacks e transformCallbacks sono dei nomi di funzioni di questo modello (o sottoclassi) dichiarati come protected e con il nome del callback preceduto da _check_ o _transform_ e che accettano i parametri specificati I checkCallbacks hanno anche un campo che specifica se si tratta di errore o di alert I checks servono per verificare se i dati del campo corrispondono ai requisiti richiesti I transforms trasformano i dati in qualcos'altro (es: formato della data da gg/mm/yyyy a yyyy-mm-gg) Vengono eseguiti prima tutti i checks e poi tutti i transforms (nell'ordine specificato dall'array) Blocking invece definisce se un errore nei check di una riga corrisponde al blocco dell'upload datafile o se si può andare avanti saltando quella riga permesso è se il
     */

    protected $modelDatafileName = \App\DatafileModels\CupGeoComuniIstat::class;
    protected $modelTargetName = \App\Models\CupGeoComune::class;

    protected $zip = false;
    protected $zipDir = false;
    protected $zipDirName = '';

    protected $chunkRows = 1000;
    protected $fileProperties = [
        'skipEmptyLines' => true,  // Se la procedura salta le righe vuote che trova
        'stopAtEmptyLine' => true, // Se la procedura di importazione si ferma alla prima riga vuota incontrata
        'startingColumn' => 'A',
        'endingColumn' => 'W',
    ];
    protected $filetype = 'excel'; //csv, fixed_text, excel

    protected $nazioneItaliaId;
    /*
     * HEADERS array header => datatype
     */
    public $headers = array(

        "Codice Regione",
        "Codice dell'Unità territoriale sovracomunale \n(valida a fini statistici)",
        "Codice Provincia (Storico)(1)",
        "Progressivo del Comune (2)",
        "Codice Comune formato alfanumerico",
        "Denominazione (Italiana e straniera)",
        "Denominazione in italiano",
        "Denominazione altra lingua",
        "Codice Ripartizione Geografica",
        "Ripartizione geografica",
        "Denominazione Regione",
        "Denominazione dell'Unità territoriale sovracomunale \n(valida a fini statistici)",
        "Tipologia di Unità territoriale sovracomunale",
        "Flag Comune capoluogo di provincia/città metropolitana/libero consorzio",
        "Sigla automobilistica",
        "Codice Comune formato numerico",
        "Codice Comune numerico con 110 province (dal 2010 al 2016)",
        "Codice Comune numerico con 107 province (dal 2006 al 2009)",
        "Codice Comune numerico con 103 province (dal 1995 al 2005)",
        "Codice Catastale del comune",
        "Codice NUTS1 2010",
        "Codice NUTS2 2010 (3)",
        "Codice NUTS3 2010",

    );


    public $associativeHeaders = [

        "Codice Regione" => 'codice_regione',
        "Codice dell'Unità territoriale sovracomunale \n(valida a fini statistici)" => 'codice_provincia_nuovo',
        "Codice Provincia (Storico)(1)" => 'codice_provincia',
        "Progressivo del Comune (2)" => 'progressivo_comune',
        "Codice Comune formato alfanumerico" => 'codice_istat',
        "Denominazione (Italiana e straniera)" => 'nome_all',
        "Denominazione in italiano" => 'nome_it',
        "Denominazione altra lingua" => 'nome_altra_lingua',
        "Codice Ripartizione Geografica" => 'codice_area',
        "Ripartizione geografica" => 'area',
        "Denominazione Regione" => 'regione',
        "Denominazione dell'Unità territoriale sovracomunale \n(valida a fini statistici)" => 'provincia',
        "Tipologia di Unità territoriale sovracomunale" => 'tipo_provincia',
        "Flag Comune capoluogo di provincia/città metropolitana/libero consorzio" => 'capoluogo',
        "Sigla automobilistica" => 'sigla_provincia',
        "Codice Comune formato numerico" => 'codice_istat_numerico',
        "Codice Comune numerico con 110 province (dal 2010 al 2016)" => 'codice_istat_numerico_110',
        "Codice Comune numerico con 107 province (dal 2006 al 2009)" => 'codice_istat_numerico_107',
        "Codice Comune numerico con 103 province (dal 1995 al 2005)" => 'codice_istat_numerico_103',
        "Codice Catastale del comune" => 'codice_catastale',
        "Codice NUTS1 2010" => 'codice_nuts_1',
        "Codice NUTS2 2010 (3)" => 'codice_nuts_2',
        "Codice NUTS3 2010" => 'codice_nuts_3',

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
        $area = CupGeoArea::where('codice', $codiceArea)->firstOrCreate(
            ['codice' => $codiceArea,
                'nome_it' => $modelDatafile->area
            ]
        );

        $codiceRegione = $modelDatafile->codice_regione;
        $regione = CupGeoRegione::where('codice', $codiceRegione)->firstOrCreate(
            [
                'codice' => $codiceRegione,
                'nome_it' => $modelDatafile->regione,
                'area_id' => $area->getKey(),

            ]
        );

        $codiceProvincia = $modelDatafile->codice_provincia;
        $provincia = CupGeoProvincia::where('codice', $codiceProvincia)->firstOrCreate(
            [
                'codice' => $codiceProvincia,
                'codice_nuovo' => $modelDatafile->codice_provincia_nuovo,
                'nome_it' => trim($modelDatafile->provincia),
                'sigla' => $modelDatafile->sigla_provincia,
                'regione_id' => $regione->getKey(),
                'area_id' => $area->getKey(),
            ]
        );

        $fields = [
            'codice_istat',
            'nome_it',
            'codice_catastale',
            'capoluogo',
        ];
        $values = Arr::only($modelDatafile->toArray(), $fields);
        $values = array_map(function ($value) {
            return $value == 'n.d.' ? null : trim($value);
        },$values);

        $values['provincia_id'] = $provincia->getKey();
        $values['regione_id'] = $regione->getKey();
        $values['area_id'] = $area->getKey();
        $values['sigla_provincia'] = $provincia->sigla;
        $values['nazione_id'] = $this->nazioneItaliaId;
        $values['attivo'] = 1;

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


    public function beforeLoad()
    {
        $italia = CupGeoNazione::where('nome_it','Italia')->first();
        if ($italia) {
            $this->nazioneItaliaId = $italia->getKey();
        }
    }
}

// End Datafile Core Model
