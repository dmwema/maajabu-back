@php

$active = 'ir';
$i = 0;

//dd($temps['forecast'][0]['forecast']);

@endphp
@extends('layout.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Tous les ingénieurs</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="#" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="mdi mdi-plus"></i> Nouvel ingénieur</a>
                </div>
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

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tous les ingénieurs enregistrés</h4>
                        <hr>
                        @if (count($engineers) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Noms</th>
                                            <th scope="col">Expérience (Année)</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Logiciel</th>
                                            <th scope="col">Téléphone</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($engineers as $engineer)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $engineer->name }}</td>
                                                <td>{{ $engineer->year_experience }}</td>

                                                <td><img style="width: 100px; height: 100px;"
                                                        src="{{ Storage::url($engineer->img_url) }}" alt=""></td>
                                                <td>
                                                    @foreach ($engineer->logiciels as $key => $logiciel)
                                                        {{ $logiciel->name }}
                                                        <br />
                                                    @endforeach
                                                </td>
                                                <td>{{ $engineer->phone }}</td>
                                                <td>

                                                    <form
                                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?')"
                                                        action="{{ route('engineer.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $engineer->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a title="Modifier" style="color: #fff"
                                                            href="{{ route('engineer.edit', ['id' => $engineer->id]) }}"
                                                            class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                                        <button title="Supprimer" style="color: #fff"
                                                            class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                <p style="margin-bottom: 0;">Aucun engénieurs enregistré</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Ingénieur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('engineer.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Noms</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="year_experience" class="form-label">Expérience (Année)</label>
                                <input type="number" class="form-control" required id="year_experience"
                                    name="year_experience">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="img_url" class="form-label">Photo</label>
                                <input type="file" class="form-control" required id="img_url" name="img_url"
                                    accept="image/png, image/jpeg">
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12" for="logiciel">Logiciel <br>
                                            <small style="color: red">*Maintenez la touche CTRL pour séléctionner plusieurs
                                                valeurs</small></label>
                                        <div class="col-md-12">
                                            <select name="logiciel[]" id="logiciel" class="form-select" multiple>
                                                @foreach ($logiciels as $logiciel)
                                                    <option value="{{ $logiciel->id }}">{{ $logiciel->name }}</option>
                                                @endforeach
                                            </select>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addLogiciel"><i class="mdi mdi-plus"></i> Nouveau
                                                logiciel</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">


                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" required id="phone" name="phone">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Adresse mail</label>
                                <input type="text" class="form-control" required id="email" name="email">

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" required id="password" name="password">

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
    <div class="modal fade" id="addLogiciel" tabindex="-1" aria-labelledby="addLogicielLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un logiciel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('logiciel.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Nom du logiciel</label>
                                <input type="text" class="form-control" required id="name" name="name">
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
