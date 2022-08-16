@php

$active = 'file';
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
                <h3 class="page-title" style="text-align: center">Fiche technique : {{ $file->work->name }}</h3>
            </div>
        </div>
    </div>

    <div class="container" style="text-align: right">
        <form onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette fiche ?')"
            action="{{ route('file.delete') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $file->id }}">
            <input type="hidden" name="_method" value="DELETE">

            <button title="Supprimer" style="color: #fff" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                Supprimer</button>
            <a href="{{ route('show_file', ['id' => $file->id]) }}" class="btn btn-primary" style=""><i
                    class="fa fa-eye"></i>
                Télécharger</a>
        </form>
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

        @foreach ($titles as $title)
            <div class="row">
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class=" card">
                        <div class="card-body">
                            <h5>{{ $title->name }}</h5>
                            <hr>

                            @if ($title->elements != null)
                                <table class="table">
                                    <thead>
                                        <th>Libellé</th>
                                        <th>Niveau</th>
                                        <th>FX</th>
                                        <th>Add elements</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($title->elements as $element)
                                            <tr>
                                                <td>{{ $element->name }}</td>
                                                <td>{{ $element->level }}</td>
                                                <td>{{ $element->fx }}</td>
                                                <td>{{ $element->comment }}</td>
                                                <td>
                                                    <form
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ? ?')"
                                                        action="{{ route('element.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $element->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <button title="Supprimer" style="color: #fff"
                                                            class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div class="col-7">
                                <div class="upgrade-btn">
                                    <a href="#" class="btn btn-success text-white" class="mdi mdi-plus"
                                        data-bs-toggle="modal" data-bs-target="#add{{ $title->id }}"></i>
                                        Ajouter un élément</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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

    @foreach ($titles as $title)
        <!-- Modal -->
        <div class="modal fade" id="add{{ $title->id }}" tabindex="-1" aria-labelledby="addE{{ $title->id }}Label"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel élément à {{ $title->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('element.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="level" class="form-label">Niveau</label>
                                    <input type="text" id="level" name="level" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="FX" class="form-label">FX</label>
                                    <input type="text" id="fx" name="fx" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Add elements</label>
                                    <input type="text" id="comment" name="comment" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="ftitle_id" value="{{ $title->id }}">
                            <input type="hidden" name="file_id" value="{{ $file->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
