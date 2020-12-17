<?php

return [
    'name' => 'comune|comuni',

    'fields' => [
        'regione_id' => 'regione',
        'area_id' => 'area',
        'provincia_id' => 'provincia',
        'nazione_id' => 'nazione',
        'nome_it' => 'nome',
        'sigla_provincia' => 'sigla provincia',
        'codice_istat' => 'codice istat',
        'codice_catastale' => 'codice catastale',
        'attivo' => 'attivo',
        'capoluogo' => 'capoluogo provincia',
        'cap' => 'CAP',
        'prefisso' => 'prefisso telefonico',
        'mappa' => 'posizione su mappa',
        'lat' => 'latitudine',
        'lng' => 'longitudine',
    ],
    'relations' => [
        'provincia' => 'provincia|province',
        'regione' => 'regione|regioni',
        'area' => 'area|aree',
        'nazione' => 'nazione|nazioni',
    ],
    'list' => [
        'fields' => [
            'nome_it' => 'nome',
            'codice_istat' => 'cod. istat',
            'codice_catastale' => 'cod. cat.',
            'capoluogo' => 'capoluogo',
            'prefisso' => 'pref. tel.',
        ],
    ],
    'insert' => [],
    'edit' => [],
    'view' => [],
];