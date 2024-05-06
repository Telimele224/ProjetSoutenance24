
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrapp/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Hopital Regional de Labé</title>
    <link rel="icon" href="{{asset('assets/build/assets/images/brand/favicon.ico')}}" type="image/x-icon">
    <!-- ICONS CSS -->
    <link href="{{asset('assets/build/assets/iconfonts/icons.css')}}" rel="stylesheet">
    <!-- Main Theme Js -->
    <script src="{{asset('assets/build/assets/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/plugin/style.css')}}">

    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}" media="print">


    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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

      <!-- Vos fichiers CSS personnalisés -->
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/customizeBootstrap.css')}}"> --}}
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/style.css')}}"> --}}
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/modal.css')}}"> --}}


</head>

<body>
    {{-- <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-lg-center">ESPACE DE PRISE DE RENDEZ VOUS</h3>
                </div>


                </div>
            </div>
        </div>
    </div> --}}

<div class="contenair">
    @yield('contenu')
</div>

<script>
    // Si un message de session flash avec un délai est présent, masquez-le après quelques secondes
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, {{ Session::get('message_timeout', 0) }}5000); // Le délai est en millisecondes, donc multipliez par 1000 pour le convertir en secondes
</script>

</body>
</html>
