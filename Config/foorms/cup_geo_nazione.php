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

    'search' => [
        'fields' => [
            'codice_istat' => [
                'operator' => 'like',
            ],
            'nome_it' => [
                'operator' => 'like',
            ],
            'continente_id' => [
                'options' => 'relation:continente',
            ],
            'area_id' => [
                'options' => 'relation:area',
            ],
        ],
    ],
    'list' => [

        'actions' => [
            'set' => [
                'allowed_fields' => [
                    'attivo',
                ],
            ],
            'csv-export' => [
                'default' => [
                    'whitelist' => [
                        'codice_istat',
                        'nome_it',
                        'nome_en',
                        'codice_catastale',
                        'codice_iso_2',
                        'codice_iso_3',
                        'area|nome_it',
                        'continente|nome_it',
                        'attivo',
                    ],
//                    'whitelist' => null,
                    'separator' => ';',
                    'endline' => "\n",
                    'headers' => 'translate',
                    'decimalFrom' => '.',
                    'decimalTo' => false,
                ],
            ],
        ],
        'dependencies' => [
            'search' => 'search',
        ],
        'pagination' => [
            'per_page' => 20,
            'pagination_steps' => [10, 25, 50, 300],
        ],

        'fields' => [
            'id' => [

            ],
            'codice_istat' => [

            ],
            'nome_it' => [

            ],
            'nome_en' => [

            ],
            'codice_catastale' => [

            ],
            'codice_iso_2' => [

            ],

            'flagicon' => [

            ],
            'attivo' => [

            ],

        ],
        'relations' => [
            'continente' => [
                'fields' => [
                    'nome_it' => [],
                ]
            ],
            'area' => [
                'fields' => [
                    'nome_it' => [],
                ]
            ],
        ],
        'params' => [

        ],
    ],
    'edit' => [
        'fields' => [
            'id' => [

            ],
            'codice_istat' => [],
            'codice_catastale' => [],
            'codice_iso_2' => [],
            'codice_iso_3' => [],
            'nome_it' => [],
            'nome_en' => [],
            'parent_id' => [
                'options' => 'relation:parent',
            ],
            'continente_id' => [
                'options' => 'relation:continente',
            ],
            'area_id' => [
                'options' => 'relation:area',
            ],
            'attivo' => [],
//            'cliente_id' => [
//                'nullable' => true,
//                'options' => 'relation:cliente',
//            ],
//            'attivo' => [
//                'options' => 'boolean',
//            ],
        ],
//        'relations' => [
//            'tickets' => [
//                'fields' => [
//                    'id' => [
//
//                    ],
//                    'codice' => [
//                        'nullable' => true,
//                        'options' => 'relation:cliente',
//                        //'default' => 'pippo',
//                    ],
//                    'descrizione' => [
//
//                    ],
//                ],
//
//            ],
//        ],
        'params' => [

        ],
    ],
//    'insert' => [
//
//    ],

    'view' => [
        'fields' => [
            'codice' => [
                //'default' => 'user'
            ],
            'nome_it' => [

            ],
            'nome_en' => [

            ],
        ]
    ]
];
