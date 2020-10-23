<?php

namespace App\Models\Relations;

trait CupGeoRegioneRelations
{

    public function area() {

        return $this->belongsTo(\App\Models\CupGeoArea::class, 'area_id', null, null);
    
    }



}
