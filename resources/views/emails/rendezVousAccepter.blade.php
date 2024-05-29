<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation de Rendez-vous</title>
</head>
<body>
    <h1>Confirmation de votre Rendez-vous</h1>
    <p >Bonjour <span class="bold ">{{ $user->nom }} {{ $user->prenom }},</span></p>
    <p>Nous tenons a   vous informer que votre rendez-vous prévu le {{ $rdv->dateRdv }} à {{ $rdv->heure }} a été accepté.</p>
    <p>Merci de votre confiance.</p>
    <p>Cordialement,</p>
    <p>Hopital Régional de Labé</p>
</body>
</html>
