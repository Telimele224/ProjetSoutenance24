@extends('en_tete.entete_administrateurs')

@section('contenu')
    <div class="row">
        <P>LISTE DES TEMOIGNAGE PUBLIER</P>
        @foreach ($temoignages as $k => $temoignage)
        @if($temoignage->publier)
        <div class="col-md-4"> <!-- Modification de col-md-6 col-xl-4 à col-md-4 -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$temoignage->user->name}} </h3>
                    <div class="card-options">
                        <label class="custom-switch m-0">
                                <a href="{{route('admin.temoignage.edit' , $temoignage)}}">
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{strlen($temoignage->contenu) > 100 ? substr($temoignage->contenu, 0, 100) . '  ...' : $temoignage->contenu }}</p>
                    <div class="avatar-list">
                    <span class="avatar rounded-circle bg-danger" data-bs-toggle="modal"
                        data-bs-target="#delete"><i class="bi bi-trash fs-15 "></i>
                    </span>
                    </div>
                </div>

            </div>
        </div>
        @endif
        <div class="modal fade" id="delete">
            <!-- Code du modal supprimer -->
        </div>
        @endforeach
    </div>

{{$temoignages->links()}}
@endsection
