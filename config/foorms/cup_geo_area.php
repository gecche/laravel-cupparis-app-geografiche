<?php


return [

    'search' => [
        "fields" => [
            "nome_it" => [
                'operator' => 'like',
            ]
        ],

    ],
    'list' => [

////        'allowed_actions' => [
////            'csv-export' => true,
////        ],
//
        'actions' => [
            'set' => [
                'allowed_fields' => [
                    'attivo',
                ],
            ],
            //            'csv-export' => [
//                'default' => [
//                    'blacklist' => [
////                        'password'
//                    ],
//                    'whitelist' => [
//                        "codice",
//                        "nome_it",
//
//                ],
//                    'fieldsParams' => [
////                        "istituto|comunenome" => [
////                            'header' => 'Istituto - comune (nome)',
////                            'item' => 'istituto|T_COMUNE_ID',
////                        ],
//                    ],
//                    'separator' => ';',
//                    'endline' => "\n",
//                    'headers' => 'translate',
//                    'decimalFrom' => '.',
//                    'decimalTo' => false,
//                ],
//            ]
//
        ],

        'dependencies' => [
            'search' => 'search',
        ],

        'pagination' => [
            //'per_page' => 20,
            'pagination_steps' => [10, 20, 50],
        ],

        'fields' => [
            "id" => [

            ],
            "codice" => [

            ],
            "nome_it" => [

            ],
            'attivo' => [

            ],
        ],
        'relations' => [

        ],
        'params' => [

        ],
    ],


    'edit' => [
        'fields' => [
            'id' => [

            ],
            "codice" => [

            ],
            "nome_it" => [

            ],
            "attivo" => [

            ]
        ],
        'relations' => [

        ],
        'params' => [

        ],
    ],
//    'insert' => [
//
//    ],

];
