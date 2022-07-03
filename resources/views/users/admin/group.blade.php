@php

$active = 'groups';
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
                <h4 class="page-title">Tous les groupes</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="#" class="btn btn-success text-white" class="mdi mdi-plus" data-bs-toggle="modal"
                        data-bs-target="#addGroup"></i>
                        Nouveau Groupe</a>
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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur ! </strong>{{ session()->get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tous les groupes enregistrées</h4>
                        <hr>
                        @if (count($groups) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du groupe</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Numéro de téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $group)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $group->name }}</td>
                                                <td>{{ $group->owner_id }}</td>
                                                <td>{{ $group->address }}</td>
                                                <td>{{ $group->phone }}</td>

                                                <td>
                                                    <form
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?')"
                                                        action="{{ route('group.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $group->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">

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
                                <p style="margin-bottom: 0;">Aucun groupe enregistrée</p>
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
    <div class="modal fade" id="addGroup" tabindex="-1" aria-labelledby="addGroupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau groupe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('group.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 coclientl-md-12">
                                <label for="name" class="form-label">Nom du group</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-12" for="users">Responsable</label>
                            <div class="col-md-12">
                                <select name="owner_id" class="form-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}
                                            ({{ $user->phone }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 coclientl-md-12">
                                <label for="name" class="form-label">Adresse</label>
                                <input type="text" class="form-control" required id="name" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 coclientl-md-12">
                                <label for="name" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" required id="name" name="phone">
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
