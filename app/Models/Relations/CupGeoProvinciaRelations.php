<?php

namespace App\Models\Relations;

trait CupGeoProvinciaRelations
{

    public function regione() {

        return $this->belongsTo(\App\Models\CupGeoRegione::class, 'regione_id', null, null);

    }

    public function area() {

        return $this->belongsTo(\App\Models\CupGeoArea::class, 'area_id', null, null);

    }

    public function comuni() {

        return $this->hasMany(\App\Models\CupGeoComune::class, 'provincia_id', null);

    }


}
