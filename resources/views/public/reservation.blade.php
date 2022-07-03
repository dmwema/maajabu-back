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
                        <h2>{{ $pack->title }} <span
                                style="font-size: 2rem;display: inline-block;padding: 0 10px;background-color: red;color: #fff;border-radius: 5px;margin-left: 10px;">{{ $pack->price }}
                                $</span>
                        </h2>
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
                    <div class="col-md-12" style="padding: 0">
                        <h5><i class="fas fa-users" style="margin-right: 10px; color:red"></i> Information du client</h5>
                    </div>
                    <div class="col-md-12" style="padding: 0">
                        {{ old('client_type') }}
                        <div class="wrapper">
                            <input type="radio" name="client_type" id="option-1" value="1"
                                {{ old('client_type') == 1 ? 'checked' : '' }}
                                {{ old('client_type') == null ? 'checked' : '' }}>
                            <input type="radio" name="client_type" id="option-2" value="2"
                                {{ old('client_type') == 2 ? 'checked' : '' }}>
                            <label for="option-1" class="option option-1">
                                <i class="fas fa-users"></i>
                                <span>Nous sommes un groupe</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <i class="fas fa-user"></i>
                                <span>Je suis un individu</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6" style="border: 1px solid #ccc; padding: 20px; border-right:none">
                        <h5>Nous sommes un groupe</h5>
                        <small>Si vous n'êtes pas un groupe, veuillez ignorer cette section</small>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="group_name">Nom du groupe</label>
                                <input type="text" autocomplete="off" class="form-control" id="group_name" name="group_name"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="group_user">Nom complet du responsable</label>
                                <input type="text" class="form-control" id="group_user" name="group_user" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="group_members">Nombre de personnes à venir au studio</label>
                                <input type="number" class="form-control" id="group_members" name="group_members"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="group_address">Adresse</label>
                                <input type="text" class="form-control" id="group_address" name="group_address"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="group_phone">Numéro de téléphone</label>
                                <input type="text" class="form-control" id="group_phone" name="group_phone" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="border: 1px solid #ccc; padding: 20px;">
                        <h5>Je suis un individu (particulier)</h5>
                        <small>Si vous êtes un groupe, veuillez ignorer cette section</small>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user_lastname">Nom</label>
                                <input type="text" class="form-control" id="user_lastname" name="user_lastname"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_firstname">Prénom</label>
                                <input type="text" class="form-control" id="user_firstname" name="user_firstname"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_phone">Téléphone</label>
                                <input type="text" class="form-control" id="user_phone" name="user_phone"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Adresse physique</label>
                                <input type="text" class="form-control" id="user_address" name="user_address"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h5><i class="fas fa-shopping-cart  " style="margin-right: 10px; color:red"></i> Informations de la
                        réservation
                    </h5>
                    <div class="col-md-12" style="border: 1px solid #ccc; padding: 20px;">
                        <div class="row">
                            @if ($service->type == 1)
                                <div class="form-group col-md-4">
                                    <label for="type">Types de séances</label>
                                    <select name="seance_type" id="type" class="form-control">
                                        <option value="1">Normal (9h du temps)</option>
                                        <option value="2">Lockout (33 heures payement double)</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="seance_qte" class="form-label">Nombre de séances</label>
                                    <input type="number" class="form-control" id="seance_qte" name="seance_qte">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="seance_date" class="form-label">Date du début</label>
                                    <input type="datetime-local" class="form-control" id="seance_date" name="seance_date">
                                </div>
                            @elseif ($service->type == 2)
                                <div class="form-group col-md-6">
                                    <label for="copies" class="form-label">Nombre de copies</label>
                                    <input type="number" class="form-control" id="copies" name="copies">
                                </div>
                            @elseif ($service->type == 3)
                                <div class="form-group col-md-6">
                                    <label for="duplications" class="form-label">Nombre de duplications</label>
                                    <input type="number" class="form-control" id="duplications" name="duplications">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-4" style="text-align: center; width:100%">
                        <button class="btn btn-primary mt-4">Valider la commande</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
