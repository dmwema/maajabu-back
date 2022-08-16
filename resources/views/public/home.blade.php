@extends('public.layout.main')

@php
$page = 'home';
@endphp

@section('content')
    <!-- Begin main-slider -->
    <div class="main-slider-wrap">
        <div class="main-slider" data-slick='{
                                                                                                         "arrows": false,
                                                                                                         "fade": true,
                                                                                                         "speed": 500
                                                                                                     }'>
            <div class="tt-slide">
                <div class="slide-bg" data-src="./img/main-slider-1.jpg">
                    <img src="img/main-slider-1.jpg" alt="bg">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="tt-slide_description">Créez la musique de vos rêves</p>
                            <p class="tt-slide_header"><span class="font-gradient">Nous pouvons
                                    enregistrer</span><br>N'importe quoi</p>
                            <a href="{{ route('public.about') }}" class="button">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tt-slide">
                <div class="slide-bg" data-src="./img/main-slider-2.jpg">
                    <img src="img/main-slider-2.jpg" alt="bg">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="tt-slide_description">Donnez vie à la musique</p>
                            <p class="tt-slide_header"><span class="font-gradient">PAS ENCORE DE STUDIO ?</span><br>Aucun
                                problème.</p>
                            <a href="#" class="button">{{ route('public.about') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="awp-home-player" class="awp-home-player">
            <div class="awp-player-holder">
                <div class="awp-prev-toggle awp-contr-btn">
                    <svg class="icon icon-play-prev icon-prev-track awp-contr-btn-i awp-icon-color" width="18" height="16"
                        viewBox="0 0 18 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5879 15.5801C16.8027 15.5801 16.9883 15.502 17.1445 15.3457C17.3008 15.1895 17.3789 15.0039 17.3789 14.7891V0.990234C17.3789 0.755859 17.3008 0.570312 17.1445 0.433594C16.9883 0.277344 16.8027 0.199219 16.5879 0.199219L3.75586 7.28906C3.75586 7.28906 3.67773 7.41602 3.52148 7.66992C3.38477 7.9043 3.46289 8.16797 3.75586 8.46094C3.91211 8.61719 4.66406 9.07617 6.01172 9.83789C7.37891 10.5801 8.84375 11.3809 10.4062 12.2402C11.9688 13.0996 13.3848 13.8711 14.6543 14.5547C15.9434 15.2383 16.5879 15.5801 16.5879 15.5801ZM3.25781 1.04883C3.25781 0.794922 3.16992 0.589844 2.99414 0.433594C2.83789 0.257812 2.64258 0.169922 2.4082 0.169922H1.4707C1.23633 0.169922 1.03125 0.257812 0.855469 0.433594C0.699219 0.589844 0.621094 0.794922 0.621094 1.04883V14.7012C0.621094 14.9551 0.699219 15.1699 0.855469 15.3457C1.03125 15.502 1.23633 15.5801 1.4707 15.5801H2.4082C2.64258 15.5801 2.83789 15.502 2.99414 15.3457C3.16992 15.1699 3.25781 14.9551 3.25781 14.7012V1.04883Z">
                        </path>
                    </svg>
                </div>
                <div class="awp-playback-toggle awp-contr-btn">
                    <svg class="icon icon-play awp-contr-btn-i icon-play-circle awp-icon-color" width="30" height="31"
                        viewBox="0 0 30 31" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 0.875C12.9297 0.875 10.9766 1.26562 9.14062 2.04688C7.32422 2.82812 5.73242 3.90234 4.36523 5.26953C3.01758 6.61719 1.95312 8.20898 1.17188 10.0449C0.390625 11.8613 0 13.8047 0 15.875C0 17.9453 0.390625 19.8984 1.17188 21.7344C1.95312 23.5508 3.01758 25.1426 4.36523 26.5098C5.73242 27.8574 7.32422 28.9219 9.14062 29.7031C10.9766 30.4844 12.9297 30.875 15 30.875C17.0703 30.875 19.0137 30.4844 20.8301 29.7031C22.666 28.9219 24.2578 27.8574 25.6055 26.5098C26.9727 25.1426 28.0469 23.5508 28.8281 21.7344C29.6094 19.8984 30 17.9453 30 15.875C30 13.8047 29.6094 11.8613 28.8281 10.0449C28.0469 8.20898 26.9727 6.61719 25.6055 5.26953C24.2578 3.90234 22.666 2.82812 20.8301 2.04688C19.0137 1.26562 17.0703 0.875 15 0.875ZM15 28.0625C13.3203 28.0625 11.7383 27.75 10.2539 27.125C8.76953 26.4805 7.4707 25.6113 6.35742 24.5176C5.26367 23.4043 4.39453 22.1055 3.75 20.6211C3.125 19.1367 2.8125 17.5547 2.8125 15.875C2.8125 14.1953 3.125 12.6133 3.75 11.1289C4.39453 9.64453 5.26367 8.35547 6.35742 7.26172C7.4707 6.14844 8.76953 5.2793 10.2539 4.6543C11.7383 4.00977 13.3203 3.6875 15 3.6875C16.6797 3.6875 18.2617 4.00977 19.7461 4.6543C21.2305 5.2793 22.5195 6.14844 23.6133 7.26172C24.7266 8.35547 25.5957 9.64453 26.2207 11.1289C26.8652 12.6133 27.1875 14.1953 27.1875 15.875C27.1875 17.5547 26.8652 19.1367 26.2207 20.6211C25.5957 22.1055 24.7266 23.4043 23.6133 24.5176C22.5195 25.6113 21.2305 26.4805 19.7461 27.125C18.2617 27.75 16.6797 28.0625 15 28.0625ZM11.25 9.3125L22.5 15.875L11.25 22.4375V9.3125Z">
                        </path>
                    </svg>
                    <svg class="icon icon-pause icon-pause-circle awp-icon-color" width="30" height="31" viewBox="0 0 30 31"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.8,8.5h4.1V24H8.8V8.5z M16.6,24.1h4.1V8.5h-4.1V24.1z M30,15.9c0,2.1-0.4,4-1.2,5.9c-0.8,1.8-1.9,3.4-3.2,4.8c-1.3,1.3-2.9,2.4-4.8,3.2c-1.8,0.8-3.8,1.2-5.8,1.2s-4-0.4-5.9-1.2c-1.8-0.8-3.4-1.8-4.8-3.2c-1.3-1.4-2.4-3-3.2-4.8C0.4,19.9,0,17.9,0,15.9s0.4-4,1.2-5.8C2,8.2,3,6.6,4.4,5.3c1.4-1.4,3-2.4,4.8-3.2C11,1.3,12.9,0.9,15,0.9s4,0.4,5.8,1.2c1.8,0.8,3.4,1.9,4.8,3.2C27,6.6,28,8.2,28.8,10C29.6,11.9,30,13.8,30,15.9z M27.2,15.9c0-1.7-0.3-3.3-1-4.7c-0.6-1.5-1.5-2.8-2.6-3.9c-1.1-1.1-2.4-2-3.9-2.6c-1.5-0.6-3.1-1-4.7-1s-3.3,0.3-4.7,1C8.8,5.3,7.5,6.1,6.4,7.3c-1.1,1.1-2,2.4-2.6,3.9c-0.6,1.5-0.9,3.1-0.9,4.7s0.3,3.3,0.9,4.7c0.6,1.5,1.5,2.8,2.6,3.9c1.1,1.1,2.4,2,3.9,2.6c1.5,0.6,3.1,0.9,4.7,0.9s3.3-0.3,4.7-0.9c1.5-0.6,2.8-1.5,3.9-2.6c1.1-1.1,2-2.4,2.6-3.9C26.9,19.1,27.2,17.6,27.2,15.9z">
                        </path>
                    </svg>
                </div>
                <div class="awp-next-toggle awp-contr-btn">
                    <svg class="icon icon-play-next awp-contr-btn-i awp-icon-color" width="18" height="16"
                        viewBox="0 0 18 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.41211 15.5801C1.19727 15.5801 1.01172 15.502 0.855469 15.3457C0.699219 15.1895 0.621094 15.0039 0.621094 14.7891V0.990234C0.621094 0.755859 0.699219 0.570312 0.855469 0.433594C1.01172 0.277344 1.19727 0.199219 1.41211 0.199219L14.2441 7.28906C14.2441 7.28906 14.3125 7.41602 14.4492 7.66992C14.6055 7.9043 14.5371 8.16797 14.2441 8.46094C14.0879 8.61719 13.3262 9.07617 11.959 9.83789C10.6113 10.5801 9.15625 11.3809 7.59375 12.2402C6.03125 13.0996 4.60547 13.8711 3.31641 14.5547C2.04688 15.2383 1.41211 15.5801 1.41211 15.5801ZM14.7422 1.04883C14.7422 0.794922 14.8203 0.589844 14.9766 0.433594C15.1523 0.257812 15.3574 0.169922 15.5918 0.169922H16.5293C16.7637 0.169922 16.959 0.257812 17.1152 0.433594C17.291 0.589844 17.3789 0.794922 17.3789 1.04883V14.7012C17.3789 14.9551 17.291 15.1699 17.1152 15.3457C16.959 15.502 16.7637 15.5801 16.5293 15.5801H15.5918C15.3574 15.5801 15.1523 15.502 14.9766 15.3457C14.8203 15.1699 14.7422 14.9551 14.7422 14.7012V1.04883Z">
                        </path>
                    </svg>
                </div>
                <div class="awp-info">
                    <span class="awp-player-artist">MAAJABU GOSPEL</span> - <span class="awp-player-title">M aajabu</span>
                </div>
                <div class="awp-waveform-wrap">
                    <div class="awp-waveform awp-hidden"></div>
                    <div class="awp-waveform-img awp-hidden">
                        <div class="awp-waveform-img-load"></div>
                        <div class="awp-waveform-img-progress-wrap">
                            <div class="awp-waveform-img-progress"></div>
                        </div>
                    </div>
                    <span class="awp-waveform-preloader"></span>
                </div>
                <div class="awp-media-time">
                    <span class="awp-media-time-current awp-contr-btn">0:00</span>|<span
                        class="awp-media-time-total awp-contr-btn">0:00</span>
                </div>
                <div class="awp-volume-wrapper">
                    <div class="awp-player-volume">
                        <svg class="icon icon-volume fa-volume-up" width="20" height="14" viewBox="0 0 20 14"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.11328 9.47656C0.800781 9.47656 0.533854 9.58724 0.3125 9.80859C0.104167 10.0169 0 10.2773 0 10.5898V12.7969C0 13.1094 0.104167 13.3763 0.3125 13.5977C0.533854 13.806 0.800781 13.9102 1.11328 13.9102C1.41276 13.9102 1.67318 13.806 1.89453 13.5977C2.11589 13.3763 2.22656 13.1094 2.22656 12.7969V10.5898C2.22656 10.2773 2.11589 10.0169 1.89453 9.80859C1.67318 9.58724 1.41276 9.47656 1.11328 9.47656ZM5.54688 7.25C5.2474 7.25 4.98698 7.36068 4.76562 7.58203C4.55729 7.79036 4.45312 8.05078 4.45312 8.36328V12.7969C4.45312 13.1094 4.55729 13.3763 4.76562 13.5977C4.98698 13.806 5.2474 13.9102 5.54688 13.9102C5.85938 13.9102 6.11979 13.806 6.32812 13.5977C6.54948 13.3763 6.66016 13.1094 6.66016 12.7969V8.36328C6.66016 8.05078 6.54948 7.79036 6.32812 7.58203C6.11979 7.36068 5.85938 7.25 5.54688 7.25ZM10 5.02344C9.6875 5.02344 9.42057 5.13411 9.19922 5.35547C8.99089 5.57682 8.88672 5.83724 8.88672 6.13672V12.7969C8.88672 13.1094 8.99089 13.3763 9.19922 13.5977C9.42057 13.806 9.6875 13.9102 10 13.9102C10.3125 13.9102 10.5729 13.806 10.7812 13.5977C11.0026 13.3763 11.1133 13.1094 11.1133 12.7969V6.13672C11.1133 5.83724 11.0026 5.57682 10.7812 5.35547C10.5729 5.13411 10.3125 5.02344 10 5.02344ZM14.4531 2.79688C14.1406 2.79688 13.8737 2.90755 13.6523 3.12891C13.444 3.35026 13.3398 3.61068 13.3398 3.91016V12.7969C13.3398 13.1094 13.444 13.3763 13.6523 13.5977C13.8737 13.806 14.1406 13.9102 14.4531 13.9102C14.7526 13.9102 15.0065 13.806 15.2148 13.5977C15.4362 13.3763 15.5469 13.1094 15.5469 12.7969V3.91016C15.5469 3.61068 15.4362 3.35026 15.2148 3.12891C15.0065 2.90755 14.7526 2.79688 14.4531 2.79688ZM18.8867 0.589844C18.5872 0.589844 18.3268 0.700521 18.1055 0.921875C17.8841 1.13021 17.7734 1.39062 17.7734 1.70312V12.7969C17.7734 13.1094 17.8841 13.3763 18.1055 13.5977C18.3268 13.806 18.5872 13.9102 18.8867 13.9102C19.1992 13.9102 19.4596 13.806 19.668 13.5977C19.8893 13.3763 20 13.1094 20 12.7969V1.70312C20 1.39062 19.8893 1.13021 19.668 0.921875C19.4596 0.700521 19.1992 0.589844 18.8867 0.589844Z">
                            </path>
                        </svg>
                    </div>
                    <div class="awp-volume-seekbar awp-tooltip-top">
                        <div class="awp-volume-bg"></div>
                        <div class="awp-volume-level"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="awp-home-playlist">
            <ul id="playlist-2">
                <li class="awp-playlist-item" data-type="audio" data-mp3="media/audio/2/01.mp3" data-artist="Soundroll"
                    data-title="A Way To The Top"></li>
                <li class="awp-playlist-item" data-type="audio" data-mp3="media/audio/2/02.mp3" data-artist="Soundroll"
                    data-title="Feel Good Journey"></li>
                <li class="awp-playlist-item" data-type="audio" data-mp3="media/audio/2/03.mp3" data-artist="Soundroll"
                    data-title="Fight No More"></li>
            </ul>
        </div>
    </div>
    <!-- End main-slider -->
    <!-- <main class="pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60"> -->
    <main class="pt-xs-25 pt-md-25 pt-lg-60">
        <!-- Begin text-section -->
        <section class="white-section parralax-section v-separator pb-xs-25 pb-md-25 pb-lg-60">
            <div class="text-section ovh pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
                <div class="container">
                    <div class="row flex-row-reverse align-items-center">
                        <div class="col-md-6">
                            <div class="text-section_video">
                                <h2>Welcome to NEEMA</h2>
                                <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                    class="img-wrap js-tilt">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="text-img lazy"
                                        data-src="./img/text-block-video-1.png" alt="bg">
                                    <span class="start-video-wrap">
                                        <span class="start-video">
                                            <svg width="17" height="21" viewBox="0 0 17 21"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.0292 8.58421L2.72036 0.198875C2.32691 -0.0353675 1.83836 0.00365848 1.46938 0.00365848C-0.00654693 0.00365848 5.06374e-07 1.14317 5.06374e-07 1.43185V18.5706C5.06374e-07 18.8146 -0.00646083 19.9988 1.46938 19.9988C1.83836 19.9988 2.327 20.0377 2.72036 19.8035L16.0291 11.4183C17.1215 10.7683 16.9327 10.0012 16.9327 10.0012C16.9327 10.0012 17.1216 9.23412 16.0292 8.58421Z" />
                                            </svg>
                                        </span>
                                    </span>
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        class="text-img-bg lazy" data-src="./img/text-block-video-bg.png" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-block">
                                <h2>Bienvenue à NEEMA</h2>
                                <p class="h-sub">NEEMA est le fruit de musiciens qui comprennent que le meilleur art vient
                                    du meilleur environnement</p>
                                <p>Ils savent que pour faire de la bonne musique, vous avez besoin d'un environnement
                                    exceptionnel - une combinaison d'équipements de premier ordre, d'espaces de travail et
                                    de salon confortables, un cadre relaxant et un personnel compétent et compétent qui peut
                                    travailler avec des artistes de tous niveaux. Un lieu sans distractions, mais
                                    accessible, où le développement est encouragé et les prix ne sont pas prohibitifs, mais
                                    la qualité n'est jamais sacrifiée et les clients sont traités avec respect.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-xs-20 mt-md-25 mt-lg-65 pb-xs-25 pb-md-25 pb-lg-60">
                <div class="row">
                    <div class="col-12">
                        <!-- Begin banner-booking -->
                        <div class="banner-booking">
                            <div class="banner-text">
                                <h2>Besoin d'un son de <span class="font-gradient">QUALITÉ</span>?</h2>
                                <p>Nous offrons le meilleur service et les meilleurs équipements signés d'artistes et de
                                    musiciens indépendants.</p>
                            </div>
                            <div class="banner-button">
                                <a href="#bookingPopup" class="button white btn-shadow open-popup-link">
                                    <svg class="icon icon-mic" width="14" height="16" viewBox="0 0 14 16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.6425 0C3.205 0 2.78833 0.0885417 2.3925 0.265625C1.99667 0.432292 1.65292 0.661458 1.36125 0.953125C1.06958 1.24479 0.835208 1.58854 0.658125 1.98438C0.491458 2.36979 0.408125 2.78646 0.408125 3.23438C0.408125 3.68229 0.491458 4.10417 0.658125 4.5C0.835208 4.89583 1.06958 5.23958 1.36125 5.53125C1.65292 5.82292 1.99667 6.05208 2.3925 6.21875C2.78833 6.38542 3.205 6.46875 3.6425 6.46875C4.09042 6.46875 4.51229 6.38542 4.90812 6.21875C5.30396 6.05208 5.64771 5.82292 5.93937 5.53125C6.23104 5.23958 6.46021 4.89583 6.62687 4.5C6.80396 4.10417 6.8925 3.68229 6.8925 3.23438C6.8925 2.78646 6.80396 2.36979 6.62687 1.98438C6.46021 1.58854 6.23104 1.24479 5.93937 0.953125C5.64771 0.661458 5.30396 0.432292 4.90812 0.265625C4.51229 0.0885417 4.09042 0 3.6425 0ZM5.06437 7.15625L10.9237 12.1406L12.3925 10.625L7.40812 4.85938C7.04354 5.54688 6.55917 6.10417 5.955 6.53125C5.36125 6.94792 5.06437 7.15625 5.06437 7.15625ZM13.2831 11.7656L12.705 10.9844L11.3456 12.4062L12.1269 12.9375L13.2831 11.7656ZM13.58 12.2344L12.5175 13.2656L13.0331 13.3594C13.0644 13.5052 13.08 13.7396 13.08 14.0625C13.0904 14.375 13.0071 14.6562 12.83 14.9062C12.705 15.0625 12.5383 15.1823 12.33 15.2656C12.1321 15.349 11.8925 15.3958 11.6112 15.4062C10.4237 15.4375 9.54354 15.3646 8.97062 15.1875C8.40812 15.0208 7.80396 14.5885 7.15812 13.8906C6.77271 13.4844 6.34042 13.1875 5.86125 13C5.38208 12.8125 4.92375 12.6927 4.48625 12.6406C4.05917 12.5781 3.68937 12.5573 3.37687 12.5781C3.07479 12.5885 2.90812 12.599 2.87687 12.6094C2.80396 12.6198 2.74146 12.6562 2.68937 12.7188C2.63729 12.7812 2.61646 12.8542 2.62687 12.9375C2.63729 13.0104 2.67375 13.0729 2.73625 13.125C2.79875 13.1771 2.87167 13.1979 2.955 13.1875C2.96542 13.1875 3.10604 13.1771 3.37687 13.1562C3.64771 13.1354 3.97583 13.151 4.36125 13.2031C4.74667 13.2552 5.15292 13.3594 5.58 13.5156C6.0175 13.6719 6.39771 13.9271 6.72062 14.2812C7.39771 15.0104 8.02792 15.4792 8.61125 15.6875C9.205 15.8958 9.97062 16 10.9081 16C11.0123 16 11.1269 16 11.2519 16C11.3769 16 11.5019 15.9948 11.6269 15.9844C12.0019 15.9844 12.33 15.9219 12.6112 15.7969C12.8925 15.6719 13.1217 15.4896 13.2987 15.25C13.5071 14.9583 13.6217 14.6458 13.6425 14.3125C13.6737 13.9792 13.6737 13.6979 13.6425 13.4688L13.7519 13.4844L13.58 12.2344Z">
                                        </path>
                                    </svg>
                                    Reserver votre séance studio
                                </a>
                            </div>
                        </div>
                        <!-- End banner-booking -->
                    </div>
                </div>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="parallax-img animate tt-paroller lazy"
                data-src="img/paralax.png" data-paroller-factor="0.15" data-paroller-type="foreground" alt="bg">
        </section>
        <!-- End text-section -->
        <!-- Begin record studio -->
        <section class="dark-section v-separator pt-xs-50 pt-md-50 pt-lg-120 pb-xs-50 pb-md-50 pb-lg-120">
            <div class="container">
                <div class="section-header white">
                    <h2>Studios d'enregistrement</h2>
                    <p>NEEMA est une installation de 2 000 pieds carrés avec 1 salle de contrôle, 2 salles de concert et 1
                        cabine vocale</p>
                </div>
            </div>
            <div class="studio-slider white-arrow" data-slick='{
                                                                                                             "centerMode": true,
                                                                                                             "centerPadding": "29.5%",
                                                                                                             "responsive": [
                                                                                                                 {
                                                                                                                     "breakpoint": 1400,
                                                                                                                     "settings": {
                                                                                                                       "centerPadding": "22%"
                                                                                                                     }
                                                                                                                 },
                                                                                                                 {
                                                                                                                     "breakpoint": 768,
                                                                                                                     "settings": {
                                                                                                                       "centerPadding": "0%",
                                                                                                                       "arrows": false,
                                                                                                                       "dots": true,
                                                                                                                       "autoplay": true,
                                                                                                                       "autoplaySpeed": 3500
                                                                                                                     }
                                                                                                                 }
                                                                                                             ]
                                                                                                         }'>
                <div class="tt-slide">
                    <div class="studio-info">
                        <div class="studio-info_text">
                            <h4><span class="color-main">Studio A</span> – Mixing Studio</h4>
                            <div class="studio-info_footer">
                                <p>Notre salle de suivi de 30 m2 héberge une console Neve VR36 immaculée avec des faders
                                    volants, des moniteurs ATC, des convertisseurs Prism ADA-8XR et un superbe rack de
                                    hors-bord de classe mondiale.</p>
                            </div>
                        </div>
                        <picture>
                            <source type="image/webp" srcset="img/studio-1.webp">
                            <source type="image/jpeg" srcset="img/studio-1.jpg">
                            <img src="img/studio-1.jpg" class="studio-photo" alt="img">
                        </picture>
                    </div>
                </div>
                <div class="tt-slide">
                    <div class="studio-info">
                        <div class="studio-info_text">
                            <h4><span class="color-main">Studio B</span> – Trackiеng Studio</h4>
                            <div class="studio-info_footer">
                                <p>Notre salle de suivi de 30 m2 héberge une console Neve VR36 immaculée avec des faders
                                    volants, des moniteurs ATC, des convertisseurs Prism ADA-8XR et un superbe rack de
                                    hors-bord de classe mondiale.</p>
                            </div>
                        </div>
                        <picture>
                            <source type="image/webp" srcset="img/studio-2.webp">
                            <source type="image/jpeg" srcset="img/studio-2.jpg">
                            <img src="img/studio-2.jpg" class="studio-photo" alt="img">
                        </picture>
                    </div>
                </div>
                <div class="tt-slide">
                    <div class="studio-info">
                        <div class="studio-info_text">
                            <h4><span class="color-main">Studio C</span> – Mastering Studio</h4>
                            <div class="studio-info_footer">
                                <p>Notre salle de suivi de 30 m2 héberge une console Neve VR36 immaculée avec des faders
                                    volants, des moniteurs ATC, des convertisseurs Prism ADA-8XR et un superbe rack de
                                    hors-bord de classe mondiale.</p>
                            </div>
                        </div>
                        <picture>
                            <source type="image/webp" srcset="img/studio-3.webp">
                            <source type="image/jpeg" srcset="img/studio-3.jpg">
                            <img src="img/studio-3.jpg" class="studio-photo" alt="img">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
        <!-- End record studio -->
        <!-- Begin project-section -->
        <section
            class="block-bg-projects parralax-section v-separator pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
            <div class="ovh">
                <div class="container pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header">
                                <h2>Nos projets</h2>
                                <p>Nous sommes très fiers de notre clientèle et des relations durables que nous avons
                                    forgées au fil des années</p>
                            </div>
                            <div class="project-slider arrow-outside"
                                data-slick='{
                                                                                                                             "slidesToShow": 3,
                                                                                                                             "swipeToSlide": true,
                                                                                                                             "responsive": [
                                                                                                                                 {
                                                                                                                                     "breakpoint": 1200,
                                                                                                                                     "settings": {
                                                                                                                                         "slidesToShow": 3,
                                                                                                                                         "arrows": false,
                                                                                                                                         "dots": true
                                                                                                                                     }
                                                                                                                                 },
                                                                                                                                 {
                                                                                                                                     "breakpoint": 768,
                                                                                                                                     "settings": {
                                                                                                                                         "slidesToShow": 2,
                                                                                                                                         "arrows": false,
                                                                                                                                         "dots": true
                                                                                                                                     }
                                                                                                                                 },
                                                                                                                                 {
                                                                                                                                     "breakpoint": 481,
                                                                                                                                     "settings": {
                                                                                                                                         "slidesToShow": 1,
                                                                                                                                         "arrows": false,
                                                                                                                                         "dots": true
                                                                                                                                     }
                                                                                                                                 }
                                                                                                                             ]
                                                                                                                         }'>
                                @foreach ($works as $work)
                                    <div class="tt-slide">
                                        <div class="project-card">
                                            <a href="#" class="project-cart_logo">
                                                <picture>
                                                    <source type="image/jpeg" srcset="{{ $work->img_url }}">
                                                    <img src="img/project-1.jpg" alt="img">
                                                </picture>
                                            </a>
                                            <a href="#" class="project-cart_name">{{ $work->name }}</a>
                                            <p class="theme-color">{{ $work->artist->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('public.project') }}"
                                class="button white btn-border center-btn sm-text mt-xs-30 mt-sm-40">
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.315 9.72754H0.572813C0.437396 9.72754 0.318906 9.77832 0.217344 9.87988C0.115781 9.98145 0.0650001 10.1042 0.0650001 10.248V11.6191C0.0650001 11.7546 0.115781 11.873 0.217344 11.9746C0.318906 12.0762 0.437396 12.127 0.572813 12.127H3.315C3.45888 12.127 3.57737 12.0762 3.67047 11.9746C3.77203 11.873 3.82281 11.7546 3.82281 11.6191V10.248C3.82281 10.1042 3.77203 9.98145 3.67047 9.87988C3.57737 9.77832 3.45888 9.72754 3.315 9.72754ZM3.315 6.65527H0.572813C0.437396 6.65527 0.318906 6.70605 0.217344 6.80762C0.115781 6.90918 0.0650001 7.02767 0.0650001 7.16309V8.53418C0.0650001 8.67806 0.115781 8.80078 0.217344 8.90234C0.318906 9.00391 0.437396 9.05469 0.572813 9.05469H3.315C3.45888 9.05469 3.57737 9.00391 3.67047 8.90234C3.77203 8.80078 3.82281 8.67806 3.82281 8.53418V7.16309C3.82281 7.02767 3.77203 6.90918 3.67047 6.80762C3.57737 6.70605 3.45888 6.65527 3.315 6.65527ZM3.315 3.57031H0.572813C0.437396 3.57031 0.318906 3.62109 0.217344 3.72266C0.115781 3.82422 0.0650001 3.94694 0.0650001 4.09082V5.46191C0.0650001 5.59733 0.115781 5.71582 0.217344 5.81738C0.318906 5.91895 0.437396 5.96973 0.572813 5.96973H3.315C3.45888 5.96973 3.57737 5.91895 3.67047 5.81738C3.77203 5.71582 3.82281 5.59733 3.82281 5.46191V4.09082C3.82281 3.94694 3.77203 3.82422 3.67047 3.72266C3.57737 3.62109 3.45888 3.57031 3.315 3.57031ZM7.93609 9.72754H5.19391C5.05003 9.72754 4.9273 9.77832 4.82574 9.87988C4.73264 9.98145 4.68609 10.1042 4.68609 10.248V11.6191C4.68609 11.7546 4.73264 11.873 4.82574 11.9746C4.9273 12.0762 5.05003 12.127 5.19391 12.127H7.93609C8.07151 12.127 8.19 12.0762 8.29156 11.9746C8.39313 11.873 8.44391 11.7546 8.44391 11.6191V10.248C8.44391 10.1042 8.39313 9.98145 8.29156 9.87988C8.19846 9.77832 8.07997 9.72754 7.93609 9.72754ZM7.93609 6.65527H5.19391C5.05003 6.65527 4.9273 6.70605 4.82574 6.80762C4.73264 6.90918 4.68609 7.02767 4.68609 7.16309V8.53418C4.68609 8.67806 4.73264 8.80078 4.82574 8.90234C4.9273 9.00391 5.05003 9.05469 5.19391 9.05469H7.93609C8.07151 9.05469 8.19 9.00391 8.29156 8.90234C8.39313 8.80078 8.44391 8.67806 8.44391 8.53418V7.16309C8.44391 7.02767 8.39313 6.90918 8.29156 6.80762C8.19846 6.70605 8.07997 6.65527 7.93609 6.65527ZM12.5572 9.72754H9.815C9.67112 9.72754 9.5484 9.77832 9.44684 9.87988C9.35374 9.98145 9.30719 10.1042 9.30719 10.248V11.6191C9.30719 11.7546 9.35374 11.873 9.44684 11.9746C9.5484 12.0762 9.67112 12.127 9.815 12.127H12.5572C12.6926 12.127 12.8111 12.0762 12.9127 11.9746C13.0142 11.873 13.065 11.7546 13.065 11.6191V10.248C13.065 10.1042 13.0142 9.98145 12.9127 9.87988C12.8111 9.77832 12.6926 9.72754 12.5572 9.72754ZM12.5572 6.65527H9.815C9.67112 6.65527 9.5484 6.70605 9.44684 6.80762C9.35374 6.90918 9.30719 7.02767 9.30719 7.16309V8.53418C9.30719 8.67806 9.35374 8.80078 9.44684 8.90234C9.5484 9.00391 9.67112 9.05469 9.815 9.05469H12.5572C12.6926 9.05469 12.8111 9.00391 12.9127 8.90234C13.0142 8.80078 13.065 8.67806 13.065 8.53418V7.16309C13.065 7.02767 13.0142 6.90918 12.9127 6.80762C12.8111 6.70605 12.6926 6.65527 12.5572 6.65527ZM12.5572 3.57031H9.815C9.67112 3.57031 9.5484 3.62109 9.44684 3.72266C9.35374 3.82422 9.30719 3.94694 9.30719 4.09082V5.46191C9.30719 5.59733 9.35374 5.71582 9.44684 5.81738C9.5484 5.91895 9.67112 5.96973 9.815 5.96973H12.5572C12.6926 5.96973 12.8111 5.91895 12.9127 5.81738C13.0142 5.71582 13.065 5.59733 13.065 5.46191V4.09082C13.065 3.94694 13.0142 3.82422 12.9127 3.72266C12.8111 3.62109 12.6926 3.57031 12.5572 3.57031ZM12.5572 0.498047H9.815C9.67112 0.498047 9.5484 0.548828 9.44684 0.650391C9.35374 0.751953 9.30719 0.870443 9.30719 1.00586V2.37695C9.30719 2.52083 9.35374 2.64355 9.44684 2.74512C9.5484 2.84668 9.67112 2.89746 9.815 2.89746H12.5572C12.6926 2.89746 12.8111 2.84668 12.9127 2.74512C13.0142 2.64355 13.065 2.52083 13.065 2.37695V1.00586C13.065 0.870443 13.0142 0.751953 12.9127 0.650391C12.8111 0.548828 12.6926 0.498047 12.5572 0.498047Z" />
                                </svg>Voir tous les projets
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End project-section -->
        <!-- Begin clients 
                                        <section class="client-section dark-section v-separator pt-xs-50 pt-md-50 pt-lg-120 pb-xs-50 pb-md-50 pb-lg-120">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="section-header white">
                                                            <h2>Nos Clients</h2>
                                                        </div>
                                                        <div class="cd-headline letters">
                                                            <ul class="cd-words-wrapper">
                                                                <li class="is-visible">
                                                                    <div>
                                                                        <h3>Michael L. Earle</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Ann R. Houston</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Natasha D. Ward</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Katie W. Dunnv</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Roger L. Hoehne</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Thomas A. Elliott</h3>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                        <h3>Bobby T. Hodge</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-lg-3">
                                                                <ul class="clients-list">
                                                                    <li>Michael Earle</li>
                                                                    <li>Michael Vazquez</li>
                                                                    <li>Matthew Duncan</li>
                                                                    <li>Rickey Campbell</li>
                                                                    <li>Jonathan Ku</li>
                                                                    <li>Theresa Ochoa</li>
                                                                    <li>Angela Hunley</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4 col-lg-3 collapse-clients collapsed-xs">
                                                                <ul class="clients-list">
                                                                    <li>Beverly Pleasants</li>
                                                                    <li>Louis Shay</li>
                                                                    <li>Stephen Rivers</li>
                                                                    <li>Alan Doody</li>
                                                                    <li>Betty Cochran</li>
                                                                    <li>Marlene Fowler</li>
                                                                    <li>Lois Olson</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4 col-lg-3 collapse-clients collapsed-xs">
                                                                <ul class="clients-list">
                                                                    <li>Dorothy Riddle</li>
                                                                    <li>Katie Dunnv</li>
                                                                    <li>Roger Hoehne</li>
                                                                    <li>Thomas Elliott</li>
                                                                    <li>Bobby Hodge</li>
                                                                    <li>Ashley Greene</li>
                                                                    <li>Dorothy Shepherd</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4 col-lg-3 collapse-clients collapsed-sm">
                                                                <ul class="clients-list">
                                                                    <li>Theresa Blanding</li>
                                                                    <li>George Norsworthy</li>
                                                                    <li>Nathalie Smith</li>
                                                                    <li>Ben Worrell</li>
                                                                    <li>Jane Wilcher</li>
                                                                    <li>Pena</li>
                                                                    <li>Orville Thompson</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button dark center-btn mt-30 visible-sm" data-show-collapse=".collapse-clients">
                                                            <svg width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M3.315 9.72754H0.572813C0.437396 9.72754 0.318906 9.77832 0.217344 9.87988C0.115781 9.98145 0.0650001 10.1042 0.0650001 10.248V11.6191C0.0650001 11.7546 0.115781 11.873 0.217344 11.9746C0.318906 12.0762 0.437396 12.127 0.572813 12.127H3.315C3.45888 12.127 3.57737 12.0762 3.67047 11.9746C3.77203 11.873 3.82281 11.7546 3.82281 11.6191V10.248C3.82281 10.1042 3.77203 9.98145 3.67047 9.87988C3.57737 9.77832 3.45888 9.72754 3.315 9.72754ZM3.315 6.65527H0.572813C0.437396 6.65527 0.318906 6.70605 0.217344 6.80762C0.115781 6.90918 0.0650001 7.02767 0.0650001 7.16309V8.53418C0.0650001 8.67806 0.115781 8.80078 0.217344 8.90234C0.318906 9.00391 0.437396 9.05469 0.572813 9.05469H3.315C3.45888 9.05469 3.57737 9.00391 3.67047 8.90234C3.77203 8.80078 3.82281 8.67806 3.82281 8.53418V7.16309C3.82281 7.02767 3.77203 6.90918 3.67047 6.80762C3.57737 6.70605 3.45888 6.65527 3.315 6.65527ZM3.315 3.57031H0.572813C0.437396 3.57031 0.318906 3.62109 0.217344 3.72266C0.115781 3.82422 0.0650001 3.94694 0.0650001 4.09082V5.46191C0.0650001 5.59733 0.115781 5.71582 0.217344 5.81738C0.318906 5.91895 0.437396 5.96973 0.572813 5.96973H3.315C3.45888 5.96973 3.57737 5.91895 3.67047 5.81738C3.77203 5.71582 3.82281 5.59733 3.82281 5.46191V4.09082C3.82281 3.94694 3.77203 3.82422 3.67047 3.72266C3.57737 3.62109 3.45888 3.57031 3.315 3.57031ZM7.93609 9.72754H5.19391C5.05003 9.72754 4.9273 9.77832 4.82574 9.87988C4.73264 9.98145 4.68609 10.1042 4.68609 10.248V11.6191C4.68609 11.7546 4.73264 11.873 4.82574 11.9746C4.9273 12.0762 5.05003 12.127 5.19391 12.127H7.93609C8.07151 12.127 8.19 12.0762 8.29156 11.9746C8.39313 11.873 8.44391 11.7546 8.44391 11.6191V10.248C8.44391 10.1042 8.39313 9.98145 8.29156 9.87988C8.19846 9.77832 8.07997 9.72754 7.93609 9.72754ZM7.93609 6.65527H5.19391C5.05003 6.65527 4.9273 6.70605 4.82574 6.80762C4.73264 6.90918 4.68609 7.02767 4.68609 7.16309V8.53418C4.68609 8.67806 4.73264 8.80078 4.82574 8.90234C4.9273 9.00391 5.05003 9.05469 5.19391 9.05469H7.93609C8.07151 9.05469 8.19 9.00391 8.29156 8.90234C8.39313 8.80078 8.44391 8.67806 8.44391 8.53418V7.16309C8.44391 7.02767 8.39313 6.90918 8.29156 6.80762C8.19846 6.70605 8.07997 6.65527 7.93609 6.65527ZM12.5572 9.72754H9.815C9.67112 9.72754 9.5484 9.77832 9.44684 9.87988C9.35374 9.98145 9.30719 10.1042 9.30719 10.248V11.6191C9.30719 11.7546 9.35374 11.873 9.44684 11.9746C9.5484 12.0762 9.67112 12.127 9.815 12.127H12.5572C12.6926 12.127 12.8111 12.0762 12.9127 11.9746C13.0142 11.873 13.065 11.7546 13.065 11.6191V10.248C13.065 10.1042 13.0142 9.98145 12.9127 9.87988C12.8111 9.77832 12.6926 9.72754 12.5572 9.72754ZM12.5572 6.65527H9.815C9.67112 6.65527 9.5484 6.70605 9.44684 6.80762C9.35374 6.90918 9.30719 7.02767 9.30719 7.16309V8.53418C9.30719 8.67806 9.35374 8.80078 9.44684 8.90234C9.5484 9.00391 9.67112 9.05469 9.815 9.05469H12.5572C12.6926 9.05469 12.8111 9.00391 12.9127 8.90234C13.0142 8.80078 13.065 8.67806 13.065 8.53418V7.16309C13.065 7.02767 13.0142 6.90918 12.9127 6.80762C12.8111 6.70605 12.6926 6.65527 12.5572 6.65527ZM12.5572 3.57031H9.815C9.67112 3.57031 9.5484 3.62109 9.44684 3.72266C9.35374 3.82422 9.30719 3.94694 9.30719 4.09082V5.46191C9.30719 5.59733 9.35374 5.71582 9.44684 5.81738C9.5484 5.91895 9.67112 5.96973 9.815 5.96973H12.5572C12.6926 5.96973 12.8111 5.91895 12.9127 5.81738C13.0142 5.71582 13.065 5.59733 13.065 5.46191V4.09082C13.065 3.94694 13.0142 3.82422 12.9127 3.72266C12.8111 3.62109 12.6926 3.57031 12.5572 3.57031ZM12.5572 0.498047H9.815C9.67112 0.498047 9.5484 0.548828 9.44684 0.650391C9.35374 0.751953 9.30719 0.870443 9.30719 1.00586V2.37695C9.30719 2.52083 9.35374 2.64355 9.44684 2.74512C9.5484 2.84668 9.67112 2.89746 9.815 2.89746H12.5572C12.6926 2.89746 12.8111 2.84668 12.9127 2.74512C13.0142 2.64355 13.065 2.52083 13.065 2.37695V1.00586C13.065 0.870443 13.0142 0.751953 12.9127 0.650391C12.8111 0.548828 12.6926 0.498047 12.5572 0.498047Z" />
                                                            </svg>view all clients</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="section-bg bg-fixed lazy" data-src="./img/clients-bg-2.jpg"></div>
                                        </section>
                                        End clients -->

        <!-- Begin testimonials -->
        <section
            class="dark-section testimonial-section v-separator pt-xs-40 pt-md-50 pt-lg-100 pb-xs-40 pb-md-50 pb-lg-100">
            <img src="img/quote.png" class="quote-img" alt="img">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-6">
                        <div class="testimonials-slider white-arrow" data-slick='{
                                                                                                                         "slidesToShow": 1,
                                                                                                                         "swipeToSlide": true,
                                                                                                                         "adaptiveHeight": true,
                                                                                                                         "responsive": [
                                                                                                                             {
                                                                                                                                 "breakpoint": 992,
                                                                                                                                 "settings": {
                                                                                                                                     "slidesToShow": 1,
                                                                                                                                     "arrows": false,
                                                                                                                                     "adaptiveHeight": true,
                                                                                                                                     "dots": true
                                                                                                                                 }
                                                                                                                             }
                                                                                                                         ]
                                                                                                                    }'>
                            <div class="tt-slide">
                                <div class="text-block white">
                                    <h2>Ce qu'ils disent de NEEMA</h2>
                                    <p>Les produits que j'ai créés avec leur aide ont été considérés comme exceptionnels,
                                        tant en termes de musique que de graphisme. Je recommande NEEMA sans réserve et sans
                                        réserve.</p>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="text-block white">
                                    <h2>Ce qu'ils disent de NEEMA</h2>
                                    <p>Les produits que j'ai créés avec leur aide ont été considérés comme exceptionnels,
                                        tant en termes de musique que de graphisme. Je recommande NEEMA sans réserve et sans
                                        réserve.</p>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="text-block white">
                                    <h2>Ce qu'ils disent de NEEMA</h2>
                                    <p>Les produits que j'ai créés avec leur aide ont été considérés comme exceptionnels,
                                        tant en termes de musique que de graphisme. Je recommande NEEMA sans réserve et sans
                                        réserve.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <img src="{{ asset('img/comment.png') }}" alt="comment">
                    </div>
                </div>
            </div>
            <!-- <button class="slick-prev slick-arrow" id="testimonial-prev" aria-label="Previous" type="button" style=""><svg width="22" height="41" viewBox="0 0 22 41" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5312 40.5L0.53125 20.5L20.5312 0.5L21.4688 1.4375L2.44531 20.5L21.4688 39.5625L20.5312 40.5Z" fill="#3D3B42"></path></svg></button>
                                                                                                    <button class="slick-next slick-arrow" id="testimonial-next" aria-label="Next" type="button" style=""><svg width="22" height="41" viewBox="0 0 22 41" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.66875 40.5L21.6688 20.5L1.66875 0.5L0.731251 1.4375L19.7547 20.5L0.731251 39.5625L1.66875 40.5Z" fill="#3D3B42"></path></svg></button>
                                                                                                    "prevArrow": "$(&apos;#testimonial-prev&apos;)",
                                                                                                    "nextArrow": "$(&apos;#testimonial-next&apos;)", -->
        </section>
        <!-- Eng testimonials -->
        <!-- Begin engineers-section -->
        <section class="white-section v-separator pt-xs-50 pt-md-50 pt-lg-120 pb-xs-50 pb-md-50 pb-lg-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header">
                            <h2>Nos Ingénieurs</h2>
                            <p>Chez NEEMA, nous pensons que le calibre de vos ingénieurs et producteurs est tout aussi
                                important que la qualité du studio dans lequel vous travaillez.</p>
                        </div>
                        <div class="engineer-slider" data-slick='{
                                                                                                                         "slidesToShow": 3,
                                                                                                                         "swipeToSlide": true,
                                                                                                                         "adaptiveHeight": true,
                                                                                                                         "arrows": false,
                                                                                                                         "dots": true,
                                                                                                                         "responsive": [
                                                                                                                             {
                                                                                                                                 "breakpoint": 1200,
                                                                                                                                 "settings": {
                                                                                                                                     "slidesToShow": 2,
                                                                                                                                     "arrows": false,
                                                                                                                                     "adaptiveHeight": true,
                                                                                                                                     "dots": true
                                                                                                                                 }
                                                                                                                             },
                                                                                                                             {
                                                                                                                                 "breakpoint": 992,
                                                                                                                                 "settings": {
                                                                                                                                     "slidesToShow": 2,
                                                                                                                                     "arrows": false,
                                                                                                                                     "adaptiveHeight": true,
                                                                                                                                     "dots": true
                                                                                                                                 }
                                                                                                                             },
                                                                                                                             {
                                                                                                                                 "breakpoint": 768,
                                                                                                                                 "settings": {
                                                                                                                                     "slidesToShow": 1,
                                                                                                                                     "arrows": false,
                                                                                                                                     "adaptiveHeight": true,
                                                                                                                                     "dots": true
                                                                                                                                 }
                                                                                                                             }
                                                                                                                         ]
                                                                                                                     }'>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>Bryan Johnson</h4>
                                        <p>Engineer / Owner</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-1.webp">
                                        <source type="image/jpeg" srcset="img/engineer-1.png">
                                        <img src="img/engineer-1.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>Linda Thomas</h4>
                                        <p>Engineer / Owner</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-2.webp">
                                        <source type="image/jpeg" srcset="img/engineer-2.png">
                                        <img src="img/engineer-2.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>Jessie Ramirez</h4>
                                        <p>Engineer</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-3.webp">
                                        <source type="image/jpeg" srcset="img/engineer-3.png">
                                        <img src="img/engineer-3.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>David Reyna</h4>
                                        <p>Producer</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-4.webp">
                                        <source type="image/jpeg" srcset="img/engineer-4.png">
                                        <img src="img/engineer-4.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>Michael Hadlock</h4>
                                        <p>Engineer</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-5.webp">
                                        <source type="image/jpeg" srcset="img/engineer-5.png">
                                        <img src="img/engineer-5.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                            <div class="tt-slide">
                                <div class="engineer-card">
                                    <div class="engineer-card_info">
                                        <h4>Evelyn Schultz</h4>
                                        <p>Producer</p>
                                        <a href="about.html" class="read-more">
                                            <svg width="9" height="10" viewBox="0 0 9 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.47188 0.337891C1.06823 0.103516 0.723177 0.0709635 0.436719 0.240234C0.150261 0.402995 0.00703144 0.71875 0.00703144 1.1875V8.0625C0.00703144 8.53125 0.150261 8.84701 0.436719 9.00977C0.723177 9.17253 1.06823 9.13997 1.47188 8.91211L7.4875 5.46484C7.89115 5.23047 8.09297 4.95052 8.09297 4.625C8.09297 4.29948 7.89115 4.01953 7.4875 3.78516L1.47188 0.337891Z" />
                                            </svg>know more
                                        </a>
                                    </div>
                                    <picture>
                                        <source type="image/webp" srcset="img/engineer-6.webp">
                                        <source type="image/jpeg" srcset="img/engineer-6.png">
                                        <img src="img/engineer-6.png" class="engineer-avatar" alt="img">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-bg op-1 bg-fixed lazy" data-src="./img/engineers-bg.jpg"></div>
        </section>
        <!-- End engineers-section -->
        <!-- Begin instagram block-->
        <section class="dark-section instagram-section pt-xs-40 pt-md-50 pt-lg-100">
            <div class="container">
                <h2 class="text-center white-color mb-xs-20 mb-md-30">Instagram <span
                        class="theme-color">@NEEMAMAAJABU</span></h2>
            </div>
            <div id="instafeed" class="instagram-grid-full"></div>
            <div class="show-insta pb-xs-40 pb-md-50 pb-lg-100">
                <a href="#" class="button dark center-btn mt-xs-30 mt-md-40" data-show-collapse=".instagram-grid-full a">
                    <svg width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.315 9.72754H0.572813C0.437396 9.72754 0.318906 9.77832 0.217344 9.87988C0.115781 9.98145 0.0650001 10.1042 0.0650001 10.248V11.6191C0.0650001 11.7546 0.115781 11.873 0.217344 11.9746C0.318906 12.0762 0.437396 12.127 0.572813 12.127H3.315C3.45888 12.127 3.57737 12.0762 3.67047 11.9746C3.77203 11.873 3.82281 11.7546 3.82281 11.6191V10.248C3.82281 10.1042 3.77203 9.98145 3.67047 9.87988C3.57737 9.77832 3.45888 9.72754 3.315 9.72754ZM3.315 6.65527H0.572813C0.437396 6.65527 0.318906 6.70605 0.217344 6.80762C0.115781 6.90918 0.0650001 7.02767 0.0650001 7.16309V8.53418C0.0650001 8.67806 0.115781 8.80078 0.217344 8.90234C0.318906 9.00391 0.437396 9.05469 0.572813 9.05469H3.315C3.45888 9.05469 3.57737 9.00391 3.67047 8.90234C3.77203 8.80078 3.82281 8.67806 3.82281 8.53418V7.16309C3.82281 7.02767 3.77203 6.90918 3.67047 6.80762C3.57737 6.70605 3.45888 6.65527 3.315 6.65527ZM3.315 3.57031H0.572813C0.437396 3.57031 0.318906 3.62109 0.217344 3.72266C0.115781 3.82422 0.0650001 3.94694 0.0650001 4.09082V5.46191C0.0650001 5.59733 0.115781 5.71582 0.217344 5.81738C0.318906 5.91895 0.437396 5.96973 0.572813 5.96973H3.315C3.45888 5.96973 3.57737 5.91895 3.67047 5.81738C3.77203 5.71582 3.82281 5.59733 3.82281 5.46191V4.09082C3.82281 3.94694 3.77203 3.82422 3.67047 3.72266C3.57737 3.62109 3.45888 3.57031 3.315 3.57031ZM7.93609 9.72754H5.19391C5.05003 9.72754 4.9273 9.77832 4.82574 9.87988C4.73264 9.98145 4.68609 10.1042 4.68609 10.248V11.6191C4.68609 11.7546 4.73264 11.873 4.82574 11.9746C4.9273 12.0762 5.05003 12.127 5.19391 12.127H7.93609C8.07151 12.127 8.19 12.0762 8.29156 11.9746C8.39313 11.873 8.44391 11.7546 8.44391 11.6191V10.248C8.44391 10.1042 8.39313 9.98145 8.29156 9.87988C8.19846 9.77832 8.07997 9.72754 7.93609 9.72754ZM7.93609 6.65527H5.19391C5.05003 6.65527 4.9273 6.70605 4.82574 6.80762C4.73264 6.90918 4.68609 7.02767 4.68609 7.16309V8.53418C4.68609 8.67806 4.73264 8.80078 4.82574 8.90234C4.9273 9.00391 5.05003 9.05469 5.19391 9.05469H7.93609C8.07151 9.05469 8.19 9.00391 8.29156 8.90234C8.39313 8.80078 8.44391 8.67806 8.44391 8.53418V7.16309C8.44391 7.02767 8.39313 6.90918 8.29156 6.80762C8.19846 6.70605 8.07997 6.65527 7.93609 6.65527ZM12.5572 9.72754H9.815C9.67112 9.72754 9.5484 9.77832 9.44684 9.87988C9.35374 9.98145 9.30719 10.1042 9.30719 10.248V11.6191C9.30719 11.7546 9.35374 11.873 9.44684 11.9746C9.5484 12.0762 9.67112 12.127 9.815 12.127H12.5572C12.6926 12.127 12.8111 12.0762 12.9127 11.9746C13.0142 11.873 13.065 11.7546 13.065 11.6191V10.248C13.065 10.1042 13.0142 9.98145 12.9127 9.87988C12.8111 9.77832 12.6926 9.72754 12.5572 9.72754ZM12.5572 6.65527H9.815C9.67112 6.65527 9.5484 6.70605 9.44684 6.80762C9.35374 6.90918 9.30719 7.02767 9.30719 7.16309V8.53418C9.30719 8.67806 9.35374 8.80078 9.44684 8.90234C9.5484 9.00391 9.67112 9.05469 9.815 9.05469H12.5572C12.6926 9.05469 12.8111 9.00391 12.9127 8.90234C13.0142 8.80078 13.065 8.67806 13.065 8.53418V7.16309C13.065 7.02767 13.0142 6.90918 12.9127 6.80762C12.8111 6.70605 12.6926 6.65527 12.5572 6.65527ZM12.5572 3.57031H9.815C9.67112 3.57031 9.5484 3.62109 9.44684 3.72266C9.35374 3.82422 9.30719 3.94694 9.30719 4.09082V5.46191C9.30719 5.59733 9.35374 5.71582 9.44684 5.81738C9.5484 5.91895 9.67112 5.96973 9.815 5.96973H12.5572C12.6926 5.96973 12.8111 5.91895 12.9127 5.81738C13.0142 5.71582 13.065 5.59733 13.065 5.46191V4.09082C13.065 3.94694 13.0142 3.82422 12.9127 3.72266C12.8111 3.62109 12.6926 3.57031 12.5572 3.57031ZM12.5572 0.498047H9.815C9.67112 0.498047 9.5484 0.548828 9.44684 0.650391C9.35374 0.751953 9.30719 0.870443 9.30719 1.00586V2.37695C9.30719 2.52083 9.35374 2.64355 9.44684 2.74512C9.5484 2.84668 9.67112 2.89746 9.815 2.89746H12.5572C12.6926 2.89746 12.8111 2.84668 12.9127 2.74512C13.0142 2.64355 13.065 2.52083 13.065 2.37695V1.00586C13.065 0.870443 13.0142 0.751953 12.9127 0.650391C12.8111 0.548828 12.6926 0.498047 12.5572 0.498047Z">
                        </path>
                    </svg>plus de photos
                </a>
            </div>
        </section>
        <!-- End instagram block-->

        <section class="white-section v-separator pt-xs-50 pt-md-50 pt-lg-120 pb-xs-20 pb-md-30 pb-lg-110">
            <div class="container">
                <div class="row" style="align-items: center; justify-content: center">
                    <div class="col-12">
                        <div class="section-header">
                            <h2>Réservation</h2>
                            <p>Sélectionnez votre session et réservez en ligne instantanément. Si vous avez des questions,
                                vous nous appelez ou nous envoyez un e-mail</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="book-btn open-popup-link" data-href="#bookingPopup">
                            <h4><span class="ico"><svg width="24" height="25" viewBox="0 0 24 25"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.7031 12.1953V1.17969C12.7031 0.992188 12.6328 0.835938 12.4922 0.710938C12.3672 0.570312 12.2109 0.5 12.0234 0.5C11.8359 0.5 11.6719 0.570312 11.5312 0.710938C11.4062 0.835938 11.3438 0.992188 11.3438 1.17969V12.1953C10.5625 12.3516 9.90625 12.7422 9.375 13.3672C8.85938 13.9922 8.60156 14.7188 8.60156 15.5469C8.60156 16.375 8.85938 17.1094 9.375 17.75C9.90625 18.375 10.5625 18.7656 11.3438 18.9219V23.8203C11.3438 24.0078 11.4062 24.1641 11.5312 24.2891C11.6719 24.4297 11.8359 24.5 12.0234 24.5C12.2109 24.5 12.3672 24.4297 12.4922 24.2891C12.6328 24.1641 12.7031 24.0078 12.7031 23.8203V18.9219C13.4844 18.7656 14.1328 18.375 14.6484 17.75C15.1797 17.1094 15.4453 16.375 15.4453 15.5469C15.4453 14.7188 15.1797 13.9922 14.6484 13.3672C14.1328 12.7422 13.4844 12.3516 12.7031 12.1953ZM12.0234 17.6328C11.4453 17.6328 10.9531 17.4297 10.5469 17.0234C10.1562 16.6172 9.96094 16.125 9.96094 15.5469C9.96094 14.9844 10.1562 14.5 10.5469 14.0938C10.9531 13.6875 11.4453 13.4844 12.0234 13.4844C12.6016 13.4844 13.0938 13.6875 13.5 14.0938C13.9062 14.5 14.1094 14.9844 14.1094 15.5469C14.1094 16.125 13.9062 16.6172 13.5 17.0234C13.0938 17.4297 12.6016 17.6328 12.0234 17.6328ZM4.42969 6.54688V1.17969C4.42969 0.992188 4.36719 0.835938 4.24219 0.710938C4.11719 0.570312 3.96094 0.5 3.77344 0.5C3.58594 0.5 3.42188 0.570312 3.28125 0.710938C3.15625 0.835938 3.09375 0.992188 3.09375 1.17969V6.54688C2.3125 6.70312 1.65625 7.09375 1.125 7.71875C0.609375 8.34375 0.351562 9.07031 0.351562 9.89844C0.351562 10.7266 0.609375 11.4531 1.125 12.0781C1.65625 12.7031 2.3125 13.0938 3.09375 13.25V23.8203C3.09375 24.0078 3.15625 24.1641 3.28125 24.2891C3.42188 24.4297 3.58594 24.5 3.77344 24.5C3.96094 24.5 4.11719 24.4297 4.24219 24.2891C4.36719 24.1641 4.42969 24.0078 4.42969 23.8203V13.25C5.21094 13.0938 5.86719 12.7031 6.39844 12.0781C6.92969 11.4531 7.19531 10.7266 7.19531 9.89844C7.19531 9.07031 6.92969 8.34375 6.39844 7.71875C5.86719 7.09375 5.21094 6.70312 4.42969 6.54688ZM3.77344 11.9844C3.19531 11.9844 2.70312 11.7812 2.29688 11.375C1.89062 10.9688 1.6875 10.4766 1.6875 9.89844C1.6875 9.32031 1.89062 8.83594 2.29688 8.44531C2.70312 8.03906 3.19531 7.83594 3.77344 7.83594C4.33594 7.83594 4.82031 8.03906 5.22656 8.44531C5.63281 8.83594 5.83594 9.32031 5.83594 9.89844C5.83594 10.4766 5.63281 10.9688 5.22656 11.375C4.82031 11.7812 4.33594 11.9844 3.77344 11.9844ZM20.9062 6.54688V1.17969C20.9062 0.992188 20.8359 0.835938 20.6953 0.710938C20.5703 0.570312 20.4141 0.5 20.2266 0.5C20.0391 0.5 19.8828 0.570312 19.7578 0.710938C19.6328 0.835938 19.5703 0.992188 19.5703 1.17969V6.54688C18.7891 6.70312 18.1328 7.09375 17.6016 7.71875C17.0703 8.34375 16.8047 9.07031 16.8047 9.89844C16.8047 10.7266 17.0703 11.4531 17.6016 12.0781C18.1328 12.7031 18.7891 13.0938 19.5703 13.25V23.8203C19.5703 24.0078 19.6328 24.1641 19.7578 24.2891C19.8828 24.4297 20.0391 24.5 20.2266 24.5C20.4141 24.5 20.5703 24.4297 20.6953 24.2891C20.8359 24.1641 20.9062 24.0078 20.9062 23.8203V13.25C21.6875 13.0938 22.3359 12.7031 22.8516 12.0781C23.3828 11.4531 23.6484 10.7266 23.6484 9.89844C23.6484 9.07031 23.3828 8.34375 22.8516 7.71875C22.3359 7.09375 21.6875 6.70312 20.9062 6.54688ZM20.2266 11.9844C19.6641 11.9844 19.1797 11.7812 18.7734 11.375C18.3672 10.9688 18.1641 10.4766 18.1641 9.89844C18.1641 9.32031 18.3672 8.83594 18.7734 8.44531C19.1797 8.03906 19.6641 7.83594 20.2266 7.83594C20.8047 7.83594 21.2969 8.03906 21.7031 8.44531C22.1094 8.83594 22.3125 9.32031 22.3125 9.89844C22.3125 10.4766 22.1094 10.9688 21.7031 11.375C21.2969 11.7812 20.8047 11.9844 20.2266 11.9844Z" />
                                    </svg></span> Réserver une session d'ingénieur</h4>
                            <p>À partir de <span>$95 / heure</span></p>
                        </div>
                    </div>
                    <!--
                            <div class="col-md-4">
                                <div class="book-btn open-popup-link" data-href="#bookingPopup">
                                    <h4><span class="ico"><svg width="18" height="23" viewBox="0 0 18 23"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.0156 0.578125C16.9375 0.515625 16.8438 0.476562 16.7344 0.460938C16.625 0.429687 16.5156 0.429687 16.4062 0.460938L6.72656 3.25C6.58594 3.28125 6.46875 3.35937 6.375 3.48438C6.28125 3.60938 6.23438 3.75 6.23438 3.90625V16.3516C5.9375 16.1328 5.61719 15.9609 5.27344 15.8359C4.92969 15.7109 4.5625 15.6484 4.17188 15.6484C3.21875 15.6484 2.39844 15.9922 1.71094 16.6797C1.03906 17.3516 0.703125 18.1641 0.703125 19.1172C0.703125 20.0703 1.03906 20.8828 1.71094 21.5547C2.39844 22.2266 3.21875 22.5625 4.17188 22.5625C5.10938 22.5625 5.91406 22.2266 6.58594 21.5547C7.27344 20.8828 7.61719 20.0703 7.61719 19.1172V7.1875L15.9141 4.79688V13.5859C15.6172 13.3672 15.2891 13.1953 14.9297 13.0703C14.5859 12.9453 14.2188 12.8828 13.8281 12.8828C12.875 12.8828 12.0625 13.2266 11.3906 13.9141C10.7188 14.5859 10.3828 15.3984 10.3828 16.3516C10.3828 17.3047 10.7188 18.1172 11.3906 18.7891C12.0625 19.4609 12.875 19.7969 13.8281 19.7969C14.7812 19.7969 15.5938 19.4609 16.2656 18.7891C16.9531 18.1172 17.2969 17.3047 17.2969 16.3516V1.11719C17.2969 1.02344 17.2734 0.929688 17.2266 0.835938C17.1797 0.726563 17.1094 0.640625 17.0156 0.578125ZM4.17188 21.1797C3.59375 21.1797 3.10156 20.9766 2.69531 20.5703C2.28906 20.1641 2.08594 19.6797 2.08594 19.1172C2.08594 18.5391 2.28906 18.0469 2.69531 17.6406C3.10156 17.2344 3.59375 17.0312 4.17188 17.0312C4.73438 17.0312 5.21875 17.2344 5.625 17.6406C6.03125 18.0469 6.23438 18.5391 6.23438 19.1172C6.23438 19.6797 6.03125 20.1641 5.625 20.5703C5.21875 20.9766 4.73438 21.1797 4.17188 21.1797ZM13.8281 18.4141C13.2656 18.4141 12.7812 18.2109 12.375 17.8047C11.9688 17.3984 11.7656 16.9141 11.7656 16.3516C11.7656 15.7734 11.9688 15.2812 12.375 14.875C12.7812 14.4688 13.2656 14.2656 13.8281 14.2656C14.4062 14.2656 14.8984 14.4688 15.3047 14.875C15.7109 15.2812 15.9141 15.7734 15.9141 16.3516C15.9141 16.9141 15.7109 17.3984 15.3047 17.8047C14.8984 18.2109 14.4062 18.4141 13.8281 18.4141ZM15.9141 3.36719L7.61719 5.73438V4.42188L15.9141 2.05469V3.36719Z" />
                                            </svg></span> Séance de producteurs de livres</h4>
                                    <p>À partir de <span>$195 / heure</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book-btn open-popup-link" data-href="#bookingPopup">
                                    <h4><span class="ico"><svg width="24" height="19" viewBox="0 0 24 19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.8828 0.851562C20.3828 0.851562 19.9375 1.00781 19.5469 1.32031C19.1719 1.61719 18.9219 1.99219 18.7969 2.44531L5.08594 6.42969C4.91406 6.07031 4.64844 5.77344 4.28906 5.53906C3.94531 5.30469 3.55469 5.1875 3.11719 5.1875C2.52344 5.1875 2.01562 5.39844 1.59375 5.82031C1.17188 6.24219 0.960938 6.75 0.960938 7.34375V11.6562C0.960938 12.25 1.17188 12.7578 1.59375 13.1797C2.01562 13.6016 2.52344 13.8125 3.11719 13.8125C3.55469 13.8125 3.94531 13.6953 4.28906 13.4609C4.64844 13.2266 4.91406 12.9297 5.08594 12.5703L6.72656 13.0391V14.3281C6.72656 14.8125 6.86719 15.25 7.14844 15.6406C7.42969 16.0156 7.79688 16.2734 8.25 16.4141L12.5859 17.7031C12.6797 17.7344 12.7812 17.7578 12.8906 17.7734C13 17.7891 13.1016 17.7969 13.1953 17.7969C13.4297 17.7969 13.6562 17.7656 13.875 17.7031C14.0938 17.625 14.2969 17.5078 14.4844 17.3516C14.7656 17.1484 14.9766 16.8984 15.1172 16.6016C15.2734 16.3047 15.3516 15.9844 15.3516 15.6406V15.5469L18.7969 16.5547C18.9219 17.0078 19.1719 17.3906 19.5469 17.7031C19.9375 18 20.3828 18.1484 20.8828 18.1484C21.4766 18.1484 21.9844 17.9375 22.4062 17.5156C22.8281 17.0938 23.0391 16.5859 23.0391 15.9922V3.00781C23.0391 2.41406 22.8281 1.90625 22.4062 1.48438C21.9844 1.0625 21.4766 0.851562 20.8828 0.851562ZM3.84375 11.6562C3.84375 11.8594 3.77344 12.0312 3.63281 12.1719C3.49219 12.3125 3.32031 12.3828 3.11719 12.3828C2.91406 12.3828 2.74219 12.3125 2.60156 12.1719C2.46094 12.0312 2.39062 11.8594 2.39062 11.6562V7.34375C2.39062 7.14062 2.46094 6.96875 2.60156 6.82812C2.74219 6.6875 2.91406 6.61719 3.11719 6.61719C3.32031 6.61719 3.49219 6.6875 3.63281 6.82812C3.77344 6.96875 3.84375 7.14062 3.84375 7.34375V11.6562ZM13.9219 15.6406C13.9219 15.75 13.8906 15.8594 13.8281 15.9688C13.7812 16.0625 13.7188 16.1406 13.6406 16.2031C13.5469 16.2812 13.4375 16.3281 13.3125 16.3438C13.2031 16.3594 13.0938 16.3516 12.9844 16.3203L8.67188 15.0312C8.51562 14.9844 8.39062 14.8984 8.29688 14.7734C8.20312 14.6328 8.15625 14.4844 8.15625 14.3281V13.4609L13.9219 15.125V15.6406ZM18.7266 15.0312L14.8594 13.9062L5.27344 11.1172V7.88281L18.7266 3.96875V15.0312ZM21.6094 15.9922C21.6094 16.1797 21.5391 16.3438 21.3984 16.4844C21.2578 16.625 21.0859 16.6953 20.8828 16.6953C20.6797 16.6953 20.5078 16.625 20.3672 16.4844C20.2266 16.3438 20.1562 16.1797 20.1562 15.9922V3.00781C20.1562 2.82031 20.2266 2.65625 20.3672 2.51562C20.5078 2.375 20.6797 2.30469 20.8828 2.30469C21.0859 2.30469 21.2578 2.375 21.3984 2.51562C21.5391 2.65625 21.6094 2.82031 21.6094 3.00781V15.9922Z" />
                                            </svg></span> Séance d'assistant de réservation</h4>
                                    <p>À partir de <span>$75 / heure</span></p>
                                </div>
                            </div>-->
                </div>
            </div>
        </section>
    </main>

@endsection
