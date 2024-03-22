@extends('en_tete.entete_administrateurs')


@section('contenu')

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                        <div class="input-group">
                             <!-- Formulaire de recherche -->
                        <form action="" method="GET" class="mb-3">
                            <div class="input-group row">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" placeholder="Rechercher par numéro de téléphone ou code">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary text-end"><i class="bi bi-search text-muted"></i></button>
                                </div>

                            </div>
                        </form>
                            {{-- <input type="text" class="form-control mr-2" name="search" placeholder="Recherche par email" aria-describedby="button-addon2">
                            <button class="btn border" type="button" id="button-addon2"><i class="bi bi-search text-muted"></i></button> --}}
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <ul class="nav item2-gl-menu float-end my-2" role="tablist">
                            <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style" aria-selected="true" role="tab"><i class="fa fa-list"></i></a></li>
                            <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid" aria-selected="false" role="tab" tabindex="-1"><i class="fa fa-th"></i></a></li>
                            <ol class="breadcrumbn gap-3 ml-3 ">
                                <li class="breadcrumb-item"><span><a href="{{route('admin.medecin.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | medecin</a></span></li>
                            </ol>
                        </ul>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="tab-content mb-5">
        <div class="tab-pane active show" id="tab-11" role="tabpanel">
            <div class="card">
                <div class="card-header border-bottom-0 px-5">
                    <h2 class="card-title">1 - 30  Medecins</h2>
                    <div class="page-options ms-auto">
                        <select class="form-control select2 w-100">
                            <option value="asc">Dernièrè Liste</option>
                            <option value="desc">Vielles liste</option>
                        </select>
                    </div>
                </div>
                <div class="e-table px-5 pb-5">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Genre</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Spécialite</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $k=>$user)
                                @if( $user->role ==='medecin')
                                <tr class="user-list">
                                        <td class="text-nowrap align-middle">{{$user->nom}}</td>
                                        <td class="text-nowrap align-middle">{{$user->prenom}}</td>
                                        <td class="text-nowrap align-middle">{{$user->genre}}</td>
                                        <td class="text-nowrap align-middle">{{$user->email}}</td>
                                        <td class="text-nowrap align-middle">{{$user->telephone}}</td>
                                        <td class="text-nowrap align-middle">{{$user->adresse}}</td>
                                        <td class="text-nowrap align-middle">
                                            @if ($user->medecin)
                                              {{$user->medecin->specialite}}
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-list">
                                                <button class="btn btn-sm btn-icon btn-info-light rounded-circle" data-target="#user-form-modal" data-bs-toggle="" type="button"><i class="bi bi-pencil-square"></i></button>
                                                <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle" type="button"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!-- COL-END -->
        </div>
        <div class="tab-pane" id="tab-12" role="tabpanel">

            <div class="row">
                @foreach ($users as $k=>$user)
                @if( $user->role ==='medecin')
                <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                    <div class="card user-card">
                        <div class="user-image">
                            <img src="{{asset('assets/build/assets/images/media/files/04.jpg')}}" class="card-img-top" alt="...">
                            <span class="avatar avatar-xl rounded-circle">
                                <img src="{{asset('storage/'.$user->photo)}}" alt="" class="rounded-circle">
                            </span>
                        </div>
                        <div class="card-body text-center">
                            <div class="text-center">
                                <div class="dropdown text-end">
                                    <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{route('chatify')}}">
                                            <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                        </a>
                                        <a class="dropdown-item" href="{{route('chatify')}}">
                                            <i class="fe fe-eye me-2 d-inline-flex"></i> Voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="profile" class="fs-18 fw-bold d-block">{{$user->nom}} {{$user->prenom}}</a>
                            @if($user->medecin)
                            <p class="text-muted text-center">{{$user->medecin->specialite}}</p>
                            @endif

                            <span class="text-muted mx-3"><i class="fe fe-map-pin mx-2 text-secondary ">{{$user->adresse}}</i></span>
                            <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+224 {{$user->telephone}}</span>
                            <div class="text-center mt-3">
                                <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button" href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button" href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                <a class="btn btn-sm bg-success-transparent rounded-circle" role="button" href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>

    </div>
</div>
{{$users->links()}}


@endsection


