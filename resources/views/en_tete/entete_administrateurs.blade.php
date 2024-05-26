<!doctype html>
    <html lang="fr" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" loader="disable">
   <!-- Mirrored from laravelui.spruko.com/vexel/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Dec 2023 00:59:14 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->
   <head>
      <!-- META DATA -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="vexel – Laravel Bootstrap 5  Admin & Dashboard Template">
      <meta name="author" content="Spruko Technologies Private Limited">
      <meta name="keywords" content="admin panel template, admin dashboard template, admin panel, bootstrap admin template, dashboard, laravel, bootstrap dashboard, admin dashboard, admin panel laravel template, laravel framework, admin laravel, laravel admin panel.">
      <!-- TITLE -->
      <title>Hopital Regional de Labé | Admin &amp; Tableau de bord </title>
       <!-- Favicon -->
       <link rel="icon" href="{{asset('assets/build/assets/images/brand/favicon.ico')}}" type="image/x-icon">
       <!-- ICONS CSS -->
       <link href="{{asset('assets/build/assets/iconfonts/icons.css')}}" rel="stylesheet">
       <!-- Main Theme Js -->
       <script src="{{asset('assets/build/assets/main.js')}}"></script>
       <link rel="stylesheet" href="{{asset('assets/plugin/style.css')}}">

       <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


       <!-- Scripts -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])
   </head>
   <body class="app sidebar-mini">
      @include('en_tete.couleur')

      <div class="page">
         <div class="page-main">
            @include('en_tete.navigation_en_haut')
            <!--Main-Sidebar Onglets de navigation-->
            @include('onglets_navigation.onglet_navigation')
            <!-- End Main-Sidebar onglet de navigation fin-->
            <!--app-content open-->
            <div class="main-content app-content mt-0">
               <!-- PAGE-HEADER -->
               @include('connexion_en_cours.titre')
               <!-- PAGE-HEADER END -->
               <!-- CONTAINER -->
               @yield('contenu')
            </div>
            <!-- END APP-CONTENT -->
         </div>

         <!-- Footer opened -->
         <footer class="footer">
            <div class="container">
               <div class="row align-items-center flex-row-reverse">
                  <div class="col-md-12 col-sm-12 text-center">
                     Copyright © <span id="year"></span> <a href="javascript:void(0);">IST-MAMOU GENIE-INFO P15 G-33 -</a>.Tous droits reservés. <span
                        class="fa fa-heart text-danger"></span>
                  </div>
               </div>
            </div>
         </footer>
         <!-- End Footer -->
      </div>
      <!-- Scroll To Top -->
      <div class="scrollToTop">
         <span class="arrow"><i class="fa fa-angle-up fs-20"></i></span>
      </div>


     <!-- Popper JS -->
     <script src="{{asset('assets/build/assets/libs/%40popperjs/core/umd/popper.min.js')}}"></script>
     <!-- Bootstrap JS -->
     <script src="{{asset('assets/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <!-- Node Waves JS-->
     <script src="{{asset('assets/build/assets/libs/node-waves/waves.min.js')}}"></script>
     <script src="{{asset('assets/build/assets/js/calendar.js')}}"></script>
     {{-- pour le calendrier --}}
     <script src="{{ asset('js/fullcalendar.min.js') }}"></script>

     <script src="{{asset('assets/build/assets/show-password.js')}}"></script>


     <!-- Simplebar JS -->
     <script src="{{asset('assets/build/assets/libs/simplebar/simplebar.min.js')}}"></script>
     <link rel="modulepreload" href="{{asset('assets/build/assets/simplebar-635bad04.js')}}" />
     <script type="module" src="{{asset('assets/build/assets/simplebar-635bad04.js')}}"></script>
     <!-- Color Picker JS -->
     <script src="{{asset('assets/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
     <!-- INTERNAL APEXCHART JS -->
     <script src="{{asset('assets/build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
     <!-- Color Picker JS -->
     <script src="{{asset('assets/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
     <!-- Checkbox selectall JS -->
     <link rel="modulepreload" href="{{asset('assets/build/assets/checkbox-selectall-e4a9d358.js')}}" />
     <script type="module" src="{{asset('assets/build/assets/checkbox-selectall-e4a9d358.js')}}"></script>
     <!-- INTERNAL INDEX JS -->
     <link rel="modulepreload" href="{{asset('assets/build/assets/index1-ad56c451.js')}}" />
     <script type="module" src="{{asset('assets/build/assets/index1-ad56c451.js')}}"></script>
     <!-- Sticky JS -->
     <script src="{{asset('assets/build/assets/sticky.js')}}"></script>
     <!-- APP JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="modulepreload" href="{{asset('assets/build/assets/modal-e016f475.js')}}" /><script type="module" src="build/assets/modal-e016f475.js"></script>

     <link rel="modulepreload" href="{{asset('assets/build/assets/app-6df099bd.js')}}" />
     <link rel="modulepreload" href="{{asset('assets/build/assets/defaultmenu-7feba3a7.js')}}" />
     <script type="module" src="{{asset('assets/build/assets/app-6df099bd.js')}}"></script>
     <!-- END SCRIPTS -->
   </body>
   <!-- Mirrored from laravelui.spruko.com/vexel/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Dec 2023 01:01:17 GMT -->
</html>
