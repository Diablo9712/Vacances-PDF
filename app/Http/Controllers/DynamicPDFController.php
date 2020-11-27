<?php
/*
namespace App\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;

class DynamicPDFController extends Controller
{
    function index($id)
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
    
 *//*
    ->select('agendas.id','agendas.montant_reservation','agendas.id_reservation', 'agendas.montant_penalite', 
    'villes.libelle','centres.adresse','centres.tel','centres.assistant','priorites.date_debut','priorites.date_fin')
    
  // ->select('SELECT agendas.id ,agendas.id_reservation ,villes.libelle ,centres.adresse ,centres.tel ,centres.assistant ,priorites.date_debut ,priorites.date_fin ,datediff(priorites.date_fin,priorites.date_debut) , tarifs.montant*datediff(priorites.date_fin,priorites.date_debut)  FROM `agendas`,`reservations`,`centres`,`priorites`,`etat_centres`,`villes`,`saision_details`,`saisons`,`tarifs` WHERE agendas.id_reservation = reservations.id and centres.id=agendas.id_centre and priorites.id=agendas.id_priorite and etat_centres.id = agendas.id_etat_centre and priorites.id_Ville =villes.id and priorites.id_Reservation = reservations.id and centres.ville_id=villes.id and tarifs.ville_id = villes.id')
   ->get();

     return view('dynamic_pdf')->with('customer_data', $data);
    }


    function get_agenda_data($id)
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
 
*//*
 ->select('agendas.id','agendas.montant_reservation','agendas.id_reservation', 'agendas.montant_penalite', 
 'villes.libelle','centres.adresse','centres.tel','centres.assistant','priorites.date_debut','priorites.date_fin')
 
// ->select('SELECT agendas.id ,agendas.id_reservation ,villes.libelle ,centres.adresse ,centres.tel ,centres.assistant ,priorites.date_debut ,priorites.date_fin ,datediff(priorites.date_fin,priorites.date_debut) , tarifs.montant*datediff(priorites.date_fin,priorites.date_debut)  FROM `agendas`,`reservations`,`centres`,`priorites`,`etat_centres`,`villes`,`saision_details`,`saisons`,`tarifs` WHERE agendas.id_reservation = reservations.id and centres.id=agendas.id_centre and priorites.id=agendas.id_priorite and etat_centres.id = agendas.id_etat_centre and priorites.id_Ville =villes.id and priorites.id_Reservation = reservations.id and centres.ville_id=villes.id and tarifs.ville_id = villes.id')
->get();
     return $data;
    }
public function pdf($id){
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_agenda_data_to_html($id));
    return $pdf->stream();
    /*$show = Disneyplus::find($id);
        $pdf = PDF::loadView('pdf', compact('show'));
        
        return $pdf->download('disney.pdf');*//*
   }

   function convert_agenda_data_to_html($id)
   {
    $data = $this->get_agenda_data($id);
    $output = '       <title>Fiche Informations</title>
    <link rel="stylesheet" href="{{ URL::asset("plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css") }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/jqvmap/jqvmap.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset("dist/css/adminlte.min.css") }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/daterangepicker/daterangepicker.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset("plugins/summernote/summernote-bs4.css") }}">
    </head>   ';  
   
     $output .= '
<html>
<head>
          
     <body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper">
     <div class="row">
     <!-- left column -->
     <div class="col-md-8">
         <!-- general form elements -->
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title" style="color:red">Fiche Information</h3>
             </div>
     <div class="card-body">
                     
';
     foreach ($data as $fiche){'
     <div class="form-group">
       <label >Reservation N°</label>
       <input type="text" name="debut" class="form-control" disabled value="{{$fiche->id_reservation }}">
     </div>
     <div class="form-group">
       <label >Ville</label>
       <input type="text" name="fin" class="form-control" disabled value="{{ $fiche->libelle }}">
     </div>
     <div class="form-group">
       <label >Adresse </label>
       <input type="text" name="debut" class="form-control" disabled value="{{$fiche->adresse }}">
     </div>
     <div class="form-group">
       <label >Date Debut</label>
       <input type="text" name="fin" class="form-control" disabled value="{{ $fiche->date_debut }}">
     </div>
     <div class="form-group">
       <label >Date Fin</label>
       <input type="text" name="debut" class="form-control" disabled value="{{$fiche->date_fin }}">
     </div>
   
   
         <?php $debut = $fiche->date_debut;
         $fin = $fiche->date_fin;

         $datetime1 = new DateTime($debut);
         $datetime2 = new DateTime($fin);
         $interval = $datetime1->diff($datetime2);
         $days = $interval->format("%d");
         ?>
        <div class="form-group">
       <label >Nombre Jours</label>
       <input type="text" name="debut" class="form-control" disabled value="<?php echo $days;?>">
     </div>
     <div class="form-group">
       <label >Montant Total</label>
       <input type="text" name="fin" class="form-control" disabled value="{{$fiche->montant_reservation}}  DH">
     </div>
     <div class="form-group">
       <label >Telephone</label>
       <input type="text" name="fin" class="form-control" disabled value="{{ $fiche->tel }}">
     </div>
     <div class="form-group">
       <label >Assistant</label>
       <input type="text" name="fin" class="form-control" disabled value="{{ $fiche->assistant }}">
     </div>
     </div>   
   ';}
    ' </div>
     </div>
     </div>



     <footer class="main-footer">
     <strong>Copyright &copy; 2020 E-vacances.</strong>
     <div class="float-right d-none d-sm-inline-block">
       <b>Version</b> 3.0.2
     </div>
   </footer>

   </body>
   </html>
     ';
    
    $output .= '</table>';
    return $output;
   }
   
}
*/



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use DateTime;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('agendas')
   
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
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream('Reservation.pdf');
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <html style=" background-color:#f4f6f9;">
     <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Liste des reservations </title>

     <style>
         body{
             font-family: Arial;
            
         }

         
     </style>
 </head><body style="widht:120%">
     <h3 align="center" style="color:red">Liste des reservations </h3>
     <table width="95%" style="border-collapse: collapse; border: 0px; margin-left:-10%">
     <thead style="background-color:#212529;color:#fff">
      <tr>
      <th style="border: 1px solid; padding:12px;" width="5%">Id </th>
      <th style="border: 1px solid; padding:12px;" width="5%">Ville</th>
      <th style="border: 1px solid; padding:12px;" width="10%">Adresse </th>
      <th style="border: 1px solid; padding:12px;" width="8%"> Debut</th>
      <th style="border: 1px solid; padding:12px;" width="8%"> Fin </th>
      <th style="border: 1px solid; padding:12px;" width="5%">Jours</th>
      <th style="border: 1px solid; padding:12px;" width="10%">Montant</th>
      <th style="border: 1px solid; padding:12px;" width="10%">Telephone</th>
      <th style="border: 1px solid; padding:12px;" width="15%">Assistant</th>
                            
   </tr>
   </thead>
     ';  
     foreach($customer_data as $customer)
     {
       $debut = $customer->date_debut;
      $fin = $customer->date_fin;

      $datetime1 = new DateTime($debut);
      $datetime2 = new DateTime($fin);
      $interval = $datetime1->diff($datetime2);
      $days = $interval->format("%d");
      
      $output .= '
      <tbody>
      <tr style="background-color:#e8e9ec">
       <td style="border: 1px solid; padding:12px;">'.$customer->id_reservation.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->libelle.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->adresse.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->date_debut.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->date_fin.'</td>
       <td style="border: 1px solid; padding:12px;">'.$days.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->montant_reservation.' DH</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->tel.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->assistant.'</td>
      </tr>
      </tbody>
      ';
     }
     $output .= '</table>
     
     </body>
     <html>
     ';
     return $output;
    }
}