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

class CupGeoComuniIstat extends BreezeDatafileProvider
{
    /*
     * array del tipo di datafile, ha la seguente forma: array( 'headers' => array( 'header1' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params => paramsArray,type => error|alert), ... 'checkCallbackN' => array(params => paramsArray,type => error|alert), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) 'blocking' => true|false (default false) ) ... 'headerN' => array( 'datatype' => 'string|int|data...', (default string) 'checks' => array( 'checkCallback1' => array(params), ... 'checkCallbackN' => array(params), ), (deafult array()) 'transforms' => array( 'transformCallback1' => array(params), ... 'transformCallbackN' => array(params), ), (default array()) ) 'peremesso' => 'permesso_string' (default 'datafile_upload') 'blocking' => true|false (default false) ) ) I chechCallbacks e transformCallbacks sono dei nomi di funzioni di questo modello (o sottoclassi) dichiarati come protected e con il nome del callback preceduto da _check_ o _transform_ e che accettano i parametri specificati I checkCallbacks hanno anche un campo che specifica se si tratta di errore o di alert I checks servono per verificare se i dati del campo corrispondono ai requisiti richiesti I transforms trasformano i dati in qualcos'altro (es: formato della data da gg/mm/yyyy a yyyy-mm-gg) Vengono eseguiti prima tutti i checks e poi tutti i transforms (nell'ordine specificato dall'array) Blocking invece definisce se un errore nei check di una riga corrisponde al blocco dell'upload datafile o se si può andare avanti saltando quella riga permesso è se il
     */

    protected $modelDatafileName = \App\DatafileModels\DizionarioComune::class;
    protected $modelTargetName = \App\Models\Comune::class;

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

