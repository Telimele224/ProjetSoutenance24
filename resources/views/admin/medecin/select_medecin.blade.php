<!-- resources\views\horaire\select_medecin.blade.php -->

@extends('en_tete.entete_administrateurs')

@section('contenu')

<div class="row">
    @if(Session::has('success'))
    <div class="alert alert-success " style="height: 50px;margin-bottom:15px">
      {{Session::get('success')}}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-danger " style="height: 50px;margin-bottom:15px">
      {{Session::get('error')}}
    </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info">
                Sélectionner un médecin
            </div>
            <div class="card-body">
                <form action="{{ route('admin.emplois.selectMedecin') }}" method="get">
                    @csrf

                    <div class="form-group col-sm-6 mb-2">
                        <label for="id_medecin">Médecin</label>
                        <select name="id_medecin" class="form-control">
                            @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}" {{ old('id_medecin') == $medecin->id ? 'selected' : '' }}>
                                    {{ $medecin->user->nom }} {{ $medecin->user->prenom }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_medecin')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-sm-3 mb-2">
                        <label for="submit">Action</label>
                        <button class="btn btn-success form-control" name="submit">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
