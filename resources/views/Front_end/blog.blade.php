@extends('layouts_front.main')

@section('contenu')

<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/blog.jpg')}}">
    <div class="container">
        <h2>Blog</h2>
        <div class="bosluk3"></div>
        <p><a href="../index.html" class="headerbreadcrumb">Home</a> <i class="flaticon-right-chevron"></i>Blog</p>
    </div>
    <!-- end container -->
</header>

<main>
    <section class="news-alani-sayfa">
        <div class="container">
            <div class="row">
                @foreach($actualites as $actualite)
                <div class="col-lg-4">
                    <div class="post-kutu" style="cursor:pointer;">
                        <img style="width: 100%; height: 150px;" src="{{ asset('storage/' . $actualite->avatar) }}" class="attachment-custom-size size-custom-size wp-post-image" alt="{{ $actualite->titre }}" decoding="async" fetchpriority="high" />
                        <div class="datesection">
                            <h3 class="baslik-3 h-yazi-margin-kucuk mt-2">{{ $actualite->titre }}</h3>
                        </div>
                        <div style="min-height: 100px;"> <!-- Réservez une place minimale pour le contenu -->
                            <p class="post-kutu--yazi">
                                {{ strlen($actualite->contenu) > 150 ? substr($actualite->contenu, 0, 150) . '...' : $actualite->contenu }}
                            </p>
                        </div>
                        <div class="datesection ">
                            <span class="date text-end">Publié le  {{ $actualite->created_at->format('d.m.Y') }}</span>&nbsp;<span class="tt"></span>&nbsp;
                        </div>
                        <div class="h-yazi-ortalama h-yazi-margin-50">
                            <div class="bosluksv"></div>
                            <a href="{{ route('admin.actualite.show', ['actualite' => $actualite->id]) }}" class="custom-button">Lire la suite</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
