@extends('layout')
@section('title' ,'Informations Reservation')
  
    

  @section('body')

      <div class="row">
          <div class="col-lg-12">
              <div class="card">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message')}}</div>
                @endif
                  <div class="card-header">
                      
                     
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="container">
                      
                     <div class="form-group">
                     
                     <a href="{{ url('fiche/') }}"
                                        class="btn btn-sm btn-primary" style="float:right"
                                     >
                                        Retour
                                     </a>
                    </div>
                          @foreach ($data as $fiche)

                          <div class="card-body">
                     
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
                         $days = $interval->format('%d');
                         ?>
                        <div class="form-group">
                       <label >Nombre Jours</label>
                       <input type="text" name="debut" class="form-control" disabled value="<?php echo $days;?>">
                     </div>
                     <div class="form-group">
                       <label >Montant Total</label>
                       <input type="text" name="fin" class="form-control" disabled value="{{ $fiche->montant_reservation }} DH">
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
                      @endforeach
                    
                      </div>
                  </div>

              </div>
          </div>
      </div>

  @endsection








