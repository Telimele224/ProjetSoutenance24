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

    <div class="bgnc-10 br-sm p-sm-30 p-10">
        <span class="heading-five mb-sm-30 mb-3">La liste des horaires des médecins</span>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-info">
                    <tr>
                        <th>No</th>
                        <th>Médecin</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horaires as $index => $horaire)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $horaire->medecin->user->nom }} {{ $horaire->medecin->user->prenom }}</td>
                        @foreach(['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'] as $jour)
                            <td>
                                @if($horaire->{$jour.'_debut'} && $horaire->{$jour.'_fin'})
                                    {{ date('H:i', strtotime($horaire->{$jour.'_debut'})) }} - {{ date('H:i', strtotime($horaire->{$jour.'_fin'})) }}
                                @endif
                            </td>
                        @endforeach
                        <td class="p-10">
                            <span class="d-center gap-3">
                                <a href="{{ route('admin.horaires.edit', ['horaire' => $horaire]) }}">
                                    <i class="edit-icon text-info tpc-2 fa-solid fa-pen-to-square icon-bg"></i>
                                </a>

                                <a href="">
                                <form method="POST" action="{{ route('admin.horaires.destroy', ['horaire' => $horaire->id]) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire?')">
                                        <i class="delete-icon tpc-2 fa-solid fa-trash-can icon-bg"></i>
                                    </button>
                                </form>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
