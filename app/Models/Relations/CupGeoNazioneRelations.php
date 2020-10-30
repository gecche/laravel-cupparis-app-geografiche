<?php

namespace App\Models\Relations;

trait CupGeoNazioneRelations
{

    public function continente() {

        return $this->belongsTo(\App\Models\CupGeoContinente::class, 'continente_id', null, null);
    
    }

    public function area() {

        return $this->belongsTo(\App\Models\CupGeoAreaMondiale::class, 'area_id', null, null);
    
    }


}
