@extends('landingpage.index')
@section('content')

<section id="services" class="services section-bg">



     <!-- Start Banner Hero -->
     <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/carousel/carousel-3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <!-- End Banner Hero -->


        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <br><br>
            <h2>Packaging</h2>
            <p>
              Berikut merupakan beberapa produk unggulan kami
            </p>
          </div>

          <div class="row">
          <section class="py-5">
              <div class="container px-4 px-lg-5 mt-5">
                  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                      <div class="col mb-5">
                      <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="{{ asset('assets/img/produk/packaging/box_gable.jpg')}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">Box Gable</h5>
                                      <!-- Product price-->
                                      Rp 100.000
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/6282169019974">Pesan</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="col mb-5">
                      <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="{{ asset('assets/img/produk/packaging/box_lotus.jpg')}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">Box Lotus</h5>
                                      <!-- Product price-->
                                      Rp 100.000
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/6282169019974">Pesan</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="col mb-5">
                      <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="{{ asset('assets/img/produk/packaging/hand_held.jpg')}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">Hand Held</h5>
                                      <!-- Product price-->
                                      Rp 100.000
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/6282169019974">Pesan</a></div>
                              </div>
                          </div>
                      </div>

                      <div class="col mb-5">
                      <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="{{ asset('assets/img/produk/packaging/packaging_box_pillow.jpg')}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">Packaging Pillow</h5>
                                      <!-- Product price-->
                                      Rp 100.000
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/6282169019974">Pesan</a></div>
                              </div>
                          </div>
                      </div>

                      <div class="col mb-5">
                      <div class="card h-100 shadow">
                              <!-- Product image-->
                              <img class="card-img-top" src="{{ asset('assets/img/produk/packaging/stiker_fragile.jpg')}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder">Stiker Fragile</h5>
                                      <!-- Product price-->
                                      Rp 100.000
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/6282169019974">Pesan</a></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
            </div>
        </div>
      </section>

@endsection
