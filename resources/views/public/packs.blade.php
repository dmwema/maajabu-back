@extends('public.layout.main')

@php
$page = 'services';
$title = $service->title;
@endphp
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
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
                <h1>Plans et prix</h1>
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
    <section class="section services-section" id="services">
        <div class="container" id="slider-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            <div class="your-class" >
                @foreach ($packs as $pack)
                    <!-- feaure box -->
                    <div class="">
                        <div class="feature-box-1" style="height: 50vh; border: 1px dotted #b07a12;">
                            <div class="feature-content">
                                <h4 style="color: #b07a12">{{ $pack->title }}</h4>
                                <div class="description">{!! $pack->description !!}</div>
                                
                                <div style="bottom: 100px;position:absolute">
                                <p
                                    style="font-weight: bold;color: #fff;background-color: green;  display: inline-block;padding: 5px 10px;border-radius: 4px;">
                                    {{ $pack->price }} $
                                </p>
                                </div>
                                <div style="bottom: 10px;position:absolute;right: 0; left: 0;">
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
                    <li>Nous vous proposons le Meuilleur Tarif! </li>
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

<script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        dot: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        speed: 300,
        arrows:true,
        autoplay: true,
        autoplaySpeed: 3000,
        
        responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });
    });
  </script>

@endsection