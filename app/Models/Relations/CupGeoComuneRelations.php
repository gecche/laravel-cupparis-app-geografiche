<?php

namespace App\Models\Relations;

trait CupGeoComuneRelations
{

    public function provincia() {

        return $this->belongsTo(\App\Models\CupGeoProvincia::class, 'provincia_id', null, null);

    }

    public function regione() {

        return $this->belongsTo(\App\Models\CupGeoRegione::class, 'regione_id', null, null);

    }

    public function area() {

        return $this->belongsTo(\App\Models\CupGeoArea::class, 'area_id', null, null);

    }

    public function nazione() {

        return $this->belongsTo(\App\Models\CupGeoNazione::class, 'nazione_id', null, null);

    }


}
