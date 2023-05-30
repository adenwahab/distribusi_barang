<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Barang</h2>
            <p>Check Our <span>Barang</span></p>
        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <div class="tab-pane fade active show" id="menu-starters">



                <div class="row gy-5">
                    @foreach ($ar_bahan as $bhn)
                        <div class="col-lg-4 menu-item">
                            @empty($bhn->foto)
                                <img src="{{ url('assets/img/nophoto.jpg') }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ url('assets/img') }}/{{ $bhn->foto }}" class="img-fluid" alt="">
                            @endempty
                            <h4>{{ $bhn->nama }}</h4>
                            <p class="ingredients">
                                Kode Barang: {{ $bhn->kode }}
                                <br />Kategori Barang: {{ $bhn->kategori->nama }}
                                <br />Stok Barang: {{ $bhn->stok }}
                            </p>
                            <p class="price">
                                Rp. {{ $bhn->harga }}
                            </p>
                        </div><!-- Menu Item -->
                    @endforeach
                </div>
            </div><!-- End Starter Menu Content -->



        </div>

    </div>
</section>
