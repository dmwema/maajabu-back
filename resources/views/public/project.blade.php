@extends('public.layout.main')

@php
$page = 'project';
$title = 'nos projets';
@endphp

@section('content')
    <!-- Begin page-name -->
    <section class="page-name v-separator mb-xs-20 mb-md-25 mb-lg-65">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Projects</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>Projets</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <!-- End page-name -->
    <main>
        <!-- Begin projects -->
        <section class="v-separator pb-xs-50 pb-md-50 pb-lg-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pb-xs-25 pb-md-25 pb-lg-60">
                        <div class="text-block md-full">
                            <h2>dernier projets</h2>
                            <p class="h-sub">Explorez ci-dessous pour en savoir plus sur l'étendue des projets que Voyceo a
                                entrepris
                                ces dernières années</p>
                            <p>Nous sommes spécialisés dans l'enregistrement d'albums entiers du début à la fin. Nous
                                préférons nous investir
                                dans un projet et partager des idées avec l'artiste. L'enregistrement d'un seul ou de
                                plusieurs instruments est
                                bien sûr aussi une option. Nous garantissons la livraison de tous les fichiers liés au
                                projet dans le format souhaité
                                état pour les processus futurs. Au fil dexs ans, notre casier de microphone a augmenté en
                                taille et
                                qualité, allant du vintage au moderne.</p>
                            <div class="project-ico-list">
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-1.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-2.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-3.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-4.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-5.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-6.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-7.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-8.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-9.jpg" alt="img">
                                </div>
                                <div class="project-ico__item">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                        data-src="img/prog-10.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pb-xs-25 pb-md-25 pb-lg-60"
                        style="display: flex; align-items: center; justify-content: center">
                        <img src="{{ asset('img/music.jpg') }}" alt="music">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-xs-25 pt-md-25 pt-lg-60">
                        <div class="section-header">
                            <h2></h2>
                            <p>Chaque artiste ci-dessous a travaillé sur une partie du processus de production avec Neema
                            </p>
                        </div>
                        <div class="massonry-grid-wrap">
                            <div class="massonry-filter">
                                <ul class="massonry-filter-list">
                                    <li class="massonry-filter-list__item"><a href="#" class="active"
                                            data-filter="*">Tous</a></li>
                                    <li class="massonry-filter-list__item"><a href="#"
                                            data-filter=".mastering">Mastering</a>
                                    </li>
                                    <li class="massonry-filter-list__item"><a href="#"
                                            data-filter=".duplication">Duplication</a>
                                    </li>
                                    <li class="massonry-filter-list__item"><a href="#"
                                            data-filter=".impression">Impression</a></li>
                                    <li class="massonry-filter-list__item"><a href="#"
                                            data-filter=".enregistrement">Enrégistrement</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="massonry-grid gallery-grid pt-md-25">
                                @foreach ($pimages as $pimg)
                                    <a href="#" class="gallery-grid__item {{ $pimg->category }}">
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="lazy"
                                            data-src="{{ Storage::url($pimg->image) }}" alt="img">
                                        <span class="grid-item-content">
                                            <span class="grid-item-title">{{ $pimg->title }}</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End projects -->
    </main>
@endsection
