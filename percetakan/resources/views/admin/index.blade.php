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
</head>


<body class="sb-nav-fixed">

    @include('sweetalert::alert')

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
                <div class="card w-100">
                    <div class="card-body p-4">
                        <!---------main--------------->
                        @yield('content')
                        <!---------end main--------------->
                        <!---------footer----------->
                        <!---------end footer----------->
                    </div>
                </div>
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
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            //const url = $(this).attr('href');
            var form = $(this).closest("form");
            var name = $(this).data("name");
            swal({
                title: "Anda Yakin Data dihapus?",
                text: "Jika yakin dihapus, data akan hilang selamanya",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
    <script>

    </script>
</body>

</html>