        "Codice Ripartizione Geografica",
        "Ripartizione geografica",
        "Codice Regione",
        "Denominazione regione",
        "Codice Provincia",
        "Denominazione dell'Unità territoriale sovracomunale",
        "Codice Comune",
        "Denominazione in italiano",
        "Codice dell'Unità territoriale sovracomunale",
    );


    public $associativeHeaders = [
        "Codice Ripartizione Geografica" => "codice_area",
        "Ripartizione geografica" => "area",
        "Codice Regione" => "codice_regione",
        "Denominazione regione" => "regione",
        "Codice Provincia" => "codice_provincia",
        "Denominazione dell'Unità territoriale sovracomunale" => "provincia",
        "Codice Comune" => "codice_comune",
        "Denominazione in italiano" => "comune",
        "Codice dell'Unità territoriale sovracomunale" => "codice_provincia_nuovo",


    ];

    public function associateRow(BreezeDatafileInterface $modelDatafile)
    {
        $codice = $modelDatafile->codice_comune;
        $modelTargetName = $this->modelTargetName;
        return $modelTargetName::where('T_COMUNE_ISTAT',$codice)->firstOrNew([
            'T_COMUNE_ISTAT' => $codice,
        ]);

    }

    public function formatRow(BreezeDatafileInterface $modelDatafile)
    {

        $codiceArea = $modelDatafile->codice_area;
        $area = Area::where('T_AREA_CODICE', $codiceArea)->firstOrCreate(
            ['T_AREA_CODICE' => $codiceArea,
                'T_AREA_DESC' => $modelDatafile->area
            ]
        );

        $codiceRegione = $modelDatafile->codice_regione;
        $regione = Regione::where('T_REGIONE_CODICE', $codiceRegione)->firstOrCreate(
            [
                'T_REGIONE_CODICE' => $codiceRegione,
                'T_REGIONE_DESC' => $modelDatafile->regione,
                'T_AREA_ID' => $area->getKey(),

            ]
        );

        $codiceProvincia = $modelDatafile->codice_provincia;
        $provincia = Provincia::where('T_PROVINCIA_CODICE', $codiceProvincia)->firstOrCreate(
            [
                'T_PROVINCIA_CODICE' => $codiceProvincia,
                'T_PROVINCIA_CODICE_NUOVO' => $modelDatafile->codice_provincia_nuovo,
                'T_PROVINCIA_DESC' => trim($modelDatafile->provincia),
                'T_REGIONE_ID' => $regione->getKey(),
                'T_AREA_ID' => $area->getKey(),
            ]
        );

        $values = array();

        $values['T_COMUNE_DESC'] = trim($modelDatafile->comune);
        $values['T_COMUNE_ISTAT'] = $modelDatafile->codice_comune;
        $values['T_PROVINCIA_ID'] = $provincia->getKey();

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


/*
 *

/*
 * DA IMPORT MOVIMENTI
 *
 *
    protected $doubleDatafileErrorNames = ['Uniquedatafile','DmQuotaDoppia'];
    protected $importazioneFile = null;
    protected $importazioneFileData = array();

    protected $anagraficaId = null;

    protected $lastSaveModel = null;
    protected $lastParticella = null;
    protected $colturaProgressivo = 1;

    protected $excludeFromFormat = [
        'id',
        'row',
        'datafile_id',
        'codice_fiscale',
        'partita_iva',
        'quota',
        'causale',
        'aliquota',
        'imposta',
        'importo',
        'imposta_ok',
        'importo_ok',
        'codice_forpag',
    ];


    public $associativeHeaders = [
        'ORGANIZZAZIONE' => 'organizzazione_id',
        'CODICE FISCALE' => 'codice_fiscale',
        'PARTITA IVA' => 'partita_iva',
        'ANNO' => 'anno',
        'QUOTA' => 'quota',
        'CAUSALE' => 'causale',
        'DATA REG' => 'data',
        'IMPONIBILE' => 'imponibile',
        'ALIQUOTA' => 'aliquota',
        'IMPOSTA' => 'imposta',
        'IMPORTO' => 'importo',
        'DARE/AVERE' => 'dare_avere',
        'DESCRIZIONE' => 'descrizione',
        'FORPAG' => 'codice_forpag',
    ];

    public $headerKey = null;

//    public function associateRow(ArdentDatafile $modelDatafile) {
//        $codice = $modelDatafile->GTComIstat;
//        $modelTargetName = $this->modelTargetName;
//        return $modelTargetName::findOrNew($codice);
//
//    }
//

    public function beforeLoad()
    {
        $user = Auth::user();
        $role = $user->getRoleId();


        switch ($role) {
            case 'ADMIN':
            case 'SUPERUSER':
                $this->sedi = true;
                break;
            case 'OPERATORE':
                $abilitazioni = $user->getAbilitazioni();
                $abilitazioniGesoc = array_get($abilitazioni,'gesoc',[]);
                $this->sedi = array_keys(array_get($abilitazioniGesoc,'sedi',[]));
                break;
            default:
                $this->sedi = false;
        }
    }


    public function formatDatafileRow($row)
    {


        $newRow = [];
        foreach ($this->associativeHeaders as $headerFile => $dbField) {
            $newRow[$dbField] = array_get($row, $headerFile, null);
        }


        $row = $newRow;

        $row['data'] = date('Y-m-d', \PHPExcel_Shared_Date::ExcelToPHP($row['data']));

        $row = $this->getAzienda($row);
//        Log::info('formatDatafileRowImportMovimenti');
//        Log::info(var_dump($row));
        $row = $this->getQuotaCausale($row);

        $row = $this->getIvaImporto($row);
        $row = $this->getFormapagamento($row);


        $row['imponibile'] = number_format(floatval(array_get($row, 'imponibile', 0.00)),2,'.','');
        $row['imposta'] = number_format(floatval(array_get($row, 'imposta', 0.00)),2,'.','');
        $row['importo'] = number_format(floatval(array_get($row, 'importo', 0.00)),2,'.','');

        return $row;
    }

    protected function doubleErrorModelsDmQuotaDoppia($errorObject) {
        $modelDatafileName = $this->modelDatafileName;

        $modelOrig = $modelDatafileName::find($errorObject->datafile_table_id);
        if (!$modelOrig) {
            return [];
        }

        $models = $modelDatafileName::where('quota',$errorObject->value)
            ->where('datafile_id',$errorObject->datafile_id)
            ->where('anno',$modelOrig->anno)
            ->where('azienda_id',$modelOrig->azienda_id)
            ->where('organizzazione_id',$modelOrig->organizzazione_id)
            ->get();
        $modelRows = $models->lists('row')->all();
        $datafileErrorName = $this->datafileModelErrorName;
        $datafileErrorName::where('datafile_id','=',$this->getDatafileId())
            ->where('error_name','=','DmQuotaDoppia')
            ->where('field_name','=','quota')
            ->where('value','=',$errorObject->value)
            ->whereIn('row',$modelRows)
            ->delete();


        return $models;
    }



 */
