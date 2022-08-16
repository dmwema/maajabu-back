@extends('public.layout.main')

@php
$page = 'about';
$title = 'nos équipements';
@endphp

@section('content')
    <!-- Begin page-name -->
    <section class="page-name v-separator">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Equipment</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>Equipements</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <!-- End page-name -->
    <main>
        <!-- Begin fluid text-section -->
        <section class="white-section parralax-section pb-xs-25 pb-md-25 pb-lg-60">
            <div class="text-section fluid-text-section text-position-right ovh">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="fluid-text-img">
                            <div class="img-wrap">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="text-img lazy"
                                    data-src="./img/microphone.png" alt="bg">
                            </div>
                        </div>
                        <div class="offset-md-6 col-md-6 pt-xs-50 pt-md-50 pt-lg-120">
                            <div class="text-block">
                                <h2>Ce que nous utilisons pour un son parfait</h2>
                                <p class="h-sub">Neema Recording Studio offre aux clients un choix infini d'excellents
                                    enregistrements
                                    matériel de studio</p>
                                <p>Pour avoir une idée plus complète de l'équipement trouvé dans Neema Studio, veuillez voir
                                    ci-dessous pour
                                    notre liste complète d'équipements de studio d'enregistrement. Chaque pièce d'équipement
                                    que nous possédons peut être trouvée
                                    ici sur cette liste, et nous la mettons à jour régulièrement pour de nouveaux ajouts
                                    (nous adaptons toujours
                                    à l'évolution du paysage musical).</p>
                                <p>Que vous recherchiez un micro à ruban vintage spécifique ou un compresseur rare des
                                    années 70, nous
                                    J'espère que cette liste vous apportera quelques éclaircissements. Si vous aimez ce que
                                    vous voyez, entrez
                                    touchez pour réserver du temps en studio avec Neema.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                class="parallax-img parallax-right animate tt-paroller lazy" data-src="img/paralax-4.png"
                data-paroller-factor="0.15" data-paroller-type="foreground" alt="bg">
        </section>
        <!-- End fluid text-section -->
        <!-- Begin tile info section -->
        <section class="pt-xs-25 pt-md-25 pt-lg-60">
            <div class="tile-list">
                <div class="tile-list__item tile-list__item--dark">
                    <div class="tile-list-text">
                        <div class="tile-list-content">
                            <h3>Microphones</h3>
                            <ul>
                                <li>
                                    <p>Neumann Tlm 102</p>
                                </li>
                                <li>
                                    <p>Se Electronics 4400a (2 pieces)</p>
                                </li>
                                <li>
                                    <p>Blue Baby Bottle</p>
                                </li>
                                <li>
                                    <p>AKG C451 (Stereoset)</p>
                                </li>
                                <li>
                                    <p>Golden Age R1 (2 pieces)</p>
                                </li>
                                <li>
                                    <p>Electrovoice RE20</p>
                                </li>
                                <li>
                                    <p>Senheisser MD421 (3 pieces)</p>
                                </li>
                                <li>
                                    <p>Senheisser E902</p>
                                </li>
                                <li>
                                    <p>Shure Beta 91A</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile-list-img lazy" data-src="./img/tile-text-1.jpg"></div>
                </div>
                <div class="tile-list__item">
                    <div class="tile-list-text">
                        <div class="tile-list-content">
                            <h3>Préamplis / Channel Strips</h3>
                            <ul>
                                <li>
                                    <p>A-Designs Pacifica (2 channels)</p>
                                </li>
                                <li>
                                    <p>Universal Audio 4-710 twinfinity / 1176 style comp</p>
                                </li>
                                <li>
                                    <p>Golden Age Pre73/comp54 (2 channels)</p>
                                </li>
                                <li>
                                    <p>Joemeek Twin Q /comp/EQ (2 channels)</p>
                                </li>
                                <li>
                                    <p>Audient asp 880 (8 channels)</p>
                                </li>
                                <li>
                                    <p>Rme ff800 (4 channels)</p>
                                </li>
                                <li>
                                    <p>Focusrite Saffire pro 40 (8 channels)</p>
                                </li>
                                <li>
                                    <p>Focusrite Octopre (8 channels)</p>
                                </li>
                                <li>
                                    <p>Soundcraft M8 console (8 Channels)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile-list-img lazy" data-src="./img/tile-text-2.jpg"></div>
                </div>
                <div class="tile-list__item">
                    <div class="tile-list-text">
                        <div class="tile-list-content">
                            <h3>Monitoring</h3>
                            <ul>
                                <li>
                                    <p>Focal Solo 6 + Sub ( Control Room A)</p>
                                </li>
                                <li>
                                    <p>Dangerous Music Monitor ST (Control Room A)</p>
                                </li>
                                <li>
                                    <p>Focal Alpha 50 (Control Room B)</p>
                                </li>
                                <li>
                                    <p>Avantone mixcubes (Control Room A)</p>
                                </li>
                                <li>
                                    <p>Yamaha NSF 150 (Control Room A)</p>
                                </li>
                                <li>
                                    <p>Shure SE315 in ear monitoring</p>
                                </li>
                                <li>
                                    <p>Senheiser HD 215 (2 pieces)</p>
                                </li>
                                <li>
                                    <p>AKG K44 (2 pieces)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile-list-img lazy" data-src="./img/tile-text-3.jpg"></div>
                </div>
                <div class="tile-list__item">
                    <div class="tile-list-text">
                        <div class="tile-list-content">
                            <h3>Daw / Digital interface</h3>
                            <ul>
                                <li>
                                    <p>Mac Pro 8 core (Control Room A)</p>
                                </li>
                                <li>
                                    <p>Imac 27′ I7 (Control Room B)</p>
                                </li>
                                <li>
                                    <p>RME Fireface 800 (Control Room A)</p>
                                </li>
                                <li>
                                    <p>24 Channels Mackie MCU Pro</p>
                                </li>
                                <li>
                                    <p>Logic Pro X, Cubase 8, Protools 10</p>
                                </li>
                                <li>
                                    <p>Native Instruments Kontakt Komplete Ultimate</p>
                                </li>
                                <li>
                                    <p>Softube Console 1</p>
                                </li>
                                <li>
                                    <p>Softube All plugins</p>
                                </li>
                                <li>
                                    <p>Soundtoys All plugins and numerous other plugins</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile-list-img lazy" data-src="./img/tile-text-4.jpg"></div>
                </div>
                <div class="tile-list__item tile-list__item--dark">
                    <div class="tile-list-text">
                        <div class="tile-list-content">
                            <h3>Guitar & Bass</h3>
                            <ul>
                                <li>
                                    <p>Diezel Einstein 100 Watt</p>
                                </li>
                                <li>
                                    <p>Marshall JCM 2000</p>
                                </li>
                                <li>
                                    <p>Supro 1624 Dualtone 24 Watt (combo)</p>
                                </li>
                                <li>
                                    <p>Peavey 6505 100 Watt</p>
                                </li>
                                <li>
                                    <p>Kourbis Custom Plexi Amp 50 Watt</p>
                                </li>
                                <li>
                                    <p>B-52 100 Watt</p>
                                </li>
                                <li>
                                    <p>Orange Tiny Terror 15 Watt</p>
                                </li>
                                <li>
                                    <p>Bugera 333 100 Watt (combo)</p>
                                </li>
                                <li>
                                    <p>Gallien Krueger 700 RB 2 480 watt</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile-list-img lazy" data-src="./img/tile-text-5.jpg"></div>
                </div>
            </div>
        </section>
        <!-- End tile info section -->
        <!-- Begin call-banner-2 -->
        <section class="call-banner white-section v-separator pt-xs-40 pt-md-50 pt-lg-100 pb-xs-40 pb-md-50 pb-lg-100">
            <div class="container">
                <h2>Besoin de marketing et de promotion de la musique ?</h2>
                <p>Votre passion pour l'excellence nous inspire et nous motive</p>
                <a href="#bookingPopup"
                    class="button white btn-border center-btn open-popup-link sm-text mt-xs-30 mt-sm-40">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.6425 0C3.205 0 2.78833 0.0885417 2.3925 0.265625C1.99667 0.432292 1.65292 0.661458 1.36125 0.953125C1.06958 1.24479 0.835208 1.58854 0.658125 1.98438C0.491458 2.36979 0.408125 2.78646 0.408125 3.23438C0.408125 3.68229 0.491458 4.10417 0.658125 4.5C0.835208 4.89583 1.06958 5.23958 1.36125 5.53125C1.65292 5.82292 1.99667 6.05208 2.3925 6.21875C2.78833 6.38542 3.205 6.46875 3.6425 6.46875C4.09042 6.46875 4.51229 6.38542 4.90812 6.21875C5.30396 6.05208 5.64771 5.82292 5.93937 5.53125C6.23104 5.23958 6.46021 4.89583 6.62687 4.5C6.80396 4.10417 6.8925 3.68229 6.8925 3.23438C6.8925 2.78646 6.80396 2.36979 6.62687 1.98438C6.46021 1.58854 6.23104 1.24479 5.93937 0.953125C5.64771 0.661458 5.30396 0.432292 4.90812 0.265625C4.51229 0.0885417 4.09042 0 3.6425 0ZM5.06437 7.15625L10.9237 12.1406L12.3925 10.625L7.40812 4.85938C7.04354 5.54688 6.55917 6.10417 5.955 6.53125C5.36125 6.94792 5.06437 7.15625 5.06437 7.15625ZM13.2831 11.7656L12.705 10.9844L11.3456 12.4062L12.1269 12.9375L13.2831 11.7656ZM13.58 12.2344L12.5175 13.2656L13.0331 13.3594C13.0644 13.5052 13.08 13.7396 13.08 14.0625C13.0904 14.375 13.0071 14.6562 12.83 14.9062C12.705 15.0625 12.5383 15.1823 12.33 15.2656C12.1321 15.349 11.8925 15.3958 11.6112 15.4062C10.4237 15.4375 9.54354 15.3646 8.97062 15.1875C8.40812 15.0208 7.80396 14.5885 7.15812 13.8906C6.77271 13.4844 6.34042 13.1875 5.86125 13C5.38208 12.8125 4.92375 12.6927 4.48625 12.6406C4.05917 12.5781 3.68937 12.5573 3.37687 12.5781C3.07479 12.5885 2.90812 12.599 2.87687 12.6094C2.80396 12.6198 2.74146 12.6562 2.68937 12.7188C2.63729 12.7812 2.61646 12.8542 2.62687 12.9375C2.63729 13.0104 2.67375 13.0729 2.73625 13.125C2.79875 13.1771 2.87167 13.1979 2.955 13.1875C2.96542 13.1875 3.10604 13.1771 3.37687 13.1562C3.64771 13.1354 3.97583 13.151 4.36125 13.2031C4.74667 13.2552 5.15292 13.3594 5.58 13.5156C6.0175 13.6719 6.39771 13.9271 6.72062 14.2812C7.39771 15.0104 8.02792 15.4792 8.61125 15.6875C9.205 15.8958 9.97062 16 10.9081 16C11.0123 16 11.1269 16 11.2519 16C11.3769 16 11.5019 15.9948 11.6269 15.9844C12.0019 15.9844 12.33 15.9219 12.6112 15.7969C12.8925 15.6719 13.1217 15.4896 13.2987 15.25C13.5071 14.9583 13.6217 14.6458 13.6425 14.3125C13.6737 13.9792 13.6737 13.6979 13.6425 13.4688L13.7519 13.4844L13.58 12.2344Z" />
                    </svg>réserver une séance maintenant
                </a>
            </div>
        </section>
        <!-- End call-banner-2 -->
    </main>
@endsection
