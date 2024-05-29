@extends('en_tete.entete_patient')

@section('contenu')
<div class="card">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          DOSSIER MEDICAL  :
                        </font></font></div>
                    </div>

                    <div class="card-body">
                        <div class="p-5">
                            <div class="card-header">
                                <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                 INFORMATION DU MEDECIN  :
                                </font></font></div>
                            </div>
                            <div class=" card-header row gy-4">
                                @if ($consultation->rdv && $consultation->rdv->medecin)
                                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                        <h4><strong class="text-uppercase">Nom et Prenom :</strong> {{ $consultation->rdv->medecin->user->nom }} {{ $consultation->rdv->medecin->user->prenom }}</h4>
                                    </div>
                                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                        <h4><strong class="text-uppercase">Spécialité :</strong> {{ $consultation->rdv->medecin->specialite }}</h4>
                                    </div>
                                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                        <h4><strong class="text-uppercase">Téléphone :</strong>{{ $consultation->rdv->medecin->user->telephone }}</h4>
                                    </div>
                                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                        <h4><strong class="text-uppercase">Adresse :</strong> {{ $consultation->rdv->medecin->user->adresse }}</h4>
                                    </div>
                                @else
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Détails du médecin</h5>
                                            <p>Aucun médecin associé à ce rendez-vous.</p>
                                        </div>
                                    </div>
                                 @endif

                            </div>
                            <div class="card-header mt-3">
                                <div class="card-title text-uppercase"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                  Détail du dossier médicalL :
                                </font></font></div>
                            </div>

                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong"style="font-weight: bold">Motif :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value=" {{ $consultation->motif }}">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong"style="font-weight: bold">Type de Consultation :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value="  {{ $consultation->typeConsultation->name ?? 'N/A' }}">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong"style="font-weight: bold">Resultat :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value="  {{ $consultation->resultat }}">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong"style="font-weight: bold">Exament Complementaire :</label>
                                    <textarea disabled class="form-control rounded-3" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="1">{{ $consultation->examen_complementaire }}</textarea>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong" style="font-weight: bold"style="font-weight: bold">Suivis :</label>
                                    <textarea disabled class="form-control rounded-3" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="1"> {{ $consultation->suivi_recommande }}</textarea>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong" style="font-weight: bold">Note du Medecin :</label>
                                    <textarea disabled class="form-control rounded-3" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="1"> {{ $consultation->note_medecin }}</textarea>
                                </div>
                                <div class=" col-sm-12">
                                    <label for="motif" class="form-label strong " style="font-weight: bold">Statut :</label>
                                    <textarea disabled class="form-control rounded-3" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="1">  {{ $consultation->status }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-header mt-3">
                            <div class="card-title text-uppercase"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Inforamtion de la prescriptions
                            </font></font></div>
                        </div>

                            @if ($consultation->ordonnances->isNotEmpty())
                            <ul>
                            <div class=" card-header row gy-4">
                                @foreach ($consultation->ordonnances as $ordonnance)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong text-uppercase"style="font-weight: bold">Nom du médicament  :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value=" {{ $ordonnance->name }}">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong text-uppercase"style="font-weight: bold">Posologie :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value=" {{ $ordonnance->posologie }}">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="motif" class="form-label strong text-uppercase"style="font-weight: bold">Mode d'utilisation  :</label>
                                    <input disabled type="text" class="form-control rounded-2 text-center border-0 js-states " id="motif" name="motif" placeholder="Motif de la consultation" value=" {{ $ordonnance->mode_utilisation }}">
                                </div>
                                @endforeach
                            </div>
                            </ul>
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('patients.Dossier_medical.index') }}" class="btn btn-primary">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
