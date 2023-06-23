@extends('admin.index')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <section class="section dashboard">
            <div class="row">
                <!-- Pesanan Card -->
                @include('dashboard.grafik_pesanan')
                <!-- End Sales Card -->

                <!-- Revenue Card -->

                @include('dashboard.grafik_pendapatan')

                <!-- End Revenue Card -->

                <!-- Customers Card -->
                @include('dashboard.grafik_pelanggan')
                <!-- End Customers Card -->
            </div>

            <br>
            <br>
            <div class="row">
                @include('dashboard.grafik_stok_barang')
            </div>

            <br>
            <br>
            <div class="row">
                @include('dashboard.grafik_jumlah_barang')
            </div>

        </section>
    </main>
@endsection
