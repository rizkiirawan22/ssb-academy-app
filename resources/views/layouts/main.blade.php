<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shorcut icon" href="{{ asset('img/logo.png') }}">
    <title>SSB Akademi App{{ isset($title) ? ' | ' . $title : '' }}</title>

    {{-- css --}}
    @include('layouts.inc.ext-css')
    @stack('css')
    {{-- End css --}}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('layouts.inc.navbar')
        {{-- End Navbar --}}

        {{-- Sidebar --}}
        @include('layouts.inc.sidebar')
        {{-- End Sidebar --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content-header')
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- Footer --}}
        @include('layouts.inc.footer')
        {{-- End Footer --}}

    </div>
    <!-- ./wrapper -->

    {{-- js --}}
    @include('layouts.inc.ext-js')
    <script>
        $('body').on('click', '#logout', function() {
            Swal.fire({
                title: 'Yakin Logout ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                confirmButtonColor: '#FF0000',
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#3085d6',
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('logout-form').submit();
                }
            })
        });
    </script>
    @stack('js')
    {{-- End js --}}
</body>

</html>