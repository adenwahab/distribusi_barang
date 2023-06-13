<div class="col-lg-12">
    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-chart-pie me-1"></i>
            Jumlah Barang per Kategori
        </div>


        <!-- Pie Chart -->
        <div class="card-body">
            <canvas id="pieChart" width="100%" height="50"></canvas>


            <script>
                // Fungsi untuk menghasilkan warna acak
                function randomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Ambil data nama jenis dan jumlah produk per jenis dari DashboardController di fungsi index
                var lbl2 = [
                    @foreach ($ar_jumlah as $j)
                        '{{ $j->nama }}',
                    @endforeach
                ];
                var jml = [
                    @foreach ($ar_jumlah as $j)
                        {{ $j->jumlah }},
                    @endforeach
                ];

                document.addEventListener('DOMContentLoaded', () => {
                    var colors = [];

                    // Generate warna acak sesuai dengan jumlah data
                    for (var i = 0; i < jml.length; i++) {
                        colors.push(randomColor());
                    }

                    new Chart(document.getElementById('pieChart'), {
                        type: 'pie',
                        data: {
                            labels: lbl2,
                            datasets: [{
                                label: 'Jumlah Produk',
                                data: jml,
                                backgroundColor: colors,
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah Produk per Kategori'
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        <!-- End Pie Chart -->

    </div>
</div>
