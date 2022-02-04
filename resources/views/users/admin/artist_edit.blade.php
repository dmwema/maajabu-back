@php

$active = 'artist';
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
                <h4 class="page-title" style="text-align: center">Modifier les informations de l'artiste <br/>
                    {{ $artist->name }}
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
        <div class="row">
            <div class="col-lg-8 col-xlg-9 col-md-7 offset-md-2">
                <div class=" card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="POST"
                            action="{{ route('artist.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $artist->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Noms</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $artist->name }}" required
                                        class="form-control form-control-line" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Adresse mail</label>
                                <div class="col-md-12">
                                    <input type="email" value="{{ $artist->email }}" required
                                        class="form-control form-control-line" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Téléphone</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $artist->phone }}" required
                                        class="form-control form-control-line" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Adresse domicile</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $artist->address }}" required
                                        class="form-control form-control-line" name="address">
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
