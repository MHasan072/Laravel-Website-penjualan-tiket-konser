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
                                <h4 class="card-title">Table </h4>
                                </p>
                                <div class="table-responsive">
                                    <table id="table_" class="table table-bordered table-hover rounded-table"
                                        style="width:100%">
                                        <thead class="head-light header-table">
                                            <tr>
                                                <th width="20">
                                                    <button type="button" class="btn btn-light " id="tambah_event"
                                                        style="font-size: 12px;"><i class="fa fa-plus-square"
                                                            aria-hidden="true"></i></button>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
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

        <!-- End custom js for this page -->
    </body>

</html>
