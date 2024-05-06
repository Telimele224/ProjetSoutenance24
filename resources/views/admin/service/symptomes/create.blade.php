@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-content">
    <div class="row">
        <div class="card">

            <div class="card-header">

                <h6>Ajouter un Symptome</h6>
            </div>
       
        
        <div class=" card-body bgnc-10 br-sm p-sm-30 p-10 col-md-9">
            <form action="{{ route('admin.symptomes.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row gy-20">
                    <div class="mb-20 form-group  mb-2">
                        <label class="mb-10 fw-semibold">Nom <span class="tsc-1">*</span></label>
                        <div class="form-input-box">
                            <i class="fa-solid fa-user-nurse form-icon"></i>
                            <input type="text" name="nom" placeholder="Entrer le nom du symptôme" value="{{ old('nom') }}" class="form-control " required>
                            @error('nom')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Ajoutez ici d'autres champs pour la création de symptômes -->

                    <div class="mb-20 form-group col-sm-12 mb-2">
                        <button type="submit" class="btn btn-success form-control text-center" name="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
