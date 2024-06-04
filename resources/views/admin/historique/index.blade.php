@extends('en_tete.entete_administrateurs')

@section('contenu')
<div class="container">
   

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Administrateur</th>
                <th>Action</th>
                <th>Date </th>
                <th>Heure</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->created_at->format('d/m/Y') }}</td> 
                <td>{{ $log->created_at->format('H:i:s') }}</td>                 
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
</div>
@endsection
