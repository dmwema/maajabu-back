@php

$active = 'project';
$i = 0;

@endphp
@extends('layout.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center justify-content-center">
            <div class="col-5">
                <h4 class="page-title" style="text-align: center">Enregistrer une nouvelle réservation</h4>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Succès ! </strong>{{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('fail'))
            <div class="alert alert-adnger alert-dismissible fade show" role="alert">
                <strong>Erreur ! </strong>{{ session()->get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class=" card">
                    <div class="card-body">
                        <h5>Informations de base</h5>
                        <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-md-12" for="client_type">Type de client</label>
                                    <div class="col-md-12">
                                        <select name="client_type" id="client_type" class="form-select">
                                            <option value="{{ CLIENT__GROUP }}">Un groupe</option>
                                            <option value="{{ CLIENT__USER }}">Individuel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12" id="client_group">
                                    <label class="col-md-12" for="users">Groupe</label>
                                    <div class="col-md-12">
                                        <select name="user_id" id="users" class="form-select">
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}
                                                    ({{ $group->phone }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12" id="client_user" style="display: none">
                                    <label class="col-md-12" for="users">Client</label>
                                    <div class="col-md-12">
                                        <select name="user_id" id="users" class="form-select">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                    ({{ $user->phone }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-12" for="services">Service</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class=" card">
                    <div class="card-body">
                        <h5>Détail du service (Mastering)</h5>
                        <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Pack</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                @foreach ($mastering_packs as $mastering_pack)
                                                    <option value="{{ $mastering_pack->id }}">
                                                        {{ $mastering_pack->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Option</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                <option value="1">HD-WAV</option>
                                                <option value="2">WAV</option>
                                                <option value="3">MP3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="qte" class="form-label">Nombre de séances</label>
                                        <input type="number" class="form-control" required id="qte" name="qte">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Types de séances</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                <option value="1">Normal (9h du temps)</option>
                                                <option value="2">Lockout (33 heures payement double)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="qte" class="form-label">Date</label>
                                        <input type="date" class="form-control" required id="qte" name="qte">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class=" card">
                    <div class="card-body">
                        <h5>Détail du service (Duplication)</h5>
                        <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Pack</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                @foreach ($mastering_packs as $mastering_pack)
                                                    <option value="{{ $mastering_pack->id }}">
                                                        {{ $mastering_pack->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Option</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                <option value="1">HD-WAV</option>
                                                <option value="2">WAV</option>
                                                <option value="3">MP3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="qte" class="form-label">Nombre de séances</label>
                                        <input type="number" class="form-control" required id="qte" name="qte">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="services">Types de séances</label>
                                        <div class="col-md-12">
                                            <select name="service_id" id="sevices" class="form-select">
                                                <option value="1">Normal (9h du temps)</option>
                                                <option value="2">Lockout (33 heures payement double)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="qte" class="form-label">Date</label>
                                        <input type="date" class="form-control" required id="qte" name="qte">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- Modal -->
    <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 coclientl-md-6">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="firstname" class="form-label">Prenom</label>
                                <input type="text" class="form-control" required id="firstname" name="firstname">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="avatar" class="form-label">Photo (facultatif)</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" required id="phone" name="phone">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="adress" class="form-label">Adresse</label>
                                <textarea name="address" id="adress" required cols="1" rows="3"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addArtist" tabindex="-1" aria-labelledby="addArtistLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel artiste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('artist.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" required id="phone" name="phone">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="adress" class="form-label">Adresse</label>
                                <textarea name="address" id="adress" required cols="1" rows="3"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
