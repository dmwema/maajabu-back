@php

$active = 'pimg';
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
                <h4 class="page-title" style="text-align: center">Modifier les informations du projet à la une <br />
                    {{ $pimg->title }}
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
                        <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('pimg.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pimg->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Titre</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $pimg->title }}" required
                                        class="form-control form-control-line" name="title">
                                </div>
                            </div>
                            <div>
                                <label for="category" class="form-label">Catégorie</label>
                                <select name="category" id="category" class="form-select">
                                    <option {{ $pimg->category == 'mastering' ? 'selected' : '' }} value="mastering">
                                        Mastering</option>
                                    <option {{ $pimg->category == 'duplication' ? 'selected' : '' }} value="duplication">
                                        Duplication</option>
                                    <option {{ $pimg->category == 'impression' ? 'selected' : '' }} value="impression">
                                        Impression</option>
                                    <option {{ $pimg->category == 'enregistrement' ? 'selected' : '' }}
                                        value="enregistrement">Enrégistrement</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <img style="width: 200px; height:200px " src="{{ $pimg->image }}" alt=""><br>
                                    <input type="file" class="form-control form-control-line" name="image">
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
