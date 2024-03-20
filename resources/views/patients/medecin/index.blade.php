@extends('en_tete.entete_patient')


@section('contenu')

<div class="row">
    <div class="col-xxl-6">
        <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
            <h1 class="page-title">la liste des  Médecins </h1>
            <div>

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
                                {{-- <th>Service</th> --}}
                                <th class="text-end">action</th>
                            </tr>
                        </thead>
                        @foreach ($users as $k => $user)
                    @if( $user->role ==='medecin')
                    <tbody>
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$user->nom}}</td>
                            <td>{{$user->prenom}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>{{$user->adresse}}</td>
                            {{-- <td>{{$medecin}}</td> --}}
                            <td ><div class="avatar-list text-end">
                                <span class="avatar rounded-circle bg-blue-dark" ><i class="fe fe-eye fs-15"></i></span>

                             </div></td>
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


