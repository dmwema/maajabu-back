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
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Tous les clients</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="#" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="mdi mdi-plus"></i> Ajouter un
                        nouveau client</a>
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
                        <h4 class="card-title">Tous les clients enrégistrés</h4>
                        <hr>
                        @if (count($clients) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prenom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Téléphone</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->firstname }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>

                                                    <form onsubmit="return confirm('azsazd ?')"
                                                        action="{{ route('user.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $client->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a title="Modifier" style="color: #fff"
                                                            href="{{ route('client.edit', ['id' => $client->id]) }}"
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
                                <p style="margin-bottom: 0;">Aucun client enrégistré</p>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="firstname" class="form-label">Prénom</label>
                                <input type="text" class="form-control" required id="firstname" name="firstname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" required id="email" name="email">
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
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
