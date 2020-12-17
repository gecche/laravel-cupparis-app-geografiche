<?php


return [

    'delete' => [

    ],

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
//        'actions' => [
//            'csv-export' => [
//                'default' => [
//                    'blacklist' => [
////                        'password'
//                    ],
//                    'whitelist' => [
//                        "codice",
//                        "nome_it",
//
//                    ],
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
////            'set' => [
////                'allowed_fields' => [
////                    'banned',
////                    'email_verified_at',
////                ],
////            ],
//        ],

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

            ]
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
