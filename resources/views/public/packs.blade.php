@extends('public.layout.main')

@php
$page = 'packs';
$title = $service->title;
@endphp

@section('content')
    <section class="section services-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>{{ $service->name }}</h2>
                        <p>Tous les packs</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packs as $pack)
                    <!-- feaure box -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="feature-box-1">
                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="feature-content">
                                <h5>{{ $pack->title }}</h5>
                                <p>{{ $pack->description }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                @endforeach

            </div>
        </div>
    </section>

@endsection
