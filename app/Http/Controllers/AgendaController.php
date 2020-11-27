<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Agenda;


class AgendaController extends Controller
{
    public function index()
    {

        return view('agenda.index');
     

    }
    public function nouveau_reservation()
    {

        return view('agenda.nouveau_reservation');
     

    }
    public function suivi_reservation()
    {

        return view('agenda.suivi_reservation');
     

    }
    public function reclamation()
    {

        return view('agenda.reclamation');
     

    }
    public function avis()
    {

        return view('agenda.avis');
     

    }
}
