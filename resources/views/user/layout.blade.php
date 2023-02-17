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
                <a class="nav-link" href="#" onclick="logout_alert()">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt fa-fw mr-2"></i></div>
                    Logout
                </a>
            </div>
        </div>
    </nav>
</div>
@endsection

@push('scripts')
    <script>
        function logout_alert() {
            swal({
                title: "Apakah anda yakin?",
                text: "Anda akan logout dari dunia ini!",
                icon: "warning",
                buttons: ["Batal aku masih ingin hidup", "Ya, Aku menyerah, aku ingin Logout!"],
                dangerMode: true,
            }).then((yes) => {
                if (yes) {
                    // create POST request
                    var form = document.createElement("form");
                    form.setAttribute("method", "POST");
                    form.setAttribute("action", "{{ route('logout') }}");
                    form.style.display = 'none';
                    document.body.appendChild(form);
                    var token = document.createElement("input");
                    token.setAttribute("type", "hidden");
                    token.setAttribute("name", "_token");
                    token.setAttribute("value", "{{ csrf_token() }}");
                    form.appendChild(token);
                    form.submit();
                }
            });
        }
    </script>
@endpush
