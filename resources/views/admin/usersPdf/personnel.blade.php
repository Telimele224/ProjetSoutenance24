
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des personnels</title>
</head>
<body>

    <h1>Liste des personnels</h1>

    <div class="e-table px-5 pb-5">
        <div class="table-responsive table-lg">
            <table class="table border-top table-bordered mb-0 text-nowrap">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Poste</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($personnels as $k=>$personnel)

                    <tr class="user-list">
                            <td class="text-nowrap align-middle">{{$personnel->nom}}</td>
                            <td class="text-nowrap align-middle">{{$personnel->prenom}}</td>
                            <td class="text-nowrap align-middle">{{$personnel->poste}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
