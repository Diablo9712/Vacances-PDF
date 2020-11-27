@extends('layout')

  @section('body')

      <div class="row">
          <div class="col-lg-12">
              <div class="card">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message')}}</div>
                @endif
                  <div class="card-header">
                      <h3 class="card-title">Liste des Reservations
                      </h3>
                     
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table class="table table-bordered table table-striped">
                          <thead class="thead-dark">
                          <tr>
                              <th>Id Reservation</th>
                              <th>Ville</th>
                              <th>Adresse Centre</th>
                              <th>Date Debut</th>
                              <th>Date Fin </th>
                              <th>Nombre Jours</th>
                              <th>Montant</th>
                              <th>Telephone</th>
                              <th>Assistant</th>
                              <th>Afficher </th>
                              <th>Imprimer </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($data as $fiche)
                         <?php $debut = $fiche->date_debut;
                         $fin = $fiche->date_fin;

                         $datetime1 = new DateTime($debut);
                         $datetime2 = new DateTime($fin);
                         $interval = $datetime1->diff($datetime2);
                         $days = $interval->format('%d');
                         ?>
                              <tr>
                            
                              <td>{{$fiche->id_reservation }}</td>
                              <td>{{$fiche->libelle }}</td>
                              <td>{{$fiche->adresse }}</td>
                              <td>{{$fiche->date_debut }}</td>
                              <td>{{$fiche->date_fin }}</td>
                              <td><?php echo $days;?></td>
                              <td>{{$fiche->montant_reservation}}</td>
                              <td>{{$fiche->tel }}</td>
                              <td>{{$fiche->assistant }}</td>   
                              <td>
                                      <a href="{{ url('fiche/'.$fiche->id.'/affiche') }}"
                                         class="btn btn-sm btn-success"
                                      >
                                          Afficher
                                      </a>                    
                     
                                  </td>  

                                    <td>
                                      <a href="{{ url('dynamic/'.$fiche->id.'/pdf') }}"
                                         class="btn btn-sm btn-primary"
                                      >
                                         Imprimer
                                      </a>                    
                     
                                  </td>                        
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>

              </div>
          </div>
      </div>

  @endsection








