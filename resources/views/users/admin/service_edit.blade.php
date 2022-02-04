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
                <h4 class="page-title" style="text-align: center">Modifier les informations du <br/>
                    {{ $service->name }}
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
                            action="{{ route('service.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $service->name }}" required
                                        class="form-control form-control-line" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $service->description }}" required
                                        class="form-control form-control-line" name="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <img style="width: 200px ; height: 200px" src="{{ Storage::url($service->img_url) }}" alt="">
                                    <input type="file" required
                                        class="form-control form-control-line" name="img_url">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tarif</label>
                                <div class="col-md-12">
                                    <select id="tarif" name="tarif" class="form-select">
                                        @foreach ($tarifs as $option_tarif)
                                        <option value="{{ $option_tarif->id }}"
                                            {{ (isset($service->tarif) && ($service->tarif->id == $option_tarif->id))?'selected':''}}
                                            required>{{ $option_tarif->name }} ({{ $option_tarif->price }} $ US)</option>
                                         @endforeach
                                    </select>
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
