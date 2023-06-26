<div class="col-md-4">

    <div class="card info-card sales-card text-center align-items-center">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        </div>

        <div class="card-body">
            <h3 class="card-title">Pelanggan | Tahun Ini </h3>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-friends fa-3x"></i>
                </div>
                <div class="ps-3">
                    <h3 class="text-success fw-bold mb-0 text-center">
                        @foreach ($jml_pelanggan as $jml)
                            {{ $jml->jumlah }}
                        @endforeach
                    </h3>
                    <h5 class=" pt-1 ">Pelanggan</h5>

                </div>
            </div>

        </div>
    </div>
</div>
