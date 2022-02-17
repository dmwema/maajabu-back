@extends('public.layout.main')

@php
$page = 'galery';
$title = 'Gallerie';
@endphp

@section('content')
    <!-- Begin page-name -->
    <section class="page-name v-separator mb-xs-20 mb-md-25 mb-lg-65">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Our Gallery</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>Notre Gallerie</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <!-- End page-name -->
    <div class="container gallery-container">

        <div class="tz-gallery">

            <div class="row">

                <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="{{ asset('galery/images/bridge.jpg') }}">
                        <img src="{{ asset('galery/images/bridge.jpg') }}" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="{{ asset('galery/images/park.jpg') }}">
                        <img src="{{ asset('galery/images/park.jpg') }}" alt="Park">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="{{ asset('galery/images/tunnel.jpg') }}">
                        <img src="{{ asset('galery/images/tunnel.jpg') }}" alt="Tunnel">
                    </a>
                </div>
                <div class="col-sm-12 col-md-8">
                    <a class="lightbox" href="{{ asset('galery/images/traffic.jpg') }}">
                        <img src="{{ asset('galery/images/traffic.jpg') }}" alt="Traffic">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4" style="height: 100%">
                    <a class="lightbox" href="{{ asset('galery/images/coast.jpg') }}">
                        <img src="{{ asset('galery/images/coast.jpg') }}" alt="Coast">
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection
