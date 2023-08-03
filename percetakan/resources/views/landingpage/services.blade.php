<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <br><br>
            <h2>Product</h2>
            <p>
                Berikut merupakan beberapa produk unggulan kami
            </p>
        </div>
        <div class="row">
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach ($ar_barang as $barang)
                            <div class="col mb-5">
                                <div class="card h-100 shadow ">
                                    <!-- Product image-->
                                    <img class="card-img-top" img src="admin/assets/img/{{ $barang->foto }}"
                                        alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $barang->nama_barang }}</h5>
                                            <!-- Product price-->
                                            {{ $barang->harga }}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-success mt-auto"
                                                href="https://wa.me/6285888560861"><i class="bi bi-whatsapp"></i> Pesan
                                                Ke WhatsApp</a></div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-link">Lihat lebih banyak</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
