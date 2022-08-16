@php

$active = 'ir';
$i = 0;

$ir_logiciels = [];
foreach ($engineer->logiciels as $value) {
    $ir_logiciels[] = $value->id;
}

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
                <h4 class="page-title" style="text-align: center">Modifier les informations de l'ingénieur <br />
                    {{ $engineer->name }}
                </h4>
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
                        <form class="form-horizontal form-material mx-2" method="POST"
                            action="{{ route('engineer.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $engineer->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Noms</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $engineer->name }}" required
                                        class="form-control form-control-line" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Expérience (Année)</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $engineer->year_experience }}" required
                                        class="form-control form-control-line" name="year_experience">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $engineer->email }}" required
                                        class="form-control form-control-line" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Téléphone</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $engineer->phone }}" required
                                        class="form-control form-control-line" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Photo</label>
                                <div class="col-md-12">
                                    <img style="width: 200px; height:200px " src="{{ Storage::url($engineer->img_url) }}"
                                        alt=""><br>
                                    <input type="file" class="form-control form-control-line" name="img_url">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-md-12" for="logiciel">Logiciel <br>
                                        <small style="color: red">*Maintenez la touche CTRL pour séléctionner plusieurs
                                            valeurs</small></label>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-12">
                                            <select name="logiciel[]" id="logiciel" class="form-select" multiple>
                                                @foreach ($logiciels as $logiciel)
                                                    <option
                                                        {{ in_array($logiciel->id, $ir_logiciels) ? 'selected' : '' }}
                                                        value="{{ $logiciel->id }}">{{ $logiciel->name }}</option>
                                                @endforeach
                                            </select>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addLogiciel"><i class="mdi mdi-plus"></i> Nouveau
                                                logiciel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <label class="col-md-12">Modification mot de passe</label>
                            <div class="form-group">
                                <label class="col-md-12">Entrez le mot passe</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tapez à nouveau le mot de passe</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="password_confirm">
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

    <!-- Modal -->
    <div class="modal fade" id="addLogiciel" tabindex="-1" aria-labelledby="addLogicielLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau logiciel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('logiciel.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 coclientl-md-12">
                                <label for="name" class="form-label">Nom du logiciel</label>
                                <input type="text" class="form-control" required id="name" name="name">
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
