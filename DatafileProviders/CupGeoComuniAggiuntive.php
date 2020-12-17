<?php

namespace Modules\CupGeo\DatafileProviders;

use App\Models\Area;
use App\Models\Regione;

use Gecche\Cupparis\App\Breeze\BreezeDatafile;
use Gecche\Cupparis\Datafile\Breeze\BreezeDatafileProvider;
use App\Models\Provincia;
use Gecche\Cupparis\Datafile\Breeze\Contracts\BreezeDatafileInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CupGeoComuniAggiuntive extends BreezeDatafileProvider
{
    /*
     * array del tipo di datafile, ha la seguente forma: array( 'headers' => array( 'header1' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params => paramsArray,type => error|alert), ... 'checkCallbackN' => array(params => paramsArray,type => error|alert), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) 'blocking' => true|false (default false) ) ... 'headerN' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params), ... 'checkCallbackN' => array(params), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) ) 'peremesso' => 'permesso_string' (default 'datafile_upload') 'blocking' => true|false (default false) ) ) I chechCallbacks e transformCallbacks sono dei nomi di funzioni di questo modello (o sottoclassi) dichiarati come protected e con il nome del callback preceduto da _check_ o _transform_ e che accettano i parametri specificati I checkCallbacks hanno anche un campo che specifica se si tratta di errore o di alert I checks servono per verificare se i dati del campo corrispondono ai requisiti richiesti I transforms trasformano i dati in qualcos'altro (es: formato della data da gg/mm/yyyy a yyyy-mm-gg) Vengono eseguiti prima tutti i checks e poi tutti i transforms (nell'ordine specificato dall'array) Blocking invece definisce se un errore nei check di una riga corrisponde al blocco dell'upload datafile o se si può andare avanti saltando quella riga permesso è se il
     */

    protected $modelDatafileName = \App\DatafileModels\CupGeoComuniAggiuntive::class;
    protected $modelTargetName = \App\Models\CupGeoComune::class;

    protected $zip = false;
    protected $zipDir = false;
    protected $zipDirName = '';

    protected $chunkRows = 1000;
    protected $fileProperties = [
//        'skipEmptyLines' => true,  // Se la procedura salta le righe vuote che trova
//        'stopAtEmptyLine' => true, // Se la procedura di importazione si ferma alla prima riga vuota incontrata
//        'startingColumn' => 'A',
//        'endingColumn' => 'K',
    ];
    protected $filetype = 'csv'; //csv, fixed_text, excel

    /*
     * HEADERS array header => datatype
     */
    public $headers = array(

        "Istat",
        "Comune",
        "Prefisso",
        "CAP",
        "Lat",
        "Lng",
    );


    public $associativeHeaders = [
        "Istat" => 'codice_istat',
        "Prefisso" => 'prefisso',
        "CAP" => 'cap',
        "Lat" => 'lat',
        "Lng" => 'lng',


    ];

    public function associateRow(BreezeDatafileInterface $modelDatafile)
    {
        $codice = $modelDatafile->codice_istat;
        $modelTargetName = $this->modelTargetName;
        return $modelTargetName::where('codice_istat',$codice)->firstOrFail();

    }

    public function formatRow(BreezeDatafileInterface $modelDatafile)
    {

        $fields = [
            'cap',
            'prefisso',
            'lat',
            'lng',
        ];
        $values = Arr::only($modelDatafile->toArray(), $fields);
        $values = array_map(function ($value) {
            return $value ?: null;
        },$values);

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
