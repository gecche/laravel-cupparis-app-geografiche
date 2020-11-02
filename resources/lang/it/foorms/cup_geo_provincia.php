<?php


/*
 * 'model' => <MODELNAME>
 * <FORMNAME> =>  [ //nome del form da route
 *      type => <FORMTYPE>, //tipo di form (opzionale se non c'è viene utilizzato il nome)
 *              //search, list, edit, insert, view, csv, pdf
 *      fields => [ //i campi del modello principale
 *          <FIELDNAME> => [
 *              'default' => <DEFAULTVALUE> //valore di default del campo (null se non presente)
 *              'options' => array|relation:<RELATIONNAME>:<COLUMNS>|dboptions|boolean
 *                          //le opzioni possibili di un campo, prese da un array associativo,
 *                              da una relazione (gli id del modello correlato
 *                              con <COLUMNS> serie di campi separati da virgola da inviare,
 *                              dal database (enum ecc...)
 *                              booleano
 *              'nulloption' => true|false|onchoice //onchoice indica che l'opzione nullable è presente solo se i valori
 *                                  delle options sono più di uno; default: true,
 *          ]
 *      ],
 *      relations => [ // le relazioni del modello principale
 *          <RELATIONNAME> => [
 *              fields => [ //i campi del modello principale
 *                  <FIELDNAME> => [
 *                      'default' => <DEFAULTVALUE> //valore di default del campo (null se non presente)
 *                      'options' => array|relation:<RELATIONNAME>|dboptions|boolean
 *                          //le opzioni possibili di un campo, prese da un array associativo,
 *                              da una relazione (gli id del modello correlato,
 *                              dal database (enum ecc...)
 *                              booleano
 *                      'nulloption' => true|false|onchoice //onchoice indica che l'opzione nullable è presente solo se i valori
 *                                    delle options sono più di uno; default: true,
 *                  ]
 *              ],
 *              savetype => [ //metodo di salvataggio della relazione
 *                              (in caso di edit/insert) da definire meglio
 *              ]
 *          ]
 *      ],
 *      params => [ // altri parametri opzionali
 *
 *      ],
 * ]
 */

return [
    'fields' => [
        'regione_id' => 'regione',
        'area_id' => 'regione',
        'nome_it' => 'nome',
        'sigla' => 'sigla',
        'codice' => 'codice territoriale',
        'codice_nuovo' => 'codice territoriale (nuovo)',
        'attivo' => 'attiva',
        'codice_catastale' => 'codice catastale',
        'cap' => 'CAP',
        'comuni' => [
            'nome_it' => 'nome (IT)',
            'prefisso' => 'prefisso telefonico',
        ]
    ],
    'name' => 'provincia|province',
    'relations' => [
        'regione' => 'regione|regioni',
        'area' => 'area|aree',
        'comuni' => 'comune provinciale|comuni provinciali',
    ],
    'list' => [
        'fields' => [
            'sigla' => 'Sg.',
            'comuni' => [
                'prefisso' => 'Prefisso tel.',
            ],
        ],
        'relations' => [
            'comuni' => 'Com.|com.',
        ]

    ],
    'insert' => [],
    'edit' => [],
    'view' => [],
];
