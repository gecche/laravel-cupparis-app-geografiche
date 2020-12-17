<?php

return [
    'name' => 'provincia|province',
    'fields' => [
        'codice' => 'codice territoriale',
        'nome_it' => 'nome',
        'sigla' => 'sigla',
        'codice_catastale' => 'codice catastale',
        'codice_nuovo' => 'codice territoriale (nuovo)',
        'regione_id' => 'regione',
        'area_id' => 'regione',
        'attivo' => 'attiva',
        'comuni' => [
            'prefisso' => 'prefisso telefonico',
            'cap' => 'CAP',
        ]
    ],
    'relations' => [
        'regione' => 'regione|regioni',
        'area' => 'area|aree',
        'comuni' => 'comune provinciale|comuni provinciali',
    ],
    'list' => [
        'fields' => [
            'codice' => 'Cod.',
            'codice_catastale' => 'Cod. Cat.',
            'codice_nuovo' => 'Cod. (Nuovo)',
            'comuni' => [
                'prefisso' => 'Pref. tel.',
            ],
        ],
        'relations' => [

        ]
    ],
    'insert' => [],
    'edit' => [],
    'view' => [],
];
