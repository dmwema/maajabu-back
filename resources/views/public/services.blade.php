@extends('public.layout.main')

@php
$page = 'services';
$title = 'nos services';
@endphp

@section('content')
    <!-- Begin page-name -->
    <section class="page-name v-separator mb-xs-20 mb-md-25 mb-lg-65">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Services</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>Services</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <!-- End page-name -->
    <section class="section services-section" id="services">

        <div class="container">
            <div class="section-header">
                <p>Nous offrons les meilleurs tarifs de studio d'enregistrement pour une véritable production musicale
                    de classe mondiale que vous trouverez partout</p>
            </div>
            <div class="row" style="justify-content: center">
                <div class="prices-slider">
                    @foreach ($services as $service)
                        @if ($service->type != 1)
                            <div class="tt-slide">
                                <div class="prices-card">
                                    <div class="pricing-card__icon">
                                        <svg width="21" height="37" viewBox="0 0 21 37" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.0703 29.8867H11.4141V27.0742C12.6328 26.9805 13.7812 26.6641 14.8594 26.125C15.9375 25.5625 16.8633 24.8477 17.6367 23.9805C18.4336 23.1133 19.0547 22.1289 19.5 21.0273C19.9688 19.9023 20.2031 18.707 20.2031 17.4414V12.5547C20.2031 12.2969 20.1094 12.0859 19.9219 11.9219C19.7578 11.7344 19.5469 11.6406 19.2891 11.6406H18.3398C18.1055 11.6406 17.8945 11.7344 17.707 11.9219C17.5195 12.0859 17.4258 12.2969 17.4258 12.5547C17.4258 12.8125 17.5195 13.0352 17.707 13.2227C17.8945 13.3867 18.1055 13.4688 18.3398 13.4688L18.375 17.4414C18.375 18.5195 18.1641 19.5391 17.7422 20.5C17.3438 21.4609 16.7812 22.3047 16.0547 23.0312C15.3516 23.7344 14.5195 24.2969 13.5586 24.7188C12.5977 25.1172 11.5781 25.3164 10.5 25.3164C9.42188 25.3164 8.40234 25.1172 7.44141 24.7188C6.48047 24.2969 5.63672 23.7344 4.91016 23.0312C4.20703 22.3047 3.64453 21.4609 3.22266 20.5C2.82422 19.5391 2.625 18.5195 2.625 17.4414V13.4688H2.66016C2.89453 13.4688 3.10547 13.3867 3.29297 13.2227C3.48047 13.0352 3.57422 12.8125 3.57422 12.5547C3.57422 12.2969 3.48047 12.0859 3.29297 11.9219C3.10547 11.7344 2.89453 11.6406 2.66016 11.6406H1.71094C1.45312 11.6406 1.23047 11.7344 1.04297 11.9219C0.878906 12.0859 0.796875 12.2969 0.796875 12.5547V17.4414C0.796875 18.707 1.01953 19.9023 1.46484 21.0273C1.93359 22.1289 2.55469 23.1133 3.32812 23.9805C4.125 24.8477 5.0625 25.5625 6.14062 26.125C7.21875 26.6641 8.36719 26.9805 9.58594 27.0742V29.8867H5.92969C4.42969 29.8867 3.14062 30.4258 2.0625 31.5039C1.00781 32.5586 0.480469 33.8359 0.480469 35.3359C0.480469 35.5938 0.5625 35.8047 0.726562 35.9688C0.914062 36.1562 1.13672 36.25 1.39453 36.25H19.6055C19.8633 36.25 20.0742 36.1562 20.2383 35.9688C20.4258 35.8047 20.5195 35.5938 20.5195 35.3359C20.5195 33.8359 19.9805 32.5586 18.9023 31.5039C17.8477 30.4258 16.5703 29.8867 15.0703 29.8867ZM2.41406 34.4219C2.625 33.6484 3.04688 33.0039 3.67969 32.4883C4.33594 31.9492 5.08594 31.6797 5.92969 31.6797H15.0703C15.9141 31.6797 16.6523 31.9492 17.2852 32.4883C17.9414 33.0039 18.375 33.6484 18.5859 34.4219H2.41406ZM10.5 22.5742C12 22.5742 13.2891 22.0469 14.3672 20.9922C15.4453 19.9141 15.9844 18.625 15.9844 17.125V5.73438C15.9844 4.21094 15.4453 2.92188 14.3672 1.86719C13.2891 0.789063 12 0.25 10.5 0.25C9 0.25 7.71094 0.789063 6.63281 1.86719C5.55469 2.92188 5.01562 4.21094 5.01562 5.73438V17.125C5.01562 18.625 5.55469 19.9141 6.63281 20.9922C7.71094 22.0469 9 22.5742 10.5 22.5742ZM6.84375 5.73438C6.84375 4.72656 7.19531 3.87109 7.89844 3.16797C8.625 2.44141 9.49219 2.07812 10.5 2.07812C11.5078 2.07812 12.3633 2.44141 13.0664 3.16797C13.793 3.87109 14.1562 4.72656 14.1562 5.73438V17.125C14.1562 18.1094 13.793 18.9648 13.0664 19.6914C12.3633 20.3945 11.5078 20.7461 10.5 20.7461C9.49219 20.7461 8.625 20.3945 7.89844 19.6914C7.19531 18.9648 6.84375 18.1094 6.84375 17.125V5.73438ZM9.19922 8.44141C9.45703 8.44141 9.66797 8.35937 9.83203 8.19531C9.99609 8.00781 10.0781 7.78516 10.0781 7.52734C10.0781 7.26953 9.99609 7.05859 9.83203 6.89453C9.66797 6.70703 9.45703 6.61328 9.19922 6.61328C8.96484 6.61328 8.76562 6.70703 8.60156 6.89453C8.4375 7.05859 8.35547 7.26953 8.35547 7.52734C8.35547 7.78516 8.4375 8.00781 8.60156 8.19531C8.76562 8.35937 8.96484 8.44141 9.19922 8.44141ZM11.2031 7.52734C11.2031 7.78516 11.2852 8.00781 11.4492 8.19531C11.6133 8.35937 11.8125 8.44141 12.0469 8.44141C12.2812 8.44141 12.4805 8.35937 12.6445 8.19531C12.8086 8.00781 12.8906 7.78516 12.8906 7.52734C12.8906 7.26953 12.8086 7.05859 12.6445 6.89453C12.4805 6.70703 12.2812 6.61328 12.0469 6.61328C11.8125 6.61328 11.6133 6.70703 11.4492 6.89453C11.2852 7.05859 11.2031 7.26953 11.2031 7.52734ZM10.6406 5.59375C10.875 5.59375 11.0742 5.51172 11.2383 5.34766C11.4023 5.16016 11.4844 4.94922 11.4844 4.71484C11.4844 4.45703 11.4023 4.24609 11.2383 4.08203C11.0742 3.89453 10.875 3.80078 10.6406 3.80078C10.4062 3.80078 10.1953 3.89453 10.0078 4.08203C9.84375 4.24609 9.76172 4.45703 9.76172 4.71484C9.76172 4.94922 9.84375 5.16016 10.0078 5.34766C10.1953 5.51172 10.4062 5.59375 10.6406 5.59375Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                    <div class="pricing-card__content">
                                        <h4 class="mt-4">{{ $service->name }}</h4>
                                        <div class="prisec-card__include">
                                            <p>{{ $service->description }}</p>
                                        </div>
                                        
                                            <a href="{{ route('public.packs', ['service_id' => $service->id, 'service_name' => $service->name]) }}"
                                                class="button white btn-border center-btn sm-text mt-xs-30 mt-sm-40">
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.6425 0C3.205 0 2.78833 0.0885417 2.3925 0.265625C1.99667 0.432292 1.65292 0.661458 1.36125 0.953125C1.06958 1.24479 0.835208 1.58854 0.658125 1.98438C0.491458 2.36979 0.408125 2.78646 0.408125 3.23438C0.408125 3.68229 0.491458 4.10417 0.658125 4.5C0.835208 4.89583 1.06958 5.23958 1.36125 5.53125C1.65292 5.82292 1.99667 6.05208 2.3925 6.21875C2.78833 6.38542 3.205 6.46875 3.6425 6.46875C4.09042 6.46875 4.51229 6.38542 4.90812 6.21875C5.30396 6.05208 5.64771 5.82292 5.93937 5.53125C6.23104 5.23958 6.46021 4.89583 6.62687 4.5C6.80396 4.10417 6.8925 3.68229 6.8925 3.23438C6.8925 2.78646 6.80396 2.36979 6.62687 1.98438C6.46021 1.58854 6.23104 1.24479 5.93937 0.953125C5.64771 0.661458 5.30396 0.432292 4.90812 0.265625C4.51229 0.0885417 4.09042 0 3.6425 0ZM5.06437 7.15625L10.9237 12.1406L12.3925 10.625L7.40812 4.85938C7.04354 5.54688 6.55917 6.10417 5.955 6.53125C5.36125 6.94792 5.06437 7.15625 5.06437 7.15625ZM13.2831 11.7656L12.705 10.9844L11.3456 12.4062L12.1269 12.9375L13.2831 11.7656ZM13.58 12.2344L12.5175 13.2656L13.0331 13.3594C13.0644 13.5052 13.08 13.7396 13.08 14.0625C13.0904 14.375 13.0071 14.6562 12.83 14.9062C12.705 15.0625 12.5383 15.1823 12.33 15.2656C12.1321 15.349 11.8925 15.3958 11.6112 15.4062C10.4237 15.4375 9.54354 15.3646 8.97062 15.1875C8.40812 15.0208 7.80396 14.5885 7.15812 13.8906C6.77271 13.4844 6.34042 13.1875 5.86125 13C5.38208 12.8125 4.92375 12.6927 4.48625 12.6406C4.05917 12.5781 3.68937 12.5573 3.37687 12.5781C3.07479 12.5885 2.90812 12.599 2.87687 12.6094C2.80396 12.6198 2.74146 12.6562 2.68937 12.7188C2.63729 12.7812 2.61646 12.8542 2.62687 12.9375C2.63729 13.0104 2.67375 13.0729 2.73625 13.125C2.79875 13.1771 2.87167 13.1979 2.955 13.1875C2.96542 13.1875 3.10604 13.1771 3.37687 13.1562C3.64771 13.1354 3.97583 13.151 4.36125 13.2031C4.74667 13.2552 5.15292 13.3594 5.58 13.5156C6.0175 13.6719 6.39771 13.9271 6.72062 14.2812C7.39771 15.0104 8.02792 15.4792 8.61125 15.6875C9.205 15.8958 9.97062 16 10.9081 16C11.0123 16 11.1269 16 11.2519 16C11.3769 16 11.5019 15.9948 11.6269 15.9844C12.0019 15.9844 12.33 15.9219 12.6112 15.7969C12.8925 15.6719 13.1217 15.4896 13.2987 15.25C13.5071 14.9583 13.6217 14.6458 13.6425 14.3125C13.6737 13.9792 13.6737 13.6979 13.6425 13.4688L13.7519 13.4844L13.58 12.2344Z" />
                                                </svg>réserver une séance maintenant
                                            </a>
                                        
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tt-slide">
                                <div class="prices-card popular-plan">
                                    <div class="pricing-card__icon">
                                        <svg width="35" height="37" viewBox="0 0 35 37" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.5547 17.793V1.26953C18.5547 0.988281 18.4492 0.753906 18.2383 0.566406C18.0508 0.355469 17.8164 0.25 17.5352 0.25C17.2539 0.25 17.0078 0.355469 16.7969 0.566406C16.6094 0.753906 16.5156 0.988281 16.5156 1.26953V17.793C15.3438 18.0273 14.3594 18.6133 13.5625 19.5508C12.7891 20.4883 12.4023 21.5781 12.4023 22.8203C12.4023 24.0625 12.7891 25.1641 13.5625 26.125C14.3594 27.0625 15.3438 27.6484 16.5156 27.8828V35.2305C16.5156 35.5117 16.6094 35.7461 16.7969 35.9336C17.0078 36.1445 17.2539 36.25 17.5352 36.25C17.8164 36.25 18.0508 36.1445 18.2383 35.9336C18.4492 35.7461 18.5547 35.5117 18.5547 35.2305V27.8828C19.7266 27.6484 20.6992 27.0625 21.4727 26.125C22.2695 25.1641 22.668 24.0625 22.668 22.8203C22.668 21.5781 22.2695 20.4883 21.4727 19.5508C20.6992 18.6133 19.7266 18.0273 18.5547 17.793ZM17.5352 25.9492C16.668 25.9492 15.9297 25.6445 15.3203 25.0352C14.7344 24.4258 14.4414 23.6875 14.4414 22.8203C14.4414 21.9766 14.7344 21.25 15.3203 20.6406C15.9297 20.0312 16.668 19.7266 17.5352 19.7266C18.4023 19.7266 19.1406 20.0312 19.75 20.6406C20.3594 21.25 20.6641 21.9766 20.6641 22.8203C20.6641 23.6875 20.3594 24.4258 19.75 25.0352C19.1406 25.6445 18.4023 25.9492 17.5352 25.9492ZM6.14453 9.32031V1.26953C6.14453 0.988281 6.05078 0.753906 5.86328 0.566406C5.67578 0.355469 5.44141 0.25 5.16016 0.25C4.87891 0.25 4.63281 0.355469 4.42188 0.566406C4.23438 0.753906 4.14062 0.988281 4.14062 1.26953V9.32031C2.96875 9.55469 1.98438 10.1406 1.1875 11.0781C0.414062 12.0156 0.0273438 13.1055 0.0273438 14.3477C0.0273438 15.5898 0.414062 16.6797 1.1875 17.6172C1.98438 18.5547 2.96875 19.1406 4.14062 19.375V35.2305C4.14062 35.5117 4.23438 35.7461 4.42188 35.9336C4.63281 36.1445 4.87891 36.25 5.16016 36.25C5.44141 36.25 5.67578 36.1445 5.86328 35.9336C6.05078 35.7461 6.14453 35.5117 6.14453 35.2305V19.375C7.31641 19.1406 8.30078 18.5547 9.09766 17.6172C9.89453 16.6797 10.293 15.5898 10.293 14.3477C10.293 13.1055 9.89453 12.0156 9.09766 11.0781C8.30078 10.1406 7.31641 9.55469 6.14453 9.32031ZM5.16016 17.4766C4.29297 17.4766 3.55469 17.1719 2.94531 16.5625C2.33594 15.9531 2.03125 15.2148 2.03125 14.3477C2.03125 13.4805 2.33594 12.7539 2.94531 12.168C3.55469 11.5586 4.29297 11.2539 5.16016 11.2539C6.00391 11.2539 6.73047 11.5586 7.33984 12.168C7.94922 12.7539 8.25391 13.4805 8.25391 14.3477C8.25391 15.2148 7.94922 15.9531 7.33984 16.5625C6.73047 17.1719 6.00391 17.4766 5.16016 17.4766ZM30.8594 9.32031V1.26953C30.8594 0.988281 30.7539 0.753906 30.543 0.566406C30.3555 0.355469 30.1211 0.25 29.8398 0.25C29.5586 0.25 29.3242 0.355469 29.1367 0.566406C28.9492 0.753906 28.8555 0.988281 28.8555 1.26953V9.32031C27.6836 9.55469 26.6992 10.1406 25.9023 11.0781C25.1055 12.0156 24.707 13.1055 24.707 14.3477C24.707 15.5898 25.1055 16.6797 25.9023 17.6172C26.6992 18.5547 27.6836 19.1406 28.8555 19.375V35.2305C28.8555 35.5117 28.9492 35.7461 29.1367 35.9336C29.3242 36.1445 29.5586 36.25 29.8398 36.25C30.1211 36.25 30.3555 36.1445 30.543 35.9336C30.7539 35.7461 30.8594 35.5117 30.8594 35.2305V19.375C32.0312 19.1406 33.0039 18.5547 33.7773 17.6172C34.5742 16.6797 34.9727 15.5898 34.9727 14.3477C34.9727 13.1055 34.5742 12.0156 33.7773 11.0781C33.0039 10.1406 32.0312 9.55469 30.8594 9.32031ZM29.8398 17.4766C28.9961 17.4766 28.2695 17.1719 27.6602 16.5625C27.0508 15.9531 26.7461 15.2148 26.7461 14.3477C26.7461 13.4805 27.0508 12.7539 27.6602 12.168C28.2695 11.5586 28.9961 11.2539 29.8398 11.2539C30.707 11.2539 31.4453 11.5586 32.0547 12.168C32.6641 12.7539 32.9688 13.4805 32.9688 14.3477C32.9688 15.2148 32.6641 15.9531 32.0547 16.5625C31.4453 17.1719 30.707 17.4766 29.8398 17.4766Z"
                                                fill="black" />
                                        </svg>
                                    </div>

                                    <div class="pricing-card__content">
                                        <h4 class="mt-4">{{ $service->name }}</h4>
                                        <div class="prisec-card__include">
                                            <p>{{ $service->description }}</p>
                                        </div>
                                        <a href="{{ route('public.packs', ['service_id' => $service->id, 'service_name' => $service->name]) }}"
                                            class="button white btn-border center-btn sm-text mt-xs-30 mt-sm-40">
                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.6425 0C3.205 0 2.78833 0.0885417 2.3925 0.265625C1.99667 0.432292 1.65292 0.661458 1.36125 0.953125C1.06958 1.24479 0.835208 1.58854 0.658125 1.98438C0.491458 2.36979 0.408125 2.78646 0.408125 3.23438C0.408125 3.68229 0.491458 4.10417 0.658125 4.5C0.835208 4.89583 1.06958 5.23958 1.36125 5.53125C1.65292 5.82292 1.99667 6.05208 2.3925 6.21875C2.78833 6.38542 3.205 6.46875 3.6425 6.46875C4.09042 6.46875 4.51229 6.38542 4.90812 6.21875C5.30396 6.05208 5.64771 5.82292 5.93937 5.53125C6.23104 5.23958 6.46021 4.89583 6.62687 4.5C6.80396 4.10417 6.8925 3.68229 6.8925 3.23438C6.8925 2.78646 6.80396 2.36979 6.62687 1.98438C6.46021 1.58854 6.23104 1.24479 5.93937 0.953125C5.64771 0.661458 5.30396 0.432292 4.90812 0.265625C4.51229 0.0885417 4.09042 0 3.6425 0ZM5.06437 7.15625L10.9237 12.1406L12.3925 10.625L7.40812 4.85938C7.04354 5.54688 6.55917 6.10417 5.955 6.53125C5.36125 6.94792 5.06437 7.15625 5.06437 7.15625ZM13.2831 11.7656L12.705 10.9844L11.3456 12.4062L12.1269 12.9375L13.2831 11.7656ZM13.58 12.2344L12.5175 13.2656L13.0331 13.3594C13.0644 13.5052 13.08 13.7396 13.08 14.0625C13.0904 14.375 13.0071 14.6562 12.83 14.9062C12.705 15.0625 12.5383 15.1823 12.33 15.2656C12.1321 15.349 11.8925 15.3958 11.6112 15.4062C10.4237 15.4375 9.54354 15.3646 8.97062 15.1875C8.40812 15.0208 7.80396 14.5885 7.15812 13.8906C6.77271 13.4844 6.34042 13.1875 5.86125 13C5.38208 12.8125 4.92375 12.6927 4.48625 12.6406C4.05917 12.5781 3.68937 12.5573 3.37687 12.5781C3.07479 12.5885 2.90812 12.599 2.87687 12.6094C2.80396 12.6198 2.74146 12.6562 2.68937 12.7188C2.63729 12.7812 2.61646 12.8542 2.62687 12.9375C2.63729 13.0104 2.67375 13.0729 2.73625 13.125C2.79875 13.1771 2.87167 13.1979 2.955 13.1875C2.96542 13.1875 3.10604 13.1771 3.37687 13.1562C3.64771 13.1354 3.97583 13.151 4.36125 13.2031C4.74667 13.2552 5.15292 13.3594 5.58 13.5156C6.0175 13.6719 6.39771 13.9271 6.72062 14.2812C7.39771 15.0104 8.02792 15.4792 8.61125 15.6875C9.205 15.8958 9.97062 16 10.9081 16C11.0123 16 11.1269 16 11.2519 16C11.3769 16 11.5019 15.9948 11.6269 15.9844C12.0019 15.9844 12.33 15.9219 12.6112 15.7969C12.8925 15.6719 13.1217 15.4896 13.2987 15.25C13.5071 14.9583 13.6217 14.6458 13.6425 14.3125C13.6737 13.9792 13.6737 13.6979 13.6425 13.4688L13.7519 13.4844L13.58 12.2344Z" />
                                            </svg>réserver une séance maintenant
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

    </section>

@endsection

@section('style')
    <style>
        .prices-card .pricing-card__content {
            padding: 45px !important;
        }

    </style>
@endsection
