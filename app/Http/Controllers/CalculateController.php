<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $data = DB::table('agendas')
       
           ->join('reservations','reservations.id' , '=' , 'agendas.id_reservation')
     //  ->join('tarifs','tarifs.ville_id','=','villes.id_Ville')
                     ->join('priorites','priorites.id' , '=' , 'agendas.id_priorite')
                      ->join('etat_centres','etat_centres.id' , '=' , 'agendas.id_etat_centre')
                      ->join('villes','villes.id' , '=' , 'priorites.id_Ville')
                      ->join('centres','centres.id','=','agendas.id_centre')
       //            ->join('villes','villes.id','=','centres.ville_id')
       //           ->join('saision_details','saision_details.id','=','saisons.saison_details_id ')
      // ->join('tarifs','tarifs.saison_details_id','=','saision_details.id')
      // 
     /*              ->join('centres','centres.ville_id','=','villes.id')
        
                       ->join('reservations','reservations.id' , '=' , 'priorites.id_Reservation')
       
    */
       ->select('agendas.id','agendas.montant_reservation','agendas.id_reservation', 'agendas.montant_penalite', 
       'villes.libelle','centres.adresse','centres.tel','centres.assistant','priorites.date_debut','priorites.date_fin')
       
     // ->select('SELECT agendas.id ,agendas.id_reservation ,villes.libelle ,centres.adresse ,centres.tel ,centres.assistant ,priorites.date_debut ,priorites.date_fin ,datediff(priorites.date_fin,priorites.date_debut) , tarifs.montant*datediff(priorites.date_fin,priorites.date_debut)  FROM `agendas`,`reservations`,`centres`,`priorites`,`etat_centres`,`villes`,`saision_details`,`saisons`,`tarifs` WHERE agendas.id_reservation = reservations.id and centres.id=agendas.id_centre and priorites.id=agendas.id_priorite and etat_centres.id = agendas.id_etat_centre and priorites.id_Ville =villes.id and priorites.id_Reservation = reservations.id and centres.ville_id=villes.id and tarifs.ville_id = villes.id')
      ->get();
        return view('fiche.index', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function affiche($id)
    {
        $data = DB::table('agendas')
        ->where('agendas.id',$id)
        ->join('reservations','reservations.id' , '=' , 'agendas.id_reservation')
  //  ->join('tarifs','tarifs.ville_id','=','villes.id_Ville')
                  ->join('priorites','priorites.id' , '=' , 'agendas.id_priorite')
                   ->join('etat_centres','etat_centres.id' , '=' , 'agendas.id_etat_centre')
                   ->join('villes','villes.id' , '=' , 'priorites.id_Ville')
                   ->join('centres','centres.id','=','agendas.id_centre')
    //            ->join('villes','villes.id','=','centres.ville_id')
    //           ->join('saision_details','saision_details.id','=','saisons.saison_details_id ')
   // ->join('tarifs','tarifs.saison_details_id','=','saision_details.id')
   // 
  /*              ->join('centres','centres.ville_id','=','villes.id')
     
                    ->join('reservations','reservations.id' , '=' , 'priorites.id_Reservation')
    
 */
    ->select('agendas.id','agendas.montant_reservation','agendas.id_reservation', 'agendas.montant_penalite', 
    'villes.libelle','centres.adresse','centres.tel','centres.assistant','priorites.date_debut','priorites.date_fin')
    
  // ->select('SELECT agendas.id ,agendas.id_reservation ,villes.libelle ,centres.adresse ,centres.tel ,centres.assistant ,priorites.date_debut ,priorites.date_fin ,datediff(priorites.date_fin,priorites.date_debut) , tarifs.montant*datediff(priorites.date_fin,priorites.date_debut)  FROM `agendas`,`reservations`,`centres`,`priorites`,`etat_centres`,`villes`,`saision_details`,`saisons`,`tarifs` WHERE agendas.id_reservation = reservations.id and centres.id=agendas.id_centre and priorites.id=agendas.id_priorite and etat_centres.id = agendas.id_etat_centre and priorites.id_Ville =villes.id and priorites.id_Reservation = reservations.id and centres.ville_id=villes.id and tarifs.ville_id = villes.id')
   ->get();
     return view('fiche.affiche', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
