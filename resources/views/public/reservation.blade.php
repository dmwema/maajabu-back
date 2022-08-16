@extends('public.layout.main')

@php
$page = 'services';
$title = 'nos services';
@endphp

@section('content')
    <section class="section services-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h3>{{ $pack->title }} <span
                                style="font-size: 2rem;display: inline-block;padding: 0 10px;background-color: red;color: #fff;border-radius: 5px;margin-left: 10px;">{{ $pack->price }}
                                $</span>
                        </h3>
                        <p>-- {{ $service->name }} --</p>
                        <hr>
                        <h4>Faites votre réservation à temps réel</h4>
                        <div class="description">{!! $pack->description !!}</div>
                        <hr>
                    </div>
                </div>
            </div>
            <form action="{{ route('public.reservation', ['pack_id' => $pack->id]) }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 60px">

                    <div class="col-md-6" style="border: 1px solid #ccc; padding: 20px; border-right:none">

                        <h5><i class="fas fa-users" style="margin-right: 10px; color:red"></i> Information du client
                        </h5>
                        <section class="tabs-wrapper">
                            <div class="tabs-block">
                                <div class="tabs">
                                    <input type="radio" name="client_type" value="1" id="tab1" checked="checked" />
                                    <label for="tab1">
                                        <i class="fas fa-users" style="margin-right: 10px"></i>
                                        <span>Nous sommes un groupe</span></label>
                                    <div class="tab">
                                        <div class="col-md-12 form">
                                            <div class="form-group">
                                                <label for="group_name">Nom du groupe</label>
                                                <input type="text" autocomplete="off" value="{{ old('group_name') }}"
                                                    class="form-control" id="group_name" name="group_name" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="group_user">Nom complet du responsable</label>
                                                <input type="text" class="form-control" value="{{ old('group_user') }}"
                                                    id="group_user" name="group_user" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="group_members">Nombre de personnes à venir au studio</label>
                                                <input type="number" class="form-control"
                                                    value="{{ old('group_members') }}" id="group_members"
                                                    name="group_members" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="group_address">Adresse</label>
                                                <input type="text" class="form-control" id="group_address"
                                                    value="{{ old('group_address') }}" name="group_address"
                                                    placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="group_phone">Numéro de téléphone</label>
                                                <input type="text" class="form-control" value="{{ old('group_phone') }}"
                                                    id="group_phone" name="group_phone" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="radio" name="client_type" value="2" id="tab2" />
                                    <label for="tab2">
                                        <i class="fas fa-user" style="margin-right: 10px"></i>
                                        <span>Je suis un particulier</span></label>
                                    <div class="tab">
                                        <div class="col-md-12 form">
                                            <div class="form-group">
                                                <label for="user_lastname">Nom</label>
                                                <input type="text" class="form-control" value="{{ old('user_lastname') }}"
                                                    id="user_lastname" name="user_lastname" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_firstname">Prénom</label>
                                                <input type="text" value="{{ old('user_firstname') }}"
                                                    class="form-control" id="user_firstname" name="user_firstname"
                                                    placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email">Email</label>
                                                <input type="email" value="{{ old('user_email') }}" class="form-control"
                                                    id="user_email" name="user_email" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_phone">Téléphone</label>
                                                <input type="text" class="form-control" {{ old('user_phone') }}
                                                    id="user_phone" name="user_phone" aria-describedby="emailHelp"
                                                    placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_address">Adresse physique</label>
                                                <input type="text" value="{{ old('user_address') }}" class="form-control"
                                                    id="user_address" name="user_address" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6" style="border: 1px solid #ccc; padding: 20px;">
                        <h5><i class="fas fa-shopping-cart  " style="margin-right: 10px; color:red"></i> Informations de
                            la
                            réservation
                        </h5>
                        <div class="col-md-12 form">
                            @if ($service->type == 1)
                                <div class="form-group">
                                    <label for="type">Types de séances</label>
                                    <select name="seance_type" id="type" class="form-control">
                                        <option value="1">Normal (9h du temps)</option>
                                        <option value="2">Lockout (33 heures payement double)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_date" class="form-label">Date du début</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date">
                                    <small>Pour l'heure, selectionnez 9h pour les séances matinal, 16h pour les
                                        séances du
                                        soir et 00h pour les séances de la nuit</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="enr_type">Type d’enregistrement</label>
                                    <select name="enr_type" id="enr_type" class="form-control">
                                        <option value="Live">Live</option>
                                        <option value="Programmation">Programmation</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="enr_type2">Type</label>
                                    <select name="enr_type2" id="enr_type2" class="form-control">
                                        <option value="Radio">Radio</option>
                                        <option value="Spot publicitaire">Spot publicitaire</option>
                                        <option value="Album">Album</option>
                                        <option value="Instrumental">Instrumental</option>
                                        <option value="Single">Single</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="songs_nb">Nombre de chansons</label>
                                    <input type="number" class="form-control" value="{{ old('songs_nb') }}" id="songs_nb"
                                        name="songs_nb" placeholder="">
                                </div>
                            @elseif ($service->type == 2)
                                <div class="form-group">
                                    <label for="copies" class="form-label">Nombre de copies</label>
                                    <input type="number" class="form-control" id="copies" name="copies">
                                    <hr>
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="impression_proch"
                                            id="impression_proch" checked>
                                        <label class="form-check-label" for="impression_proch">
                                            Inclure les prochettes
                                        </label>
                                    </div>
                                </div>
                            @elseif ($service->type == 3)
                                <div class="form-group">
                                    <label for="duplication_nb" class="form-label">Nombre de duplications</label>
                                    <input type="number" class="form-control" id="duplication_nb" name="duplication_nb">
                                </div>
                                <div class="form-group">
                                    <label for="duplication_type">Type de duplication</label>
                                    <select name="duplication_type" id="duplication_type" class="form-control">
                                        <option value="Disque amouvible">Disque amouvible</option>
                                        <option value="CD">CD</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-4" style="text-align: center; width:100%">
                        <button class="btn btn-primary mt-4 mr-4">Continuer</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('style')
    <style>
        /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         * Tabs Block
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         */
        .tabs-block {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         * Tabs
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         */
        .tabs {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .tabs label {
            background: #fff;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            cursor: pointer;
            padding: 20px 20px;
            border: 1px solid rgb(238, 238, 238);
            transition: all 0.3s ease;
        }

        .tabs .tab {
            flex-grow: 1;
            width: 100%;
            height: 100%;
            display: none;
            color: #000;
            background-color: #fff;
        }

        .tabs .tab>*:not(:last-child) {
            margin-bottom: 0.8rem;
        }

        .tabs [type=radio] {
            display: none;
        }

        .tabs [type=radio]:checked+label {
            border-color: #0069d9;
            background: #0069d9;
            color: #fff
        }

        .tabs [type=radio]:checked+label+.tab {
            display: block;
        }

        @media (min-width: 768px) {

            body {
                font-size: 1.125rem;
            }

            .tabs-container {
                padding: 4rem 4rem;
            }

            .tabs label {
                order: 1;
                width: auto;
            }

            .tabs .tab {
                order: 9;
            }

            .tabs [type=radio]:checked+label {
                border-bottom: none;
            }
        }

        .form {
            margin-top: 30px;
            padding: 0;
            text-align: left
        }

        .form label {
            border: none;
            padding: 0;
            text-align: left;
            display: block
        }

    </style>
@endsection
