<?php

namespace Gecche\Cupparis\App\Geografiche\Models;

use App\Models\CupGeoArea;
use App\Models\CupGeoRegione;
use App\Models\CupGeoComune;
use Gecche\Cupparis\App\Breeze\Breeze;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Breeze (Eloquent) model for T_PROVINCIA table.
 */
class CupGeoProvincia extends Breeze
{
//	use Relations\ProvinciaRelations;


//    use ModelWithUploadsTrait;

    protected $table = 'cup_geo_province';

    protected $guarded = ['id'];

    public $timestamps = false;
    public $ownerships = false;

    public $appends = [

    ];


    public static $relationsData = [

        'regione' => [self::BELONGS_TO, 'related' => CupGeoRegione::class, 'table' => 'cup_geo_regioni', 'foreignKey' => 'regione_id'],
        'area' => [self::BELONGS_TO, 'related' => CupGeoArea::class, 'table' => 'cup_geo_aree', 'foreignKey' => 'area_id'],
        'comuni' => array(self::HAS_MANY, 'related' => CupGeoComune::class, 'table' => 'cup_geo_comuni', 'foreignKey' => 'provincia_id'),
//            'operatore' => [self::BELONGS_TO, 'related' => User::class, 'table' => 'users', 'foreignKey' => 'user_id'],


//        'belongsto' => array(self::BELONGS_TO, Provincia::class, 'foreignKey' => '<FOREIGNKEYNAME>'),
//        'belongstomany' => array(self::BELONGS_TO_MANY, Provincia::class, 'table' => '<TABLEPIVOTNAME>','pivotKeys' => [],'foreignKey' => '<FOREIGNKEYNAME>','otherKey' => '<OTHERKEYNAME>') ,
//        'hasmany' => array(self::HAS_MANY, Provincia::class, 'table' => '<TABLENAME>','foreignKey' => '<FOREIGNKEYNAME>'),
    ];

    public static $rules = [
//        'username' => 'required|between:4,255|unique:users,username',
    ];

    public $columnsForSelectList = ['nome_it'];
    //['id','nome_it'];

    public $defaultOrderColumns = ['nome_it' => 'ASC',];
    //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['nome_it'];
    //['cognome','denominazione','codicefiscale','partitaiva'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 200;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';


    public function save(array $options = [])
    {

        $oldRegioneId = $this->getOriginal('regione_id');
        $newRegioneId = $this->regione_id;

        if ($oldRegioneId !== $newRegioneId) {
            $regione = CupGeoRegione::find($this->regione_id);
            if ($regione && $regione->getKey()) {
                $this->area_id = $regione->area_id;
            }
        }

        $saved = parent::save($options); // TODO: Change the autogenerated stub

        if ($saved && $oldRegioneId !== $newRegioneId) {
            DB::table('cup_geo_comuni')
                ->where('provincia_id', $this->getKey())
                ->update(['regione_id' => $newRegioneId,
                    'area_id' => $this->area_id,
                    'sigla_provincia' => $this->sigla]);
        }

        return $saved;

    }
}
