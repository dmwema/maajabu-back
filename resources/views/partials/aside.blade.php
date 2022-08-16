@php
$logout_link = '';

$user = null;

if (session()->has('admin')) {
    $logout_link = 'admin.logout';
    $user = session()->get('admin');
    $type = 'admin';
} elseif (session()->has('ir')) {
    $logout_link = 'ir.logout';
    $user = session()->get('ir');
    $type = 'ir';
} elseif (session()->has('finance')) {
    $logout_link = 'finance.logout';
    $user = session()->get('finance');
    $type = 'finance';
}
@endphp

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="users"
                                class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">{{ $user->name }} <i
                                        class="fa fa-angle-down"></i>
                                </h5>
                                <span class="op-5 user-email">{{ $user->email }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                <!--<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Messages</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ route($type . '.profile', ['id' => session()->get($type)->id]) }}"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Compte</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route($logout_link) }}"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Déconnexion</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="p-15 m-t-10"><a href="javascript:void(0)"
                        class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center"><i
                            class="mdi mdi-arrow-right-bold"></i> <span class="hide-menu m-l-5">Voir le
                            site</span> </a>
                </li>
                <!--<li class="p-15 m-t-10"><a href="javascript:void(0)"
                                class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center"><i
                                    class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a>
                        </li>-->

                <li class="sidebar-item {{ $active == 'home' ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route($type . '.home') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tableau
                            de bord</span></a>
                </li>

                @if ($type == 'admin')
                    <li class="sidebar-item {{ $active == 'users' ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.users') }}" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">Utilisateurs</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.group') }}" aria-expanded="false"><i
                                class="fas fa-network-wired"></i><span class="hide-menu">Groupes</span></a>
                    </li>
                    <li class="sidebar-item {{ $active == 'gallery' ? 'selected' : '' }} "> <a
                            class="sidebar-link waves-effect waves-effect sidebar-link"
                            href="{{ route($type . '.image') }}" aria-expanded="false"><i
                                class="mdi mdi-image"></i><span class="hide-menu">Galeries</span></a>
                    </li>
                    <li class="sidebar-item {{ $active == 'pimg' ? 'selected' : '' }} "> <a
                            class="sidebar-link waves-effect waves-effect sidebar-link"
                            href="{{ route($type . '.pimg') }}" aria-expanded="false"><i
                                class="mdi mdi-image"></i><span class="hide-menu">Projet à la une</span></a>
                    </li>
                    <li class="sidebar-item" {{ $active == 'ir' ? 'selected' : '' }}> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.engineer') }}" aria-expanded="false"><i
                                class="fas fa-headphones-alt"></i><span class="hide-menu">Ingénieurs</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.logiciels') }}" aria-expanded="false"><i
                                class="fas fa-keyboard"></i><span class="hide-menu">Logiciels</span></a>
                    </li>

                    <li class="sidebar-item {{ $active == 'artist' ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.artist') }}" aria-expanded="false"><i
                                class="fas fa-headphones-alt"></i><span class="hide-menu">Artistes</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('works') }}" aria-expanded="false"><i class="fas fa-tasks"></i><span
                                class="hide-menu">Projets</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('reservations') }}" aria-expanded="false"><i
                                class="far fa-hand-pointer"></i><span class="hide-menu">Reservations</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.studio') }}"><i class="mdi mdi-microphone"></i><span
                                class="hide-menu">Studio</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.service') }}" aria-expanded="false"><i
                                class="fas fa-network-wired"></i><span class="hide-menu">Services</span></a>
                    </li>

                @elseif ($type == 'ir')
                    <li class="sidebar-item {{ $active == 'artist' ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.artist') }}" aria-expanded="false"><i
                                class="fas fa-headphones-alt"></i><span class="hide-menu">Artistes</span></a>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('works.ir') }}" aria-expanded="false"><i class="fas fa-tasks"></i><span
                                class="hide-menu">Mes
                                Projets</span></a>
                    </li>
                    </li>

                    <li class="sidebar-item {{ $active == 'files' ? 'selected' : '' }}">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.files') }}" aria-expanded="false">
                            <i class="fas fa-file"></i><span class="hide-menu">Fiches technique</span>
                        </a>
                    </li>

                @else
                    <li class="sidebar-item {{ $active == 'paiement' ? 'selected' : '' }}"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route($type . '.paiement') }}" aria-expanded="false"><i
                                class="fas fa-money-check-alt"></i><span class="hide-menu">Paiements</span></a></li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route($type . '.profile', ['id' => session()->get($type)->id]) }}"
                        aria-expanded="false">
                        <i class="fas fa-user-cog"></i><span class="hide-menu"> Compte</span>
                    </a>
                </li>

            </ul>
            <!--fa-thin fa-timeline-->
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
