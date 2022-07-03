@extends('public.layout.main')

@php
$page = 'services';
$title = 'nos services';
@endphp

@section('content')
    <section class="section services-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Nos services</h2>
                        <p>Parcourez notre catalogue de services en fin de trouver ce qui repond à vos attentes</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <!-- feaure box -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="feature-box-1">
                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="feature-content">
                                <h4><a href="{{ route('public.packs', ['service_id' => $service->id, 'service_name' => $service->name]) }}"
                                        style="color: inherit !important">{{ $service->name }}</a></h4>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                @endforeach

            </div>
        </div>
    </section>

@endsection
