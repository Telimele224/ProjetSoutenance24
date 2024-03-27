
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des medecins</title>
</head>
<body>

    <h1>Liste des medecins</h1>

    <div class="e-table px-5 pb-5">
        <div class="table-responsive table-lg">
            <table class="table border-top table-bordered mb-0 text-nowrap">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Specialite</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $k=>$user)
                    @if( $user->role ==='medecin')
                    <tr class="user-list">
                            <td class="text-nowrap align-middle">{{$user->nom}}</td>
                            <td class="text-nowrap align-middle">{{$user->prenom}}</td>
                            <td class="text-nowrap align-middle">{{$user->email}}</td>
                            <td class="text-nowrap align-middle">{{$user->telephone}}</td>
                            <td class="text-nowrap align-middle">{{$user->adresse}}</td>
                            <td class="text-nowrap align-middle">{{$user->medecin->specialite}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</body>
</html>
