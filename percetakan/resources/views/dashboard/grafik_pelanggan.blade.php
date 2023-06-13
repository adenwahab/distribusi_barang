<div class="col-md-4">

    <div class="card info-card customers-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        </div>

        <div class="card-body">
            <h5 class="card-title">Pelanggan <span>| Tahun Ini</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6>
                        @foreach ($jml_pelanggan as $jml)
                            {{ $jml->jumlah }}
                        @endforeach
                    </h6>
                    <span class="text-danger small pt-1 fw-bold">Pelanggan</span>

                </div>
            </div>

        </div>
    </div>
</div>
