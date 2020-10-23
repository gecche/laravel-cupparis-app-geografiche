<?php

namespace Gecche\Cupparis\App\Geografiche\Models;

use Gecche\Cupparis\App\Breeze\Breeze;

class CupGeoNazione extends Breeze {

    protected $table = 'cup_geo_nazioni';

    public $ownerships = true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codice', 'nome_it', 'nome_en',
    ];


    public static $relationsData = [
//        'cliente' => [self::BELONGS_TO, 'related' => 'App\Models\Cliente'],
//        'tickets' => [self::HAS_MANY, 'related' => 'App\Models\Ticket'],
    ];

    public $appends = [

    ];

    public static $rules = array(
//        'username' => 'required|between:4,255|unique:users,username',
//        'email' => 'required|email|unique:users,email',
//        'password' => 'required|alpha_num|between:4,16|confirmed',
//        'password_confirmation' => 'required|alpha_num|between:4,16',
//        'nome' => 'between:1,255',
//        'cognome' => 'between:1,255',
    );

    public $columnsForSelectList = ['descrizione'];


    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';

    public $columnsSearchAutoComplete = array('descrizione');
}
