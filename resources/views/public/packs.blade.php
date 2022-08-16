@extends('public.layout.main')

@php
$page = 'services';
$title = $service->title;
@endphp

@section('content')
    <section class="section services-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packs as $pack)
                    <!-- feaure box -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="feature-box-1">
                            <div class="feature-content">
                                <h4>{{ $pack->title }}</h4>
                                <div class="description">{!! $pack->description !!}</div>
                                <hr>
                                <p
                                    style="font-weight: bold;color: #fff;background-color: red;  display: inline-block;padding: 5px 10px;border-radius: 4px;">
                                    {{ $pack->price }} $
                                </p><br>
                                <a href="{{ route('public.new_reservation', ['pack_id' => $pack->id]) }}"
                                    class="btn btn-primary mt-4">Réserver</a>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                @endforeach

            </div>
        </div>
    </section>

@endsection
