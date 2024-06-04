
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrapp/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Hopital Regional de Labé</title>
    <link rel="icon" href="{{asset('logo/LogoHRL.png')}}" type="image/x-icon">
    <!-- ICONS CSS -->
    <link href="{{asset('assets/build/assets/iconfonts/icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
    <!-- Main Theme Js -->
    <script src="{{asset('assets/build/assets/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/plugin/style.css')}}">

    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}" media="print">


    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link rel='stylesheet' id='bootstrap-css' href="{{asset('assets/wp-content/themes/medidoc/css/bootstrap.min68b3.css?ver=1')}}" media='all' /> --}}

    <!-- Choices JS -->
    <script src="{{asset('assets/build/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <!-- Simplebar Css -->
    <link href="{{asset('assets/build/assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{asset('assets/build/assets/libs/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/build/assets/libs/%40simonwep/pickr/themes/nano.min.css')}}">
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{asset('assets/build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
    <!-- APP CSS & APP SCSS -->
    <link rel="preload" as="style" href="{{asset('assets/build/assets/app-e29e56ca.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/build/assets/app-e29e56ca.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/select2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2.min.css')}}">

</head>

<body>

    <div class="row " style="background-color: #215e8c">
        <div class="col-sm-4 ">
            <img src="{{asset('logo/SIDEBARE2.png')}}" width="230" height="70" alt="">
        </div>
        <div class="text-center p-3 mb-1 col-sm-6">
            <h3 style="color: white">ESPACE DE PRISE DE RENDEZ-VOUS</h3>
        </div>

    </div>


   
<div class="contenair">
    @yield('contenu')
</div>

<script>
    // Faire disparaître les alertes après 20 secondes
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // Attendre que la transition se termine
        }
    }, 10000); // 20 secondes
</script>

<script>
    // Si un message de session flash avec un délai est présent, masquez-le après quelques secondes
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, {{ Session::get('message_timeout', 0) }}5000); // Le délai est en millisecondes, donc multipliez par 1000 pour le convertir en secondes
</script>

</body>
</html>
