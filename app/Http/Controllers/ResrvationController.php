<?php

namespace App\Http\Controllers;

use App\Etatreservation;
use App\Priorite;
use App\Reservation;
use Illuminate\Http\Request;
use App\Ville;
use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ResrvationController extends Controller
{
    //
    public function index()
    {
        // etat en attente
        // check if we have reservation first
        $reservation = Reservation::where('id_Etat', 1)->where('id_User', Auth::user()->id)->get();

        if ($reservation && isset($reservation[0])) {
            $reservation = $reservation[0];
        }

        $ville = Ville::select('villes.id', 'libelle')
            ->get();

        return view('reservations.index', compact('ville', 'reservation'));
    }

    public function store(Request $request)
    {
        // check if we already have a reservation
        // TODO: add user ID
        $reservation = Reservation::where('id_Etat', 1)->where('id_User', Auth::user()->id)->get();

        if ($reservation && isset($reservation[0])) {
            $reservation = $reservation[0];
            $count = $reservation->priorites()->count();
            if ($count >= 4) {
                throw new \Exception("You have exceeded your options, Contact Mourad Makrouf for further information");
            }
        }

        if (!$reservation) {
            $userId = Auth::user()->id;
            $etat = Etatreservation::findOrFail(1);

            $reservation = new Reservation();
            $reservation->id_Etat = $etat->id;
            $reservation->id_User = $userId;
            $reservation->date_etat = new \DateTime();
            $reservation->save();
        }
        // TODO: do not choose the same city twice ?
        $priorite = new Priorite();
        $priorite->id_Ville = $request->get('ville', null);
        $priorite->id_Reservation = $reservation->id;
        $priorite->classement = 1;
        $priorite->date_debut = date_create_from_format('Y-m-d', $request->get('debut'));
        $priorite->date_fin = date_create_from_format('Y-m-d', $request->get('fin'));

        $priorite->save();

        return response()->json($priorite);
    }

    public function delete(Request $request)
    {
        // check if the user owns this before removing
        $id = $request->get('id', null);
        if (!$id) {
            throw new \Exception("ID must be provided");
        }
        /** @var Priorite $priorite */
        $priorite = Priorite::findOrFail($id);

        if (Auth::user()->id !== $priorite->reservation->user->id)
            throw new \Exception("You're not allowed to perform this action!");
        $priorite->delete();

        return response()->json(true);
    }

}
