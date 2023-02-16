@extends('layouts')

@section('sidebar')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-cart-plus fa-fw mr-2"></i></div>
                    Order
                </a>
                {{-- riwayat order --}}
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-history fa-fw mr-2"></i></div>
                    Riwayat Order
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
