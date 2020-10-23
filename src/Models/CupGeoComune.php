<?php

namespace Gecche\Cupparis\App\Geografiche\Models;

use App\Models\CupGeoArea;
use App\Models\CupGeoProvincia;
use App\Models\CupGeoRegione;
use Gecche\Cupparis\App\Breeze\Breeze;

/**
 * Breeze (Eloquent) model for T_COMUNE table.
 */
class CupGeoComune extends Breeze
{

//    use ModelWithUploadsTrait;

    protected $table = 'cup_geo_comuni';

    protected $guarded = ['id'];

    public $timestamps = false;
    public $ownerships = false;

    public $appends = [

    ];


    public static $relationsData = [

        'provincia' => [self::BELONGS_TO, 'related' => CupGeoProvincia::class, 'table' => 'cup_geo_province', 'foreignKey' => 'provincia_id'],
        'regione' => [self::BELONGS_TO, 'related' => CupGeoRegione::class, 'table' => 'cup_geo_regioni', 'foreignKey' => 'regione_id'],
        'area' => [self::BELONGS_TO, 'related' => CupGeoArea::class, 'table' => 'cup_geo_aree', 'foreignKey' => 'area_id'],


//        'belongsto' => array(self::BELONGS_TO, Comune::class, 'foreignKey' => '<FOREIGNKEYNAME>'),
//        'belongstomany' => array(self::BELONGS_TO_MANY, Comune::class, 'table' => '<TABLEPIVOTNAME>','pivotKeys' => [],'foreignKey' => '<FOREIGNKEYNAME>','otherKey' => '<OTHERKEYNAME>') ,
//        'hasmany' => array(self::HAS_MANY, Comune::class, 'table' => '<TABLENAME>','foreignKey' => '<FOREIGNKEYNAME>'),
    ];

    public static $rules = [
//        'username' => 'required|between:4,255|unique:users,username',
    ];

    public $columnsForSelectList = ['descrizione', 'codice_istat'];
    //['id','descrizione'];

    public $defaultOrderColumns = ['descrizione' => 'ASC',];
    //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['descrizione', 'codice_istat'];
    //['cognome','denominazione','codicefiscale','partitaiva'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';


}
