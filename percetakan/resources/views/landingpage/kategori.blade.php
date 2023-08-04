@extends('landingpage.index')
@section('content')
    <section id="services" class="services section-bg">



        <!-- Start Banner Hero -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" data-aos="fade-up" data-aos-delay="100">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 >Cetak Yuk!</h2>
                        <p>kami siap mencetak produk yang anda inginkan.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Produk berkualitas</h2>
                        <p>Kami menyediakan produk berkualitas.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/carousel/carousel-3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="shadow">
                        <h2>Siap melayani 24/7</h2>
                        <p>pelayanan yang kami berikan siap melayani 24/7.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- End Banner Hero -->


        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br><br>
                <h2>{{ $title }}</h2>
                <p>
                    Berikut merupakan beberapa produk unggulan kami
                </p>
            </div>
          <div class="row">
          <section class="py-5">
              <div class="container px-4 px-lg-5 mt-5">
                  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($barang as $barang)
                      <div class="col mb-5">
                          <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="admin/assets/img/{{ $barang->foto }}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">{{$barang->nama_barang}}</h5>
                                      <!-- Product reviews-->
                                      <div class="d-flex justify-content-center small text-warning mb-2">
                                          <div class="bi-star-fill"></div>
                                          <div class="bi-star-fill"></div>
                                          <div class="bi-star-fill"></div>
                                          <div class="bi-star-fill"></div>
                                          <div class="bi-star-fill"></div>
                                      </div>
                                      <!-- Product price-->
                                   Rp {{$barang->harga}}
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto bg-new shadow" href="https://wa.me/6282169019974"><i class="bi-whatsapp">&nbsp;Pesan ke Whatsapp</i></a>  
                                </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>
          </section>
            </div>
        </div>
    </section>
@endsection
