@php

$active = 'pimg';
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
                <h4 class="page-title">Tous les projet à la une</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="#" class="btn btn-success text-white" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="mdi mdi-plus"></i> Nouveau</a>
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
                        <h4 class="card-title">Tous les projets à la une enregistrés</h4>
                        <hr>
                        @if (count($pimages) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">image</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Catégorie</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($pimages as $pimg)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td><img style="width: 100px; height: 100px;" src="{{ $pimg->image }}"
                                                        alt=""></td>
                                                <td>{{ $pimg->title }}</td>
                                                <td>{{ $pimg->category }}</td>
                                                <td>

                                                    <form
                                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?')"
                                                        action="{{ route('pimg.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $pimg->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a title="Modifier" style="color: #fff"
                                                            href="{{ route('pimg.edit', ['id' => $pimg->id]) }}"
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
                                <p style="margin-bottom: 0;">Aucune donnée enregistrée</p>
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
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau Projet à la une</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('pimg.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" required id="title" name="title">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="category" class="form-label">Catégorie</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="mastering" selected>Mastering</option>
                                    <option value="duplication">Duplication</option>
                                    <option value="impression">Impression</option>
                                    <option value="enregistrement">Enrégistrement</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" required id="image" name="image"
                                accept="image/png, image/jpeg, image/jpg">
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
