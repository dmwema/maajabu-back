@php

$active = 'reservation';
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
                <h4 class="page-title" style="text-align: center">Modifier les informations de la reservation fait par
                    <br />
                    {{ $reservation->user->firstname . ' ' . $reservation->user->name }}
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
                            action="{{ route('reservation.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <div class="form-group">
                                <label class="col-md-12">Date de la reservation</label>
                                <div class="col-md-12">
                                    <input type="date" value="{{ $reservation->date_reservation }}" required
                                        class="form-control form-control-line" name="date_reservation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Utilisateur</label>
                                <div class="col-md-12">
                                    <select name="user_id" id="" class="form-select">
                                        @if (!isset($reservation->user))
                                            @foreach ($users as $user)
                                                <option {{ $reservation->user->id == $user->id ? 'selected' : '' }}
                                                    value="{{ $user->id }}">{{ $user->firstname . ' ' . $user->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->firstname . ' ' . $user->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Service</label>
                                <div class="col-md-12">
                                    <select name="service_id" id="" class="form-select">
                                        @if ($reservation->service)
                                            @foreach ($services as $service)
                                                <option {{ $reservation->service->id == $service->id ? 'selected' : '' }}
                                                    value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}
                                                    ({{ $service->tarif->price }} $ US)</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Quantité</label>
                                <div class="col-md-12">
                                    <input type="number" required value="{{ $reservation->quatity }}"
                                        class="form-control form-control-line" name="qte">
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
