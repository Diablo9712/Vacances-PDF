<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etatcentre extends Model
{
    public function agenda()
    {
        return $this->belongsTo('App\Agenda');
    }
}
