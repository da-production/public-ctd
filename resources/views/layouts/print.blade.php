<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="sidebar-mini skin-black-light">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    @include('layouts.scripts')
    @yield('script')

</body>

</html>
