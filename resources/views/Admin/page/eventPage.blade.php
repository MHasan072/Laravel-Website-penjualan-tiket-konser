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
                                <h4 class="card-title">Table Event</h4>
                                </p>
                                <div class="table-responsive">
                                    <table id="table_event" class="table table-bordered table-hover rounded-table"
                                        style="width:100%">
                                        <thead class="head-light header-table">
                                            <tr>
                                                <th width="20">
                                                    <button type="button" class="btn btn-light " id="tambah_event"
                                                        style="font-size: 12px;"><i class="fa fa-plus-square"
                                                            aria-hidden="true"></i></button>
                                                </th>
                                                <th>Nama Event</th>
                                                <th>Tanggal</th>
                                                <th>Lokasi</th>
                                                <th>Harga Tiket</th>
                                                <th>Deskripsi</th>
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
        <script>
            var url_event = "{{ route('data_event') }}";
        </script>
        <script src="{{ asset('js/event.js') }}?{{ time() }}"></script>

        <!-- End custom js for this page -->
    </body>

    @include('Admin.modal.tambahEvent')
    @include('Admin.modal.hapusEvent')
    @include('Admin.js.eventjs')

</html>
