<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrapp/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Document</title>

      <!-- Vos fichiers CSS personnalisés -->
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/customizeBootstrap.css')}}"> --}}
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/style.css')}}"> --}}
      {{-- <link rel="stylesheet" href="{{ asset('assets1/css/modal.css')}}"> --}}

    
</head>
<body>
<div class="row " style="background-color: rgba(8, 164, 166, 0.852)">
    <div class="text-center p-3 mb-1">
        <h5>Plateforme de prise de rendez-vous</h5>

    </div>
   
</div>



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
