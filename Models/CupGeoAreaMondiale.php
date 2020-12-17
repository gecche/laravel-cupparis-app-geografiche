<?php

namespace Modules\CupGeo\Models;

use Gecche\Cupparis\App\Breeze\Breeze;

/**
 * Breeze (Eloquent) model for T_AREA table.
 */
class CupGeoAreaMondiale extends Breeze
{


//    use ModelWithUploadsTrait;

    protected $table = 'cup_geo_aree_mondiali';

    protected $guarded = ['id'];

    public $timestamps = false;
    public $ownerships = false;

    public $appends = [

    ];


    public static $relationsData = [



//        'belongsto' => array(self::BELONGS_TO, Area::class, 'foreignKey' => '<FOREIGNKEYNAME>'),
//        'belongstomany' => array(self::BELONGS_TO_MANY, Area::class, 'table' => '<TABLEPIVOTNAME>','pivotKeys' => [],'foreignKey' => '<FOREIGNKEYNAME>','otherKey' => '<OTHERKEYNAME>') ,
//        'hasmany' => array(self::HAS_MANY, Area::class, 'table' => '<TABLENAME>','foreignKey' => '<FOREIGNKEYNAME>'),
    ];

    public static $rules = [
//        'username' => 'required|between:4,255|unique:users,username',
    ];

    public $columnsForSelectList = ['nome_it'];
     //['id','nome_it'];

    public $defaultOrderColumns = ['nome_it' => 'ASC', ];
     //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['nome_it'];
     //['cognome','denominazione','codicefiscale','partitaiva'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';


}
