<x-mail::message>
    <img src="{{ asset('Image/Logo HRL.png') }}" alt="Logo de l'hôpital" style="display: block; margin: 0 auto; width: 200px;">
# Bonjour , Un nouveau message du Conctac Us

<h3>Nom Complet: {{$data['name']}}</h3>
<h3>Email: {{$data['email']}}</h3>
<h3>Téléphone: {{$data['telephone']}}</h3>
<h3>Message: {{$data['message']}}</h3>


Cordiallement,<br>
{{ config('app.name') }}
</x-mail::message>
