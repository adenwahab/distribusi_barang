<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <title>{{ $title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/css/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</head>


<body class="sb-nav-fixed">


    <!-----------navbar----------->
    @include('admin.navbar')
    <!-----------end navbar----------->

    <!------------sidebar-------------->
    @include('admin.sidebar')
    <!------------end sidebar-------------->

    <div id="layoutSidenav_content">
        <main>
            <!-- <div class="container-fluid px-4"> -->
            <div class="row">
                <!-- <div class="card w-100"> -->
                <div class="card-body mb-5 m-5 px-3">
                    <!---------main--------------->
                    @yield('content')
                    <!---------end main--------------->
                    <!---------footer----------->
                    <!---------end footer----------->
                </div>
                <!-- </div> -->
            </div>
            <!-- </div> -->
            @include('admin.footer')
    </div>
    </main>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

    <script>

    </script>
</body>

</html>