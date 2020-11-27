<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priorite extends Model
{
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_Reservation');
    }

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }
    public function agenda()
    {
        return $this->belongsTo('App\Agenda');
    }
}
