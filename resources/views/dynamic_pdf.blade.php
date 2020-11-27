
  
@extends('layout')

@section('title')
  
    
@endsection

@section('body')
  <div class="container">
   <h3 align="center"></h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4 style="color:green">Liste des Reservations</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Generer PDF</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
     <thead class="thead-dark">
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
      <th style="border: 1px solid; padding:12px;" width="15%">Imprimer</th>
                            
   </tr>
   </thead>
     </thead>
     <tbody>
     @foreach($customer_data as $customer)
     <?php $debut = $customer->date_debut;
         $fin = $customer->date_fin;

         $datetime1 = new DateTime($debut);
         $datetime2 = new DateTime($fin);
         $interval = $datetime1->diff($datetime2);
         $days = $interval->format("%d");
         ?>
      <tr>
       <td>{{ $customer->id_reservation }}</td>
       <td>{{ $customer->libelle }}</td>
       <td>{{ $customer->adresse }}</td>
       <td>{{ $customer->date_debut }}</td>
       <td>{{ $customer->date_fin }}</td>
       <td><?php echo $days;?></td>
       <td>{{ $customer->montant_reservation }}</td>
       <td>{{ $customer->tel }}</td>
       <td>{{ $customer->assistant }}</td>
       <td>
                                      <a href="{{ url('dynamic/'.$customer->id.'/pdf') }}"
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

  @endsection
