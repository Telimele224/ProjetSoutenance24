@extends('en_tete.entete_medecin')
@section('contenu')

<div class="row">
    <div class="col-xxl-6">
        <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
            <h1 class="page-title">Patients </h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Consulter | Patient</a></span></li>
                </ol>
            </div>
        </div>
       <div class="row">

          <div class="card-body">
            <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email </th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                            </tr>
                        </thead>
                        @foreach ($users as $k => $user)
                        @if($user->role=== "patient")
                        <tbody>
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$user->nom}}</td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telephone}}</td>
                                <td>{{$user->adresse}}</td>
                            </tr>
                        </tbody>
                        @endif
                    @endforeach
                    </table>
                </div>
        </div>
       </div>
    </div>
 </div>

{{$users->links()}}

@endsection


