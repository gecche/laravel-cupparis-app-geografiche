<?php

namespace Gecche\Cupparis\App\Geografiche\Models;

use Gecche\Cupparis\App\Breeze\Breeze;

/**
 * Breeze (Eloquent) model for T_COMUNE table.
 */
class CupGeoComune
{
	use Relations\ComuneRelations;


    
//    use ModelWithUploadsTrait;

    protected $table = 'T_COMUNE';

    protected $guarded = ['id'];

    public $timestamps = false;
    public $ownerships = false;

    public $appends = [

    ];


    public static $relationsData = [

			'provincia' => [self::BELONGS_TO, 'related' => Provincia::class, 'table' => 'T_PROVINCIA', 'foreignKey' => 'T_PROVINCIA_ID'],


//        'belongsto' => array(self::BELONGS_TO, Comune::class, 'foreignKey' => '<FOREIGNKEYNAME>'),
//        'belongstomany' => array(self::BELONGS_TO_MANY, Comune::class, 'table' => '<TABLEPIVOTNAME>','pivotKeys' => [],'foreignKey' => '<FOREIGNKEYNAME>','otherKey' => '<OTHERKEYNAME>') ,
//        'hasmany' => array(self::HAS_MANY, Comune::class, 'table' => '<TABLENAME>','foreignKey' => '<FOREIGNKEYNAME>'),
    ];

    public static $rules = [
//        'username' => 'required|between:4,255|unique:users,username',
    ];

    public $columnsForSelectList = ['T_COMUNE_DESC', 'T_COMUNE_ISTAT'];
     //['id','descrizione'];

    public $defaultOrderColumns = ['T_COMUNE_DESC' => 'ASC', ];
     //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['T_COMUNE_DESC', 'T_COMUNE_ISTAT'];
     //['cognome','denominazione','codicefiscale','partitaiva'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';


}
