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
            'descrizione' => [
                'operator' => 'like',
            ]
        ]

    ],
    'list' => [

        'dependencies' => [
            'search' => 'search',
        ],

        'pagination' => [
            'per_page' => 20,
            'pagination_steps' => [10, 25, 50, 300],
        ],

        'fields' => [
            'id' => [],
            'codice' => [],
            'descrizione' => [],
            'codice_catastale' => [],
            'provincia' => [],
            'cap' => [],
            'prefisso_telefonico' => [],
            'regione_id' => [],
            'nazione_id' => [],
            'estero' => [],

        ],
        'relations' => [
            'provincia' => [
                'fields' => [
                    'codice' => []
                ]
            ],
        ],
        'params' => [

        ],
    ],
    'edit' => [
        'actions' => [
            'autocomplete' => [
                'fields' => [
                    'codice' => [
                        'model' => 'comune'
                    ]
                ]
            ]
        ],
        'fields' => [
            //'id' => [],
            'codice' => [],
            'descrizione' => [],
            'codice_catastale' => [],
            'provincia' => [],
            'cap' => [],
            'prefisso_telefonico' => [],
            'regione_id' => [],
            'nazione_id' => [],
            'estero' => [],

        ],
        'relations' => [
            'provincia' => [
                'fields' => [
                    'codice' => []
                ]
            ],
            'regione' => [
                'fields' => [
                    'codice' => []
                ]
            ],
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
            //'id' => [],
            'codice' => [],
            'descrizione' => [],
            'codice_catastale' => [],
            'provincia' => [],
            'cap' => [],
            'prefisso_telefonico' => [],
            'regione_id' => [],
            'nazione_id' => [],
            'estero' => [],

        ],
    ]

];


/*
 * var Model_UnicoComune = {
    search: SearchConfs.extend({
        fields: [
            'codice',
            'descrizione',
            'codice_catastale',
            'provincia_id',
            'regione_id',
            'nazione_id',
            'estero',
        ],
        operator: {
            'codice': 'like',
            'descrizione': 'like',
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
                fields: ['codice', 'descrizione', 'codice_catastale', 'cap', 'prefisso_telefonico'],
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
            'descrizione',
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
                'fields': ['sigla', 'descrizione'],
            },
            'regione': {
                'type': "belongsto",
                'fields': ['descrizione'],
            },
            'nazione': {
                'type': "belongsto",
                'fields': ['descrizione'],
            },
            'estero': {
                type: 'swap',
                mode: 'edit'
            },
            'descrizione': {
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
            'descrizione',
            'codice_catastale',
            'cap',
            'prefisso_telefonico',
            'provincia_id',
            'regione_id',
            'nazione_id',
            'estero',
        ],
        fields_type: {
            'descrizione': {
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
