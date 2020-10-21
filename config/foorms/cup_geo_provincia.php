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
            'descrizione' => [
                'operator' => 'like'
            ],

        ]
    ],
    'list' => [

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
            'sigla' => [

            ],
        ],
        'relations' => [
//            'comuni' => [
//                'fields' => [
//                    'descrizione' => [],
//                ]
//            ],
            'regione' => [
                'fields' => [
                    'codice' => [],
                    'descrizione' => [],
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
            'descrizione' => [],
            'sigla' => [],
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
                    'descrizione' => [
                    ],
                    'codice_catastale' => [
                        'options' => [
                            1 => 'pippo',
                            2 => 'pluto',
                        ],
                        'nulloptions' => true,
                    ],
                    'cap' => [

                    ],
                    'prefisso_telefonico' => [

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
            'descrizione' => [],
            'sigla' => [],
        ],
        'relations' => [
            'comuni' => [
                'fields' => [
                    'id' => [

                    ],
                    'codice' => [
                    ],
                    'descrizione' => [
                    ],
                    'codice_catastale' => [
                        'options' => [
                            1 => 'pippo',
                            2 => 'pluto',
                        ],
                        'nulloptions' => true,
                    ],
                    'cap' => [

                    ],
                    'prefisso_telefonico' => [

                    ],
                ],

            ],
            'regione' => [
                'fields' => [
                    'codice' => [],
                    'descrizione' => [],
                ]
            ],

        ],
    ]
//    'insert' => [
//
//    ],

];
