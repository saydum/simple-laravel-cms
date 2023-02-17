<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout._embed.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout._embed.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout._embed.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @include('layout._embed.header')

                    <!-- Content Row -->
                    <div class="row">
                        @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Footer -->
    @include('layout._embed.footer')
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    @include('layout._embed.scroll')

    <!-- Logout Modal-->
    @include('layout._embed.logout-modal')

    <!-- JS scriptis -->
    @include('layout._embed.js-scripts')

</body>
</html>
