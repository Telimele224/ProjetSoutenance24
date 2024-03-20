{{-- <!-- Horaires de consultation -->
<div id="horairesContainer">
    @php
        // Obtenir la date d'aujourd'hui
        $aujourdhui = Carbon\Carbon::now();
        // Liste des jours de la semaine en français
        $joursSemaine = ['lundi' => 'Lundi', 'mardi' => 'Mardi', 'mercredi' => 'Mercredi', 'jeudi' => 'Jeudi', 'vendredi' => 'Vendredi', 'samedi' => 'Samedi', 'dimanche' => 'Dimanche'];
        $joursDisponibles = [];
    @endphp
    @foreach ($joursSemaine as $jour => $nomJour)
        @if (isset($horairesParJour[$jour]) && count($horairesParJour[$jour]) > 0)
            @php
                // Exclure le jour actuel de la liste des jours disponibles
                if ($aujourdhui->dayOfWeek !== array_search($jour, $joursSemaine) + 1) {
                    $joursDisponibles[$jour] = $nomJour;
                }
            @endphp
        @endif
    @endforeach

    @foreach ($joursDisponibles as $jour => $nomJour)
        <div class="card mb-3">
            <!-- Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <span>{{ $nomJour }} - {{ $horairesParJour[$jour][0]->format('Y-m-d') }}</span>
                    <button class="btn btn-link toggle-body" data-toggle="collapse" data-target="#body{{ $loop->index }}" aria-expanded="false" aria-controls="body{{ $loop->index }}">
                        <i class="fas fa-chevron-down"></i> 
                    </button>
                </div>
            </div>
            <!-- Body -->
            <div class="card-body collapse" id="body{{ $loop->index }}">
                <div class="row">
                    @foreach ($horairesParJour[$jour] as $key => $horaire)
                        @if ($key < 6) <!-- Limite à 6 suggestions -->
                            <div class="col-md-4">
                                <!-- Formulaire caché -->
                                <form action="{{ route('choisirHeure') }}" id="hiddenForm_{{ $loop->parent->index }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="medecinId" value="{{ $medecin->id }}">
                                    <input type="hidden" name="date" id="hiddenDateRdv_{{ $loop->index }}" value="{{ $horaire->format('Y-m-d') }}">
                                    <input type="hidden" name="heure" id="hiddenHeure_{{ $loop->index }}" value="{{ $horaire->format('H:i') }}">
                                    <input type="hidden" name="jour" id="hiddenJour_{{ $loop->index }}" value="{{ $jour }}">
                                    <button onclick="handleSelection('{{ $horaire->format('Y-m-d') }}', '{{ $horaire->format('H:i') }}', '{{ $jour }}')" class="btn btn-outline-secondary mb-1 w-100">
                                        {{ $horaire->format('H:i') }}
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div> --}}


{{-- protected function separerHorairesParJour($horaires)
{
    $horairesParJour = [];

    // Obtenez la liste des jours de la semaine à partir d'aujourd'hui
    $joursSemaine = collect([
        'lundi' => Carbon::now()->startOfWeek()->addDay(),
        'mardi' => Carbon::now()->startOfWeek()->addDay(1),
        'mercredi' => Carbon::now()->startOfWeek()->addDay(2),
        'jeudi' => Carbon::now()->startOfWeek()->addDay(3),
        'vendredi' => Carbon::now()->startOfWeek()->addDay(4),
        'samedi' => Carbon::now()->startOfWeek()->addDay(5),
        'dimanche' => Carbon::now()->startOfWeek()->addDay(6),
    ]);

    foreach ($horaires as $horaire) {
        foreach ($joursSemaine as $jour => $date) {
            if ($horaire->{$jour . '_debut'} && $horaire->{$jour . '_fin'}) {
                // Le médecin travaille ce jour-là
                $debut = Carbon::parse($horaire->{$jour . '_debut'});
                $fin = Carbon::parse($horaire->{$jour . '_fin'});

                // Ajoutez les horaires disponibles pour ce jour
                for ($heure = $debut; $heure->lt($fin); $heure->addMinutes(30)) {
                    $horairesParJour[$jour][] = $date->copy()->setTime($heure->hour, $heure->minute);
                }
            }
        }
    }

    return $horairesParJour;
} --}}


