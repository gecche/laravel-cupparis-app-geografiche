<?php

return [
    'name' => 'nazione|nazioni',
    'fields' => [
        'codice_istat' => 'codice istat',
        'codice_catastale' => 'codice catastale',
        'codice_iso_2' => 'codice iso (2 car.)',
        'codice_iso_3' => 'codice iso (3 car.)',
        'nome_it' => 'nome (IT)',
        'nome_en' => 'nome (EN)',
        'parent_id' => 'stato di appartenenza',
        'continente_id' => 'continente',
        'area_id' => 'area geopolitica',
        'flagicon' => 'bandiera',
        'attivo' => 'attiva',
    ],
    'relations' => [
        'continente' => 'continente|continenti',
        'area' => 'area geopolitica|aree geopolitiche',
    ],
    'list' => [],
    'insert' => [],
    'edit' => [],
    'view' => [],
];
