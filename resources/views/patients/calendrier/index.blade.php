@extends('partials.header_patient')

@section('contenu')
      <!-- content section start   -->
      <div class="main-content">
        <!-- main content start -->
        <div>
            <div class="page-title">
                <h3>Calendrier</h3>
                <ul class="d-flex align-items-center gap-20">
                    <li class="bc-item">calendrier</li>
                </ul>
            </div>

            <!-- calender  -->
            <div class="row">
                <div class="col">
                    <div id='wrap'>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer end  -->
    </div>
    <!-- content section end   -->
@endsection
