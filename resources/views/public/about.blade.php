@extends('public.layout.main')

@php
$page = 'about';
@endphp

@section('content')

    <!-- Begin page-name -->
    <section class="page-name v-separator mb-xs-20 mb-md-25 mb-lg-65">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Apropos de nous</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>Apropos</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <!-- End page-name -->
    <main>
        <!-- Begin text-section -->
        <section class="white-section parralax-section pb-xs-25 pb-md-25 pb-lg-60">
            <div class="text-section text-position-right ovh pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="text-section_video mb-xs-20 mb-lg-0">
                                <h2>Nous sommes l'idée originale de musiciens</h2>
                                <div class="img-wrap js-tilt mb-xs-20 mb-md-0">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="text-img lazy"
                                        data-src="./img/text-block-video-2.png" alt="bg">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        class="text-img-bg lazy" data-src="./img/text-block-video-bg.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="text-block">
                                <h2>Nous sommes l'idée originale de musiciens</h2>
                                <p class="h-sub">Neema Recording Studio est un studio d'enregistrement à service complet,
                                    détenu et exploité par le mixeur primé aux Grammy Awards John Smith.</p>
                                <p>Neema Recording Studio dispose de trois studios entièrement équipés, avec une salle de
                                    suivi spacieuse, des salles iso et un mélange de classe mondiale d'équipements de pointe
                                    et vintage. Notre équipe d'ingénieurs dévoués propose l'enregistrement, le mixage, le
                                    mastering, la post-production, le RNIS, les transferts, l'enregistrement mobile, le son
                                    en direct, la production vidéo et même la fabrication de CD à petite échelle avec
                                    impression.</p>
                                <p>Nos studios sont équipés pour gérer votre projet du début à la fin. Nous avons des
                                    musiciens formés de premier ordre à portée de main, donc si votre musique manque de cet
                                    avantage supplémentaire, nous pouvons maximiser le son au maximum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-xs-20 mt-md-25 mt-lg-65">
                <div class="row">
                    <div class="mb-xs-30 mb-lg-0 col-lg-4">
                        <div class="icon-block">
                            <div class="custom-icon">
                                <svg width="58" height="53" viewBox="0 0 58 53" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35.4443 13.8544C35.6655 14.0737 35.9554 14.1833 36.2453 14.1833C36.5351 14.1833 36.8251 14.0737 37.0463 13.8544C37.4886 13.4159 37.4886 12.7049 37.0463 12.2663L37.031 12.2512C36.5886 11.8127 35.8713 11.8127 35.4288 12.2512C34.9865 12.6897 34.9865 13.4007 35.4288 13.8393L35.4443 13.8544Z"
                                        fill="url(#ic_1_1)" />
                                    <path
                                        d="M53.7197 24.4788L57.6681 20.565C57.9921 20.2439 58.089 19.7608 57.9136 19.3413C57.7383 18.9217 57.3252 18.6481 56.867 18.6481H48.6823C47.6125 14.3071 45.3672 10.3515 42.1573 7.16971C37.4932 2.54625 31.2916 0 24.6953 0C18.0989 0 11.8974 2.54625 7.23311 7.16971C2.56876 11.7932 0 17.9403 0 24.4788C0 31.0174 2.56876 37.1646 7.23311 41.7879C8.62013 43.1628 10.1439 44.3524 11.7727 45.3475L8.35992 51.324C8.16145 51.6716 8.16417 52.0977 8.36717 52.4426C8.57006 52.7878 8.94264 53 9.34569 53H15.1797C15.5878 53 15.9645 52.7824 16.1656 52.4302L18.5787 48.2043C20.5537 48.7009 22.6046 48.9576 24.6953 48.9576C26.786 48.9576 28.8368 48.7009 30.8119 48.2043L33.225 52.4302C33.4261 52.7824 33.8027 53 34.2109 53H40.0449C40.4479 53 40.8205 52.7878 41.0235 52.4427C41.2265 52.0977 41.2292 51.6716 41.0308 51.3241L37.6179 45.3476C39.2468 44.3524 40.7706 43.1629 42.1576 41.788C45.3661 38.6076 47.6126 34.6503 48.6823 30.3096H56.8671C57.3252 30.3096 57.7384 30.036 57.9137 29.6164C58.0891 29.1969 57.9921 28.7139 57.6682 28.3927L53.7197 24.4788ZM51.6484 23.3559H43.7426L46.2264 20.8939H54.1323L51.6484 23.3559ZM14.5191 50.7542H11.2886L13.7543 46.4364C14.6005 46.8517 15.4692 47.219 16.358 47.534L14.5191 50.7542ZM38.102 50.7542H34.8714L33.0325 47.534C33.9214 47.219 34.7901 46.8517 35.6363 46.4364L38.102 50.7542ZM40.5554 40.1999C39.059 41.6833 37.3876 42.9299 35.5885 43.9236C35.5663 43.9343 35.5439 43.9444 35.522 43.9567C35.5083 43.9644 35.4958 43.9733 35.4826 43.9815C34.1025 44.734 32.6482 45.3382 31.1392 45.7845C31.0798 45.7962 31.0211 45.8134 30.9632 45.835C28.952 46.4119 26.8471 46.7119 24.6953 46.7119C22.5435 46.7119 20.4385 46.4119 18.4273 45.8351C18.3693 45.8136 18.3106 45.7963 18.2512 45.7846C16.7423 45.3384 15.288 44.7341 13.908 43.9816C13.8947 43.9734 13.8823 43.9645 13.8686 43.9568C13.8467 43.9445 13.8244 43.9344 13.8022 43.9238C12.003 42.93 10.3317 41.6834 8.83525 40.1999C4.59876 36.0007 2.26562 30.4175 2.26562 24.4788C2.26562 18.5401 4.59876 12.9569 8.83513 8.75769C13.0715 4.55845 18.7041 2.24576 24.6953 2.24576C30.6865 2.24576 36.3191 4.55845 40.5554 8.75769C43.3391 11.5169 45.3245 14.916 46.3439 18.6481H45.7573C45.4569 18.6481 45.1687 18.7665 44.9563 18.977L41.9497 21.9573C41.6463 19.9158 40.9805 17.9307 39.975 16.1255C39.6726 15.5826 38.9834 15.3856 38.4357 15.6852C37.888 15.9849 37.6892 16.6681 37.9915 17.211C39.0669 19.1416 39.6677 21.2408 39.8214 23.356H34.8266C34.5744 21.0815 33.5604 18.9744 31.9045 17.333C29.9788 15.4241 27.4186 14.3729 24.6953 14.3729C21.972 14.3729 19.4117 15.4241 17.4862 17.3328C15.5605 19.2417 14.5 21.7794 14.5 24.4788C14.5 27.1782 15.5605 29.716 17.4861 31.6247C19.4117 33.5335 21.972 34.5847 24.6953 34.5847C27.4186 34.5847 29.9788 33.5335 31.9044 31.6248C33.5603 29.9834 34.5743 27.8763 34.8265 25.6017H39.8164C39.5462 29.1118 38.0519 32.5182 35.4289 35.1183C32.5619 37.9604 28.7498 39.5254 24.6953 39.5254C20.6407 39.5254 16.8287 37.9604 13.9617 35.1183C11.0945 32.2764 9.51561 28.4979 9.51561 24.4788C9.51561 20.4597 11.0945 16.6812 13.9617 13.8393C18.7174 9.12521 26.1464 8.0807 32.0275 11.2992C32.5751 11.5988 33.2643 11.4018 33.5668 10.8589C33.8691 10.316 33.6703 9.63297 33.1226 9.33316C29.8777 7.55733 26.0568 6.84958 22.3642 7.34072C18.5483 7.84804 15.0887 9.54606 12.3597 12.2513C9.06464 15.5174 7.24999 19.8598 7.24999 24.4788C7.24999 29.0978 9.06464 33.4403 12.3595 36.7063C15.6545 39.9724 20.0355 41.7712 24.6953 41.7712C29.3551 41.7712 33.736 39.9724 37.0309 36.7064C39.7083 34.0526 41.4069 30.7018 41.9537 27.0045L44.9562 29.9807C45.1686 30.1912 45.4568 30.3096 45.7572 30.3096H46.3435C45.3241 34.0415 43.338 37.4418 40.5554 40.1999ZM28.395 22.3615C28.0823 21.8243 27.3895 21.6404 26.8476 21.9505L24.1289 23.5064C23.7784 23.7069 23.5625 24.0776 23.5625 24.4788C23.5625 24.88 23.7784 25.2507 24.1289 25.4512L26.8476 27.0071C27.026 27.1092 27.2208 27.1577 27.413 27.1577C27.8045 27.1577 28.1853 26.9563 28.395 26.5961C28.5789 26.2806 28.5894 25.9137 28.4579 25.6017H32.5442C32.3041 27.2751 31.5296 28.8203 30.3024 30.0367C28.8047 31.5214 26.8134 32.339 24.6953 32.339C22.5772 32.339 20.5859 31.5214 19.0881 30.0367C17.5904 28.5522 16.7656 26.5784 16.7656 24.4788C16.7656 22.3792 17.5904 20.4055 19.0882 18.9208C20.5859 17.4362 22.5772 16.6186 24.6953 16.6186C26.8134 16.6186 28.8047 17.4362 30.3025 18.9209C31.5296 20.1373 32.3043 21.6825 32.5443 23.3559H28.458C28.5894 23.0438 28.5789 22.677 28.395 22.3615ZM46.2264 28.0637L43.7426 25.6017H51.6484L54.1323 28.0637H46.2264Z"
                                        fill="url(#ic_1_2)" />
                                    <defs>
                                        <linearGradient id="ic_1_1" x1="58.1318" y1="28.2682" x2="-0.00275821" y2="28.2682"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_1_2" x1="58.1318" y1="28.2682" x2="-0.00275821" y2="28.2682"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="icon_bg">
                                    <svg viewBox="0 0 152 125" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2"
                                            d="M5.08989 84.081C10.08 96.1197 18.4633 106.583 28.5433 113.446C48.304 126.835 73.2545 127.623 95.5102 120.647C114.872 114.572 133.335 102.195 143.714 82.9559C161.28 50.2151 146.309 4.53553 110.481 0.260106C95.3106 -1.54007 81.7376 6.33571 68.6636 13.6489C54.4917 21.5247 43.2141 15.3366 28.3437 17.1368C8.48315 19.387 0.0998017 38.6264 0 59.1035C0 67.7669 1.79643 76.3177 5.08989 84.081Z"
                                            fill="var(--icon_bg)" />
                                    </svg>
                                </div>
                            </div>
                            <h4>Notre mission</h4>
                            <p>Pour faciliter votre expérience d'enregistrement et vos besoins musicaux, utilisez toutes les
                                ressources disponibles pour affiner les capacités des artistes et musiciens locaux.</p>
                        </div>
                    </div>
                    <div class="mb-xs-30 mb-lg-0 col-lg-4">
                        <div class="icon-block">
                            <div class="custom-icon">
                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.00345 32.2774C9.58596 32.2774 10.0581 31.8015 10.0581 31.2191V31.2042C10.0581 30.6218 9.58596 30.1532 9.00345 30.1532C8.42095 30.1532 7.94877 30.6292 7.94877 31.2117V31.2264C7.94877 31.8089 8.42095 32.2774 9.00345 32.2774Z"
                                        fill="url(#ic_2_1)" />
                                    <path
                                        d="M40.2383 40.7031C40.2647 40.7051 40.2912 40.706 40.3177 40.706C40.5963 40.706 40.865 40.5956 41.0635 40.397C44.2883 37.1715 46.0643 32.8833 46.0643 28.3222C46.0643 23.0742 43.6842 18.3724 39.9476 15.237L41.9585 13.2261H44.9966C45.5791 13.2261 46.0513 12.7539 46.0513 12.1715C46.0513 11.5891 45.5791 11.1168 44.9966 11.1168H41.5216C41.2419 11.1168 40.9736 11.2279 40.7758 11.4257L38.2319 13.9696C35.5654 12.2458 32.3906 11.244 28.986 11.244C28.4035 11.244 27.9313 11.7163 27.9313 12.2987V22.3235C27.9313 22.9059 28.4035 23.3781 28.986 23.3781C31.7123 23.3781 33.9302 25.5961 33.9302 28.3223C33.9302 29.6429 33.4159 30.8846 32.4821 31.8183C32.0702 32.2301 32.0702 32.898 32.4821 33.3099L39.5692 40.397C39.7475 40.5754 39.9866 40.6841 40.2383 40.7031ZM30.0407 21.3473V13.39C32.4644 13.5596 34.7308 14.3088 36.702 15.4994L35.8952 16.3063C35.4833 16.7181 35.4833 17.3859 35.8952 17.7979C36.1011 18.0038 36.371 18.1068 36.6409 18.1068C36.9108 18.1068 37.1808 18.0038 37.3867 17.7979L38.4504 16.7342C41.8078 19.4816 43.9548 23.6557 43.9548 28.3222C43.9548 31.9669 42.6609 35.4128 40.2906 38.1353L34.6642 32.509C35.5569 31.3035 36.0394 29.8498 36.0394 28.3222C36.0396 24.7914 33.4314 21.858 30.0407 21.3473Z"
                                        fill="url(#ic_2_2)" />
                                    <path
                                        d="M9.00345 48.3047H16.3191C16.5988 48.3047 16.8671 48.1936 17.0648 47.9958L18.1899 46.8708C20.3012 47.7965 22.6197 48.3047 25.027 48.3047C29.5894 48.3047 33.8786 46.5278 37.1044 43.3014C37.3905 43.0152 37.4863 42.5905 37.3531 42.2085C37.2961 42.0447 37.2008 41.9012 37.0788 41.7868L30.0145 34.7226C29.6027 34.3108 28.9348 34.3108 28.5229 34.7226C27.589 35.6564 26.3475 36.1706 25.0269 36.1706C23.6657 36.1706 22.4313 35.6176 21.5363 34.7246L21.5328 34.7207L21.5289 34.7172C20.6358 33.8222 20.0827 32.5878 20.0827 31.2265C20.0827 28.5003 22.3006 26.2824 25.0268 26.2824C25.6093 26.2824 26.0815 25.8101 26.0815 25.2277V15.2029C26.0815 14.6205 25.6093 14.1482 25.0268 14.1482C21.6038 14.1482 18.3612 15.1755 15.6387 16.9686L13.224 14.5539C13.0262 14.3561 12.7579 14.2449 12.4782 14.2449H9.00345C8.42095 14.2449 7.94877 14.7172 7.94877 15.2996C7.94877 15.882 8.42095 16.3543 9.00345 16.3543H12.0416L13.9355 18.2482C11.3911 20.419 9.47258 23.3371 8.5493 26.7224C8.39606 27.2844 8.72734 27.8641 9.28927 28.0174C9.85121 28.1706 10.4311 27.8393 10.5843 27.2774C11.4088 24.2546 13.1395 21.6581 15.4325 19.7451L16.6132 20.9259C16.8192 21.1317 17.0891 21.2348 17.359 21.2348C17.6289 21.2348 17.8989 21.1317 18.1048 20.9259C18.5166 20.514 18.5166 19.8462 18.1048 19.4342L17.1667 18.4962C19.1881 17.2473 21.5128 16.4683 23.9723 16.2945V24.2514C20.5816 24.7621 17.9736 27.6953 17.9736 31.2262C17.9736 32.7911 18.4866 34.2381 19.3523 35.4095L13.7246 41.0372C12.284 39.3835 11.1937 37.4006 10.5883 35.1899C10.4345 34.6281 9.85395 34.2973 9.29254 34.4513C8.73071 34.6051 8.40007 35.1852 8.55384 35.7471C9.73962 40.077 12.5546 43.6414 16.2248 45.8525L15.8822 46.1953H9.00345C8.42095 46.1953 7.94877 46.6676 7.94877 47.25C7.94877 47.8324 8.42095 48.3047 9.00345 48.3047ZM15.2182 42.5269L20.8438 36.9013C22.015 37.767 23.4621 38.28 25.027 38.28C26.5547 38.28 28.0084 37.7976 29.2138 36.9048L34.8401 42.5312C32.1177 44.9014 28.6718 46.1953 25.027 46.1953C23.2073 46.1953 21.4458 45.8635 19.8085 45.2522L21.2104 43.8503C21.6223 43.4385 21.6223 42.7707 21.2104 42.3587C20.7985 41.9469 20.1307 41.9469 19.7188 42.3587L17.7672 44.3103C16.8577 43.8049 16.0032 43.2069 15.2182 42.5269Z"
                                        fill="url(#ic_2_3)" />
                                    <path
                                        d="M50.8359 18.805C50.5586 18.805 50.2864 18.9179 50.0903 19.1141C49.8941 19.3102 49.7812 19.5823 49.7812 19.8597C49.7812 20.1371 49.8941 20.4092 50.0903 20.6054C50.2864 20.8015 50.5586 20.9144 50.8359 20.9144C51.1133 20.9144 51.3854 20.8016 51.5816 20.6054C51.7778 20.4092 51.8906 20.1371 51.8906 19.8597C51.8906 19.5823 51.7778 19.3102 51.5816 19.1141C51.3854 18.9179 51.1133 18.805 50.8359 18.805Z"
                                        fill="url(#ic_2_4)" />
                                    <path
                                        d="M52.9453 0H1.05469C0.472184 0 0 0.472289 0 1.05469V6.75C0 7.3324 0.472184 7.80469 1.05469 7.80469H2.10938V52.9453C2.10938 53.5277 2.58156 54 3.16406 54H50.8359C51.4184 54 51.8906 53.5277 51.8906 52.9453V24.0784C51.8906 23.496 51.4184 23.0237 50.8359 23.0237C50.2534 23.0237 49.7812 23.496 49.7812 24.0784V51.8906H4.21875V7.80469H49.7812V15.6409C49.7812 16.2233 50.2534 16.6956 50.8359 16.6956C51.4184 16.6956 51.8906 16.2233 51.8906 15.6409V7.80469H52.9453C53.5278 7.80469 54 7.3324 54 6.75V1.05469C54 0.472289 53.5278 0 52.9453 0ZM51.8906 5.69531H2.10938V2.10938H51.8906V5.69531Z"
                                        fill="url(#ic_2_5)" />
                                    <defs>
                                        <linearGradient id="ic_2_1" x1="54.1228" y1="28.8015" x2="-0.00256799" y2="28.8015"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_2_2" x1="54.1228" y1="28.8015" x2="-0.00256799" y2="28.8015"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_2_3" x1="54.1228" y1="28.8015" x2="-0.00256799" y2="28.8015"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_2_4" x1="54.1228" y1="28.8015" x2="-0.00256799" y2="28.8015"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_2_5" x1="54.1228" y1="28.8015" x2="-0.00256799" y2="28.8015"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="icon_bg">
                                    <svg viewBox="0 0 151 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2"
                                            d="M56.2174 134.842C71.0174 131.042 83.0174 119.142 96.3174 112.042C108.917 105.242 124.617 106.842 136.817 99.0423C148.417 91.5423 153.117 78.2423 150.117 64.9423C147.717 54.6423 141.517 45.5423 134.717 37.5423C119.217 19.4423 98.6174 4.54232 75.0174 1.24232C44.3174 -3.05769 16.3174 16.4423 5.21737 44.5423C-2.48263 64.1423 -1.38263 86.7423 7.31737 105.542C14.9174 122.242 30.6174 137.042 49.0174 135.942C51.5174 135.842 53.9174 135.442 56.2174 134.842Z"
                                            fill="var(--icon_bg)" />
                                    </svg>
                                </div>
                            </div>
                            <h4>Notre Vision</h4>
                            <p>Est d'aller au-delà de la mission standard d'un studio d'enregistrement sonore et de devenir
                                un centre de création où artistes, groupes, auteurs-compositeurs, musiciens et producteurs
                                peuvent réaliser leur potentiel sonore.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-block">
                            <div class="custom-icon">
                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M53.0094 1.76156C52.9133 1.39199 52.625 1.10331 52.2557 1.00659L52.2413 1.00279C47.0402 -0.357815 41.5485 -0.333451 36.3597 1.07346C31.8961 2.28366 27.7564 4.49069 24.2664 7.50364C20.9373 6.68527 17.4392 6.72187 14.1273 7.61786C10.7114 8.54181 7.5834 10.3528 5.08115 12.8548L0.308905 17.6273C-0.102968 18.0392 -0.102968 18.707 0.308905 19.119L6.42108 25.2312L0.308905 31.3433C-0.102968 31.7552 -0.102968 32.4231 0.308905 32.835C0.514894 33.0409 0.7848 33.144 1.05471 33.144C1.32461 33.144 1.59462 33.0409 1.80051 32.835L7.91268 26.7229L9.5896 28.3998L6.76608 31.2234C6.35421 31.6353 6.35421 32.3031 6.76608 32.7151L8.64836 34.5974C5.77653 37.8424 4.16437 42.1043 4.19654 46.451L4.21342 48.718C4.21774 49.2944 4.68383 49.7606 5.26024 49.7649L7.52707 49.7817C7.56979 49.782 7.6123 49.7821 7.65501 49.7821C11.9573 49.7821 16.1677 48.1735 19.3807 45.3298L21.3467 47.2959C21.5445 47.4936 21.8128 47.6048 22.0925 47.6048C22.3722 47.6048 22.6406 47.4936 22.8383 47.2959L25.6618 44.4722L34.8589 53.6693C35.0649 53.8752 35.3348 53.9782 35.6047 53.9782C35.8746 53.9782 36.1446 53.8752 36.3505 53.6693L41.2417 48.7782C43.7107 46.3092 45.5094 43.2255 46.4433 39.8611C47.3736 36.5099 47.4243 32.9556 46.5916 29.5791C49.5505 26.1185 51.7213 22.0272 52.92 17.6199C54.3289 12.4402 54.3597 6.95655 53.0094 1.76156ZM6.57286 14.3465C10.7219 10.1976 16.6517 8.32738 22.3834 9.26863L7.91268 23.7395L2.54631 18.3732L6.57286 14.3465ZM7.65554 47.6725C7.6182 47.6725 7.58023 47.6724 7.54289 47.6721L6.31519 47.663L6.30601 46.4352C6.27795 42.6497 7.66609 38.9371 10.1429 36.0916L17.8864 43.8352C15.0692 46.2876 11.4022 47.6725 7.65554 47.6725ZM22.0927 45.0581L10.8626 33.8281C10.8628 33.8282 10.8625 33.828 10.8626 33.8281C10.8624 33.828 10.8618 33.8274 10.8617 33.8272L9.00359 31.9691L11.0813 29.8914L24.1704 42.9805L22.0927 45.0581ZM39.7504 47.2864L35.605 51.4317L30.2387 46.0654L44.8273 31.4769C45.7653 37.2044 43.887 43.1497 39.7504 47.2864ZM43.4737 29.8471L28.747 44.5737L28.5782 44.4048C28.5784 44.405 28.578 44.4046 28.5782 44.4048L9.40429 25.2311L12.3399 22.2954L26.4625 36.4181C26.6685 36.624 26.9384 36.727 27.2083 36.727C27.4782 36.727 27.7482 36.624 27.9541 36.4181C28.366 36.0062 28.366 35.3384 27.9541 34.9264L13.8316 20.8037L24.1091 10.5263C31.154 3.48141 41.4517 0.586803 51.1176 2.89604C53.4014 12.5442 50.5023 22.8185 43.4737 29.8471Z"
                                        fill="url(#ic_3_1)" />
                                    <path
                                        d="M34.0779 9.60265C31.3212 9.60265 28.7295 10.6763 26.7802 12.6255C24.8309 14.5748 23.7574 17.1666 23.7574 19.9232C23.7574 22.6801 24.8309 25.2718 26.7802 27.221C28.7296 29.1703 31.3213 30.2439 34.078 30.2439C36.8348 30.2439 39.4265 29.1703 41.3758 27.221C45.3998 23.197 45.3998 16.6495 41.3758 12.6254C39.4264 10.6763 36.8346 9.60265 34.0779 9.60265ZM25.9161 20.8171C27.251 20.5245 28.6555 20.9188 29.6469 21.9102L32.1515 24.4148C33.1269 25.3902 33.5255 26.7746 33.2554 28.094C31.3729 27.908 29.6271 27.085 28.2717 25.7295C26.9336 24.3913 26.1157 22.6723 25.9161 20.8171ZM31.804 20.2541C31.804 19.7189 32.0124 19.2157 32.3908 18.8373L32.9315 18.2966C33.31 17.9182 33.8131 17.7099 34.3483 17.7099C34.8834 17.7099 35.3865 17.9183 35.765 18.2967C36.1434 18.6752 36.3517 19.1782 36.3517 19.7134C36.3517 20.2487 36.1433 20.7517 35.765 21.1301L35.2244 21.6708C34.4433 22.4519 33.1725 22.452 32.3912 21.671C32.0129 21.2927 31.804 20.7892 31.804 20.2541ZM39.8841 25.7295C38.6507 26.9629 37.0937 27.7538 35.4049 28.0266C35.5632 26.7285 35.3031 25.4139 34.6652 24.2744C35.4171 24.1153 36.1331 23.7454 36.7159 23.1625L37.2565 22.6219C38.0334 21.845 38.4612 20.8123 38.4612 19.7136C38.4612 18.615 38.0334 17.5821 37.2566 16.8054C36.4798 16.0285 35.4469 15.6006 34.3483 15.6006C33.2496 15.6006 32.2167 16.0285 31.44 16.8053L30.8993 17.3459C30.3294 17.9159 29.9483 18.6238 29.7852 19.3941C28.624 18.7435 27.2839 18.4868 25.9629 18.6651C26.2252 16.9498 27.0217 15.3674 28.2718 14.1173C29.8227 12.5663 31.8847 11.7122 34.0779 11.7122C36.2712 11.7122 38.3332 12.5663 39.8841 14.1173C43.0857 17.3187 43.0857 22.528 39.8841 25.7295Z"
                                        fill="url(#ic_3_2)" />
                                    <path
                                        d="M30.1914 37.6008C29.914 37.6008 29.6419 37.7127 29.4457 37.9099C29.2495 38.1059 29.1367 38.3781 29.1367 38.6554C29.1367 38.9329 29.2495 39.205 29.4457 39.4011C29.6419 39.5973 29.914 39.7101 30.1914 39.7101C30.4687 39.7101 30.7408 39.5974 30.937 39.4011C31.1332 39.205 31.246 38.9329 31.246 38.6554C31.246 38.3781 31.1332 38.1059 30.937 37.9099C30.7408 37.7127 30.4687 37.6008 30.1914 37.6008Z"
                                        fill="url(#ic_3_3)" />
                                    <path
                                        d="M17.5498 49.6007L14.962 52.1885C14.5502 52.6004 14.5502 53.2683 14.962 53.6802C15.168 53.8861 15.4379 53.9892 15.7078 53.9892C15.9777 53.9892 16.2478 53.8861 16.4536 53.6802L19.0414 51.0924C19.4533 50.6806 19.4533 50.0127 19.0414 49.6007C18.6296 49.1889 17.9617 49.1889 17.5498 49.6007Z"
                                        fill="url(#ic_3_4)" />
                                    <defs>
                                        <linearGradient id="ic_3_1" x1="54.1227" y1="28.7957" x2="-0.00256799" y2="28.7957"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_3_2" x1="54.1227" y1="28.7957" x2="-0.00256799" y2="28.7957"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_3_3" x1="54.1227" y1="28.7957" x2="-0.00256799" y2="28.7957"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                        <linearGradient id="ic_3_4" x1="54.1227" y1="28.7957" x2="-0.00256799" y2="28.7957"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="var(--main_color)" />
                                            <stop offset="1" stop-color="var(--main_color_2)" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="icon_bg">
                                    <svg viewBox="0 0 150 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2"
                                            d="M68.7 137.6C30.7 137.5 0 106.7 0 68.7002C0.1 30.7002 30.9 -0.0997572 68.9 0.000242819C106.9 0.100243 149.5 39.4002 149.4 68.9002C149.4 98.4002 106.7 137.6 68.7 137.6Z"
                                            fill="var(--icon_bg)" />
                                    </svg>
                                </div>
                            </div>
                            <h4>Valeurs fondamentales</h4>
                            <ul>
                                <li>
                                    <p>L'artiste est au centre du processus</p>
                                </li>
                                <li>
                                    <p>Le passé inspire l'invention et l'innovation</p>
                                </li>
                                <li>
                                    <p>L'expérimentation demande de la rigueur artistique et du risque</p>
                                </li>
                                <li>
                                    <p>La collaboration active la croissance</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                class="parallax-img parallax-right animate tt-paroller lazy" data-src="img/paralax-4.png"
                data-paroller-factor="0.15" data-paroller-type="foreground" alt="bg">
        </section>
        <!-- End text-section -->
        <!-- Begin recording tab -->
        <section class="pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
            <div class="container">
                <div class="section-header">
                    <h2>Studio d'enrégistrement</h2>
                    <p>Le Neema est une installation de 2 000 pieds carrés avec 1 salle de contrôle, 2 salles de concert et
                        1 cabine vocale</p>
                </div>
            </div>
            <div class="tab-wrap" data-tab-container>
                <div class="tab-links">
                    <div class="tab-links__item active" data-show-tab="1">Salle de séances</div>
                    <div class="tab-links__item" data-show-tab="2">Salle de réception</div>
                    <div class="tab-links__item" data-show-tab="3">Salle d'instruments</div>
                </div>
                <div class="tab-blocks">
                    <div class="tab-blocks__item active" data-show-tab="1">
                        <div class="tab-slider white-arrow inner-dots studio-slider" data-slick='{
                                            "slidesToShow": 1,
                                            "swipeToSlide": true,
                                            "adaptiveHeight": true,
                                            "arrows": true,
                                            "dots": true,
                                            "responsive": [
                                            ]
                                            }'>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-1.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-2.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-3.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-text">
                            <h4><span class="theme-color">Salle de séances</span>– Studio de mixage</h4>
                            <p>Neema Studio A est un studio de musique et de post-production à la pointe de la technologie
                                avec une grande salle de contrôle et une salle de suivi en direct. Équipé d'un D-Control
                                ICON, de Pro Tools HDX, d'un secteur Tannoy System 215 DMT II, ​​d'une multitude
                                d'équipements hors-bord nouveaux et vintage, ainsi que d'un écran de projection rétractable
                                de 110", d'un son surround 7.1 et de capacités de routage HDMI complètes, Studio A convient
                                à toutes les séances.</p>
                            <p>Conçu et réglé par le célèbre George Augspurger, le Studio A est idéal pour tout type de
                                travail audio.</p>
                        </div>
                    </div>
                    <div class="tab-blocks__item" data-show-tab="2">
                        <div class="tab-slider white-arrow inner-dots studio-slider" data-slick='{
                                            "slidesToShow": 1,
                                            "swipeToSlide": true,
                                            "adaptiveHeight": true,
                                            "arrows": true,
                                            "dots": true,
                                            "responsive": [
                                            ]
                                            }'>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-2.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-1.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-3.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-text">
                            <h4><span class="theme-color">Salle de réception</span>– Studio de mixage</h4>
                            <p>Neema Studio A est un studio de musique et de post-production à la pointe de la technologie
                                avec une grande salle de contrôle et une salle de suivi en direct. Équipé d'un D-Control
                                ICON, de Pro Tools HDX, d'un secteur Tannoy System 215 DMT II, ​​d'une multitude
                                d'équipements hors-bord nouveaux et vintage, ainsi que d'un écran de projection rétractable
                                de 110", d'un son surround 7.1 et de capacités de routage HDMI complètes, Studio A convient
                                à toutes les séances.</p>
                            <p>Conçu et réglé par le célèbre George Augspurger, le Studio A est idéal pour tout type de
                                travail audio.</p>
                        </div>
                    </div>
                    <div class="tab-blocks__item" data-show-tab="3">
                        <div class="tab-slider white-arrow inner-dots studio-slider" data-slick='{
                                            "slidesToShow": 1,
                                            "swipeToSlide": true,
                                            "adaptiveHeight": true,
                                            "arrows": true,
                                            "dots": true,
                                            "responsive": [
                                            ]
                                            }'>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-3.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-2.jpg"></div>
                                </div>
                            </div>
                            <div class="tt-slider">
                                <div class="tab-slider__item">
                                    <div class="studio-slide lazy" data-src="img/studio-1.jpg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-text">
                            <h4><span class="theme-color">Salle d'instruments</span>– Studio de mixage</h4>
                            <p>Neema Studio A est un studio de musique et de post-production à la pointe de la technologie
                                avec une grande salle de contrôle et une salle de suivi en direct. Équipé d'un D-Control
                                ICON, de Pro Tools HDX, d'un secteur Tannoy System 215 DMT II, ​​d'une multitude
                                d'équipements hors-bord nouveaux et vintage, ainsi que d'un écran de projection rétractable
                                de 110", d'un son surround 7.1 et de capacités de routage HDMI complètes, Studio A convient
                                à toutes les séances.</p>
                            <p>Conçu et réglé par le célèbre George Augspurger, le Studio A est idéal pour tout type de
                                travail audio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End recording tab -->
        <!-- Begin history -->
        <!--<section class="pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
                                        <div class="container">
                                         <div class="section-header">
                                          <h2>Notre histoire</h2>
                                          <p></p>
                                         </div>
                                         <div class="history-list">
                                          <div class="load-history js-add-history"></div>
                                          <div class="left-column">
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">October 2015</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">May 2016</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy" data-src="./img/history-2.jpg" alt="bg">
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                          </div>
                                          <div class="right-column">
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">December 2015</p>
                                            <h4>Neema Recording Studio</h4>
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy" data-src="./img/history-1.jpg" alt="bg">
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists.</p>
                                           </div>
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">October 2015</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                          </div>
                                         </div>
                                         <div class="history-list history-list-add">
                                          <div class="load-history js-add-history"></div>
                                          <div class="left-column">
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">October 2015</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">May 2016</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy" data-src="./img/history-2.jpg" alt="bg">
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                          </div>
                                          <div class="right-column">
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">December 2015</p>
                                            <h4>Neema Recording Studio</h4>
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy" data-src="./img/history-1.jpg" alt="bg">
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists.</p>
                                           </div>
                                           <div class="history-block">
                                            <div class="dot"><span></span><span></span></div>
                                            <p class="data">October 2015</p>
                                            <h4>Ten years of recording, producing, mixing and mastering</h4>
                                            <p>Construction of a sister studio, on the Neema Recording Studio, began in the mid 1990’s attracting major artists from around the globe. Sadly, Hurricane Hugo devastated the island in 1989, and the studio was forced to close.</p>
                                           </div>
                                          </div>
                                         </div>
                                        </div>
                                       </section>-->
        <!-- End history -->
        <!-- Begin call-banner -->
        <section
            class="call-banner dark-section v-separator mt-xs-20 mt-md-25 mt-lg-65 pt-xs-40 pt-md-50 pt-lg-100 pb-xs-40 pb-md-50 pb-lg-100 lazy"
            data-src="./img/banner-bg-1.jpg">
            <div class="container">
                <h2>Vous voulez enregistrer votre propre hit ?</h2>
                <p>Nous sommes un studio à service complet doté des dernières technologies pour tous vos projets</p>
                <a href="tel:18007654321">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.9609 15.7383C19.9349 15.6602 19.8307 15.5625 19.6484 15.4453C19.4661 15.3151 19.2122 15.1654 18.8867 14.9961C18.7956 14.944 18.6849 14.8854 18.5547 14.8203C18.4245 14.7422 18.2747 14.6576 18.1055 14.5664C17.9492 14.4753 17.793 14.3906 17.6367 14.3125C17.4805 14.2214 17.3372 14.1432 17.207 14.0781C17.0768 14 16.9466 13.9284 16.8164 13.8633C16.6862 13.7852 16.5625 13.707 16.4453 13.6289C16.4323 13.6159 16.3932 13.5898 16.3281 13.5508C16.276 13.5117 16.1979 13.4531 16.0938 13.375C15.9896 13.3099 15.8919 13.2513 15.8008 13.1992C15.7227 13.1471 15.651 13.1081 15.5859 13.082C15.5208 13.043 15.4557 13.0169 15.3906 13.0039C15.3255 12.9909 15.2539 12.9844 15.1758 12.9844C15.0846 12.9844 14.9805 13.0169 14.8633 13.082C14.7461 13.1471 14.6159 13.2448 14.4727 13.375C14.3294 13.5182 14.1927 13.6615 14.0625 13.8047C13.9323 13.9479 13.8086 14.0977 13.6914 14.2539C13.5742 14.4232 13.4505 14.5794 13.3203 14.7227C13.2031 14.8659 13.0794 15.0091 12.9492 15.1523C12.806 15.2826 12.6823 15.3802 12.5781 15.4453C12.474 15.5104 12.3763 15.543 12.2852 15.543C12.2461 15.543 12.2005 15.5365 12.1484 15.5234C12.0964 15.5104 12.0378 15.4974 11.9727 15.4844C11.9076 15.4583 11.849 15.4388 11.7969 15.4258C11.7448 15.3997 11.7057 15.3737 11.6797 15.3477C11.6406 15.3346 11.5951 15.3151 11.543 15.2891C11.4909 15.25 11.4193 15.2044 11.3281 15.1523C11.25 15.1003 11.1849 15.0612 11.1328 15.0352C11.0938 15.0091 11.0742 14.9961 11.0742 14.9961C10.4232 14.6315 9.81771 14.2474 9.25781 13.8438C8.69792 13.4271 8.1901 12.9844 7.73438 12.5156C7.26562 12.0599 6.82292 11.5521 6.40625 10.9922C6.0026 10.4323 5.61849 9.82682 5.25391 9.17578C5.25391 9.17578 5.24089 9.15625 5.21484 9.11719C5.1888 9.0651 5.14974 9 5.09766 8.92188C5.04557 8.83073 5 8.75911 4.96094 8.70703C4.9349 8.65495 4.91536 8.60938 4.90234 8.57031C4.8763 8.54427 4.85026 8.50521 4.82422 8.45312C4.8112 8.40104 4.79167 8.34245 4.76562 8.27734C4.7526 8.21224 4.73958 8.15365 4.72656 8.10156C4.71354 8.04948 4.70703 8.00391 4.70703 7.96484C4.70703 7.8737 4.73958 7.77604 4.80469 7.67188C4.86979 7.56771 4.96745 7.44401 5.09766 7.30078C5.24089 7.17057 5.38411 7.04688 5.52734 6.92969C5.67057 6.79948 5.82682 6.67578 5.99609 6.55859C6.15234 6.44141 6.30208 6.31771 6.44531 6.1875C6.58854 6.05729 6.73177 5.92057 6.875 5.77734C7.00521 5.63411 7.10286 5.50391 7.16797 5.38672C7.23307 5.26953 7.26562 5.16536 7.26562 5.07422C7.26562 4.99609 7.25911 4.92448 7.24609 4.85938C7.23307 4.79427 7.20703 4.72917 7.16797 4.66406C7.14193 4.59896 7.10286 4.52734 7.05078 4.44922C6.9987 4.35807 6.9401 4.26042 6.875 4.15625C6.79688 4.05208 6.73828 3.97396 6.69922 3.92188C6.66016 3.85677 6.63411 3.81771 6.62109 3.80469C6.54297 3.6875 6.46484 3.5638 6.38672 3.43359C6.32161 3.30339 6.25 3.17318 6.17188 3.04297C6.10677 2.91276 6.02865 2.76953 5.9375 2.61328C5.85938 2.45703 5.77474 2.30078 5.68359 2.14453C5.59245 1.97526 5.50781 1.82552 5.42969 1.69531C5.36458 1.5651 5.30599 1.45443 5.25391 1.36328C5.08464 1.03776 4.9349 0.783854 4.80469 0.601562C4.6875 0.419271 4.58984 0.315104 4.51172 0.289062C4.47266 0.276042 4.42708 0.269531 4.375 0.269531C4.32292 0.25651 4.26432 0.25 4.19922 0.25C4.06901 0.25 3.91927 0.263021 3.75 0.289062C3.59375 0.315104 3.41146 0.347656 3.20312 0.386719C2.99479 0.438802 2.80599 0.490885 2.63672 0.542969C2.48047 0.595052 2.34375 0.647135 2.22656 0.699219C1.99219 0.790365 1.74479 0.985677 1.48438 1.28516C1.23698 1.57161 0.983073 1.94922 0.722656 2.41797C0.488281 2.86068 0.30599 3.30339 0.175781 3.74609C0.0585938 4.1888 0 4.63151 0 5.07422C0 5.19141 0 5.3151 0 5.44531C0.0130208 5.5625 0.0325521 5.6862 0.0585938 5.81641C0.0716146 5.93359 0.0911458 6.0638 0.117188 6.20703C0.143229 6.33724 0.182292 6.48047 0.234375 6.63672C0.273438 6.77995 0.30599 6.91016 0.332031 7.02734C0.371094 7.13151 0.403646 7.22266 0.429688 7.30078C0.455729 7.37891 0.494792 7.48307 0.546875 7.61328C0.598958 7.74349 0.657552 7.89974 0.722656 8.08203C0.800781 8.27734 0.859375 8.43359 0.898438 8.55078C0.9375 8.66797 0.963542 8.74609 0.976562 8.78516C1.14583 9.25391 1.32812 9.69661 1.52344 10.1133C1.71875 10.5169 1.93359 10.901 2.16797 11.2656C2.53255 11.8776 2.96875 12.4961 3.47656 13.1211C3.9974 13.7461 4.57682 14.3841 5.21484 15.0352C5.86589 15.6732 6.50391 16.2526 7.12891 16.7734C7.75391 17.2812 8.3724 17.7174 8.98438 18.082C9.34896 18.3164 9.73307 18.5312 10.1367 18.7266C10.5534 18.9219 10.9961 19.1042 11.4648 19.2734C11.5039 19.2865 11.582 19.3125 11.6992 19.3516C11.8164 19.3906 11.9727 19.4492 12.168 19.5273C12.3503 19.5924 12.5065 19.651 12.6367 19.7031C12.7669 19.7552 12.8711 19.7943 12.9492 19.8203C13.0273 19.8464 13.1185 19.8724 13.2227 19.8984C13.3398 19.9375 13.4701 19.9766 13.6133 20.0156C13.7695 20.0677 13.9128 20.1068 14.043 20.1328C14.1862 20.1589 14.3164 20.1784 14.4336 20.1914C14.5638 20.2174 14.6875 20.2305 14.8047 20.2305C14.9349 20.2435 15.0586 20.25 15.1758 20.25C15.6185 20.25 16.0612 20.1849 16.5039 20.0547C16.9466 19.9375 17.3893 19.7617 17.832 19.5273C18.3008 19.2669 18.6784 19.013 18.9648 18.7656C19.2643 18.5052 19.4596 18.2578 19.5508 18.0234C19.6029 17.9062 19.6549 17.7695 19.707 17.6133C19.7591 17.444 19.8112 17.2552 19.8633 17.0469C19.9023 16.8385 19.9349 16.6562 19.9609 16.5C19.987 16.3307 20 16.181 20 16.0508C20 15.9857 19.9935 15.9271 19.9805 15.875C19.9805 15.8229 19.974 15.7773 19.9609 15.7383Z"
                            fill="#FF6600" />
                    </svg>
                    +243 891 510 000</a>
            </div>
        </section>
        <!-- End call-banner -->
        <section class="white-section v-separator pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60"
            data-src="./img/white-bg-1.jpg">

            <div class="container pt-xs-25 pt-md-25 pt-lg-60 pb-xs-25 pb-md-25 pb-lg-60">
                <h2 class="bottom-line">Nos Ingénieurs</h2>
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <ul class="no-order pt-10">
                            <li>Michael Earle</li>
                            <li>Michael Vazquez</li>
                            <li>Matthew Duncan</li>
                            <li>Rickey Campbell</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-3">
                        <ul class="no-order pt-10">
                            <li>Jonathan Ku</li>
                            <li>Theresa Ochoa</li>
                            <li>Angela Hunley</li>
                            <li>Colin Christopher</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-3">
                        <ul class="no-order pt-10">
                            <li>Stephanie Davis</li>
                            <li>Robert M. Sroka</li>
                            <li>Ivan Salinas</li>
                            <li>Dorothy Shepherd</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-3">
                        <ul class="no-order pt-10">
                            <li>Lisa N. Cook</li>
                            <li>Pauline Day</li>
                            <li>Gabriel Chau</li>
                            <li>Galen Martin</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-bg op-1 bg-fixed lazy" data-src="./img/white-bg-1.jpg"></div>
        </section>
    </main>
@endsection
