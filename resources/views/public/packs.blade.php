@extends('public.layout.main')

@php
$page = 'services';
$title = $service->title;
@endphp
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/pack.css')}}"/>
<style>
    #slider-container .your-class {
    overflow: initial;
}
</style>
@endsection
@section('content')
<section class="page-name v-separator">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <h1>Tarifs</h1>
                <ul class="bread-crumbs">
                    <li><a href="{{ route('public.home') }}">Accueil</a></li>
                    <li>
                        <p>{{ $service->name }}</p>
                    </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
    <section class="section services-section" id="services">
        <div class="container" id="slider-container">
            <div class="container text-center">
                
                    <div class="section-title">
                        <h3>{{ $service->name }}</h3>
                        {{ $service->description }}
                    
                </div>
            </div>
            <div class="your-class" >
                @foreach ($packs as $pack)
                    <!-- feaure box -->
                    <div class=" col col-bg">
                        <div class="feature-box-1 prices-card col-div">
                            <div class="pricing-card__icon bg-success">
                                    <p class="text-white top5" >
                                        {{ $pack->price }} $    
                                    </p>
                            </div>
                            <div class="feature-content">
                                <h5 class="col-title" >{{ Str::limit($pack->title, 30) }}</h5>
                                
                                <div class="description txt-light" >{!! Str::limit($pack->description, 130) !!}</div>
                                
                                <!--<div style="bottom: 100px;position:absolute">
                                <p
                                    style="font-weight: bold;color: #fff;background-color: green;  display: inline-block;padding: 5px 10px;border-radius: 4px;">
                                    {{ $pack->price }} $
                                </p>
                                </div>-->
                                <div class="btn-div">
                                <center>
                                <a href="{{ route('public.new_reservation', ['pack_id' => $pack->id]) }}"
                                    class="btn btn-primary mt-4" >Réserver</a>
                                </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                @endforeach

            </div>
            

            
        </div>
        <br><br>
       <!-- <div class="container your-class">
    <div>your content</div>
    <div>your content</div>
    <div>your content</div>
  </div>-->
    </section>

    <section class="page-name v-separator">
        <div class="dark-line"></div>
        <div class="page-name-content">
            <div class="container">
                <ul class="bread-crumbs">
                    <li>Nous offrons les meilleurs tarifs! </li>
                </ul>
            </div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="page-name__bg lazy"
                data-src="./img/page-name_bg.jpg" alt="bg">
        </div>
    </section>
<br><br>
@endsection
@section('script')
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('slick/custom.js')}}"></script>




@endsection