<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function priorites()
    {
        return $this->hasMany(Priorite::class, 'id_Reservation');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_User');
    }
    public function agenda()
    {
        return $this->belongsTo('App\Agenda','id_reservation');
    }
}
