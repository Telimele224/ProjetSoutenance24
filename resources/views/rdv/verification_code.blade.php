<!-- Contenu de la vue verification_code.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérification du code de validation</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('patients.verify_code') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="verification_code" class="col-md-4 col-form-label text-md-right">Code de validation</label>

                            <div class="col-md-6">
                                <input id="verification_code" type="text" class="form-control" name="verification_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Vérifier le code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
