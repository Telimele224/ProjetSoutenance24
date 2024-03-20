
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/healthease-dashboard/healthease-dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Dec 2023 14:25:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets1/img/logo.png')}}" type="image/x-icon">
    <title>Hopitâl Regional | Labe </title>

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}

    <!-- Vos fichiers CSS personnalisés -->
    <link rel="stylesheet" href="{{ asset('assets1/css/customizeBootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets1/css/modal.css')}}"> --}}





</head>

<style>
    .dropdown-menu {
    z-index: 1000; /* Ou une valeur plus élevée si nécessaire */
}
</style>

<body class="body-bg">

    <!-- main body  -->

    <!-- preloader  -->
    <div id='preloader'>
        <svg id='loader-1'  height='210' width='550' xmlns='http://www.w3.org/2000/svg'
                xmlns:xlink='http://www.w3.org/1999/xlink'>
            <path id='loader-2' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
                d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
        </svg>
    </div>

    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div>
                <i class="fa-solid fa-x hide-menubar" id="hide-menubar"></i>
                <div class="p-xl-20 p-10 ">
                    <div class="logo pb-20">
                        <a class="d-flex align-items-center" href="index.html">
                            <img src="{{ asset('assets1/img/logo.png')}}" alt="logo">
                            <img class="ms-10 show-item lp-2" src="{{ asset('assets1/img/logo-body.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="py-20 bb-2 bt-1">
                        @if (auth()->check())
                            <a class="sidebar-user" href="javascript:void(0)">
                                <img class="rounded-circle" src="{{ asset('avatars/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->nom }}">
                                <span class="para-1b show-item ms-10">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}
                                    <p >{{ auth()->user()->roles()->pluck('name')->implode(', ') }}</p></span>
                            </a>
                            
                        @endif
                    </div>
                </div>
                <div class="side-menu">
                    <ul>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="{{ route('versHome') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-solid fa-gauge-high ms-3"></i></span>
                                <span class="me-auto">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-solid fa-user-doctor ms-3"></i></span>
                                <span class="me-auto">Medecin</span>
                            </a>
                            <div class="dropdown-menu text-color-primary w-100" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="{{ route('back_end.medecins.create') }}">Ajout Medecin</a>
                                <a class="dropdown-item text-black" href="{{ route('back_end.medecins.index') }}">Liste Medecins</a>
                                <a class="dropdown-item text-black" href="{{ route('back_end.emplois.create') }}">Horaires Ajout</a>
                                <a class="dropdown-item text-black" href="{{ route('back_end.horaires.index') }}">Horaires Liste</a>
                            </div>
                        </li>

                        <!-- ... Autres éléments du menu ... -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fas fa-bed-pulse ms-3"></i></span>
                                <span class="me-auto">Rendez-Vous</span>
                            </a>
                            <div class="dropdown-menu text-color-primary w-100" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="{{ route('back_end.patients.create') }}">Ajout Rendez-vous</a>
                                <a class="dropdown-item text-black" href="{{ route('liste_rdv_medecin') }}">Liste Rendez-vous</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-regular fa-calendar-check ms-3"></i></span>
                                <span class="me-auto">Dossiers Medicaux</span>
                            </a>
                            <div class="dropdown-menu text-color-primary w-100" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="#">Ajout Medecin</a>
                                <a class="dropdown-item text-black" href="#">Liste Rendez-vous</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-regular fa-calendar-check ms-3"></i></span>
                                <span class="me-auto">Messagerie</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-regular fa-calendar-check ms-3"></i></span>
                                <span class="me-auto">Forum</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span><i class="fa-regular fa-calendar-check ms-3"></i></span>
                                <span class="me-auto">Temoignages</span>
                            </a>
                            <div class="dropdown-menu text-color-primary w-100" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="#">Ajout Temoignage </a>
                                <a class="dropdown-item text-black" href="#">Liste Temoignages</a>
                            </div>
                        </li>



                        <!-- ... Autres éléments du menu ... -->
                    </ul>
                </div>
            </div>

            <button class="log-out">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="show-item"> Log Out </span>
            </button>
        </div>
    </div>
    <!-- main content & top header start  -->
    <main class="content-wrapper">

        <!-- header section start  -->
        <header>
            <div class="d-flex align-items-center gap-xl-30 gap-3">

                <button class="toggle-menu btn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                <a href="https://health-ease-gamma.vercel.app/" target="_blank">
                    <i class="fa-solid fa-globe me-10"></i>
                    <span class="fs-base header-item-hide">Go to website</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-sm-4 gap-3">

                <a href="chat-with-us.html">
                    <i class="fa-regular fa-comments me-2"></i>
                    <span class="fs-base header-item-hide">Chat with us</span>
                </a>

                <div class="health-ease">
                    <i class="fa-regular fa-hospital me-xl-10 he-icon"></i>
                    <select>
                        <option value="0">HealthEase</option>
                        <option value="1">item 1</option>
                        <option value="2">item 2</option>
                        <option value="3">item 3</option>
                    </select>
                </div>


                <div class="account">
                    <img class="me-xl-10" src="{{ asset('assets1/img/patient.png')}}" alt="patient">
                    <select>
                        <option value="0">Mr Patient</option>
                        <option value="1">item 1</option>
                        <option value="2">item 2</option>
                        <option value="3">item 3</option>
                    </select>
                </div>

                <div class="language ">
                    <img class="lang-flag header-item-hide" src="{{ asset('assets1/img/flag.png')}}" alt="flag">

                    <select class="lang">
                        <option value="en">EN</option>
                        <option value="bd">BD</option>
                        <option value="in">IN</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- header section end  -->
        <div class="row">
            <div class="modal fade" id="customPopupModal" tabindex="-1" role="dialog" aria-labelledby="customPopupModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customPopupModalLabel">Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="customPopupContent">
                            <!-- Contenu du message ici -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- @if(Session::has('success'))
            <div class="alert alert-success" id="successMessage" style="height: 50px;margin-bottom:15px">
                {{ Session::get('success') }}
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger" id="errorMessage" style="height: 50px;margin-bottom:15px">
                {{ Session::get('error') }}
            </div>
            @endif --}}
    <div class="container">
        @yield("contenu")
    </div>

            <!-- footer start  -->
            <footer>
                <div class="container-fluid">
                    <span class="para-1b fs-base text-center text-sm-start d-block ">Copyright © <span class="currentYear"></span> HealthEase Medical. All
                        rights reserved.</span>
                </div>
            </footer>
            <!-- footer end  -->
        </div>
        <!-- content section end   -->
    </main>
    <!-- main content & top header end  -->





    <!-- Scripts Bootstrap -->
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
<script src="{{ asset('assets1/js/plugin/jquery-3.7.0.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Vos scripts personnalisés -->

