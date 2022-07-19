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
                    <a href="{{ route('public.services') }}" target="_blank" class="btn btn-success text-white"
                        class="mdi mdi-plus"></i>
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
                        @if (count($datas) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date de reservation</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Tél. client</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Service reservé</th>
                                            <th scope="col">Type des séances</th>
                                            <th scope="col">Date début</th>
                                            <th scope="col">Type d'enrégistrément</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Nombre de chansons</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            @php
                                                $i++;
                                            @endphp
                                            @if ($data['service']->type == 1)
                                                <tr>
                                                    <th scope="row">{{ $i }}</th>
                                                    <td>{{ $data['reservation']->created_at }}</td>
                                                    @if ($data['reservation']->user_id != null)
                                                        <td>{{ $data['user']->firstname . ' ' . $data['user']->name . ' (' . $data['user']->email . ')' }}
                                                        </td>
                                                        <td>{{ $data['user']->phone }}</td>
                                                        <td>{{ $data['user']->adresse }}</td>
                                                    @elseif($data['reservation']->group_id != null)
                                                        <td>Groupe
                                                            {{ $data['group']->name . ' (de' . $data['group']->owner . ') [' . $data['group']->members . ' Membres]' }}
                                                        </td>
                                                        <td>{{ $data['group']->phone }}</td>
                                                        <td>{{ $data['group']->adresse }}</td>
                                                    @endif
                                                    <td>
                                                        {{ $data['service']->name . ' (' . $data['pack']->name . ')' }}
                                                    </td>
                                                    <td>{{ $data['reservation']->seance_type == 1 ? 'Normal (9h)' : 'Lockout (33h)' }}
                                                    </td>
                                                    <td>{{ $data['reservation']->start_date }}</td>
                                                    <td>{{ $data['reservation']->enr_type }}</td>
                                                    <td>{{ $data['reservation']->enr_type2 }}</td>
                                                    <td>{{ $data['reservation']->songs_nb }}</td>
                                                    <td
                                                        class="bg-{{ $data['reservation']->status == 1 ? 'warning' : '' }}">
                                                        {{ $data['reservation']->status == 1 ? 'Non payé' : '' }}</td>
                                                    <form onsubmit=" return confirm('Êtes-vous sûr de vouloir supprimer
                                                                    cet enrégistrement ? ?')"
                                                        action="{{ route('reservation.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $data['reservation']->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a title="Modifier" style="color: #fff"
                                                            href="{{ route('reservation.edit', ['id' => $data['reservation']->id]) }}"
                                                            class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                                        <button title="Supprimer" style="color: #fff"
                                                            class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>

                                                    </td>
                                                </tr>
                                            @endif
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
