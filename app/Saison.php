<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{
    public function saisonDetails()
    {
        return $this->belongsTo(SaisonDetails::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_Reservation');
    }
}
