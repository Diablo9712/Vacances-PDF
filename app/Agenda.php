<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public function centre()
    {
        return $this->hasMany(Centre::class, 'id_centre');
    }
    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
   
    public function priorites()
    {
        return $this->hasMany(Priorite::class, 'id_priorite');
    }
    public function etatcentre()
    {
        return $this->hasMany(Etatcentre::class, 'id_etat_centre');
    }
}
