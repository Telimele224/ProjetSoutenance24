@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-content">
    <div class="row">
        <div class="card">

            <div class="card-header text-uppercase">

                <h6>Ajouter un Symptome</h6>
            </div>


        <div class=" card-body ">
            <form action="{{ route('admin.symptomes.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <label class=" fw-semibold">Nom <span class=" text-secondary bolde">*</span></label>
                        <div class="form-input-box">
                            <i class="fa-solid fa-user-nurse form-icon"></i>
                            <input type="text" name="nom" placeholder="Entrer le nom du symptôme" value="{{ old('nom') }}" class="form-control " required>
                            @error('nom')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                        </div>

                    </div>

                    {{-- <div class="mb-20 form-group  mb-2">
                        <label class="mb-10 fw-semibold">Nom <span class="tsc-1 text-secondary bolde">*</span></label>
                        <div class="form-input-box">
                            <i class="fa-solid fa-user-nurse form-icon"></i>
                            <input type="text" name="nom" placeholder="Entrer le nom du symptôme" value="{{ old('nom') }}" class="form-control " required>
                            @error('nom')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                        </div>
                    </div> --}}

                    <!-- Ajoutez ici d'autres champs pour la création de symptômes -->
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class=" form-group ">
                            <button type="submit" class="btn btn-primary form-control text-center" name="submit">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
