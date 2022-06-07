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
            <div class="col-lg-8 col-xlg-9 col-md-7 offset-md-2">
                <div class=" card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="date_reservation" class="form-label">Date de reservation</label>
                                        <input type="date" class="form-control" required id="date_reservation"
                                            name="date_reservation">
                                    </div>
                                    <div class="form-group col-md-6">
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
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}
                                                        ({{ $user->phone }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addClient">Nouvau client</a>
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
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addClient">Nouvau client</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
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
                                    <div class="mb-3 col-md-6">
                                        <label for="qte" class="form-label">Quantité</label>
                                        <input type="number" class="form-control" required id="qte" name="qte">
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