{{-- <script src="{{ asset('assets1/js/plugin/popper.min.js')}}"></script> --}}
<script src="{{ asset('assets1/js/plugin/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets1/js/plugin/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('assets1/js/plugin/cdn.jsdelivr.net_npm_chart.js')}}"></script>
<script src="{{ asset('assets1/js/pluginCustomization.js')}}"></script>
<script src="{{ asset('assets1/js/main.js')}}"></script>
<script src="{{ asset('assets1/js/fenModal.js')}}"></script>


<script>
    $(document).ready(function() {
        // Fonction pour centrer la fenêtre modale
        function centerModal() {
            var $modal = $(this);
            var $dialog = $modal.find('.modal-dialog');
    
            // Centrer verticalement la fenêtre modale
            var offset = ($(window).height() - $dialog.height()) / 2;
            $dialog.css('margin-top', offset);
        }
    
        // Centrer la fenêtre modale lorsqu'elle est affichée
        $('.modal').on('shown.bs.modal', centerModal);
    
        // Centrer la fenêtre modale lorsque la taille de la fenêtre est modifiée
        $(window).on('resize', function() {
            $('.modal:visible').each(centerModal);
        });
    
        // Vérifier si le message de succès est présent dans la session
        var successMessage = '{{ session()->get('success') }}';
        if (successMessage) {
            // Afficher le message dans la fenêtre modale
            $('#customPopupContent').html('<div class="alert alert-success">' + successMessage + '</div>');
            $('#customPopupModal').modal('show');
    
            // Cacher la fenêtre modale après 7 secondes
            setTimeout(function() {
                $('#customPopupModal').modal('hide');
            }, 2000);
        }
    });
    </script>
    




</body>


<!-- Mirrored from pixner.net/healthease-dashboard/healthease-dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Dec 2023 14:25:18 GMT -->
</html>
