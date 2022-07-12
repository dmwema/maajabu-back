@extends('public.layout.main')

@php
$page = 'services';
$title = 'Invoice';
@endphp

@section('content')
    <section class="back" style="margin: 20px 0; margin-bottom:80px">
        <div class="container">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Succès!</h4>
                    <p>Votre réservation a été enrégistrée avec succès. Copiez le lien de votre facture ou téléchargez-le
                        pour
                        le présenter au studio.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div>
                <div class="col-xs-12">
                    <div class="invoice-wrapper">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-top-left">
                                        <img src="{{ asset('img/logo.svg') }}" alt="logo"
                                            style="width: 120px; margin-bottom:10px">
                                        <h2 class="client-company-name">Neema Maajabu</h2>
                                        <h6 class="client-address">{{ $studio->adresse }}</h6>
                                        <h6>+243 891 510 000</h6>
                                        <h2 class="client-company-name">Service</h2>
                                        <h5>{{ $service->name }} - {{ $pack->title }}</ h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-top-right">
                                        @if ($group != null)
                                            <h2 class="our-company-name" style="color: #fff">Groupe {{ $group->name }}
                                            </h2>
                                            <h6 class="our-address">{{ $group->phone }} <br> {{ $group->address }}</h6>
                                            <h6 class="our-address">{{ $group->phone }} <br> {{ $group->members }}
                                                membres à venir</h6>
                                            <h6 class="our-address" style="color: #fff">De : {{ $group->owner }}
                                            </h6>
                                        @endif

                                        @if ($user !== null)
                                            <h2 class="our-company-name" style="color: #fff">{{ $user->name }}
                                                {{ $user->firstname }}</h2>
                                            <h6 class="our-address">{{ $user->phone }} <br> {{ $user->address }}</h6>
                                            <h6 class="our-address">{{ $user->email }}</h6>
                                        @endif
                                        <hr style="border-color: rgba(255, 255, 255, 0.1)">
                                        <h5 style="color: #fff">{{ $date }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="title">Reservation <span>#{{ $reservation->id . '/' . date('Y') }}</span>
                                        @if ($reservation->status == 1 || $reservation->status == null)
                                            <small class="bg-warning">En attente du paiement</small>
                                        @elseif ($reservation->status == 2)
                                            <small class="bg-success" style="color: #fff">Payé</small>
                                        @endif
                                    </h2>
                                </div>
                                <div class="clearfix"></div>
                                <div style="padding: 0" class="col-md-offset-1 col-md-12 col-sm-12">
                                    <div class="invoice-bottom-right">
                                        <div style="font-size: 15px">
                                            {!! $pack->description !!}
                                        </div>
                                        <hr style="border:none;border-bottom: 4px solid rgb(92, 92, 92)">
                                        <div class="row" style="font-size: 14px">
                                            @if ($service->type == 1)
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Type de séances :</b>
                                                    {{ $reservation->seance_type == 1 ? 'Normal (9h du temps)' : 'Lockout (33h du temps)' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Date du début :</b>
                                                    {{ $date }}
                                                </div>
                                                <hr style="width: 100%">
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Type d'enrégistrément :</b>
                                                    {{ $reservation->enr_type }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Type :</b>
                                                    {{ $reservation->enr_type2 }}
                                                </div>
                                                <hr style="width: 100%">
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Nombre des chansons :</b>
                                                    {{ $reservation->songs_nb }}
                                                </div>
                                            @elseif($service->type == 2)
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Nombre des copies :</b>
                                                    {{ $reservation->copies }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Imprimer prochettes :</b>
                                                    {{ $reservation->impression_proch ? 'OUI' : 'NON' }}
                                                </div>
                                            @elseif($service->type == 3)
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Nombre des duplications:</b>
                                                    {{ $reservation->duplication_nb }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b style="color: rgb(70, 70, 70)">Type de duplication :</b>
                                                    {{ $reservation->duplication_type }}
                                                </div>
                                            @endif
                                            <hr style="width: 100%">
                                        </div>
                                        <div class="price_btn">{{ $pack->price }} $</div><small
                                            style="margin-left: 10px">Prix du
                                            pack</small>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-xs-12">
                                    <hr class="divider">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .back {}

        .invoice-wrapper {
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .invoice-top {
            background-color: #1C1B1F;
            padding: 40px 60px;
        }

        .invoice-top-left h2,
        .invoice-top-left h6 {
            line-height: 1.5;
            font-family: 'Montserrat', sans-serif;
            color: #fff !important;
        }

        .invoice-top-left h6 {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .invoice-top-left h4 {
            margin-top: 30px;
            font-family: 'Montserrat', sans-serif;
            color: #fff
        }

        .invoice-top-left h5 {
            line-height: 1.4;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.6)
        }

        .client-company-name {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .client-address {
            font-size: 14px;
            margin-top: 5px;
        }

        .invoice-top-right h2,
        .invoice-top-right h6 {
            text-align: right;
            line-height: 1.5;
            font-family: 'Montserrat', sans-serif;
        }

        .invoice-top-right h5 {
            line-height: 1.4;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            text-align: right;
            margin-top: 0;
        }

        .our-company-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .our-address {
            font-size: 13px;
            margin-top: 0;
            color: rgba(255, 255, 255, 0.6);
        }

        .logo-wrapper {
            overflow: auto;
        }

        /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Invoice-bottom refers to the bottom part of invoice template
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            */
        .invoice-bottom {
            background-color: #ffffff;
            padding: 40px 60px;
            position: relative;
        }

        .title {
            font-size: 20px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .title span {
            font-size: 18px;
        }


        .title small {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 15px;
            margin-left: 10px
        }

        /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Invoice-bottom-left
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            */
        .invoice-bottom-left h5,
        .invoice-bottom-left h4 {
            font-family: 'Montserrat', sans-serif;
        }

        .invoice-bottom-left h4 {
            font-weight: 400;
        }

        .terms {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            margin-top: 40px;
        }

        .divider {
            margin-top: 50px;
            margin-bottom: 5px;
        }

        .bottom-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 26px;
            background-color: #323149;
        }

        .price_btn {
            color: #fff;
            background: #000;
            display: inline-block;
            padding: 7px 15px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 25px;
            font-weight: 500;
        }

    </style>
@endsection
