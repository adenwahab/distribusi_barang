<div class="col-md-4">
    <div class="card info-card sales-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Transaksi <span>| tahun ini </span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="ps-3">
                    <h6>
                        @foreach ($jml_transaksi as $jml)
                            {{ $jml->jumlah }}
                        @endforeach
                    </h6>
                    <span class="text-success small pt-1 fw-bold">Transaksi</span>

                </div>
            </div>
        </div>

    </div>
</div>
