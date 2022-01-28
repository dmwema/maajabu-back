@php

$days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimance'];
$current_temp = $temps['forecast'][0]['forecast']['temp'] - 273.15;
$active = 'home';

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
                <h4 class="page-title">Tableau de bord | Financier</h4>
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

        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Messages récents</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        @if (count($messages) == 0)
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Aucun message réçu</h6>

                                </div>
                            </div>
                        @else
                            @foreach ($messages as $message)
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                            and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">April 14, 2021</span> <span
                                                class="label label-rounded label-primary">Pending</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Metéo</h4>
                        <div class="d-flex align-items-center flex-row m-t-30">
                            <div class="display-5 text-info">
                                <!--<i class="wi wi-day-showers"></i>-->
                                <img src="{{ $temps['forecast'][0]['condition']['icon'] }}" style="width: 80px"
                                    alt="icon">
                                <span>{{ $current_temp }}<sup>°</sup></span>
                            </div>
                            <div class="m-l-10">
                                <h3 class="m-b-0">{{ $days[$current_day - 1] }}</h3><small>Kinshasa, Congo RDC </small>
                            </div>
                        </div>
                        <table class="table no-border mini-table m-t-20">
                            <tbody>
                                <tr>
                                    <td class="text-muted">{{ $temps['forecast'][0]['condition']['name'] }}</td>
                                    <td class="font-medium">{{ $temps['forecast'][0]['condition']['desc'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Humidité</td>
                                    <td class="font-medium">{{ $temps['forecast'][0]['forecast']['humidity'] }} %</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Préssion</td>
                                    <td class="font-medium">{{ $temps['forecast'][0]['forecast']['pressure'] }} </td>
                                </tr>
                            </tbody>
                        </table>
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
