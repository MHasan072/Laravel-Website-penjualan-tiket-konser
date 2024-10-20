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
                                <h4 class="card-title">Dashboard</h4>

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
