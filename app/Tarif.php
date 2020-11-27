<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    public function saisonDetails()
    {
        return $this->hasOne(SaisonDetails::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_Reservation');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }
}
