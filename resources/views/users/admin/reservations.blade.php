@php

$active = 'reservations';
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
                <h4 class="page-title">Toutes les reservations</h4>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{ route('reservation.new') }}" class="btn btn-success text-white" class="mdi mdi-plus"></i>
                        Enrégistrer une reservation</a>
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
                        <h4 class="card-title">Toutes les reservations enregistrées</h4>
                        <hr>
                        @if (count($reservations) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date de reservation</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Service reservé</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Frais</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $reservation->date_reservation }}</td>
                                                <td>{{ $reservation->user->name }}</td>
                                                <td>
                                                    @if (isset($reservation->service))
                                                        {{ $reservation->service->name }} ({{ $reservation->service->tarif->price }} $ US)
                                                    @else
                                                        Aucun service
                                                    @endif
                                                </td>
                                                <td>{{ $reservation->quatity }}</td>
                                                <td>
                                                    @if (isset($reservation->service))
                                                     {{ (($reservation->service->tarif->price)*1)*$reservation->quatity }} $ US
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <form
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enrégistrement ? ?')"
                                                        action="{{ route('reservation.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a title="Modifier" style="color: #fff"
                                                            href="{{ route('reservation.edit', ['id' => $reservation->id]) }}"
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
                                <p style="margin-bottom: 0;">Aucune reservation enregistrée</p>
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

@endsection
