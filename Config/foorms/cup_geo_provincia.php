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
            'regione_id' => [
                'options' => 'relation:regione'
            ],
            'nome_it' => [
                'operator' => 'like'
            ],

        ]
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
                        'codice',
                        'nome_it',
                        'sigla',
                        'codice_nuovo',
                        'regione|nome_it',
                        'area|nome_it',
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
            'per_page' => 10,
            'pagination_steps' => [10, 25, 50, 300],
        ],

        'fields' => [
            'id' => [
            ],
            'codice' => [

            ],
            'nome_it' => [

            ],
            'sigla' => [

            ],
            'codice_nuovo' => [

            ],
            'attivo' => [

            ],

        ],
        'relations' => [
            'comuni' => [
                'fields' => [
                    'nome_it' => [],
                    'lat' => [],
                    'prefisso' => [],
                ]
            ],
            'regione' => [
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
            'id' => [],
            'codice' => [],
            'nome_it' => [],
            'sigla' => [],
            'codice_nuovo' => [

            ],
            'regione_id' => [
                'options' => 'relation:regione'
            ],
        ],
        'relations' => [
            'comuni' => [
                'fields' => [
                    'id' => [

                    ],
                    'codice' => [
                    ],
                    'nome_it' => [
                    ],
                    'codice_catastale' => [
//                        'options' => [
//                            1 => 'pippo',
//                            2 => 'pluto',
//                        ],
//                        'nulloptions' => true,
                    ],
                    'cap' => [

                    ],
                    'prefisso' => [

                    ],
                ],

            ],
        ],
        'params' => [

        ],
    ],
    'view' => [
        'fields' => [
            //'id' => [],
            'id' => [],
            'codice' => [],
            'nome_it' => [],
            'sigla' => [],
            'codice_nuovo' => [

            ],
        ],
        'relations' => [
            'comuni' => [
                'fields' => [
                    'id' => [

                    ],
                    'codice' => [
                    ],
                    'nome_it' => [
                    ],
                    'codice_catastale' => [
//                        'options' => [
//                            1 => 'pippo',
//                            2 => 'pluto',
//                        ],
//                        'nulloptions' => true,
                    ],
                    'cap' => [

                    ],
                    'prefisso' => [

                    ],
                    'lng' => [],
                ],

            ],
            'regione' => [
                'fields' => [
                    'codice' => [],
                    'nome_it' => [],
                ]
            ],

        ],
    ]
//    'insert' => [
//
//    ],

];
