@extends('en_tete.entete_administrateurs')


@section('contenu')
<div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="row card-header ">
                <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
                    <h1 class="page-title">Nos actualite</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><span><a href="{{route('admin.actualite.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | actualite</a></span></li>
                        </ol>
                    </div>
                </div>
            </div>

                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table border text-nowrap text-md-nowrap mb-0">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Numero</th>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Date de publication</th>
                                        <th>Photo</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($actualites as $k => $actualite)
                                <tbody>

                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$actualite->titre}}</td>
                                        <td>{{$actualite->contenu}}</td>
                                        <td><h6 class="card-text"><small class="text-muted"> Publier le : {{$actualite->created_at->format('d-m-Y')}}</small></h6></td>
                                        <td><img  class="card-img-top" src="{{asset('storage/'.$actualite->avatar)}} " alt="Image"></td>
                                        <td>
                                            <div class="avatar-list text-end">
                                                <span class="avatar rounded-circle bg-blue-dark" ><a href="{{route('admin.actualite.show', $actualite)}}"><i class="fe fe-eye fs-15"></i></a></span>
                                                <span class="avatar rounded-circle bg-blue"><a href="{{route('admin.actualite.edit', $actualite)}}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a></span>
                                                <span class="avatar rounded-circle bg-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete"><i class="bi bi-trash fs-15 "></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                                <div class="modal fade" id="delete">
                                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body p-4 pb-5">
                                                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span
                                                        aria-hidden="true">&times;</span></button>
                                                <h5>SUPPRESION D'ACTUALITE</h5>
                                                <p class="">Voulez vous vraiment supprimer cette actualité</p>
                                                <div class="card shadow-none text-start bg-secondary-transparent border-start border-secondary">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <span class="me-3"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                                                                    viewBox="0 0 24 24">
                                                                    <path fill="#f07f8f"
                                                                        d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z">
                                                                    </path>
                                                                    <circle cx="12" cy="17" r="1" fill="#e62a45"></circle>
                                                                    <path fill="#e62a45"
                                                                        d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path>
                                                                </svg></span>
                                                            <div>
                                                                <p class="mb-0">Attention !!!</p>
                                                                <p class="card-text">En cliquant sur supprimer, l'actualité serras supprimer definitivement!!!
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-light" data-bs-dismiss="modal">Annuler</button>

                                                    <form id="delete-actulité-form" method="POST" action="{{ route('admin.actualite.destroy',$actualite) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <p class="confirmation-text"></p>
                                                        <!-- Champ caché pour stocker l'identifiant du service -->
                                                        <input type="hidden" name="service_id" class="service-id">
                                                        <div class="btn-list">
                                                            <button type="submit" class="btn btn-danger">Supprimer | Actualite</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </table>
                        </div>
                </div>

        </div>
    </div>


</div>

{{$actualites->links()}}
@endsection
