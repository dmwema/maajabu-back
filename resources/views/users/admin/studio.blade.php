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
                <h4 class="page-title" style="text-align: center">Informations du studio</h4>
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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur ! </strong>{{ session()->get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 col-xlg-9 col-md-7 offset-md-2">
                <div class=" card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data"
                            action="{{ route('studio.update') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="col-md-12">Nom du studio</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $studio->name ?? '' }}" required
                                        class="form-control form-control-line" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Déscription du studio</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="" cols="30" rows="3" required
                                        class="form-control">{{ $studio->description ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Historique du studio</label>
                                <div class="col-md-12">
                                    <textarea name="history" id="history" cols="30" rows="3" required
                                        class="form-control">{{ $studio->history ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Adresse du studio</label>
                                <div class="col-md-12">
                                    <textarea name="adresse" id="adresse" cols="30" rows="3" required
                                        class="form-control">{{ $studio->adresse ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Logo du studio</label>
                                <div class="col-md-12">
                                    <input type="file" value="{{ $studio->logo ?? '' }}"
                                        class="form-control form-control-line" name="logo" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Lien google maps</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $studio->url_maps ?? '' }}" required
                                        class="form-control form-control-line" name="url_maps">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success text-white">Enregister</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr style="opacity: .08;">

                    @if ($studio)
                        <div class="container">
                            <h5>Numéros de Téléphone</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studio->phones as $phone)
                                        <tr>
                                            <td>{{ $phone->number }}</td>

                                            <td>
                                                <form
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce numéro ?')"
                                                    action="{{ route('phone.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $phone->id }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button title="Supprimer" style="color: #fff" class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNumber">Ajouter
                                un numéro de téléphone</a>
                            <br>
                            <br>
                        </div>
                    @endif
                    <hr style="opacity: .08;">

                    @if ($studio)
                        <div class="container">
                            <h5>Liens réseaux sociaux</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom du reseau social</th>
                                        <th scope="col">Lien</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studio->social_networks as $social)
                                        <tr>
                                            <td>{{ $social->name }}</td>
                                            <td>{{ $social->link }}</td>

                                            <td>
                                                <form
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce lien ?')"
                                                    action="{{ route('social.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $social->id }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button title="Supprimer" style="color: #fff" class="btn btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSocial">Ajouter
                                un lien</a>
                            <br>
                            <br>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    <!-- Modal -->
    <div class="modal fade" id="addNumber" tabindex="-1" aria-labelledby="addNumberLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un numéro de contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('phone.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6 offset-md-3">
                                <label for="number" class="form-label">Entre le numéro</label>
                                <input type="text" class="form-control" required id="number" name="number">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addSocial" tabindex="-1" aria-labelledby="addSocialLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un lien réseau social</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('social.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6 offset-md-3">
                                <label for="name" class="form-label">Entrez le nom du réseau social</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 offset-md-3">
                                <label for="link" class="form-label">Entrez le lien</label>
                                <input type="text" class="form-control" required id="link" name="link">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
