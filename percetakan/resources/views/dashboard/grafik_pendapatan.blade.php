<div class="col-md-4">
    <div class="card info-card sales-card text-center align-items-center">

        <div class="filter">
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body ">
            <h3 class="card-title">Pendapatan | tahun ini</h3>

            <div class="d-flex align-items-center">
                <div class="card-icon  align-items-center justify-content-center ">
                    <i class="fa-solid fa-money-check-dollar fa-4x"></i>
                </div>
                <div class="ps-3">
                    <h3 class="text-danger fw-bold mb-0 text-center">
                        @foreach ($jml_pendapatan as $jml)
                            {{ 'Rp ' . number_format($jml->jumlah, 0, ',', '.') }}
                        @endforeach
                    </h3>
                    <h5 class=" pt-1 ">Pendapatan</h5>

                </div>
            </div>
        </div>

    </div>
</div>
