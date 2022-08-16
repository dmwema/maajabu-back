@php

$active = 'service';
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
                <h4 class="page-title" style="text-align: left">Packs - {{ $service->name }}</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="#" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="mdi mdi-plus"></i> Ajouter un
                        nouveau pack</a>
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
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class=" card">
                    <div class="card-body row">
                        <h4 class="card-title">Tous les packs enregistrés</h4>
                        <hr>
                        @for ($i = 0; $i < count($packs); $i++)
                            <div class="col-md-4">
                                <div style="border: 1px solid #eee; padding:10px; border-radius: 4px">
                                    <h5>
                                        {{ $packs[$i]->title }}
                                    </h5>
                                    <p>
                                        {{ $packs[$i]->description }}
                                    </p>
                                    <p class="price" style="color: blue; margin:0">
                                        {{ $packs[$i]->price }} $
                                    </p>
                                    <form onsubmit="return confirm('Voulez-vous vraiment supprimer ce pack ?')"
                                        action="{{ route('pack.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $packs[$i]->id }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a title="Modifier" style="color: #fff;margin-top:5px"
                                            href="{{ route('pack.edit', ['id' => $packs[$i]->id]) }}"
                                            class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                        <button title="Supprimer" style="color: #fff;margin-top:5px"
                                            class="btn btn-danger"><i class="far fa-trash-alt"></i></button>

                                    </form>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un pack</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('pack.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label for="title" class="form-label">Nom</label>
                            <input type="text" class="form-control" required id="title" name="title">
                        </div>
                        <div>
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" required cols="1" rows="3"
                                class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="price" class="form-label">Prix</label>
                            <input type="number" class="form-control" required id="price" name="price">
                        </div>
                        <div>
                            <label for="image" class="form-label">Image (Optionnel)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg">
                        </div>

                        <input type="hidden" required name="service_id" value="{{ $service->id }}">
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
