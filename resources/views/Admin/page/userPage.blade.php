<!DOCTYPE html>
<html lang="en">

    @include('Admin.partials.headerAdmin')

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
                                <h4 class="card-title">Daftar Pengguna</h4>
                                <div class="table-responsive">
                                    <table id="table_user" class="table table-bordered table-hover rounded-table"
                                        style="width:100%">
                                        <thead class="head-light header-table">
                                            <tr>
                                                <th width="20">Aksi</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data akan diisi oleh DataTables -->
                                        </tbody>
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
            var url_user = "{{ route('data_user') }}";
        </script>
        <script src="{{ asset('js/user.js') }}?{{ time() }}"></script>

        <!-- End custom js for this page -->
    </body>
    @include('Admin.modal.editUser')
    @include('Admin.modal.hapusUser')
    @include('Admin.js.userjs')

</html>
