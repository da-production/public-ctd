<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="sidebar-mini skin-blue">
    <div class="wrapper">

        @include('layouts.header')

        <x-leftaside />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.breadcrumb')

            <section class="content">
                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </section>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            &copy; {{Date('Y')}} <a href="javascript:void(0)">DaProduction</a>. Tous les droits sont réservés.
        </footer>


    </div>
    <!-- ./wrapper -->
    @yield('absolute')
    @include('layouts.scripts')
    @yield('script')

</body>

</html>
