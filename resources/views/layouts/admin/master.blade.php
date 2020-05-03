<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Dashboard">

        {{-- App favicon --}}
        <link rel="shortcut icon" href="/file/image/website/logo/midd.jpeg">
        {{-- App title --}}
        <title>{{ config('app.name') }} :: Admin Dashboard</title>

        {{-- App css --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('/dist/admin/plugins/switchery/switchery.min.css') }}">
        <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />

        {{-- Toastr css --}}
        @if (session('MsgFlash'))
        <link href="{{ asset('/dist/admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        @endif

        {{-- DataTable --}}
        <link rel="stylesheet" href="{{ asset('/dist/admin/plugins/datatables/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/dist/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}">

        <script src="{{ asset('/dist/admin/assets/js/modernizr.min.js') }}"></script>

        {{-- css plus --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/css/class.css') }}">

        @yield('css')

    </head>


    <body class="fixed-left">

        {{-- Loader --}}
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="spinner-wrapper">
                    <div class="rotator">
                        <div class="inner-spin"></div>
                        <div class="inner-spin"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Begin page --}}
        <div id="wrapper">

            {{-- Top Bar Start --}}
            <div class="topbar">

                {{-- LOGO --}}
                @include('layouts.admin.logo')

                {{-- Button mobile view to collapse sidebar menu --}}
                @include('layouts.admin.topbar')

            </div>
            {{-- Top Bar End --}}


            {{-- ========== Left Sidebar Start ========== --}}
            @include('layouts.admin.menu')
            {{-- Left Sidebar End --}}



            {{-- ============================================================== --}}
            {{-- Start right Content here  animated bounceInRight--}}
            {{-- ============================================================== --}}

            <div class="content-page">
                {{-- Start content --}}

                @yield('entete')

                {{-- content --}}
                <div class="m-2">

                    @yield('content')

                </div>
                {{-- end content --}}

                @include('layouts.admin.footer')

            </div>


            {{-- ============================================================== --}}
            {{-- End Right content here --}}
            {{-- ============================================================== --}}


            {{-- Right Sidebar --}}
            @include('layouts.admin.right-sidebar')
            {{-- /Right-bar --}}

        </div>
        {{-- END wrapper --}}

        <script>
            var resizefunc = [];
        </script>

        {{-- jQuery  --}}
        <script src="{{ asset('/dist/admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/detect.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('/dist/admin/plugins/switchery/switchery.min.js') }}"></script>

        {{-- App js --}}
        <script src="{{ asset('/dist/admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('/dist/admin/assets/js/jquery.app.js') }}"></script>

        {{-- My App --}}
        <script src="{{ asset('/dist/admin/js/app.js') }}"></script>

        {{-- DataTable --}}
        <script src="{{ asset('/dist/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/dist/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        {{-- Toastr js --}}
        @if (session('MsgFlash'))
        <script src="{{ asset('/dist/admin/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('/dist/admin/plugins/toastr/toastr.init.js') }}"></script>
        <script type="text/javascript">
            toastr.{{ session('MsgFlash')['type'] }}("{{ isset(session('MsgFlash')['msg']) ? session('MsgFlash')['msg'] : null }}")
        </script>
        @endif

        {{-- DataTable init --}}
        <script src="{{ asset('/dist/admin/assets/pages/jquery.datatables.init.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

        @yield('javascript')

        <script type="text/javascript">
            $('#datatable').dataTable();
        </script>

        @include('layouts.partage.google-analytic')

    </body>

</html>
