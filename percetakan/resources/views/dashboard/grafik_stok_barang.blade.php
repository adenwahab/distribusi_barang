<div class="col-lg-12">
    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-chart-bar me-1"></i>
            Stok Barang
        </div>

        <!-- Bar Chart -->
        <div class="card-body">
            <canvas id="barChart" width="100%" height="50"></canvas>

            <script>
                // ambil data nama nama dan stok dari DashboardController di fungsi index
                var lbl = [
                    @foreach($ar_stok as $s)
                    '{{ $s->nama_barang }}',
                    @endforeach
                ];
                var stk = [
                    @foreach($ar_stok as $s)
                    '{{ $s -> stok }}',
                    @endforeach
                ];
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.getElementById('barChart'), {
                        type: 'bar',
                        data: {
                            labels: lbl,
                            datasets: [{
                                label: 'Grafik Stok Barang',
                                data: stk,
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgb(54, 162, 235)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

        <!-- End Bar Chart -->
    </div>
</div>