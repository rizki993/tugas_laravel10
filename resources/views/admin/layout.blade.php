@extends('layouts')

@section('sidebar')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-fw mr-2"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Modul</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tablets fa-fw mr-2"></i></div>
                    Obat
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw mr-2"></i></div>
                    Pembeli
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie fa-fw mr-2"></i></div>
                    Admins
                </a>
                <div class="sb-sidenav-menu-heading">Modul</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt fa-fw mr-2"></i></div>
                    Logout
                </a>
            </div>
        </div>
    </nav>
</div>
@endsection
