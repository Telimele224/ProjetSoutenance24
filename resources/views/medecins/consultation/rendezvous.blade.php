@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row row-c">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row gy-4 align-items-center justify-content-around">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <select class="form-select" id="filter-select">
                            <option value="all" {{ $selectedOption == 'all' ? 'selected' : '' }}>Tous les rendez-vous</option>
                            <option value="today" {{ $selectedOption == 'today' ? 'selected' : '' }}>Aujourd'hui</option>
                            <option value="tomorrow" {{ $selectedOption == 'tomorrow' ? 'selected' : '' }}>Demain</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <form method="GET" action="{{ route('medecins.rendezvous.filter') }}" id="date-filter-form">
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" name="date" class="form-control flatpickr-input" placeholder="Select date" data-input readonly="readonly">
                                <span class="input-group-text input-group-addon" data-toggle="">
                                    <button type="button" id="calendar-button"><i class="fa fa-calendar" style="color: white"></i></button>
                                </span>
                            </div>
                            <input type="hidden" name="filter" id="filter-input">
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="btn input-group flatpickr" id="flatpickr-date">
                            <label for="imprimer">Imprimer</label>
                            <span class="input-group-text input-group-addon" data-toggle="">
                                <button type="button" id="print-button"><i class="fa fa-printer" style="color: white"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content mb-5">
        <div class="tab-pane active show" id="tab-11" role="tabpanel">
            <div class="card">
                <div class="e-table px-5 pb-5">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered mb-0 text-nowrap">
                            <thead class="p-2">
                                <tr>
                                    <th class="">No</th>
                                    <th class="">Jour</th>
                                    <th class="">Date</th>
                                    <th class="">Heure</th>
                                    <th class="">Patient</th>
                                    <th class="">Téléphone</th>
                                    <th class="">Statut</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody class="p-2">
                                @forelse ($rendezVous as $k => $rdv)
                                    @if ($rdv->patient)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{ $rdv->jour }}</td>
                                            <td>{{ $rdv->dateRdv }}</td>
                                            <td>{{ $rdv->heure }}</td>
                                            <td>P.{{ $rdv->patient->user->nom }} {{ $rdv->patient->user->prenom }}</td>
                                            <td>{{$rdv->patient->user->telephone}}</td>
                                            <td>{{$rdv->statut}}</td>
                                            <td>
                                                <div class="text-center">
                                                    @if($rdv->statut == 'consulté' && !$rdv->consultations->isEmpty())
                                                        <span class="avatar rounded-circle bg-blue-dark">
                                                            <a href="{{ route('medecins.consultation.show', $rdv->consultations->first()->id) }}"><i class="fe fe-eye fs-15"></i></a>
                                                        </span>
                                                    @else
                                                        <span class="btn btn-primary consult-btn"
                                                            data-rdv-date="{{ $rdv->dateRdv }}"
                                                            data-rdv-time="{{ $rdv->heure }}">
                                                            <a href="{{ route('medecins.consultation.create') }}" class="consult-link">Consulter</a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun rendez-vous ne correspond à la date sélectionnée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- COL-END -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterSelect = document.getElementById('filter-select');
        const dateInput = document.querySelector('#flatpickr-date input');
        const filterInput = document.getElementById('filter-input');
        const form = document.getElementById('date-filter-form');
        let initialLoad = true;

        const datePicker = flatpickr(dateInput, {
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                if (!initialLoad) {
                    form.submit();
                }
            }
        });

        const storedFilterOption = localStorage.getItem('selectedFilterOption');
        if (storedFilterOption) {
            filterSelect.value = storedFilterOption;
            updateDateFilter(storedFilterOption);
        } else {
            filterSelect.value = 'all';
        }

        filterSelect.addEventListener('change', function() {
            const selectedOption = filterSelect.value;
            localStorage.setItem('selectedFilterOption', selectedOption);
            updateDateFilter(selectedOption);
        });

        function updateDateFilter(selectedOption) {
            let dateToFilter = '';

            switch(selectedOption) {
                case 'today':
                    dateToFilter = '{{ now()->format("Y-m-d") }}';
                    break;
                case 'tomorrow':
                    dateToFilter = '{{ now()->addDay()->format("Y-m-d") }}';
                    break;
                case 'all':
                    if (!initialLoad) {
                        window.location.href = '{{ route('listerendezvous') }}';
                    }
                    return;
                default:
                    dateToFilter = '';
            }

            dateInput.value = dateToFilter;
            filterInput.value = selectedOption;

            if (!initialLoad) {
                form.submit();
            }

            initialLoad = false;
        }

        document.getElementById('calendar-button').addEventListener('click', function() {
            datePicker.open();
        });

        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });

        setTimeout(function(){
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);

        initialLoad = false;

        const consultButtons = document.querySelectorAll('.consult-btn');
        const now = new Date();

        consultButtons.forEach(button => {
            const rdvDate = button.getAttribute('data-rdv-date');
            const rdvTime = button.getAttribute('data-rdv-time');
            const rdvDateTime = new Date(`${rdvDate}T${rdvTime}`);
            const endOfDay = new Date(`${rdvDate}T23:59:59`);

            if (now < rdvDateTime || now > endOfDay) {
                button.classList.add('disabled');
                button.querySelector('.consult-link').removeAttribute('href');
                button.setAttribute('title', "La date du rendez-vous n'est pas encore arrivée ou est déjà passée");
            }
        });

        consultButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                const title = button.getAttribute('title');
                if (title) {
                    const tooltip = document.createElement('div');
                    tooltip.className = 'custom-tooltip';
                    tooltip.innerText = title;
                    document.body.appendChild(tooltip);

                    const rect = button.getBoundingClientRect();
                    tooltip.style.left = `${rect.left + window.scrollX}px`;
                    tooltip.style.top = `${rect.top + window.scrollY - tooltip.offsetHeight - 5}px`;

                    button.addEventListener('mouseleave', function() {
                        if (tooltip) {
                            tooltip.remove();
                        }
                    });
                }
            });
        });
    });
</script>

<style>
    .disabled {
        pointer-events: none;
        cursor: not-allowed;
        opacity: 0.5;
    }

    .custom-tooltip {
        position: absolute;
        background-color: rgb(3, 17, 26);
        color: white;
        padding: 5px;
        border-radius: 3px;
        z-index: 1000;
        font-size: 12px;
    }
</style>

@endsection
