@extends('en_tete.entete_administrateurs')

@section('contenu')
<div class="row">
    @foreach ($temoignages as $k => $temoignage)
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$temoignage->user->name}} </h3>
                <div class="card-options">
                    <label class="custom-switch m-0">
                        <a href="{{route('admin.temoignage.edit' , $temoignage)}}">
                            <input type="checkbox" value="1" class="custom-switch-input" {{$temoignage->publier ? 'checked' : ''}}>
                            <span class="custom-switch-indicator"></span>
                        </a>
                    </label>
                </div>
            </div>
            <div class="card-body">
                <p>{{strlen($temoignage->contenu) > 100 ? substr($temoignage->contenu, 0, 100) . '  ...' : $temoignage->contenu }}</p>
                <div class="avatar-list">
                    <span class="avatar rounded-circle bg-blue">
                        <a href="{{route('admin.temoignage.edit', $temoignage)}}" class="text-decoration-none text-default">
                            <i class="fa fa-edit fs-15"></i>
                        </a>
                    </span>
                    <span class="avatar rounded-circle bg-danger" data-bs-toggle="modal" data-bs-target="#delete{{$k}}">
                        <i class="bi bi-trash fs-15"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete{{$k}}">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5>SUPPRESION DE TEMOIGNAGE</h5>
                    <p class="">Voulez vous vraiment supprimer le temoignage</p>
                    <div class="card shadow-none text-start bg-secondary-transparent border-start border-secondary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <span class="me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 24 24">
                                        <path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z">
                                        </path>
                                        <circle cx="12" cy="17" r="1" fill="#e62a45"></circle>
                                        <path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path>
                                    </svg>
                                </span>
                                <div>
                                    <p class="mb-0">Attention !!!</p>
                                    <p class="card-text">En cliquant sur supprimer, le temoignage serras supprimer definitivement!!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-list">
                        <form id="delete-temoignage-form" method="POST" action="{{ route('admin.temoignage.destroy',$temoignage) }}">
                            @csrf
                            @method('delete')
                            <p class="confirmation-text"></p>
                            <!-- Champ caché pour stocker l'identifiant du temoignage -->
                            <input type="hidden" name="temoignage_id" class="temoignage-id">
                            <div class="btn-list">
                                <button class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">Supprimer | Temoignage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


{{$temoignages->links()}}
@endsection
