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
                                <table id="table_id" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date de reservation</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Tél. client</th>
                                            <!--<th-- scope="col">Adresse</th-->
                                            <th scope="col">Service</th>
                                            <th scope="col">Type des séances</th>
                                            <!--<th scope="col">Date début</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <th scope="col">Type d'enrégistrément</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <th scope="col">Type</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <th scope="col">Nombre de chansons</th>-->
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
                                                        <!--<td>{{ $data['user']->adresse }}</td>-->
                                                    @elseif($data['reservation']->group_id != null)
                                                        <td>Groupe
                                                            {{ $data['group']->name . ' (de' . $data['group']->owner . ') [' . $data['group']->members . ' Membres]' }}
                                                        </td>
                                                        <td>{{ $data['group']->phone }}</td>
                                                        <td>{{ $data['group']->adresse }}</td>
                                                    @endif
                                                    <td>
                                                        {{ $data['service']->name . ' (' . $data['pack']->title . ')' }}
                                                    </td>
                                                    <td>{{ $data['reservation']->seance_type == 1 ? 'Normal (9h)' : 'Lockout (33h)' }}
                                                    </td>
                                                    <!--<td>{{ $data['reservation']->start_date }}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td>{{ $data['reservation']->enr_type }}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td>{{ $data['reservation']->enr_type2 }}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td>{{ $data['reservation']->songs_nb }}</td>-->
                                                    @if ($data['reservation']->status == 1)
                                                        <td class="bg-warning">Non payé</td>
                                                    @elseif($data['reservation']->status == 2)
                                                        <td style="background-color: green; color:#fff; font-weight: bold">
                                                            Payé</td>
                                                    @endif
                                                    <td>
                                                        <form
                                                            onsubmit=" return confirm('Êtes-vous sûr de vouloir supprimer cet enrégistrement ? ?')"
                                                            action="{{ route('reservation.delete') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $data['reservation']->id }}">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a title="Modifier" style="color: #fff"
                                                                href="{{ route('reservation.edit', ['id' => $data['reservation']->id]) }}"
                                                                class="btn btn-success"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <button title="Supprimer" style="color: #fff"
                                                                class="btn btn-danger"><i
                                                                    class="far fa-trash-alt"></i></button>
                                                        </form>
                                                        @if ($data['reservation']->status != 2)

                                                            <form
                                                                onsubmit=" return confirm('Êtes-vous sûr de vouloir valider le paiement de cette reservation ?')"
                                                                action="{{ route('reservation.validate') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data['reservation']->id }}">
                                                                <button title="Valider" style="color: #fff; margin-top:3px"
                                                                    class="btn btn-success"><i
                                                                        class="far fa-check"></i></button>
                                                            </form>

                                                        @endif
                                                        <button class="btn btn-success" title="Voir les détails"
                                                            style="color: #fff; margin-top:3px" type="button"
                                                            class="btn btn-primary" data-toggle="modal"
                                                            data-target="{{ '#exampleModal' . $data['reservation']->id }}">
                                                            <i class="far fa-eye"></i>
                                                        </button>

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

    @foreach ($datas as $data)
        <!-- Modal -->
        <div class="modal fade" id="{{ 'exampleModal' . $data['reservation']->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Détails de la réservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit=" return confirm('Êtes-vous sûr de vouloir supprimer cet enrégistrement ? ?')"
                            action="{{ route('reservation.delete') }}" method="POST" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['reservation']->id }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a title="Modifier" style="color: #fff"
                                href="{{ route('reservation.edit', ['id' => $data['reservation']->id]) }}"
                                class="btn btn-success"><i class="fas fa-pencil-alt"></i> Modifier</a>
                            <button title="Supprimer" style="color: #fff" class="btn btn-danger"><i
                                    class="far fa-trash-alt"></i> Supprimer</button>
                        </form>
                        @if ($data['reservation']->status != 2)

                            <form
                                onsubmit=" return confirm('Êtes-vous sûr de vouloir valider le paiement de cette reservation ?')"
                                action="{{ route('reservation.validate') }}" method="POST" style="display: inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['reservation']->id }}">
                                <button title="Valider" style="color: #fff; margin-top:3px" class="btn btn-success"><i
                                        class="far fa-check"></i> Valider</button>
                            </form>

                        @endif
                        <br><br>
                        <hr>
                        @if ($data['reservation']->status == 1)
                            <p class="bg-warning" style="padding: 7px; font-size: 1.3rem; text-align:center">Non payé</p>
                        @elseif($data['reservation']->status == 2)
                            <p
                                style="background-color: green; color:#fff; font-weight: bold;padding: 7px; font-size: 1.3rem; text-align:center">
                                Payé</p>
                        @endif
                        <hr>
                        <br><br>
                        @if ($data['service']->type == 1)
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Date de reservation</b><br>
                                    <p>{{ $data['reservation']->created_at }}</p>
                                    <hr>
                                    @if ($data['reservation']->user_id != null)
                                        <b>Client</b><br>
                                        <p>{{ $data['user']->firstname . ' ' . $data['user']->name . ' (' . $data['user']->email . ')' }}
                                        </p>
                                        <hr>
                                        <b>Adresse</b><br>
                                        <p>{{ $data['user']->adresse }}</p>
                                        <hr>
                                        <b>Tél. client</b><br>
                                        <p>{{ $data['user']->phone }}</p>
                                    @elseif($data['reservation']->group_id != null)
                                        <p>Groupe
                                            {{ $data['group']->name . ' (de' . $data['group']->owner . ') [' . $data['group']->members . ' Membres]' }}
                                        </p>
                                        <hr>
                                        <p>{{ $data['group']->phone }}</p>
                                        <hr>
                                        <p>{{ $data['group']->adresse }}</p>
                                    @endif
                                    <hr>
                                    <b>Service</b><br>
                                    <p>
                                        {{ $data['service']->name . ' (' . $data['pack']->title . ')' }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <b>Type des séances</b><br>
                                    <p>{{ $data['reservation']->seance_type == 1 ? 'Normal (9h)' : 'Lockout (33h)' }}
                                    </p>
                                    <hr>
                                    <b>Date début</b><br>
                                    <p>{{ $data['reservation']->start_date }}</p>
                                    <hr>
                                    <b>Type d'enrégistrément</b><br>
                                    <p>{{ $data['reservation']->enr_type }}</p>
                                    <hr>
                                    <b scope="col">Type</b><br>
                                    <p>{{ $data['reservation']->enr_type2 }}</p>
                                    <hr>
                                    <b>Nombre de chansons</b><br>
                                    <p>{{ $data['reservation']->songs_nb }}</p>
                                </div>
                            </div>

                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
