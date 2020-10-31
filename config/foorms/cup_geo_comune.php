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

            'provincia_id' => [
                'options' => 'relation:provincia',
            ],
            'nome_it' => [
                'operator' => 'like',
            ]
        ]

    ],
    'list' => [

        'actions' => [
            'set' => [
                'allowed_fields' => [
                    'attivo',
                    'capoluogo',
                ],
            ],
            'csv-export' => [
                'default' => [
                    'whitelist' => [
                        'codice_istat',
                        'nome_it',
                        'codice_catastale',
                        'capoluogo',
                        'provincia|nome_it',
                        'provincia|sigla',
                        'regione|nome_it',
                        'area|nome_it',
                        'nazione|nome_it',
                        'cap',
                        'prefisso',
                        'lat',
                        'lng',
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
            'id' => [],
            'codice_istat' => [],
            'nome_it' => [],
            'codice_catastale' => [],
            'capoluogo' => [],

            'cap' => [],
            'prefisso' => [],
            'attivo' => [],
//            'estero' => [],

        ],
        'relations' => [
            'provincia' => [
                'fields' => [
                    'nome_it' => [],
                    'sigla' => []
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
            'nazione' => [
                'fields' => [
                    'nome_it' => [],
                ]
            ],
        ],
        'params' => [

        ],
    ],
    'edit' => [
        'actions' => [
//            'autocomplete' => [
//                'fields' => [
//                    'codice' => [
//                        'model' => 'comune'
//                    ]
//                ]
//            ]
        ],
        'fields' => [
            //'id' => [],
            'codice_istat' => [],
            'nome_it' => [],
            'codice_catastale' => [],
            'capoluogo' => [
                'options' => 'boolean',
            ],
            'provincia_id' => [
                'options' => 'relation:provincia',
            ],
            'nazione_id' => [
                'options' => 'relation:nazione',
            ],
            'cap' => [],
            'prefisso' => [],
            'lat' => [],
            'lng' => [],
            'attivo' => [],

        ],
        'relations' => [
//            'provincia' => [
//                'fields' => [
//                    'codice' => []
//                ]
//            ],
//            'regione' => [
//                'fields' => [
//                    'codice' => []
//                ]
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
//                    'nome_it' => [
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
            //'id' => [],
            'codice_istat' => [],
            'nome_it' => [],
            'codice_catastale' => [],
            'provincia' => [],
            'cap' => [],
            'prefisso' => [],
            'regione_id' => [],
            'nazione_id' => [],

        ],
    ]

];


/*
 * var Model_UnicoComune = {
    search: SearchConfs.extend({
        fields: [
            'codice',
            'nome_it',
            'codice_catastale',
            'provincia_id',
            'regione_id',
            'nazione_id',
            'estero',
        ],
        operator: {
            'codice': 'like',
            'nome_it': 'like',
            'codice_catastale': 'like',
            'cap': 'like',
            'prefisso_telefonico': 'like',
            'provincia_id': '=',
            'regione_id': '=',
            'nazione_id': '=',
            'estero': '=',
        },
        groups: {
            'g0': {
                fields: ['codice', 'nome_it', 'codice_catastale', 'cap', 'prefisso_telefonico'],
            },
            'g1': {
                fields: ['provincia_id', 'regione_id', 'nazione_id', 'estero'],
            }
        },
        fields_type: {
            'provincia_id': {
                type: 'select'
            },
            'regione_id': {
                type: 'select'
            },
            'nazione_id': {
                type: 'select'
            },
            'estero': {
                type: 'select'
            },
        }
    }),
    list: ListConfs.extend({
        actions : [
            'actionDelete',
            'actionEdit',
            'actionInsert',
            'pdf_download_list',
            'csv_download',
        ],
        extra_actions: {
            pdf_download_list: new actionPdfDownloadQueueCollection({
                action: 'pdf_download_list',
                actionText : 'Pdf',
                actionIcon: 'fa fa-file-pdf-o',
                pdfType: 'list',
            }),
            csv_download: new actionCsvDownloadQueueCollection({
                action: 'csv_download',
                //csvType : 'ciccio'
            }),
        },
        fields: [
            'codice',
            'nome_it',
            'codice_catastale',
            'provincia',
            'cap',
            'prefisso_telefonico',
            'regione',
            'nazione',
            'estero',
        ],
        fields_type: {
            'provincia': {
                'type': "belongsto",
                'fields': ['sigla', 'nome_it'],
            },
            'regione': {
                'type': "belongsto",
                'fields': ['nome_it'],
            },
            'nazione': {
                'type': "belongsto",
                'fields': ['nome_it'],
            },
            'estero': {
                type: 'swap',
                mode: 'edit'
            },
            'nome_it': {
                type: 'text',
            }
            // 'codice' : {
            //     type : 'select'
            // }

        },
        init: function () {

            // this.fields_type.estero = {
            //     type: 'swap',
            //     mode : 'edit'
            // }

        }
    }),
    edit: EditConfs.extend({
        fields: [
            'codice',
            'nome_it',
            'codice_catastale',
            'cap',
            'prefisso_telefonico',
            'provincia_id',
            'regione_id',
            'nazione_id',
            'estero',
        ],
        fields_type: {
            'nome_it': {
                type: 'input',
                inputType: 'text',
            },
            'provincia_id': {
                type: 'select'
            },
            'regione_id': {
                type: 'select'
            },
            'nazione_id': {
                type: 'select'
            },
            'estero': {
                type: 'select'
            },
        },
        init: function () {


            // this.fields_type.cliente_id = {
            //     'type': 'select',
            // };
            // this.fields_type.role = {
            //     //type : 'select',
            //
            //     type : 'choice',
            //     choiceType : 'radio',
            //
            // }

        }
    }),
}


 */
