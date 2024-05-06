@extends('layouts_front.main')

@section('contenu')

<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/blog.jpg')}}">
    <div class="container">
        <h2>Galerie</h2>
        <div class="bosluk3"></div>
        <p><a href="../index.html" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>Galerie</p>
    </div>
    <!-- end container -->
</header>

<main>
    <section class="news-alani-sayfa">
        <div class="container">
            <div class="row">
                @foreach($galeries as $galerie)
                <div class="col-lg-3 col-sm-3 col-md-3">
                    <div class="post-kutu" style="cursor:pointer;">
                        <a href="{{asset('storage/' . $galerie->photo) }}">
                            <img style="width: 200%; height:200px;" src="{{ asset('storage/' . $galerie->photo) }}" class="attachment-custom-size size-custom-size wp-post-image" alt="{{ $galerie->created_at }}" decoding="async" fetchpriority="high" />
                         </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
