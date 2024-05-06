@extends('en_tete.entete_patient')
@section('contenu')
<div class="main-container container-fluid">
   <!-- Start::Row-1 -->
   <div class="row">
      <div class="col-xxl-9">
         <div class="row">
            <div class="col-xxl-5 col-xl-12">
               <div class="row">
                <div class="row container-fluid">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-start">
                              <div class="flex-grow-1">
                                 <p class="mb-0">Mes Rendez Vous</p>
                                 <span class="fs-5">
                                    {{count($rendezVous)}}
                                </span>
                              </div>
                              <div class="min-w-fit-content ms-3">
                                 <span
                                    class="avatar avatar-md br-5 bg-primary-transparent text-primary">
                                 <i class="fe fe-align-inset-inline-end fs-18"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-start">
                              <div class="flex-grow-1">
                                 <p class="mb-0">Acceptés</p>
                                 <span class="fs-5">
                                  {{count($rendezVousAcceptes)}}
                                </span>
                              </div>
                              <div class="min-w-fit-content ms-3">
                                 <span
                                    class="avatar avatar-md br-5 bg-primary-transparent text-primary">
                                 <i class="fe fe-check-circle"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-start">
                              <div class="flex-grow-1">
                                 <p class="mb-0">Rejetté</p>
                                 <span class="fs-5"> {{count($rendezVousRejettes)}}</span>
                              </div>
                              <div class="min-w-fit-content ms-3">
                                 <span
                                    class="avatar avatar-md br-5 bg-secondary-transparent text-secondary">
                                 <i class="fe fe-shield-off"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-start flex-wrap gap-1">
                              <div class="flex-grow-1">
                                 <p class="mb-0">En attentes </p>
                                 <span class="fs-5"> {{count($rendezVousEnAttente)}}</span>
                              </div>
                              <div class="min-w-fit-content">
                                 <span class="avatar avatar-md br-5 bg-warning-transparent">
                                 <i class="fe fe-arrow-up-inset-inline-end"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex align-items-center mb-3 flex-wrap gap-1">
                              <span
                                 class="avatar avatar-md stat-avatar rounded-circle text-bg-warning fs-18 min-w-fit-content me-2">
                              <i class="bi bi-bag-check"></i>
                              </span>
                              <p class="mb-0 flex-grow-1">Total Sales by Unit
                              </p>
                           </div>
                           <span class="fs-5">$12,897</span>
                           <span class="fs-12 text-warning ms-1"><i
                              class="ti ti-trending-up mx-1"></i>3.5%</span>
                           <div class="fw-normal d-flex align-items-center mb-2 mt-4">
                              <p class="mb-0 flex-grow-1">Active Sales</p>
                              <span>3,274</span>
                           </div>
                           <div class="progress custom-progress-1" style="height: 5px;">
                              <div class="progress-bar bg-warning" role="progressbar"
                                 style="width: 50%;" aria-valuenow="25" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                     <div class="card overflow-hidden">
                        <div class="card-body p-0">
                           <div class="px-3 pt-3">
                              <div class="d-flex align-items-center mb-3">
                                 <span
                                    class="avatar avatar-md stat-avatar rounded-circle text-bg-primary fs-18 min-w-fit-content me-2">
                                 <i class="bi bi-bar-chart"></i>
                                 </span>
                                 <p class="mb-0 flex-grow-1">Nombre de consultation</p>
                              </div>
                              <span class="fs-5">$8,889</span>
                              <span class="fs-12 text-success ms-1"><i
                                 class="ti ti-trending-up mx-1"></i>5.5%</span>
                           </div>
                           <div id="totalRevenue"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xxl-3">
         <div class="row">
            <div class="col-xxl-12 col-xl-12">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card bg-primary tx-fixed-white card-bg-img">
                        <div class="card-body position-relative d-flex justify-content-between">
                           <div>
                              <div class="flex-grow-1">
                                 <p class="mb-1 fs-18 fw-semibold">Statique Générale Des offres</p>
                              </div>
                              <p class="mb-1 fs-13 op-8">You have got 5 new offers, Track here<br> the Sales data and best deals here.</p>
                              <span class="fs-16">3,531</span>
                              <span class="fs-12 op-7 ms-1"><i class="ti ti-trending-up mx-1"></i>0.5%</span>
                           </div>
                           <div class="min-w-fit-content">
                              <span class="avatar avatar-xxl bg-transparent">
                              <img src="{{asset('assets/build/assets/images/png/6.png')}}" class="op-7" alt="img">
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End::Row-1 -->
           <!-- header modal  error  -->
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
        </div>
</div>
<!-- CONTAINER END -->
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
@endsection
