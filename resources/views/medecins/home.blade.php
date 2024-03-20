@extends('en_tete.entete_medecin')

@section("contenu")
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-gray-600">Total Orders</p>
                        <span class="fs-5">45</span>
                        <span class="fs-12 text-success ms-1"><i class="ti ti-trending-up mx-1"></i>0.5%</span>
                    </div>
                    <div class="min-w-fit-content ms-3">
                        <span class="avatar avatar-md br-5 bg-primary-transparent text-primary">
                            <i class="fe fe-user fs-18"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-gray-600">Total Package</p>
                        <span class="fs-5">10</span>
                        <span class="fs-12 text-secondary ms-1"><i class="ti ti-trending-down mx-1"></i>8.0%</span>
                    </div>
                    <div class="min-w-fit-content ms-3">
                        <span class="avatar avatar-md br-5 bg-secondary-transparent text-secondary">
                            <i class="fe fe-package fs-18"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-gray-600">Total Payments</p>
                        <span class="fs-5">$60.00</span>
                        <span class="fs-12 text-success ms-1"><i class="ti ti-trending-up mx-1"></i>3.5%</span>
                    </div>
                    <div class="min-w-fit-content ms-3">
                        <span class="avatar avatar-md br-5 bg-warning-transparent text-warning">
                            <i class="fe fe-credit-card fs-18"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-gray-600">Total Subscriptions </p>
                        <span class="fs-5">10</span>
                        <span class="fs-12 text-success ms-1"><i class="ti ti-trending-up mx-1"></i>0.5%</span>
                    </div>
                    <div class="min-w-fit-content ms-3">
                        <span class="avatar avatar-md br-5 bg-info-transparent">
                            <i class="fe fe-user-plus fs-18"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xxl-2 col-xl-6">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-fill">
                        <p class="mb-1 fs-5 fw-semibold text-default">1,773</p>
                        <p class="mb-0 text-muted">Membre Actifs</p>
                        <p class="mb-0 fs-11"><a href="javascript:void(0);" class="text-success text-decoration-underline">Voir tous</a></p>
                    </div>
                    <div class="ms-2">
                        <span class="avatar text-bg-info rounded-circle fs-20"><i class="bi bi-people-fill"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-secondary-transparent rounded-circle fs-20 mb-3">
                    <i class="bi bi-file-earmark-text  project  mx-auto text-secondary "></i>
                </div>
                <h6 class="mb-1 text-muted">Consultation Enregistré</h6>
                <h3 class="fw-semibold">116</h3>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-primary-transparent rounded-circle fs-20 mb-3">
                    <i class="fa fa-credit-card-alt project  mx-auto text-primary "></i>
                </div>
                <h6 class="mb-1 text-muted">Total Profit</h6>
                <h3 class="fw-semibold">2.345.000 <span class="small text-secondary">GNF</span></h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xxl-2 col-xl-6">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="tx-fixed-white">
                        <h2 class="mb-0 number-font">7,865</h2>
                        <p class="mb-0">Total Patients </p>
                    </div>
                    <div class="ms-auto tx-fixed-white"> <i class="fa fa-user-o fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
        <div class="card bg-secondary img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="tx-fixed-white">
                        <h2 class="mb-0 number-font">86,964</h2>
                        <p class="mb-0">Total Consultations</p>
                    </div>
                    <div class="ms-auto tx-fixed-white"> <i class="wi wi-earthquake fs-30 ms-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
        <div class="card  bg-success img-card box-success-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="tx-fixed-white">
                        <h2 class="mb-0 number-font">98</h2>
                        <p class=" mb-0">Total Comments</p>
                    </div>
                    <div class="ms-auto tx-fixed-white"> <i class="fa fa-comment-o  fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
        <div class="card bg-info img-card box-info-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="tx-fixed-white">
                        <h2 class="mb-0 number-font">893</h2>
                        <p class=" mb-0">Total Posts</p>
                    </div>
                    <div class="ms-auto tx-fixed-white"> <i class="fa fa-envelope-o fs-30 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection



