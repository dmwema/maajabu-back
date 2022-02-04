@php

$active = 'clients';
$i = 0;

//dd($temps['forecast'][0]['forecast']);

@endphp
@extends('layout.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center justify-content-center">
            <div class="col-5">
                <h4 class="page-title" style="text-align: center">Modifier les informations de l'utilisateur |
                    {{ $client->firstname }}
                    {{ $client->name }}</h4>
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
        <div class="row">
            <div class="col-lg-8 col-xlg-9 col-md-7 offset-md-2">
                <div class=" card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="POST"
                            action="{{ route('user.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $client->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $client->name }}" required
                                        class="form-control form-control-line" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Prenom</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $client->firstname }}" required
                                        class="form-control form-control-line" name="firstname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $client->email }}" required
                                        class="form-control form-control-line" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="identity">Type d'utilisateur</label>
                                <div class="col-md-12">
                                    <select name="identity" id="identity" class="form-select">
                                        <option {{ $client->identity == CLIENTS_ID ? 'selected' : '' }}
                                            value="{{ CLIENTS_ID }}">Utilisateur simple</option>
                                        <option {{ $client->identity == ADMIN_ID ? 'selected' : '' }}
                                            value="{{ ADMIN_ID }}">Gestionnaire</option>
                                        <option {{ $client->identity == FINANCE_ID ? 'selected' : '' }}
                                            value="{{ FINANCE_ID }}">Financier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Téléphone</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $client->phone }}" required
                                        class="form-control form-control-line" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Adresse</label>
                                <div class="col-md-12">
                                    <textarea rows="3" required name="address"
                                        class="form-control form-control-line">{{ $client->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success text-white">Enregistrer</button>
                                </div>
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

@endsection
