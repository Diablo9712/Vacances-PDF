<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function centres()
    {
        return $this->hasMany(Centre::class);
    }


    public function priorites()
    {
        return $this->hasMany(Priorite::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_Reservation');
    }

    public function tarif()
    {
        return $this->hasOne(Tarif::class);
    }
}
