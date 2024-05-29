<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation de Rendez-vous</title>
</head>
<body>
    <h1>Annulation de votre Rendez-vous</h1>
    <p>Bonjour {{ $patientUser->nom }} {{ $patientUser->prenom }},</p>
    <p>Nous regrettons de vous informer que votre rendez-vous prévu le {{ $rendezVous->dateRdv }} à {{ $rendezVous->heure }} a été annulé.</p>
    <p>Raison de l'annulation : {{ $raisonAnnulation }}</p>
    <p>Merci de votre compréhension.</p>
    <p>Cordialement,</p>
    <p>Hopital Régional de Labé</p>
</body>
</html>
