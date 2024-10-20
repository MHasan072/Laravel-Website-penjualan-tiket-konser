<!DOCTYPE html>
<html lang="en">

    @include('Admin.partials.headerAdmin')
    <style>
        .table thead th i {
            margin-left: 0rem;
        }
    </style>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('Admin.partials.sidebarAdmin')


            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                @include('Admin.partials.navbarAdmin')
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper blank-page">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table Detail Pembelian</h4>
                                </p>
                                <div class="table-responsive">
                                    <table id="table_pembelian" class="table table-bordered table-hover rounded-table"
                                        style="width:100%">
                                        <thead class="head-light header-table">
                                            <tr>
                                                <th>Kode Pembelian</th>
                                                <th>Nama Event</th>
                                                <th>Nama Pembeli <br> Email</th>
                                                <th>NIK <br> No Hp</th>
                                                <th>Total Harga</th>
                                                <th>Status Pembayaran</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Aksi</th> <!-- Misalnya untuk verifikasi admin -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    @include('Admin.partials.footerAdmin')
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('Admin.partials.pluginAdmin')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            var url_tiket = "{{ route('data_tiket') }}";
        </script>
        {{-- <script src="{{ asset('js/tiket.js') }}?{{ time() }}"></script> --}}
        @include('Admin.js.tiketadminjs')
        <!-- End custom js for this page -->
    </body>


</html>
